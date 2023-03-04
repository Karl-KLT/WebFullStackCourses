<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Services\Clients\clientService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $clientService;

    public function __construct(clientService $clientService)
    {
        return $this->clientService = $clientService;
    }

    public function Login()
    {
        return $this->clientService->Login(request());
    }

    public function updateOrCreate()
    {
        return $this->clientService->updateOrCreate(request());
    }
}
