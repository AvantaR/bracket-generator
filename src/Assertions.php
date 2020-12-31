<?php

namespace BracketGenerator;

use BracketGenerator\Exceptions\NotAPowerOfTwo;

class Assertions
{
    /**
     * @throws NotAPowerOfTwo
     */
    public static function isPowerOfTwo(int $value): void
    {
        if(($value & ($value - 1)) !== 0){
            throw new NotAPowerOfTwo();
        }
    }
}

