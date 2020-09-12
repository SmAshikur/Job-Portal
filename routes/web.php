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

Route::get('/', 'JobController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//job
Route::get('/job/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/job/post', 'JobController@post')->name('jobs.post');
Route::post('/job/store', 'JobController@store')->name('jobs.store');
Route::get('/job/myJobs', 'JobController@myJobs')->name('jobs.myJobs');
Route::get('/job/edit', 'JobController@edit')->name('jobs.edit');
Route::post('/job/update', 'JobController@update')->name('jobs.update');
Route::post('/job/delete', 'JobController@delete')->name('jobs.delete');
Route::post('/job/apply/{id}', 'JobController@apply')->name('jobs.apply');
Route::get('/job/applicants', 'JobController@applicants')->name('jobs.applicant');
Route::post('/applications/{id}','JobController@apply')->name('apply');
Route::get('/jobs/allJobs','JobController@allJobs')->name('allJobs');
//save
Route::post('/save/{id}','FavoriteController@saveJob');
Route::post('/unsave/{id}','FavoriteController@unsaveJob');

//search job with vue
Route::get('/jobs/search','JobController@searchJob');

//company
Route::get('/company/{id}/{company}', 'CompanyController@index') ->name('company.index');
Route::get('/company/profile','CompanyController@create')->name('company.profile');
Route::post('/company/store', 'CompanyController@store') ->name('company.store');
Route::post('/company/coverPhoto', 'CompanyController@coverPhoto') ->name('company.coverPhoto');
Route::post('/company/logo', 'CompanyController@logo') ->name('company.logo');
Route::get('/company', 'CompanyController@company') ->name('company');

//user Profile
Route::get('/user/profile','UserProfileController@index')->name('profile.index');
Route::post('/profile/store', 'UserProfileController@store') ->name('profile.store');
Route::post('/profile/coverLetter', 'UserProfileController@coverLetter') ->name('profile.coverLetter');
Route::post('/profile/resume', 'UserProfileController@resume') ->name('profile.resume');
Route::post('/profile/avatar', 'UserProfileController@avatar') ->name('profile.avatar');

// employ
Route::view('/employee/profile','auth.emp-register')->name('employee.view');
Route::post('/employee/register','EmployeeRegisterController@store')->name('employer.register');

//category
Route::get('category/{id}','categoryController@index')->name('category.index');
