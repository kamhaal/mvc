<?php

namespace App\Controller;

use App\Card\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/deck', name: 'api_deck', methods: ['GET'])]
    public function getDeck(SessionInterface $session): JsonResponse
    {
        $deck = $session->get('deck', new Deck());
        return $this->json([
            'deck' => $deck->getCards(),
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route('/api/deck/shuffle', name: 'api_deck_shuffle', methods: ['POST'])]
    public function shuffleDeck(SessionInterface $session): JsonResponse
    {
        $deck = new Deck();
        $deck->shuffle();
        $session->set('deck', $deck);

        return $this->json([
            'deck' => $deck->getCards(),
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route('/api/deck/draw', name: 'api_draw_one', methods: ['POST'])]
    public function drawOne(SessionInterface $session): JsonResponse
    {
        $deck = $session->get('deck', new Deck());
        $card = $deck->drawCard();
        $session->set('deck', $deck);

        return $this->json([
            'drawn' => $card,
            'remaining' => count($deck->getCards())
        ]);
    }

    #[Route('/api/deck/draw/{number<\d+>}', name: 'api_draw_many', methods: ['POST'])]
    public function drawMultiple(SessionInterface $session, int $number): JsonResponse
    {
        $deck = $session->get('deck', new Deck());
        $cards = $deck->drawMultipleCards($number);
        $session->set('deck', $deck);

        return $this->json([
            'drawn' => $cards,
            'remaining' => count($deck->getCards())
        ]);
    }
}
