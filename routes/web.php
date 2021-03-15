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

Route::get('/', 'HomeController@homepage')->name('welcome');
Route::get('/error-404', 'HomeController@errorPage')->name('error-page');

Route::group(['namespace'=>'Auth'], function() {
    Route::group(['middleware'=>'is_login'], function(){
        Route::get('/login', 'LoginController@get')->name('auth.login');
        Route::post('/login','LoginController@login')->name('login');
        Route::get('/register', 'RegisterController@get')->name('auth.register');
        Route::post('/register', 'RegisterController@create')->name('register');
        Route::get('/forgot-password', 'ForgotPasswordController@index')->name('forgot-password');
        Route::post('/get-new-password', 'ForgotPasswordController@getNewPassword')->name('get-new-password');
        Route::get('/reset-password/token={token}', 'ForgotPasswordController@getReset')->name('get-reset-password');
        Route::post('/{token}/password-is-reset', 'ForgotPasswordController@resetPassword')->name('reset-password');
    });

    Route::get('/user={id}/change-password','ResetPasswordController@getChange')->name('get-change-password');
    Route::post('/user={id}/change-password','ResetPasswordController@changePassword')->name('change-password');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware'=>'auth'], function(){ //route cho ng dung da dang nhap
    Route::group(['namespace'=>'Admin'], function(){
        Route::get('/exam/{subject_id}','ExamController@indexExam')->name('index-exam');
        Route::post('/take-exam/student={student_id}/exam={id}','ExamController@takeExam')->name('take-exam');
        Route::post('/submit-exam/student={student_id}/exam={id}','ExamController@submitExam')->name('submit-exam');
        Route::get('/rank','AdminController@rank')->name('rank');
        Route::get('/rank/subject={id}','AdminController@rankSubject')->name('rank-subject');
        Route::get('/rank/subject={id}/search','AdminController@subjectSearch')->name('rank-subject-search');
        Route::get('/rank/subject={id}/exam={exam_id}','AdminController@rankDetail')->name('rank-detail');

    });

    Route::group(['namespace'=>'User'], function(){
        Route::get('/home', 'UserController@index')->name('home'); //sau khi dang nhap nguoi dung dc chuyen den trang nay
        Route::get('/user={id}/personal', 'UserController@personalStatistic')->name('personal');
        Route::get('/personal/export', 'UserController@export')->name('personal-export');
        Route::get('/{id}/edit-info','UserManageController@viewEdit')->name('view-edit'); //trang sua thong tin ca nhan
        Route::post('/{id}/edit-info','UserManageController@editInfo')->name('edit-info'); //sua thong tin ca nhan
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware'=>'is_admin','namespace'=>'Admin'], function () { //ng dung da dang nhap, role = superadmin||admin
        Route::get('/user-manage/export', 'AdminController@export')->name('user-export');
        Route::get('/statistic/system', 'AdminController@systemStatistic')->name('system');
        Route::group(['prefix' => '/user-manage', 'as' => 'user-manage.'],function(){
            Route::get('/','AdminController@viewUser')->name('user-manage'); //sau khi dang nhap cac admin va superadmin dc chuyen den trang nay
            Route::post('/{id}/edit-user','AdminController@editUser')->name('edit-user');
            Route::get('/search', 'AdminController@search')->name('rank-search');

        });

        Route::group(['prefix'=>'/subject','as'=>'subject.'],function(){
            Route::get('/{id}','SubjectController@indexSubject')->name('index-subject');
            Route::post('/create-subject','SubjectController@createSubject')->name('create-subject');
            Route::get('/{subject_id}/create-category','SubjectController@category')->name('index-category');
            Route::post('/{subject_id}/create-category','SubjectController@createCategory')->name('create-category');
            Route::post('/{id}/delete-category', 'SubjectController@deleteCategory')->name('delete-category');
            Route::get('/{subject_id}/create-exam','ExamController@getExam')->name('get-exam');
            Route::post('/{subject_id}/create-exam','ExamController@createExam')->name('create-exam');
            Route::post('/{id}/delete-exam','ExamController@deleteExam')->name('delete-exam');

            Route::group(['prefix'=>'/subject={subject_id}/category={category_id}'],function(){
                Route::get('/create-question', 'QuestionController@question')->name('question');
                Route::post('/create-question', 'QuestionController@createQuestion')->name('create-question');
                Route::get('/index-question', 'QuestionController@indexQuestion')->name('index-question');
                Route::get('/question={id}/update-question', 'QuestionController@getUpdate')->name('get-update');
                Route::post('/question={id}/update-question', 'QuestionController@updateQuestion')->name('update-question');
                Route::post('/question={id}/delete-question', 'QuestionController@deleteQuestion')->name('delete-question');
            });
        });
    });
});

