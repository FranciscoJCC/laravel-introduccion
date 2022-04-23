<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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
Route::get('/home', function(){
    return view('home');
});
Route::get('/', [UserController::class, 'index']);
/* Route::get('/', [UserController::class, 'index'])->middleware('auth'); */
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

/* 
Route::resource('users', UserController::class)->names([
    'create' => 'users.build'
])->middleware('auth');
*/