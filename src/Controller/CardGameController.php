<?php

namespace App\Controller;

use App\Card\Deck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardGameController extends AbstractController
{
    #[Route("/", name: "card_index")]
    public function index(): Response
    {
        return $this->render('card/index.html.twig');
    }

    #[Route("/card", name: "card_landing")]
    public function cardLanding(): Response
    {
        return $this->render('card/index.html.twig');
    }

    #[Route("/card/deck", name: "card_show")]
    public function showDeck(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $session->set('deck', $deck);
        return $this->render('card/show_deck.html.twig', [
            'cards' => $deck->getCards()
        ]);
    }

    #[Route("/card/shuffle", name: "card_shuffle")]
    public function shuffle(SessionInterface $session): Response
    {
        $deck = new Deck();
        $deck->shuffle();

        $session->set('deck', $deck);

        return $this->render('card/shuffle.html.twig', [
            'cards' => $deck->getCards()
        ]);
    }

    #[Route("/card/deck/shuffle", name: "shuffle_deck")]
    public function shuffleDeck(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $deck->shuffle();
        $session->set('deck', $deck);

        return $this->redirectToRoute('card_show');
    }

    #[Route("/card/deck/draw", name: "card_draw")]
    public function drawCard(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());
        $card = $deck->drawCard();
        $session->set('deck', $deck);

        return $this->render('card/draw_card.html.twig', [
            'card' => $card
        ]);
    }

    #[Route("/card/deck/draw/{number<\d+>}", name: "card_draw_multiple")]
    public function drawMultipleCards(SessionInterface $session, int $number): Response
    {
        $deck = $session->get('deck', new Deck());
        $cards = $deck->drawMultipleCards($number);
        $session->set('deck', $deck);

        return $this->render('card/draw_multiple_cards.html.twig', [
            'cards' => $cards
        ]);
    }

    #[Route("/card/session/reset", name: "card_reset_session")]
    public function resetSession(SessionInterface $session): Response
    {
        $session->clear();
        $this->addFlash('success', 'Sessionen är återställd.');
        return $this->redirectToRoute('card_landing');
    }

    #[Route("/session/delete", name: "session_delete")]
    public function deleteSession(SessionInterface $session): Response
    {
        $session->clear();
        $this->addFlash('success', 'Nu är sessionen raderad');
        return $this->redirectToRoute('card_index');
    }

    #[Route("/card/session", name: "card_session")]
    public function cardSession(SessionInterface $session): Response
    {
        $deck = $session->get('deck', new Deck());

        return $this->render('card/session.html.twig', [
            'deck' => $deck->getCards()
        ]);
    }
}
