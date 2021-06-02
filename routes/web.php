<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard/view/applications', 'DashboardController@viewApplications')->name('dashboard.view.applications');
Route::get('/dashboard/manage/jobs', 'DashboardController@manageJobs')->name('dashboard.manage.jobs');
Route::get('/dashboard/manage/jobs/{job}/edit', 'DashboardController@editJob')->name('dashboard.manage.edit.job');
Route::put('/dashboard/manage/jobs/{job}/edit', 'DashboardController@updateJob');
Route::put('/dashboard/manage/jobs/{job}/status', 'DashboardController@changeJobStatus')->name('dashboard.manage.job.status');
Route::get('/dashboard/manage/jobs/{job}/applications/', 'DashboardController@manageJobApplications')->name('dashboard.manage.jobs.applications');
Route::put('/dashboard/manage/jobs/applications/{application}/', 'DashboardController@changeApplicationStatus')->name('dashboard.manage.applications');
Route::get('/dashboard/manage/profile', 'DashboardController@manageProfile')->name('dashboard.manage.profile');
Route::put('/dashboard/manage/profile/', 'DashboardController@updateProfile');
Route::put('/dashboard/manage/profile/change-password', 'DashboardController@changePassword')->name('dashboard.password.change');
Route::get('/jobs/post', 'DashboardController@postJobPage')->name('jobs.post');
Route::post('/jobs/post', 'DashboardController@postJob');
Route::get('/jobs/categories', 'DashboardController@jobCategories')->name('jobs.categories');
Route::get('/jobs/categories/{category}', 'DashboardController@jobs')->name('jobs');
Route::post('/jobs/{job}/apply', 'DashboardController@apply')->name('jobs.apply');
Auth::routes();

// Dashboard Routes
