<?php

namespace App\Controller;

use App\Entity\Room;
use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticController extends AbstractController
{
    /**
     * @Route("/statistic", name="statistic")
     */
    public function index()
    {

         // 1. Obtain doctrine manager
         $em = $this->getDoctrine()->getManager();
        
         // 2. Setup repository of some entity
         $repoStudent = $em->getRepository(Student::class);
         
         // 3. Query how many rows are there in the Articles table
         $totalStudent = $repoStudent->createQueryBuilder('a')
             // Filter by some parameter if you want
             // ->where('a.published = 1')
             ->select('count(a.id)')
             ->getQuery()
             ->getSingleScalarResult();

         // 1. Obtain doctrine manager
         $em = $this->getDoctrine()->getManager();
        
         // 2. Setup repository of some entity
         $repoRoom = $em->getRepository(Room::class);
         
         // 3. Query how many rows are there in the Articles table
         $totalRoom = $repoRoom->createQueryBuilder('a')
             // Filter by some parameter if you want
             // ->where('a.published = 1')
             ->select('count(a.id)')
             ->getQuery()
             ->getSingleScalarResult();
         
         // 4. Return a number as response
         // e.g 972
        return $this->render('statistic/index.html.twig', [
            'totalStudent' => $totalStudent,
            'totalRoom' => $totalRoom
        ]);
    }
}
