<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'session_index', methods: ['GET'])]
    public function index(SessionInterface $session): Response
    {
        return $this->render('session/index.html.twig', [
        'sessionData' => $session->all(),
        ]);
    }


    #[Route('/session/delete', name: 'session_delete', methods: ['POST','GET'])]
    public function delete(SessionInterface $session): Response
    {
        $session->clear();
        $this->addFlash('success', 'The session has been deleted.');
        return $this->redirectToRoute('session_index');
    }
}
