<?php

namespace App\Repositories\Clients;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Throwable;

class commentsRepository
{

    public function list()
    {

        $Validator = Validator::make(request()->all(),[
            'Blog_id' => 'required'
        ]);

        if($Validator->fails()){
            return response()->json(['status'=>500,'message'=>'failed','messageError'=>$Validator->getMessageBag()]);

        }

        return response()->json(['data'=>Blog::find(request()->Blog_id)->comments,'status'=>200,'message'=>'successfully']);
    }

    public function create()
    {

        $Validator = Validator::make(request()->all(),[
            'blog_id' => 'required',
            'text' => 'required'
        ]);

        if($Validator->fails()){
            return response()->json(['status'=>500,'message'=>'failed']);

        }


        return User::find(auth('api')->user()->id)->comments()->create(['text'=>request()->text,'blog_id'=>request()->blog_id]);
    }

}
