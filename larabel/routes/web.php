<?php

use App\Http\Controllers\UsuariController;
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

Route::get('/singup', [UsuariController::class, "logup"])->name("singup");
Route::post('/singup', [UsuariController::class, "create"]);
Route::get('/login', [UsuariController::class, "login"])->name("login");
Route::get('/usuaris', [UsuariController::class, "index"])->name("users");


Route::get('/', function () {
    return view('welcome');
});

