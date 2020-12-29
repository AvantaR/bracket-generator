<?php

namespace Tests;

use BracketGenerator\Generator;
use BracketGenerator\Exceptions\NoBracketTypeStrategy;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function test_it_throws_exception_for_non_valid_bracket_type(): void
    {
        $this->expectException(NoBracketTypeStrategy::class);
        $this->expectExceptionMessage('Couldn\'t find Bracket Type Strategy');
        new Generator(-1);
    }

    /**
     * @throws NoBracketTypeStrategy
     */
    public function test_it_returns_valid_bracket_for_single_elimination_bracket_type(): void
    {
        $generator = new Generator(1);

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

        $actualBracket = $generator->generate(4);

        self::assertEquals($expectedBracket, $actualBracket);
    }
}
