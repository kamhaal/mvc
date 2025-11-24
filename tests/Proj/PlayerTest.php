<?php

namespace App\Tests\Proj;

use PHPUnit\Framework\TestCase;
use App\Game\Player;
use App\Game\Card;   // <-- viktigt!

class PlayerTest extends TestCase
{
    public function testPlayerNameAndBalance(): void
    {
        $player = new Player("Tester", 100);

        $this->assertEquals("Tester", $player->getName());
        $this->assertEquals(100, $player->getBalance());
    }

    public function testDepositAndWithdraw(): void
    {
        $player = new Player("Tester", 100);

        $player->deposit(50);
        $this->assertEquals(150, $player->getBalance());

        $success = $player->withdraw(100);
        $this->assertTrue($success);
        $this->assertEquals(50, $player->getBalance());

        $fail = $player->withdraw(200);
        $this->assertFalse($fail);
        $this->assertEquals(50, $player->getBalance());
    }

    public function testPlayerHandValue(): void
    {
        $player = new Player("Tester", 100);
        $player->getHand()->add(new Card("Hearts", "Ace", 14));
        $this->assertGreaterThan(0, $player->getHand()->getValue());
    }
}
