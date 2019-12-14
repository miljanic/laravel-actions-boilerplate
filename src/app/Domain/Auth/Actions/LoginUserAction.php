<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\UserCredentialsData;
use Illuminate\Validation\UnauthorizedException;

class LoginUserAction
{
    public function execute(UserCredentialsData $credentials) : array
    {
        if (!$token = auth()->attempt($credentials->all())) {
            throw new UnauthorizedException();
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
