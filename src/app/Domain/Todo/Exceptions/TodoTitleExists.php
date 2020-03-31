<?php

namespace Domain\Todo\Exceptions;

use Exception;
use Throwable;

class TodoTitleExists extends Exception
{
    public function __construct(string $todoTitle, int $code = 409, Throwable $previous = null)
    {
        $message = "Todo title '$todoTitle' is already taken.";
        parent::__construct($message, $code, $previous);
    }
}
