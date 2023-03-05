<?php

namespace App\Repositories\Clients;

use App\Models\Blog;
use Illuminate\Support\Facades\Validator;

class blogsRepository
{

    public function list()
    {
        return Blog::paginate(20);
    }

    public function updateOrCreate($request)
    {
        $validation = Validator::make($request->all(),[
            'text' => 'required'
        ]);

        if($validation->fails()){
            return $validation->getMessageBag();
        }

        Blog::updateOrCreate(['id'=>$request->id],$request->all());
    }

    public function destroy($request) // for new version in secound update
    {
        return Blog::find($request->id)->delete();
    }
}
