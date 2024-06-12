<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sample;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::view('login', 'login');
Route::view('register', 'Registration_form');
Route::get('login_form', [sample::class, 'login']);
Route::get('registration_form', [sample::class, 'register']);
// home page
Route::get('Home', [sample::class, 'friend']);
Route::get('friend', [sample::class, 'Add_friend']);
// Chat
Route::get('chat/{id}', [sample::class, 'open_chat']);
// fetch message in chat
Route::get('/fetch-data/{id}', [sample::class, 'fetch_message']);
// Insert message to the database
Route::get('/send-message', [sample::class, 'send_message']);
//delete conversation
Route::get('/delete_conversation/{id}', [sample::class, 'delete_conversation']);
// search add friend
Route::get('Search_Add_friend', [sample::class, 'Search_Add_friend']);
// Send friend request
Route::get('send_request/{id}', [sample::class, 'Send_friend_request']);
// cancle friend request
Route::get('send_request_cancle/{id}', [sample::class, 'friend_request_cancle']);
// Confirm friend request
Route::get('confirm_request/{id}', [sample::class, 'confirm_request']);
// delete friend request
Route::get('Delete_request/{id}', [sample::class, 'Delete_request']);
// Route::view('chat1','demo_chart');
// Route::view('friend','Add_friend');
Route::get('Unfriend/{id}', [sample::class, 'delete_friend']);
Route::view('support', 'Support');
Route::get('profile/{id}', [sample::class, 'other_profile']);

// profile
Route::get('profile', [sample::class, 'profile']);
// edit profile data
Route::get('Edit_profile', [sample::class, 'edit_profile_data']);
// edit profile
Route::get('edit_profile', [sample::class, 'edit_profile']);
// update profiile picture
Route::post('update_profile_pic', [sample::class, 'update_profile_pic']);
// change password
Route::view('change_password', 'change_password');
Route::get('password', [sample::class, 'change_password']);
// search home reselt
Route::get('/search',[sample::class,'search']);

Route::post('contact', [sample::class, 'contact']);
Route::get('logout', [sample::class, 'destroySession']);
