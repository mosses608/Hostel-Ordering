<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'welcome_home'])->name('/login');

Route::get('/dashboard', [Controller::class, 'view_dashboard']);

Route::get('/book-hostel', [Controller::class, 'go_book_hostel']);

Route::get('/room-details', [Controller::class, 'show_room_details']);

Route::get('/send-complaint', [Controller::class, 'send_complaint']);

Route::get('/feedbacks', [Controller::class, 'feedbacks']);

Route::get('/register', [Controller::class, 'register_new']);

Route::post('/students', [Controller::class, 'store_students']);

Route::get('/my-profile', [Controller::class, 'go_my_profile']);

Route::post('/authenticate', [Controller::class, 'authentication']);

Route::put('/students/edit_account/{student}', [Controller::class, 'edit_my_profile']);

Route::put('/students/edit_password/{student}', [Controller::class, 'change_password']);

Route::post('/logout', [Controller::class, 'logout']);

Route::post('/bookings', [Controller::class, 'store_application']);

Route::post('/complaints', [Controller::class, 'send_complaints']);

Route::get('/view-complaints', [Controller::class, 'view_complaints']);

Route::post('/feedbacks', [Controller::class, 'store_feedbacks']);


//ADMIN
Route::get('/admin/dashboard', [Controller::class, 'admin_dashboard']);

Route::get('/admin/courses', [Controller::class, 'courses_page'])->middleware('auth');

Route::post('/courses', [Controller::class, 'store_courses'])->middleware('auth');

Route::get('/admin/view-courses', [Controller::class, 'show_view_courses'])->middleware('auth');

Route::delete('/courses/delete/{course}', [Controller::class, 'delete_course'])->middleware('auth');

Route::put('/courses/edit/{course}', [Controller::class, 'edit_course'])->middleware('auth');

Route::get('/admin/admin-profile', [Controller::class, 'show_profile'])->middleware('auth');

Route::put('/users/edit_profile/{user}', [Controller::class, 'edit_admin_profile'])->middleware('auth');

Route::get('/admin/rooms', [Controller::class, 'show_rooms'])->middleware('auth');

Route::post('/rooms', [Controller::class, 'store_rooms'])->middleware('auth');

Route::get('/admin/view-rooms', [Controller::class, 'view_rooms'])->middleware('auth');

Route::put('/rooms/edit_room/{room}', [Controller::class, 'edete_room'])->middleware('auth');

Route::delete('/rooms/delete/{room}', [Controller::class, 'delete_room'])->middleware('auth');

Route::get('/admin/view-students', [Controller::class, 'view_students'])->middleware('auth');

Route::get('/admin/feedbacks', [Controller::class, 'view_feedbcaks'])->middleware('auth');

Route::get('/admin/complaints', [Controller::class, 'show_complaints'])->middleware('auth');

Route::get('/admin/view-action/{complain}', [Controller::class, 'single_complaint'])->middleware('auth');

Route::put('/complaints/edit_status/{complain}', [Controller::class, 'edit_complain'])->middleware('auth');

