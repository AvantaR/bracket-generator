<?php

namespace BracketGenerator\Exceptions;

use Exception;

class NoBracketTypeStrategy extends Exception
{
    protected $message = 'Couldn\'t find Bracket Type Strategy';
}
