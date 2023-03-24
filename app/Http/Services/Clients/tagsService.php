<?php

namespace App\Http\Services\Clients;

use App\Repositories\Clients\tagsRepository;

class tagsService
{
    protected $tagsRepository;

    public function __construct(tagsRepository $tagsRepository)
    {
        return $this->tagsRepository = $tagsRepository;
    }

    public function getList()
    {
        return $this->tagsRepository->getList();
    }

    public function updateOrCreate()
    {
        return $this->tagsRepository->updateOrCreate();
    }



}
