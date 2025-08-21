<?php

namespace App\Controller;

use App\Card\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route("/api", name: "api_landing")]
    public function apiLanding(): Response
    {
        return $this->render('card/api.html.twig');
    }

    #[Route("/api/deck", name: "api_deck", methods: ['GET'])]
    public function apiDeck(SessionInterface $session): JsonResponse
    {
        $deck = $session->get('deck', new Deck());
        return $this->json([
            'deck' => $deck->getCards(),
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route("/api/deck/shuffle", name: "api_shuffle", methods: ['POST'])]
    public function apiShuffle(SessionInterface $session): JsonResponse
    {
        $deck = new Deck();
        $deck->shuffle();
        $session->set('deck', $deck);
        return $this->json([
            'deck' => $deck->getCards(),
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route("/api/deck/draw", name: "api_draw", methods: ['POST'])]
    public function apiDraw(SessionInterface $session): JsonResponse
    {
        $deck = $session->get('deck', new Deck());
        $card = $deck->drawCard();
        $session->set('deck', $deck);
        return $this->json([
            'card' => $card,
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route("/api/deck/draw/{number<\d+>}", name: "api_draw_number", methods: ['POST'])]
    public function apiDrawNumber(SessionInterface $session, int $number): JsonResponse
    {
        $deck = $session->get('deck', new Deck());
        $cards = $deck->drawMultipleCards($number);
        $session->set('deck', $deck);
        return $this->json([
            'cards' => $cards,
            'remaining' => count($deck->getCards())
        ]);
    }
}