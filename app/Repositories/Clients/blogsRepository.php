<?php

namespace App\Repositories\Clients;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Throwable;

class blogsRepository
{

    public function list()
    {
        return Blog::paginate(20);
    }

    public function updateOrCreate()
    {
        $validation = Validator::make(request()->all(),[
            'title' => 'required',
            'text' => 'required'
        ]);

        if($validation->fails()){
            return $validation->getMessageBag();
        }

        try{
            return response()->json(['data'=>User::find(auth('api')->user()->id)->blogs()->updateOrCreate(['id'=>request()->id],request()->all()),'status'=>200,'message'=>'blog has been created successfully']);
        }catch(Throwable $e){
            return response()->json(['status'=>200,'message'=>'u need to use token']);

        }
    }

    public function destroy() // for new version in secound update
    {
        return Blog::find(request()->id)->delete();
    }
}
