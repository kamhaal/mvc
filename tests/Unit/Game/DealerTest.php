<?php

namespace App\Tests\Unit\Game;

use PHPUnit\Framework\TestCase;
use App\Game\Dealer;
use App\Game\Card;

class DealerTest extends TestCase
{
    public function testCreateDealer(): void
    {
        $dealer = new Dealer();

        $this->assertInstanceOf(Dealer::class, $dealer);
        $this->assertEquals('Dealer', $dealer->getName());
    }

    public function testDealerShouldDraw(): void
    {
        $dealer = new Dealer();

        $dealer->addCard(new Card('Hearts', '10', 10));
        $dealer->addCard(new Card('Diamonds', '6', 6));

        $this->assertTrue($dealer->shouldDraw());

        $dealer->addCard(new Card('Clubs', 'Ace', 1));
        $this->assertFalse($dealer->shouldDraw());
    }
}
