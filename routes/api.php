<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace'=>'Clients','prefix'=>'/'],function () {

    Route::post('Login','AuthController@Login');

    Route::post('profile','AuthController@profile');

    Route::post('updateOrCreate','AuthController@updateOrCreate');

    Route::group(['namespace'=>'Blogs','prefix'=>'Blogs'],function () {

        Route::get('/','BlogsController@index');

        Route::post('updateOrCreate','BlogsController@updateOrCreate');

        Route::group(['namespace'=>'Comments','prefix'=>'Comments'],function () {


            Route::get('/','CommentsController@index');

            Route::post('create','CommentsController@create');


        });

        Route::group(['namespace'=>'Tags','prefix'=>'Tags'],function(){

            Route::get('getList','TagsController@getList');

            Route::post('updateOrCreate','TagsController@updateOrCreate');


        });

    });

});
