<?php

namespace Tests\Strategies;

use BracketGenerator\Types\SingleElimination;
use PHPUnit\Framework\TestCase;

class SingleEliminationTest extends TestCase
{
    public function test_it_returns_bracket_for_4_participants(): void
    {
        $singleElimination = new SingleElimination();

        $expectedBracket = [
            [
                'id' => 1,
                'round' => 1,
                'game_in_round' => 1,
                'next_game_id' => 3
            ],
            [
                'id' => 2,
                'round' => 1,
                'game_in_round' => 2,
                'next_game_id' => 3
            ],
            [
                'id' => 3,
                'round' => 2,
                'game_in_round' => 1,
                'next_game_id' => null
            ]
        ];

        $actualBracket = $singleElimination->generate(4);

        self::assertEquals($expectedBracket, $actualBracket);
    }

    public function test_it_returns_3_games_for_4_participants(): void
    {
        $singleElimination = new SingleElimination();

        $actualBracket = $singleElimination->generate(4);

        self::assertCount(3, $actualBracket);
    }

    public function test_it_returns_bracket_for_8_participants(): void
    {
        $singleElimination = new SingleElimination();

        $expectedBracket = [
            [
                'id' => 1,
                'round' => 1,
                'game_in_round' => 1,
                'next_game_id' => 5
            ],
            [
                'id' => 2,
                'round' => 1,
                'game_in_round' => 2,
                'next_game_id' => 5
            ],
            [
                'id' => 3,
                'round' => 1,
                'game_in_round' => 3,
                'next_game_id' => 6
            ],
            [
                'id' => 4,
                'round' => 1,
                'game_in_round' => 4,
                'next_game_id' => 6
            ],
            [
                'id' => 5,
                'round' => 2,
                'game_in_round' => 1,
                'next_game_id' => 7
            ],
            [
                'id' => 6,
                'round' => 2,
                'game_in_round' => 2,
                'next_game_id' => 7
            ],
            [
                'id' => 7,
                'round' => 3,
                'game_in_round' => 1,
                'next_game_id' => null
            ],
        ];

        $actualBracket = $singleElimination->generate(8);

        self::assertEquals($expectedBracket, $actualBracket);
    }

    public function test_it_returns_7_games_for_8_participants(): void
    {
        $singleElimination = new SingleElimination();

        $actualBracket = $singleElimination->generate(8);

        self::assertCount(7, $actualBracket);
    }

    public function test_it_returns_bracket_for_16_participants(): void
    {
        $singleElimination = new SingleElimination();

        $expectedBracket = [
            [
                'id' => 1,
                'round' => 1,
                'game_in_round' => 1,
                'next_game_id' => 9
            ],
            [
                'id' => 2,
                'round' => 1,
                'game_in_round' => 2,
                'next_game_id' => 9
            ],
            [
                'id' => 3,
                'round' => 1,
                'game_in_round' => 3,
                'next_game_id' => 10
            ],
            [
                'id' => 4,
                'round' => 1,
                'game_in_round' => 4,
                'next_game_id' => 10
            ],
            [
                'id' => 5,
                'round' => 1,
                'game_in_round' => 5,
                'next_game_id' => 11
            ],
            [
                'id' => 6,
                'round' => 1,
                'game_in_round' => 6,
                'next_game_id' => 11
            ],
            [
                'id' => 7,
                'round' => 1,
                'game_in_round' => 7,
                'next_game_id' => 12
            ],
            [
                'id' => 8,
                'round' => 1,
                'game_in_round' => 8,
                'next_game_id' => 12
            ],
            [
                'id' => 9,
                'round' => 2,
                'game_in_round' => 1,
                'next_game_id' => 13
            ],
            [
                'id' => 10,
                'round' => 2,
                'game_in_round' => 2,
                'next_game_id' => 13
            ],
            [
                'id' => 11,
                'round' => 2,
                'game_in_round' => 3,
                'next_game_id' => 14
            ],
            [
                'id' => 12,
                'round' => 2,
                'game_in_round' => 4,
                'next_game_id' => 14
            ],
            [
                'id' => 13,
                'round' => 3,
                'game_in_round' => 1,
                'next_game_id' => 15
            ],
            [
                'id' => 14,
                'round' => 3,
                'game_in_round' => 2,
                'next_game_id' => 15
            ],
            [
                'id' => 15,
                'round' => 4,
                'game_in_round' => 1,
                'next_game_id' => null
            ],
        ];

        $actualBracket = $singleElimination->generate(16);

        self::assertEquals($expectedBracket, $actualBracket);
    }

    public function test_it_returns_15_games_for_16_participants(): void
    {
        $singleElimination = new SingleElimination();

        $actualBracket = $singleElimination->generate(16);

        self::assertCount(15, $actualBracket);
    }
}
