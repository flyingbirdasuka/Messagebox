<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;

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

Route::get('/home', [App\Http\Controllers\MessagesController::class, 'index'])->name('home');
Route::get('/home/create', [App\Http\Controllers\MessagesController::class, 'create']);
Route::get('/home/reply/{id}/{subject}', [App\Http\Controllers\MessagesController::class, 'reply']);
Route::post('/home', [App\Http\Controllers\MessagesController::class, 'store']);
Route::get('/home/sent', [App\Http\Controllers\MessagesController::class, 'sent']);
Route::get('/home/read/{id}', [App\Http\Controllers\MessagesController::class, 'read']);
Route::get('/home/delete/{id}', [App\Http\Controllers\MessagesController::class, 'delete']);
Route::get('/home/deleted', [App\Http\Controllers\MessagesController::class, 'deleted']);
