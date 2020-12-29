<?php

namespace BracketGenerator\Types;

interface Type
{
    public function generate(int $numberOfParticipants): array;
}
