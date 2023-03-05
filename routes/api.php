<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Clients','prefix'=>'/'],function () {

    Route::post('Login','AuthController@Login');

    Route::post('updateOrCreate','AuthController@updateOrCreate');

    Route::group(['namespace'=>'Blogs','prefix'=>'Blogs'],function () {

        Route::get('/','BlogsController@index');

        Route::post('updateOrCreate','BlogsController@updateOrCreate');

        Route::group(['namespace'=>'Comments','prefix'=>'Comments'],function () {


            Route::get('/','CommentsController@index');
            
            Route::post('create','CommentsController@create');


        });

    });

});
