<?php

namespace Domain\Auth\Actions;

use App\User;
use Domain\Auth\Exceptions\UserExists;
use Domain\Auth\DataTransferObjects\UserCredentialsData;

class RegisterUserAction
{
    /**
     * @var LoginUserAction
     */
    private LoginUserAction $loginUserAction;

    public function __construct(LoginUserAction $loginUserAction)
    {
        $this->loginUserAction = $loginUserAction;
    }

    public function execute(UserCredentialsData $credentials) : array
    {
         if (
             User::query()->where('email', '=', $credentials->email)->exists()
         ) {
             throw new UserExists($credentials->email);
         }

        User::create($credentials->all());

        return $this->loginUserAction->execute($credentials);
    }
}
