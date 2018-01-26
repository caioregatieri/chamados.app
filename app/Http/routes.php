<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados
*/

Route::get('login',  ['as'=>'getLogin',  'uses'=>'AuthController@getLogin']);
Route::post('login', ['as'=>'postLogin', 'uses'=>'AuthController@postLogin']);
Route::get('logout', ['as'=>'getLogout', 'uses'=>'AuthController@getLogout']);


Route::get('/', function () {
    if(Auth::check()){
      return redirect()->route('home');
    }
    return view('auth.welcome');
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

  Route::group(['prefix'=>'callmodes'], function(){
    Route::get('', ['as'=>'callmodes.index','uses'=>'CallModesController@index']);
    Route::get('create', ['as'=>'callmodes.create', 'uses'=>'CallModesController@create']);
    Route::post('store', ['as'=>'callmodes.store', 'uses'=>'CallModesController@store']);
    Route::get('edit/{id}', ['as'=>'callmodes.edit', 'uses'=>'CallModesController@edit']);
    Route::post('update/{id}', ['as'=>'callmodes.update', 'uses'=>'CallModesController@update']);
    Route::get('destroy/{id}', ['as'=>'callmodes.destroy', 'uses'=>'CallModesController@destroy']);
    Route::get('show/{id}', ['as'=>'callmodes.show','uses'=>'CallModesController@show']);
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

  Route::group(['prefix'=>'reports'], function(){
    Route::get('calls', ['as'=>'reports.calls.get','uses'=>'ReportController@getCalls']);
    Route::post('calls', ['as'=>'reports.calls.post','uses'=>'ReportController@postCalls']);
    Route::get('departaments', ['as'=>'reports.departaments.get','uses'=>'ReportController@getDepartaments']);
    Route::post('departaments', ['as'=>'reports.departaments.post','uses'=>'ReportController@postDepartaments']);
    Route::get('places', ['as'=>'reports.places.get','uses'=>'ReportController@getPlaces']);
    Route::post('places', ['as'=>'reports.places.post','uses'=>'ReportController@postPlaces']);
    Route::get('users', ['as'=>'reports.users.get','uses'=>'ReportController@getUsers']);
    Route::post('users', ['as'=>'reports.users.post','uses'=>'ReportController@postUsers']);
    Route::get('usertypes', ['as'=>'reports.usertypes.get','uses'=>'ReportController@getUserTypes']);
    Route::post('usertypes', ['as'=>'reports.usertypes.post','uses'=>'ReportController@postUserTypes']);
  });

  Route::group(['prefix'=>'reminders'], function(){
    Route::get('', ['as'=>'reminders.index','uses'=>'ReminderController@index']);
    Route::get('create', ['as'=>'reminders.create', 'uses'=>'ReminderController@create']);
    Route::post('store', ['as'=>'reminders.store', 'uses'=>'ReminderController@store']);
    Route::get('edit/{id}', ['as'=>'reminders.edit', 'uses'=>'ReminderController@edit']);
    Route::post('update/{id}', ['as'=>'reminders.update', 'uses'=>'ReminderController@update']);
    Route::get('destroy/{id}', ['as'=>'reminders.destroy', 'uses'=>'ReminderController@destroy']);
    Route::get('show/{id}', ['as'=>'reminders.show','uses'=>'ReminderController@show']);
  });

  Route::group(['prefix'=>'test'], function(){
    Route::get('email', ['as'=>'test.email','uses'=>'TestController@testMail']);
  });

});

Route::group(['prefix'=>'api'], function(){

  Route::group(['prefix'=>'auth'], function(){
    Route::post('/login',        ['as'=>'api.auth.login', 'uses'=>'ApiController@login']);
    Route::post('/logout',       ['as'=>'api.auth.logout','uses'=>'ApiController@logout']);
  });

  Route::group(['prefix'=>'users'], function(){
    Route::get('/',              ['as'=>'api.users.index', 'uses'=>'ApiController@getuser']);
    Route::post('/',             ['as'=>'api.users.store', 'uses'=>'ApiController@saveUser']);
    Route::put('/',              ['as'=>'api.users.update','uses'=>'ApiController@updateUser']);
  });

  Route::group(['prefix'=>'calls'], function(){
    Route::get('/{id?}',         ['as'=>'api.calls.index',  'uses'=>'ApiController@getCall']);
    Route::post('/',             ['as'=>'api.calls.store',  'uses'=>'ApiController@saveCall']);
    Route::put('/{id}',          ['as'=>'api.calls.update', 'uses'=>'ApiController@updateCall']);
  });

  Route::group(['prefix'=>'callmodes'], function(){
    Route::get('/{id?}',         ['as'=>'api.modes.index',  'uses'=>'ApiController@getMode']);
  });

  Route::group(['prefix'=>'callstatus'], function(){
    Route::get('/{id?}',         ['as'=>'api.status.index',  'uses'=>'ApiController@getStatus']);
  });

  Route::group(['prefix'=>'histories'], function(){
    Route::get('/callid',        ['as'=>'api.histories.index','uses'=>'ApiController@getHistoryByCallId']);
    Route::post('/',             ['as'=>'api.histories.store','uses'=>'ApiController@saveHistory']);
  });

  Route::group(['prefix'=>'places'], function(){
    Route::get('/{id?}',         ['as'=>'api.places.index',  'uses'=>'ApiController@getPlace']);
  });

  Route::group(['prefix'=>'departments'], function(){
    Route::get('/{id?}',         ['as'=>'api.department.index',  'uses'=>'ApiController@getDepartment']);
  });

});