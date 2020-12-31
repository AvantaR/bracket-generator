<?php

namespace BracketGenerator\Exceptions;

use Exception;

class NotAPowerOfTwo extends Exception
{
    protected $message = 'Value is not a power of two';
}
