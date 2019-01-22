<?php

namespace App\Controller;

use App\Entity\Joke;
use App\Form\JokeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JokeController extends AbstractController
{
    /**
     * @Route("/joke", name="joke")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $joke = new Joke();
        $form = $this->createForm(JokeType::class, $joke);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $joke = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($joke);
            $entityManager->flush();

            return $this->redirectToRoute('joke');
        }

        // Get all jokes
        $repository = $this->getDoctrine()->getRepository(Joke::class);
        $jokes = $repository->findBy([], ["id" => "DESC"]);

        return $this->render('joke/index.html.twig', [
            'form' => $form->createView(),
            'jokes' => $jokes,
        ]);
    }

    /**
     * @Route("/joke/delete/{id}", name="delete")
     */
    public function delete(Request $request, Joke $joke){
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($joke);
        $entityManager->flush();

        return $this->redirectToRoute('joke');
    }
}
