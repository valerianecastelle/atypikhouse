<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('recherche', 'RechercheController@index')->name('recherche');

Route::get('habitats/{habitat}', 'HabitatController@show')->name('habitat.show');

Route::get('habitats', 'HabitatController@index')->name('habitat.index');

Route::middleware('auth')->group(function () {

	Route::post('habitats/{habitat}', 'AvisController@store');

	Route::get('profil/{id}', 'UserController@index')->name('profil.index');

	Route::get('profil/{id}/edit', 'UserController@edit')->name('profil.edit');

	Route::get('profil/public/{user}', 'UserController@show')->name('profil.show');

	Route::resource('profil', 'UserController', [
        'only' => ['update'],
    ]);
});
