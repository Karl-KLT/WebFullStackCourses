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

    public function list($request)
    {
        return $this->commentsRepository->list($request);
    }

    public function create($request)
    {
        return $this->commentsRepository->create($request);
    }



}
