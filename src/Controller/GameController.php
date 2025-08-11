<?php

namespace App\Controller;

use App\Game\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/game', name: 'game_index')]
    public function index(): Response
    {
        return $this->render('game/index.html.twig');
    }

    #[Route('/game/play', name: 'game_play')]
    public function play(SessionInterface $session): Response
    {
        $game = $session->get('game', new Game());
        $session->set('game', $game);

        return $this->render('game/play.html.twig', [
            'game' => $game
        ]);
    }

    #[Route('/game/hit', name: 'game_hit')]
    public function hit(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('game');
        $game->playerHit();
        $session->set('game', $game);

        return $this->redirectToRoute('game_play');
    }

    #[Route('/game/stand', name: 'game_stand')]
    public function stand(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('game');
        $game->playerStand();
        $session->set('game', $game);

        return $this->redirectToRoute('game_play');
    }

    #[Route('/game/doc', name: 'game_doc')]
    public function doc(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    #[Route('/game/new', name: 'game_new')]
    public function new(SessionInterface $session): Response
    {
        $game = new Game();
        $session->set('game', $game);

        return $this->redirectToRoute('game_play');
    }
}