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
});

Auth::routes();

Route::group(['prefix' => 'admin','middleware' => ['auth','role:admin']], function(){
	
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', [
		'uses' => 'UsersController@destroy',
		'as'   => 'users.destroy'
	]);
});

// Routes for Applicant user
Route::group(['prefix' => 'applicant','middleware' => ['auth','role:applicant']], function(){

    Route::resource('processes', 'Applicant\ProcessesController');
	Route::get('processes/step2/{id}', [
        'uses' => 'Applicant\ProcessesController@stepTwo',
		'as'   => 'processes.step2'
    ]);
    Route::get('processes/step3/{id}', [
        'uses' => 'Applicant\ProcessesController@stepThree',
		'as'   => 'processes.step3'
    ]);
    Route::match(['put','patch'], 'processes/edit/step3/{id}', [
        'uses' => 'Applicant\ProcessesController@editStepThree',
		'as'   => 'processes.edit.step3'
    ]);
    Route::get('processesAp/step4/{id}', [
        'uses' => 'Applicant\ProcessesController@stepFour',
		'as'   => 'processes.step4'
    ]);
    Route::get('processes/step5/{id}', [
        'uses' => 'Applicant\ProcessesController@stepFive',
		'as'   => 'processes.step5'
    ]);
    Route::match(['put','patch'], 'processes/edit/step5/{id}', [
        'uses' => 'Applicant\ProcessesController@editStepFive',
		'as'   => 'processes.edit.step5'
    ]);

});

// Routes for Approver user
Route::group(['prefix' => 'approver','middleware' => ['auth','role:approver']], function(){

	Route::resource('processesAp', 'Approver\ProcessesController');
	Route::get('processesAp/step1/{id}', [
        'uses' => 'Approver\ProcessesController@stepOne',
		'as'   => 'processesAp.step1'
    ]);
    Route::get('processesAp/step2/{id}', [
        'uses' => 'Approver\ProcessesController@stepTwo',
		'as'   => 'processesAp.step2'
    ]);
    Route::match(['put','patch'], 'processesAp/edit/step2/{id}', [
        'uses' => 'Approver\ProcessesController@editStepTwo',
		'as'   => 'processesAp.edit.step2'
    ]);
    Route::get('processesAp/step3/{id}', [
        'uses' => 'Approver\ProcessesController@stepThree',
		'as'   => 'processesAp.step3'
    ]);
    Route::get('processesAp/step4/{id}', [
        'uses' => 'Approver\ProcessesController@stepFour',
		'as'   => 'processesAp.step4'
    ]);
    Route::match(['put','patch'], 'processesAp/edit/step4/{id}', [
        'uses' => 'Approver\ProcessesController@editStepFour',
		'as'   => 'processesAp.edit.step4'
    ]);
    Route::get('processesAp/download/{file}', [
        'uses' => 'GeneralController@downloadFile',
		'as'   => 'processesAp.download'
    ]);
});

Route::get('mail/send', 'MailController@send');
Route::get('alertapprover', [
    'uses' => 'GeneralController@alertApprover',
    'as'   => 'alertapprover'
]);

Route::get('alert', [
    'uses' => 'GeneralController@alert',
    'as'   => 'alert'
]);


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

