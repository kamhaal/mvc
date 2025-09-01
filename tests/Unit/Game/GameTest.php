<?php

namespace App\Tests\Unit\Game;

use PHPUnit\Framework\TestCase;
use App\Game\Game;
use App\Game\Card;

class GameTest extends TestCase
{
    public function testCreateGame(): void
    {
        $game = new Game();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertInstanceOf(\App\Game\Player::class, $game->getPlayer());
        $this->assertInstanceOf(\App\Game\Dealer::class, $game->getDealer());
    }

    public function testGameInitialStatus(): void
    {
        $game = new Game();

        $this->assertEquals('player_turn', $game->getStatus());
    }

    public function testPlayerHit(): void
    {
        $game = new Game();
        $initialHandCount = count($game->getPlayer()->getHand()->getCards());

        $game->playerHit();

        $this->assertCount($initialHandCount + 1, $game->getPlayer()->getHand()->getCards());
    }

    public function testPlayerStand(): void
    {
        $game = new Game();

        $game->playerStand();

        $this->assertEquals('finished', $game->getStatus());
    }

    public function testGetWinner(): void
    {
        $game = new Game();

        // Simulera att spelet är klart
        $reflection = new \ReflectionClass($game);
        $property = $reflection->getProperty('status');
        $property->setValue($game, 'finished');

        $winner = $game->getWinner();
        $this->assertContains($winner, ['Player', 'Dealer', null]);
    }
}
