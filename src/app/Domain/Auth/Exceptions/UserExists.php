<?php


namespace Domain\Auth\Exceptions;


use Throwable;

class UserExists extends \Exception
{
    public function __construct(string $email, int $code = 409, Throwable $previous = null)
    {
        $message = "The '$email' is already taken.";
        parent::__construct($message, $code, $previous);
    }
}
