<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Services\Clients\authService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(authService $authService)
    {
        $this->authService = $authService;
        $this->middleware('auth:api', ['except' => ['Login','updateOrCreate']]);
    }

    public function Login()
    {
        return $this->authService->Login(request());
    }

    public function profile()
    {
        return auth('api')->user();
    }

    public function updateOrCreate()
    {
        return $this->authService->updateOrCreate(request());
    }
}
