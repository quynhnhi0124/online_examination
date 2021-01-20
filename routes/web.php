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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    Route::get('login', 'Auth\Admin\LoginController@login')->name('auth.login');
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('auth.loginAdmin');
    Route::get('logout', 'Auth\Admin\LoginController@logout')->name('auth.logout');
    Route::get('register', 'Auth\Admin\RegisterController@create')->name('register');
    Route::post('register','Auth\Admin\RegisterController@store')->name('register.store');

    Route::get('subject/', 'Admin\SubjectController@index')->name('subject');
    Route::get('subject/create', 'Admin\SubjectController@create')->name('subject.create');
    Route::get('subject/{id}/edit', 'Admin\SubjectController@edit')->where('id', '[0-9]+')->name('subject.edit');
    Route::get('subject/{id}/delete', 'Admin\SubjectController@delete')->where('id', '[0-9]+')->name('subject.delete');

    Route::post('subject', 'Admin\SubjectController@store')->name('subject.store');
    Route::post('subject/{id}', 'Admin\SubjectController@update')->where('id', '[0-9]+')->name('subject.update');
    Route::post('subject/{id}/delete', 'Admin\SubjectController@destroy')->where('id', '[0-9]+')->name('subject.destroy');
});

