<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Domain\Auth\Actions\LoginUserAction;
use Domain\Auth\Actions\RegisterUserAction;
use Domain\Auth\DataTransferObjects\UserCredentialsData;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var LoginUserAction
     */
    private LoginUserAction $loginUserAction;
    /**
     * @var RegisterUserAction
     */
    private RegisterUserAction $registerUserAction;

    /**
     * Create a new AuthController instance.
     *
     * @param LoginUserAction $loginUserAction
     * @param RegisterUserAction $registerUserAction
     */
    public function __construct(
        LoginUserAction $loginUserAction,
        RegisterUserAction $registerUserAction
    )
    {
        $this->loginUserAction = $loginUserAction;
        $this->registerUserAction = $registerUserAction;

        $this->middleware('auth:api', ['except' => ['login', 'register', 'refresh']]);
        $this->middleware('email-verified', ['except' => ['login', 'register']]);
    }

    /**
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = UserCredentialsData::fromRequest($request);

        return response()->json($this->loginUserAction->execute($credentials));
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $credentials = UserCredentialsData::fromRequest($request);

        return response()->json($this->registerUserAction->execute($credentials));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
    }
}
