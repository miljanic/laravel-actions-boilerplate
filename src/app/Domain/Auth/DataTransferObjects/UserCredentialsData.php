<?php


namespace Domain\Auth\DataTransferObjects;


use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class UserCredentialsData extends DataTransferObject
{
    public string $email;
    public string $password;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);
    }
}
