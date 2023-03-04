<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Clients','prefix'=>'/'],function () {

    Route::post('Login','AuthController@Login');

    Route::post('updateOrCreate','AuthController@updateOrCreate');

});
