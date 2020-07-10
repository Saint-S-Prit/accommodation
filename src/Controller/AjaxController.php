<?php

namespace App\Controller;

use App\Entity\Student;
use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends AbstractController
{
    /**
     * @Route("student/ajax/add", name="ajax_add")
     */
    public function index(Request $request)
    {
        
        if($request->isXmlHttpRequest()){
            $content = $this->get("request")->getContent();
            $cat = json_decode($content, true);
            var_dump($content);
        }
        else {
            echo 'Sorry!';
        }

        // if($request->isXmlHttpRequest())
        // {
            
            // $matricule = $request->request->get('matricule');
            // $firstname = $request->request->get('firstname');
            // $lastname = $request->request->get('lastname');
            // $email = $request->request->get('email');
            // $phone = $request->request->get('phone');
            // $birthday = $request->request->get('birthday');
            // $sholarship = $request->request->get('sholarship');
            // $housing = $request->request->get('housing');
            // $room = $request->request->get('room');

            // $student = new Student($request->request);

        // }

    }
}
