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

Route::get('/', 'HomeController@index');
Route::get('comments', 'CommentsController@list');
Route::post('rsvp', 'GuestListController@rsvp');
Route::get('/guest-book', 'GuestListController@guestBook');
Route::post('comments', 'CommentsController@store');
Route::get('/guest-list', 'DashboardController@getGuestList')->name('guests.index');


Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('guest/{invitation_code}', 'GuestListController@getUserData');
Route::patch('guest/{invitation_code}', 'GuestListController@updateUserData');
Route::delete('guest/{invitation_code}', 'GuestListController@delete');
Route::post('guest', 'GuestListController@store');