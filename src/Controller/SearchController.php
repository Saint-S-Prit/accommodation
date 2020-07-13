<?php

namespace App\Controller;

use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{


    /**
     * @Route("/search", name="search", methods={"GET"})
     */
    public function index(StudentRepository $repository, Request $request)
    {
        $q = $request->query->get('q');
        $student = $repository->findAllWithSearch($q);

    }
}
