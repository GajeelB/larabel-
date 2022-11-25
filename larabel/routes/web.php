<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
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
//USER CRUD
Route::resource('usuaris', UsuariController::class ,['parameters' => [
    'usuaris' => 'user'
]])->scoped(['user'=>'username']);

//LOG
Route::get('/login', [UsuariController::class, "login"])->name('usuaris.login');
Route::post('/login', [UsuariController::class, 'singin']);
Route::post('/logout', [UsuariController::class, 'logout'])->name("usuaris.logout");

//POST
Route::resource('usuaris.posts', PostController::class,['parameters' => [
    'usuaris' => 'user'
]])->scoped(['user'=>'username']);
Route::get("/latest", [PostController::class, "latest"])->name("posts.latest");

//IMG
Route::resource('images', ImageController::class )->only("store");

//FOLLOW
Route::post("{usuari:username}/follow", [FollowController::class, 'store'])->name("user.follow.store");
Route::delete("{usuari:username}/unfollow", [FollowController::class, 'destroy'])->name("user.follow.store");


Route::get('/', function () {
    return view('welcome');
});

