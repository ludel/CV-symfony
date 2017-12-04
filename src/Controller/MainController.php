<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class MainController extends Controller
{
    /**
     *
     * @Route("/lol")
     * @return Response
     */
    public function index()
    {
        return $this->render("index.twig");
    }
}