<?php

namespace BracketGenerator;

use BracketGenerator\Types\SingleElimination;
use BracketGenerator\Exceptions\NoBracketTypeStrategy;
use BracketGenerator\Types\Type;

class TypeContext
{
    public const SINGLE_ELIMINATION = 1;

    public const STRATEGIES = [
        self::SINGLE_ELIMINATION => SingleElimination::class
    ];

    /**
     * @throws NoBracketTypeStrategy
     */
    public static function make(int $bracketType): Type
    {
        if (!isset(self::STRATEGIES[$bracketType])) {
            throw new NoBracketTypeStrategy();
        }

        $strategyClass = self::STRATEGIES[$bracketType];

        return new $strategyClass();
    }

}
