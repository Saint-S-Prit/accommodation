<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\Student1Type;
use App\Repository\StudentRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Response as BrowserKitResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\EventListener\ResponseListener;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response as FlexResponse;

// Include paginator interface


/**
 * @Route("/student")
 */
class StudentController extends AbstractController
{
    /**
     * @Route("/liste", name="student_liste", methods={"GET"})
     */
    public function liste(StudentRepository $studentRepository): Response
    {

        // Render the twig view
        return $this->render('student/index.html.twig', [
            'students' => $studentRepository->findAll() 
        ]);
    }

    /**
     * @Route("/new", name="student_new", methods={"GET","POST"})
     */
    public function new(Request $request) : Response
    {
       

            $student = new Student();
            $form = $this->createForm(Student1Type::class, $student);
            $form->handleRequest($request);
    
            if (isset($_POST['student1']))
            {
                $data = $_POST['student1'];
                
                // $student = new Student();
                $pnom = $data['firstName'];
                $nom = $data['lastName'];
                $phone = $data['phone'];
                $email = $data['email'];
                $adresse = $data['adresse'];
                $birthday = $data['birthday'];
                $sholarship = $data['sholarship'];
                $housing = $data['housing'];
                // $room = $data['room'];


                $matricule = strtoupper(date('Y').substr($nom, 0, 2).substr($pnom,-2).sprintf("%"."04d",rand(0,9999)));
                $student -> setMatricule($matricule);
                $student -> setFirstName($pnom);
                $student -> setLastName($nom);
                $student -> setBirthday($birthday);
                $student -> setEmail($email);
                $student -> setPhone($phone);
                $student -> setSholarship($sholarship);
                $student -> setHousing($housing);
                $student -> setAdresse($adresse);
                // $student -> setRoom($room);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($student);
                $entityManager->flush();
                return new Response('okey');
            }
            
            return $this->render('student/new.html.twig',[
                'student' => $student,
                'form' => $form->createView(),
            ]);

        
    }
 

    /**
     * @Route("/{id}", name="student_show", methods={"GET"})
     */
    public function show(Student $student): Response
    {
        return $this->render('student/show.html.twig', [
            'student' => $student,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="student_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Student $student): Response
    {
        $form = $this->createForm(Student1Type::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('student_liste');
        }

        return $this->render('student/edit.html.twig', [
            'student' => $student,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="student_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Student $student): Response
    {
        if ($this->isCsrfTokenValid('delete'.$student->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($student);
            $entityManager->flush();
        }

        return $this->redirectToRoute('student_liste');
    }

    /**
     * @Route("/recherche", name="search", methods={"GET"})
     */
    public function recherche(Request $request, StudentRepository $repo, PaginatorInterface $paginator)
    {

        $searchForm = $this->createForm(StudentSearchType::class);
        $searchForm->handleRequest($request);
        
        $donnees = $repo->findAll();
 
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
 
            $firstName = $searchForm->getData()->getfirstName();

            $donnees = $repo->search($firstName);
        

            if ($donnees == null) {
                $this->addFlash('erreur', 'Aucun article contenant ce mot clé dans le titre n\'a été trouvé, essayez en un autre.');
           
            }
        }

    }

    //  // Paginate the results of the query
    //  $students = $paginator->paginate(
    //     // Doctrine Query, not results
    //     $donnees,
    //     // Define the page parameter
    //     $request->query->getInt('page', 1),
    //     // Items per page
    //     4
    // );

    //     return $this->render('student/search.html.twig',[
    //         'students' => $students,
    //         'searchForm' => $searchForm->createView()
    //     ]);
}
