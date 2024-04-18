<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
    #[Route("/api/quote")]
    public function quote(): Response
    {
        $quotes = [
            "Om inte vi, vem? Om inte nu, nar? -J ohn F. Kennedy",
            "Ibland maste man falla for att resa sig upp - Wesam Fawzi",
            "I slutet av svarigheter kommer lycka - Charlie Gilkey"
        ];
        $randomIndex = array_rand($quotes);
        $randomQuote = $quotes[$randomIndex];

        $data = [
            'quote' => $randomQuote,
            'date' => date('Y-m-d'),
            'timestamp' => time()
        ];

        return new JsonResponse($data);
    }
}
