<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

    //Route::controllers([
    //  'auth' => 'AuthController'
    //]);

    Route::get('login',  ['as'=>'getLogin',  'uses'=>'AuthController@getLogin']);
    Route::post('login', ['as'=>'postLogin', 'uses'=>'AuthController@postLogin']);
    Route::get('logout', ['as'=>'getLogout', 'uses'=>'AuthController@getLogout']);


    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['middleware' => 'auth'], function(){

      Route::get('home', ['as'=>'home','uses'=>'HomeController@index']);

      Route::get('about', ['as'=>'about','uses'=>'HomeController@about']);

      Route::get('logs', ['as'=>'logs','uses'=>'LoginController@index']);

      Route::group(['prefix'=>'calls'], function(){
        Route::get('', ['as'=>'calls.index','uses'=>'CallsController@index']);
        Route::get('create', ['as'=>'calls.create', 'uses'=>'CallsController@create']);
        Route::post('store', ['as'=>'calls.store', 'uses'=>'CallsController@store']);
        Route::get('edit/{id}', ['as'=>'calls.edit', 'uses'=>'CallsController@edit']);
        Route::post('update/{id}', ['as'=>'calls.update', 'uses'=>'CallsController@update']);
        Route::get('destroy/{id}', ['as'=>'calls.destroy', 'uses'=>'CallsController@destroy']);
        Route::get('show/{id}', ['as'=>'calls.show','uses'=>'CallsController@show']);

        Route::group(['prefix'=>'history'], function(){
          Route::get('create/{id}', ['as'=>'calls.history.create','uses'=>'CallsController@historycreate']);
          Route::post('store', ['as'=>'calls.history.store','uses'=>'CallsController@historystore']);
        });

        Route::get('download/call/{call}/file/{file}', ['as'=>'calls.file.download','uses'=>'CallsController@downloadcallfile']);
        Route::get('delete/call/{call}/file/{file}', ['as'=>'calls.file.delete','uses'=>'CallsController@deletecallfile']);

        Route::get('download/history/{history}/file/{file}', ['as'=>'calls.history.file.download','uses'=>'CallsController@downloadhistoryfile']);

      });

      Route::group(['prefix'=>'places'], function(){
        Route::get('', ['as'=>'places.index','uses'=>'PlacesController@index']);
        Route::get('create', ['as'=>'places.create', 'uses'=>'PlacesController@create']);
        Route::post('store', ['as'=>'places.store', 'uses'=>'PlacesController@store']);
        Route::get('edit/{id}', ['as'=>'places.edit', 'uses'=>'PlacesController@edit']);
        Route::post('update/{id}', ['as'=>'places.update', 'uses'=>'PlacesController@update']);
        Route::get('destroy/{id}', ['as'=>'places.destroy', 'uses'=>'PlacesController@destroy']);
        Route::get('show/{id}', ['as'=>'places.show','uses'=>'PlacesController@show']);
        Route::get('json/{id}', ['as'=>'places.json','uses'=>'PlacesController@placesJson']);
      });

      Route::group(['prefix'=>'departaments'], function(){
        Route::get('', ['as'=>'departaments.index','uses'=>'DepartamentController@index']);
        Route::get('create', ['as'=>'departaments.create', 'uses'=>'DepartamentController@create']);
        Route::post('store', ['as'=>'departaments.store', 'uses'=>'DepartamentController@store']);
        Route::get('edit/{id}', ['as'=>'departaments.edit', 'uses'=>'DepartamentController@edit']);
        Route::post('update/{id}', ['as'=>'departaments.update', 'uses'=>'DepartamentController@update']);
        Route::get('destroy/{id}', ['as'=>'departaments.destroy', 'uses'=>'DepartamentController@destroy']);
        Route::get('show/{id}', ['as'=>'departaments.show','uses'=>'DepartamentController@show']);
        Route::get('json', ['as'=>'departaments.json','uses'=>'DepartamentController@departamentsJson']);
      });

      Route::group(['prefix'=>'usertypes'], function(){
        Route::get('', ['as'=>'usertypes.index','uses'=>'UserTypesController@index']);
        Route::get('create', ['as'=>'usertypes.create', 'uses'=>'UserTypesController@create']);
        Route::post('store', ['as'=>'usertypes.store', 'uses'=>'UserTypesController@store']);
        Route::get('edit/{id}', ['as'=>'usertypes.edit', 'uses'=>'UserTypesController@edit']);
        Route::post('update/{id}', ['as'=>'usertypes.update', 'uses'=>'UserTypesController@update']);
        Route::get('destroy/{id}', ['as'=>'usertypes.destroy', 'uses'=>'UserTypesController@destroy']);
        Route::get('show/{id}', ['as'=>'usertypes.show','uses'=>'UserTypesController@show']);
      });

      Route::group(['prefix'=>'callstatus'], function(){
        Route::get('', ['as'=>'callstatus.index','uses'=>'CallStatusController@index']);
        Route::get('create', ['as'=>'callstatus.create', 'uses'=>'CallStatusController@create']);
        Route::post('store', ['as'=>'callstatus.store', 'uses'=>'CallStatusController@store']);
        Route::get('edit/{id}', ['as'=>'callstatus.edit', 'uses'=>'CallStatusController@edit']);
        Route::post('update/{id}', ['as'=>'callstatus.update', 'uses'=>'CallStatusController@update']);
        Route::get('destroy/{id}', ['as'=>'callstatus.destroy', 'uses'=>'CallStatusController@destroy']);
        Route::get('show/{id}', ['as'=>'callstatus.show','uses'=>'CallStatusController@show']);
      });

      Route::group(['prefix'=>'users'], function(){
        Route::get('', ['as'=>'users.index','uses'=>'UsersController@index']);
        Route::get('create', ['as'=>'users.create', 'uses'=>'UsersController@create']);
        Route::post('store', ['as'=>'users.store', 'uses'=>'UsersController@store']);
        Route::get('edit/{id}', ['as'=>'users.edit', 'uses'=>'UsersController@edit']);
        Route::post('update/{id}', ['as'=>'users.update', 'uses'=>'UsersController@update']);
        Route::get('destroy/{id}', ['as'=>'users.destroy', 'uses'=>'UsersController@destroy']);
        Route::get('show/{id}', ['as'=>'users.show','uses'=>'UsersController@show']);

        Route::group(['prefix'=>'password'], function(){
          Route::get('edit/{id}', ['as'=>'users.password.edit', 'uses'=>'UsersController@passwordedit']);
          Route::post('update/{id}', ['as'=>'users.password.update', 'uses'=>'UsersController@passwordupdate']);
        });
      });

    });

//});
