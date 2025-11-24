<?php

namespace App\Tests\Proj;

use PHPUnit\Framework\TestCase;
use App\Game\Hand;
use App\Game\Card;

class HandTest extends TestCase
{
    public function testAddAndGetValue(): void
    {
        $hand = new Hand();
        $hand->add(new Card('Hearts', '10', 10));
        $hand->add(new Card('Spades', 'Ace', 14));

        $value = $hand->getValue();
        $this->assertGreaterThan(10, $value);
    }

    public function testAsString(): void
    {
        $hand = new Hand();
        $hand->add(new Card('Diamonds', '5', 5));
        $this->assertStringContainsString('5', $hand->getAsString());
    }
}
