<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
   return view ('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});

Route::get('/register', function () {
    return view ('register');
 });

Route::get('/userlist', function () {
    return view ('userlist');
 });

Route::get('/useredit', function () {
   return view ('useredit');
});



Route::get('/useredit', [UserController::class, 'getuser']);

Route::get('/userlist', [UserController::class, 'search']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::get('/userdelete', [UserController::class, 'deleteuser']);

Route::post('/useredit', [UserController::class, 'edituser']);

Route::get('/userview', function () {
   return view ('userview');
});

Route::get('/userview', [UserController::class, 'viewuser']);









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