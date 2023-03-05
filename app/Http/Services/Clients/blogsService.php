<?php

namespace App\Http\Services\Clients;

use App\Repositories\Clients\blogsRepository;

class blogsService
{
    protected $blogsRepository;

    public function __construct(blogsRepository $blogsRepository)
    {
        $this->blogsRepository = $blogsRepository;
    }

    public function list()
    {
        return $this->blogsRepository->list();
    }

    public function updateOrCreate($request)
    {
        return $this->blogsRepository->updateOrCreate($request);
    }



}
