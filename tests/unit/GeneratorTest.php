<?php

namespace Tests;

use BracketGenerator\BracketGenerator;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    public function test_it_returns_bracket_for_4_participants(): void
    {
        $generator = new BracketGenerator();

        $expectedBracket = [
            [
                'id' => 1,
                'stage' => 1,
                'stage_node' => 1,
                'next_node' => 3
            ],
            [
                'id' => 2,
                'stage' => 1,
                'stage_node' => 2,
                'next_node' => 3
            ],
            [
                'id' => 3,
                'stage' => 2,
                'stage_node' => 1,
                'next_node' => null
            ]
        ];

        $actualBracket = $generator->generate(4);

        self::assertEquals($expectedBracket, $actualBracket);
    }

    public function test_it_returns_3_nodes_for_4_participants(): void
    {
        $generator = new BracketGenerator();

        $actualBracket = $generator->generate(4);

        self::assertCount(3, $actualBracket);
    }

    public function test_it_returns_bracket_for_8_participants(): void
    {
        $generator = new BracketGenerator();

        $expectedBracket = [
            [
                'id' => 1,
                'stage' => 1,
                'stage_node' => 1,
                'next_node' => 5
            ],
            [
                'id' => 2,
                'stage' => 1,
                'stage_node' => 2,
                'next_node' => 5
            ],
            [
                'id' => 3,
                'stage' => 1,
                'stage_node' => 3,
                'next_node' => 6
            ],
            [
                'id' => 4,
                'stage' => 1,
                'stage_node' => 4,
                'next_node' => 6
            ],
            [
                'id' => 5,
                'stage' => 2,
                'stage_node' => 1,
                'next_node' => 7
            ],
            [
                'id' => 6,
                'stage' => 2,
                'stage_node' => 2,
                'next_node' => 7
            ],
            [
                'id' => 7,
                'stage' => 3,
                'stage_node' => 1,
                'next_node' => null
            ],
        ];

        $actualBracket = $generator->generate(8);

        self::assertEquals($expectedBracket, $actualBracket);
    }

    public function test_it_returns_7_nodes_for_8_participants(): void
    {
        $generator = new BracketGenerator();

        $actualBracket = $generator->generate(8);

        self::assertCount(7, $actualBracket);
    }

    public function test_it_returns_bracket_for_16_participants(): void
    {
        $generator = new BracketGenerator();

        $expectedBracket = [
            [
                'id' => 1,
                'stage' => 1,
                'stage_node' => 1,
                'next_node' => 9
            ],
            [
                'id' => 2,
                'stage' => 1,
                'stage_node' => 2,
                'next_node' => 9
            ],
            [
                'id' => 3,
                'stage' => 1,
                'stage_node' => 3,
                'next_node' => 10
            ],
            [
                'id' => 4,
                'stage' => 1,
                'stage_node' => 4,
                'next_node' => 10
            ],
            [
                'id' => 5,
                'stage' => 1,
                'stage_node' => 5,
                'next_node' => 11
            ],
            [
                'id' => 6,
                'stage' => 1,
                'stage_node' => 6,
                'next_node' => 11
            ],
            [
                'id' => 7,
                'stage' => 1,
                'stage_node' => 7,
                'next_node' => 12
            ],
            [
                'id' => 8,
                'stage' => 1,
                'stage_node' => 8,
                'next_node' => 12
            ],
            [
                'id' => 9,
                'stage' => 2,
                'stage_node' => 1,
                'next_node' => 13
            ],
            [
                'id' => 10,
                'stage' => 2,
                'stage_node' => 2,
                'next_node' => 13
            ],
            [
                'id' => 11,
                'stage' => 2,
                'stage_node' => 3,
                'next_node' => 14
            ],
            [
                'id' => 12,
                'stage' => 2,
                'stage_node' => 4,
                'next_node' => 14
            ],
            [
                'id' => 13,
                'stage' => 3,
                'stage_node' => 1,
                'next_node' => 15
            ],
            [
                'id' => 14,
                'stage' => 3,
                'stage_node' => 2,
                'next_node' => 15
            ],
            [
                'id' => 15,
                'stage' => 4,
                'stage_node' => 1,
                'next_node' => null
            ],
        ];

        $actualBracket = $generator->generate(16);

        self::assertEquals($expectedBracket, $actualBracket);
    }

    public function test_it_returns_15_nodes_for_16_participants(): void
    {
        $generator = new BracketGenerator();

        $actualBracket = $generator->generate(16);

        self::assertCount(15, $actualBracket);
    }


}

