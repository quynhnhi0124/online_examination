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

Route::group(['namespace'=>'Auth'], function() {
    Route::get('/login', 'LoginController@get')->name('auth.login');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/register', 'RegisterController@get')->name('auth.register');
    Route::post('/register','RegisterController@create')->name('register');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware'=>'auth'], function(){ //route cho ng dung da dang nhap
    Route::group(['namespace'=>'User'], function(){
        Route::get('/home', 'UserController@index')->name('home'); //sau khi dang nhap nguoi dung dc chuyen den trang nay
        Route::get('/{id}/edit-info','UserManageController@viewEdit')->name('view-edit'); //trang sua thong tin ca nhan
        Route::post('/{id}/edit-info','UserManageController@editInfo')->name('edit-info'); //sua thong tin ca nhan
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>'is_admin','namespace'=>'Admin'], function () { //ng dung da dang nhap, role = superadmin||admin
        Route::group(['prefix' => '/user-manage', 'as' => 'user-manage.'],function(){
            Route::get('/','AdminController@viewUser')->name('user-manage'); //sau khi dang nhap cac admin va superadmi dc chuyen den trang nay
            Route::post('/{id}/edit-user','AdminController@editUser')->name('edit-user');
    
        });
    });
});
