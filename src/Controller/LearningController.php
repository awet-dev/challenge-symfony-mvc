<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    private string $name = 'Unknown';
    private SessionInterface $session;


    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @Route("/learning", name="learning")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController'
        ]);
    }

    public function setName() :string {
        if ($this->session->get('name') !== null){
            $this->name = $this->session->get('name');
            return $this->name;
        }
        return $this->name;
    }

    /**
     * @Route("/about-becode", name="aboutMe")
     */
    public function aboutMe(): Response
    {
        if ($this->setName() == "Unknown") {
            return $this->forward('\App\Controller\LearningController::showMyName');
        }
        return $this->render('learning/aboutMe.twig',[
            'name' => $this->setName()
        ]);
    }

    /**
     * @Route("/", name="showMyName")
     */
    public function showMyName(): Response {

        return $this->render('learning/showMyName.twig', [
            'name' => $this->setName()
        ]);
    }

    /**
     * @Route ("/changeMyName", name="changeMyName", methods = {"POST"})
     */
    public function changeMyName(): Response {
        if (!empty($_POST['name'])) {
            $this->session->set('name', ucwords($_POST['name']));
        }

        return $this->redirectToRoute('showMyName');
    }





}
