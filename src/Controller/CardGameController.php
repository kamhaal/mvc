<?php

namespace App\Controller;

use App\Card\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CardGameController extends AbstractController
{
    #[Route("/", name: "card_index")]
    public function index(): Response
    {
        return $this->render('card/index.html.twig');
    }
    
    #[Route("/card/deck", name: "show_deck")]
    public function showDeck(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $session->set('deck', $deck);
        $cards = $deck->getCards();
    
        return $this->render('card/show_deck.html.twig', [
            'cards' => $cards
        ]);
    }

    #[Route("/card/deck/shuffle", name: "shuffle_deck")]
    public function shuffleDeck(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $deck->shuffle();
        $session->set('deck', $deck);

        return $this->redirectToRoute('show_deck');
    }

    #[Route("/card/deck/draw", name: "draw_card")]
    public function drawCard(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $card = $deck->drawCard();
        $session->set('deck', $deck);

        return $this->render('card/draw_card.html.twig', [
            'card' => $card
        ]);
    }

    #[Route("/card/deck/draw/{number<\d+>}", name: "draw_multiple_cards")]
    public function drawMultipleCards(SessionInterface $session, int $number): Response
    {
        $deck = $session->get('deck', new Deck());
        $cards = $deck->drawMultipleCards($number);
        $session->set('deck', $deck);
    
        return $this->render('card/draw_multiple_cards.html.twig', [
            'cards' => $cards
        ]);
    }

    #[Route("/session/delete", name: "session_delete")]
    public function deleteSession(SessionInterface $session): Response
    {
        $session->clear();
        $this->addFlash('success', 'Nu är sessionen raderad');
        return $this->redirectToRoute('card_index');
    }
    
}
