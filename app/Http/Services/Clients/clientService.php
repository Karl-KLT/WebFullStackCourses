<?php

namespace App\Http\Services\Clients;

use App\Repositories\Clients\clientsRepository;
use Illuminate\Support\Facades\Auth;

class clientService
{
    protected $clientsRepository;

    public function __construct(clientsRepository $clientsRepository)
    {
        $this->clientsRepository = $clientsRepository;
    }


    public function Login($request)
    {
        return $this->clientsRepository->Login($request);
    }

    public function updateOrCreate($request)
    {
        return $this->clientsRepository->updateOrCreate($request);

    }
}
