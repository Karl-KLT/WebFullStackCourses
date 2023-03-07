<?php

namespace App\Http\Controllers\Clients\Blogs\Comments;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Services\Clients\commentsService;

class CommentsController extends Controller
{

    protected $commentsService;
    public function __construct(commentsService $commentsService)
    {
        $this->commentsService = $commentsService;
        $this->middleware('auth:api');

    }

    public function index()
    {
        return $this->commentsService->list(request());
    }

    public function create()
    {
        return $this->commentsService->create(request());
    }
}
