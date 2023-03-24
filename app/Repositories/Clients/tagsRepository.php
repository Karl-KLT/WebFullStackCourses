<?php

namespace App\Repositories\Clients;

use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class tagsRepository
{
    public function getList()
    {
        // query blog_id
        $validation = Validator::make(request()->all(),[
            'blog_id' => 'required'
        ]);

        if($validation->fails()){
            return response()->json(['status'=>200,'message'=>'validate error','error'=>$validation->getMessageBag()]);
        }


        return response()->json(['data'=>Blog::find(request()->query('blog_id'))->tags,'status'=>200,'message'=>'successfully']);
    }

    public function updateOrCreate()
    {
        // body blog_id,name,id (if update)
        $validation = Validator::make(request()->all(),[
            'blog_id' => 'required',
            'name' => 'required'
        ]);

        if($validation->fails()){
            return response()->json(['status'=>200,'message'=>'validate error','error'=>$validation->getMessageBag()]);
        }

        if(request()->id){
            return response()->json(['data'=>Blog::find(request()->blog_id)->tags()->updateOrCreate(['id'=>request()->id],request()->all()),'status'=>200,'message'=>'tag has been updated']);
        }

        return response()->json(['data'=>Blog::find(request()->blog_id)->tags()->updateOrCreate(['id'=>request()->id],request()->all()),'status'=>200,'message'=>'tag has been created']);

    }
}
