<?php

namespace App\Http\Controllers\Clients\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Clients\blogsService;


class BlogsController extends Controller
{
    protected $blogsService;

    public function __construct(blogsService $blogsService)
    {
        $this->blogsService = $blogsService;
        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->blogsService->list();
    }

    public function updateOrCreate()
    {
        return $this->blogsService->updateOrCreate();
    }
}
