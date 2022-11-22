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

Route::resource('usuaris', UsuariController::class ,['parameters' => [
    'usuaris' => 'user'
]])->scoped(['user'=>'username']);

Route::get('/login', [UsuariController::class, "login"])->name('usuaris.login');
Route::post('/login', [UsuariController::class, 'singin']);
Route::post('/logout', [UsuariController::class, 'logout'])->name("usuaris.logout");


Route::get('/', function () {
    return view('welcome');
});

