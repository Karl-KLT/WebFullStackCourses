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
        return $this->authService = $authService;
    }

    public function Login()
    {
        return $this->authService->Login(request());
    }

    public function updateOrCreate()
    {
        return $this->authService->updateOrCreate(request());
    }
}
