<?php

use App\Models\Game;
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

Route::get('/', function () {
    return view('boarding');
});

Route::get('/login', [UserController::class, "index_login"])->name('login_page');
Route::post('/login', [UserController::class, "login"])->name('login');


Route::get('/register', [UserController::class, "index_register"])->name('register_page');
Route::post('/register', [UserController::class, "register"])->name('register');

Route::get('/logout', [UserController::class, "logout"])->name('logout');

Route::get('/home', function() {
    return view('home', [
        'games' => Game::all()
    ]);
})->name('home_page');
