<?php

namespace App\Repositories\Clients;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;


class authRepository
{

    public function Login()
    {
        try{
            if($token = Auth::guard('api')->attempt(request()->only('name','password'))){
                return response()->json(['data'=>$this->respondWithToken($token),'status'=>200,'message'=>'successfully'],200);
            }
            return response()->json(['status'=>203,'message'=>'smth went wrong, please check ur name and ur password to login into ur account'],203);
        }catch(Throwable $e){
            return $this->LoginWithUserCode();
        }
    }

    public function LoginWithUserCode()
    {
        if(User::where('access_code',request()->access_code)->exists()){
            if(User::where('access_code',request()->access_code)->first()->first_time_login){
                User::where('access_code',request()->access_code)->update(['first_time_login'=>false]);
                return response()->json(['data'=>User::where('access_code',request()->access_code)->first(),'status'=>200,'message'=>'successfully'],200);
            }
            return response()->json(['status'=>203,'message'=>"u can't login twice by ur code"],203);
        }

        return response()->json(['status'=>203,'message'=>'smth went wrong'],203);
    }

    public function updateOrCreate()
    {
        $validation = Validator::make(request()->all(),[
            'name'=>'required|unique:users,name,'.request()->id,
            'gender'=>'required|in:male,female',
            'age'=>'required|numeric',
            'type'=>'boolean'
        ]);

        if($validation->fails()){
            return response()->json(['error'=>$validation->getMessageBag(),'status'=>203,'message'=>'validation has required']);
        }

        try{
            $user = User::updateOrCreate(['id'=>request()->id],request()->all());

            if(!$user->access_code){
                $user->access_code = setNewRandomCode();
            }

            if($user->password){
                $user->password = Hash::make(request()->password);
            }

            $user->save();

            if(request()->id){
                return response()->json(['status'=>200,'message'=>'ur account has been updated successfully']);
            }
            return response()->json(['yourAccessCode'=>$user->access_code,'status'=>200,'message'=>'ur account has been created successfully']);
        }catch(Throwable $e){
            return response()->json(['status'=>500,'message'=>'smth went wrong','errorCode'=>$e]);
        }
    }

    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'token' => 'bearer '.$token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}
