<?php

namespace App\Http\Services\Clients;

use App\Repositories\Clients\authRepository;
use Illuminate\Support\Facades\Auth;

class authService
{
    protected $authRepository;

    public function __construct(authRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }


    public function Login($request)
    {
        return $this->authRepository->Login($request);
    }

    public function updateOrCreate($request)
    {
        return $this->authRepository->updateOrCreate($request);
    }
}
