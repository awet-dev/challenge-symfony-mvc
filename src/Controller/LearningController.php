<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    private string $name = 'unknown';
    private SessionInterface $session;


    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController'
        ]);
    }

    public function aboutMe(): Response
    {
        return $this->render('learning/aboutMe.twig',[
            'name' => 'BeCode'
        ]);
    }

    public function showName(): Response {
        return $this->render('learning/showMyName.twig', [
            'name' => $this->name
        ]);
    }

    public function changeMyName(): Response {
        if (!empty($_POST['name'])) {
            $this->name = $_POST['name'];

            return $this->render('learning/changeMyName.twig', [
                'name' => $this->name
            ]);
        } else {
            return $this->render('learning/showMyName.twig', [
                'name' => "enter your name"
            ]);
        }


    }





}
