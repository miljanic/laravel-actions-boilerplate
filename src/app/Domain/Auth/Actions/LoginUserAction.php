<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\UserCredentialsData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class LoginUserAction
{
    public function execute(UserCredentialsData $credentials) : array
    {
        if (!$token = Auth::attempt($credentials->all())) {
            throw new UnauthorizedException();
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ];
    }
}
