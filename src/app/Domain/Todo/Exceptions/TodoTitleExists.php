<?php


namespace Domain\Todo\Exceptions;


use Throwable;

class TodoTitleExists extends \Exception
{
    public function __construct($todoTitle, $code = 0, Throwable $previous = null)
    {
        $message = "Todo title '$todoTitle' is already taken.";
        parent::__construct($message, $code, $previous);
    }
}
