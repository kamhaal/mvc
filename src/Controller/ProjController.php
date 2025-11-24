<?php

namespace App\Controller;

use App\Game\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProjController extends AbstractController
{
    #[Route('/proj', name: 'proj_index')]
    public function index(): Response
    {
        return $this->render('proj/index.html.twig');
    }

    #[Route('/proj/about', name: 'proj_about')]
    public function about(): Response
    {
        return $this->render('proj/about.html.twig');
    }

    #[Route('/proj/doc', name: 'proj_doc')]
    public function doc(): Response
    {
        return $this->render('proj/doc.html.twig');
    }

    #[Route('/proj/play', name: 'proj_play')]
    public function play(Request $request, SessionInterface $session): Response
    {
        $game = $session->get('blackjack');

        if (!$game) {
            $game = new Game("Player", 200);
            $session->set('blackjack', $game);
        }

        return $this->render('proj/play.html.twig', [
            'game' => $game
        ]);
    }

    #[Route('/proj/play/hit', name: 'proj_hit')]
    public function hit(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('blackjack');
        $game->hit();
        $session->set('blackjack', $game);

        return $this->redirectToRoute('proj_play');
    }

    #[Route('/proj/play/stand', name: 'proj_stand')]
    public function stand(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('blackjack');
        $game->stand();
        $session->set('blackjack', $game);

        return $this->redirectToRoute('proj_play');
    }

    #[Route('/proj/play/new', name: 'proj_new')]
    public function newGame(SessionInterface $session): Response
    {
        $game = new Game("Player", 200);
        $session->set('blackjack', $game);

        return $this->redirectToRoute('proj_play');
    }

    #[Route('/proj/start', name: 'proj_start')]
public function start(Request $request, SessionInterface $session): Response
{
    if ($request->isMethod('POST')) {
        $name = $request->request->get('player_name');
        if ($name) {
            $game = new Game($name, 200); 
            $session->set('blackjack', $game);
            return $this->redirectToRoute('proj_play');
        }
    }

    return $this->render('proj/start.html.twig');
}

}
