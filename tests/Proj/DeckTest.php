<?php

namespace App\Tests\Proj;

use PHPUnit\Framework\TestCase;
use App\Game\Deck;

class DeckTest extends TestCase
{
    public function testDeckHas52Cards(): void
    {
        $deck = new Deck();
        $this->assertCount(52, $deck->getCards());
    }

    public function testDrawCard(): void
    {
        $deck = new Deck();
        $card = $deck->draw();
        $this->assertNotNull($card);
        $this->assertCount(51, $deck->getCards());
    }
}
