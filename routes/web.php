<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/company', 'CompanyController@index');
    Route::get('/', 'TrainingEmployeesController@index');

    Route::get('/getPercentFire/{module}', 'TrainingEmployeesController@getPercentFire');
    Route::get('/getParticipantsModule', 'TrainingEmployeesController@getParticipantsModule');
    Route::get('/getCountError', 'TrainingEmployeesController@getCountError');
    Route::get('/getCountTraining', 'TrainingEmployeesController@getCountTraining');


    Route::prefix('module')->group(function (){
        Route::get('/','TrainingModuleController@index');
        Route::get('create','TrainingModuleController@create');
        Route::post('store','TrainingModuleController@store');
    });

    Route::prefix('employee')->group(function (){
        Route::get('/','EmployeesController@index');
        Route::get('create','EmployeesController@create');
        Route::post('store','EmployeesController@store');
        Route::get('show/{id}','EmployeesController@show');
    });

    Route::prefix('training_employee')->group(function (){
        Route::post('store','TrainingEmployeesController@store');
    });

    Route::prefix('users')->group(function (){
        Route::get('/','UsersController@index');
        Route::post('store','UsersController@store');
        Route::post('update','UsersController@update');
        Route::get('delete/{id}','UsersController@destroy');
    });

    Route::post('/filter-form','EmployeesController@filter');
});

Route::post('/postLogin','AuthController@postLogin');
Route::get('/logout','AuthController@logout');

Route::get('/login', function() {
    return view('layouts.login');
})->name('login');

Route::get('/showToken', function() {
    echo csrf_token();
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
