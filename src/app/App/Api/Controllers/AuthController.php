<?php

namespace App\Api\Controllers;

use App\Http\Controllers\Controller;
use Domain\Auth\Actions\LoginUserAction;
use Domain\Auth\Actions\RegisterUserAction;
use Domain\Auth\DataTransferObjects\UserCredentialsData;
use Domain\Auth\Exceptions\UserExists;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
     * @param Request $request
     * @return JsonResource
     */
    public function login(Request $request)
    {
        $credentials = UserCredentialsData::fromRequest($request);

        return JsonResource::make($this->loginUserAction->execute($credentials));
    }

    /**
     * @param Request $request
     * @return JsonResource
     * @throws UserExists
     */
    public function register(Request $request)
    {
        $credentials = UserCredentialsData::fromRequest($request);

        return JsonResource::make($this->registerUserAction->execute($credentials));
    }

    /**
     * @return void
     */
    public function me()
    {
    }

    /**
     * @return void
     */
    public function logout()
    {
    }

    /**
     * @return void
     */
    public function refresh()
    {
    }
}
