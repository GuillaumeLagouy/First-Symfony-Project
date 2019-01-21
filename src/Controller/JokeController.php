<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JokeController extends AbstractController
{
    /**
     * @Route("/joke", name="joke")
     */
    public function index()
    {
        return $this->render('joke/index.html.twig', [
            'controller_name' => 'JokeController',
        ]);
    }
}
