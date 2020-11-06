<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    private string $name = 'Unknown';
    private Session $session;


    /**
     * @Route("/learning", name="learning")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [

        ]);
    }

    public function aboutMe(): Response {
        return $this->render('learning/aboutMe.twig');
    }


    public function showName(): Response {
        return $this->render( 'learning/greetingform.twig',[
            'name' => $this->name
        ]);
    }

    public function changMyName(): Response {
        return $this->render( 'learning/greetingForm.twig', [
            $this->session->start(),
            'name' => $this->session
        ]);
    }
}
