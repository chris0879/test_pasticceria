<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard.index');


    //settings 
    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
    Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

    // Dolci
    Route::get('/dolci','Admin\DolceController@index')->name('admin.dolci.index');
    Route::get('/dolci/create','Admin\DolceController@create')->name('admin.dolci.create');
    Route::post('/dolci','Admin\DolceController@store')->name('admin.dolci.store');
    Route::get('/dolci/{dolce}','Admin\DolceController@show')->name('admin.dolci.show');
    Route::get('/dolci/{dolce}/edit','Admin\DolceController@edit')->name('admin.dolci.edit');
    Route::put('/dolci/{dolce}','Admin\DolceController@update')->name('admin.dolci.update');

    Route::delete('/dolce/{dolce}','Admin\DolceController@destroy')->name('admin.dolci.destroy');
    Route::get('/dolce/onlytrashed','Admin\DolceController@onlyTrashed')->name('admin.dolci.onlytrashed');
    Route::post('/dolce/restore/{id}','Admin\DolceController@restoreDelete')->name('admin.dolci.restore');


    // Ingredienti
    Route::get('/ingredienti','Admin\IngredientiController@index')->name('admin.ingredienti.index');
    Route::get('/ingredienti/create','Admin\IngredientiController@create')->name('admin.ingredienti.create');
    Route::post('/ingredienti','Admin\IngredientiController@store')->name('admin.ingredienti.store');
    Route::get('/ingredienti/{ingredienti}','Admin\IngredientiController@show')->name('admin.ingredienti.show');
    Route::get('/ingredienti/{ingredienti}/edit','Admin\IngredientiController@edit')->name('admin.ingredienti.edit');
    Route::put('/ingredienti/{ingredienti}','Admin\IngredientiController@update')->name('admin.ingredienti.update');

    Route::delete('/ingrediente/{ingredienti}','Admin\IngredientiController@destroy')->name('admin.ingrediente.destroy');
    Route::get('/ingrediente/onlytrashed','Admin\IngredientiController@onlyTrashed')->name('admin.ingredienti.onlytrashed');
    Route::post('/ingrediente/restore/{id}','Admin\IngredientiController@restoreDelete')->name('admin.ingredienti.restore');




}); // middleware auth:admin


//login
Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login'); // se gia loggato reindirizza alla dashboard
Route::post('/login', 'Admin\LoginController@login')->name('admin.login.post'); // todo recaptha
Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout'); //
