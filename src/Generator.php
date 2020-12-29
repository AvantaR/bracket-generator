<?php

namespace BracketGenerator;

use BracketGenerator\Types\Type;

class Generator
{
    private Type $type;

    /**
     * @throws Exceptions\NoBracketTypeStrategy
     */
    public function __construct(int $bracketType = TypeContext::SINGLE_ELIMINATION)
    {
        $this->type = TypeContext::make($bracketType);
    }

    public function generate(int $numberOfParticipants): array
    {
        return $this->type->generate($numberOfParticipants);
    }
}
