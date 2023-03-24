<?php

namespace App\Http\Controllers\Clients\Blogs\Tags;

use App\Http\Controllers\Controller;
use App\Http\Services\Clients\tagsService;

class TagsController extends Controller
{
    protected $tagsService;

    public function __construct(tagsService $tagsService)
    {
        $this->tagsService = $tagsService;
        $this->middleware('auth:api',['except'=>['getList']]);
    }

    public function getList()
    {
        return $this->tagsService->getList();
    }

    public function updateOrCreate()
    {
        return $this->tagsService->updateOrCreate();
    }
}
