<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\DeckOfCards;
use App\Entity\CardHand;

class CardController extends AbstractController
{
    #[Route("/card", name: "card_start")]
    public function home(): Response
    {
        return $this->render('card/home.html.twig');
    }

    #[Route("/card/deck", name: "card_deck")]
    public function deck(SessionInterface $session): Response
    {
        $deck = $session->get('deck') ?? new DeckOfCards();
        $deck->sort();
        $session->set('deck', $deck);

        return $this->render('card/deck.html.twig', [
            'cards' => $deck->getCards()
        ]);
    }

    #[Route("/card/deck/shuffle", name: "card_deck_shuffle")]
    public function shuffle(SessionInterface $session): Response
    {
        $deck = new DeckOfCards();
        $deck->shuffle();
        $session->set('deck', $deck);

        return $this->render('card/deck.html.twig', [
            'cards' => $deck->getCards()
        ]);
    }

    #[Route("/card/deck/draw", name: "card_deck_draw")]
    public function draw(SessionInterface $session): Response
    {
        $deck = $session->get('deck') ?? new DeckOfCards();
        $card = $deck->drawCard();
        $session->set('deck', $deck);

        return $this->render('card/draw.html.twig', [
            'cards' => [$card],
            'remaining' => $deck->getCardsCount()
        ]);
    }

    #[Route("/card/deck/draw/{number<\d+>}", name: "card_deck_draw_number")]
    public function drawNumber(SessionInterface $session, int $number): Response
    {
        $deck = $session->get('deck') ?? new DeckOfCards();
        $cards = $deck->drawCards($number);
        $session->set('deck', $deck);

        return $this->render('card/draw.html.twig', [
            'cards' => $cards,
            'remaining' => $deck->getCardsCount()
        ]);
    }

    #[Route("/session", name: "session_info")]
    public function sessionInfo(SessionInterface $session): Response
    {
        return $this->render('card/session.html.twig', [
            'session' => $session->all()
        ]);
    }

    #[Route("/session/delete", name: "session_delete")]
    public function sessionDelete(SessionInterface $session): Response
    {
        $session->clear();
        $this->addFlash('success', 'Sessionen har raderats!');

        return $this->redirectToRoute('session_info');
    }
}