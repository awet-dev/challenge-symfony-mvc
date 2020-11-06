<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/learning", name="learning")
     */
    public function aboutMe(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
            'course_name' => 'web development',
        ]);
    }

    public function test(): Response {
        return $this->render('learning/example.twig', ['name' => 'BeCode']);
    }

}
