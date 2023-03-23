<?php

namespace App\Http\Services\Clients;

use App\Repositories\Clients\commentsRepository;

class commentsService
{
    protected $commentsRepository;

    public function __construct(commentsRepository $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    public function list()
    {
        return $this->commentsRepository->list();
    }

    public function create()
    {
        return $this->commentsRepository->create();
    }



}
