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

Route::resource('usuari', UsuariController::class);
Route::get('/login', [UsuariController::class, 'login'])->name('usuari.login');


Route::get('/', function () {
    return view('welcome');
});

