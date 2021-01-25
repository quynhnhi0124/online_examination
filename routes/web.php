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

Route::get('/login', 'Auth\LoginController@get')->name('auth.login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/register', 'Auth\RegisterController@get')->name('auth.register');
Route::post('/register','Auth\RegisterController@create')->name('register');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=>'auth'], function(){ //route cho ng dung da dang nhap
    Route::get('/home', 'Auth\User\UserController@index')->name('home'); //sau khi dang nhap nguoi dung dc chuyen den trang nay
    Route::get('/{id}/edit-info','Auth\UserManageController@viewEdit')->name('view-edit'); //trang sua thong tin ca nhan
    Route::post('/{id}/edit-info','Auth\UserManageController@editInfo')->name('edit-info'); //sua thong tin ca nhan

    Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>'is_admin'], function () { //ng dung da dang nhap, role = superadmin||admin
        Route::group(['prefix' => '/user-manage', 'as' => 'user-manage.'],function(){
            Route::get('/','Auth\Admin\AdminController@viewUser')->name('user-manage'); //sau khi dang nhap cac admin va superadmi dc chuyen den trang nay
            Route::post('/{id}/edit-user','Auth\Admin\AdminController@editUser')->name('edit-user');
    
        });
    
        // Route::get('subject/', 'Admin\SubjectController@index')->name('subject');
        // Route::get('subject/create', 'Admin\SubjectController@create')->name('subject.create');
        // Route::get('subject/{id}/edit', 'Admin\SubjectController@edit')->where('id', '[0-9]+')->name('subject.edit');
        // Route::get('subject/{id}/delete', 'Admin\SubjectController@delete')->where('id', '[0-9]+')->name('subject.delete');
    
        // Route::post('subject', 'Admin\SubjectController@store')->name('subject.store');
        // Route::post('subject/{id}', 'Admin\SubjectController@update')->where('id', '[0-9]+')->name('subject.update');
        // Route::post('subject/{id}/delete', 'Admin\SubjectController@destroy')->where('id', '[0-9]+')->name('subject.destroy');
    });
});


