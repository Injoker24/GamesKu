<?php

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;

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

/* TODO

    NonMember
    - Login
    - Register
    - Search Game Name (+Member)
    - View Game Detail (+Member)

    Member
    - View Current Transactions
    - Transaction Detail
    - Payment
    - View History
    - View History Detail
    - Delete History
    - Profile
    - Edit Profile

    Admin
    - Add Game
    - Update Game Detail
    - Remove Game
    - Confirm Transaction
    - Reject Transaction

*/

// Route::get('/', function () {
//     return view('home', [
//         'games' => Game::all()
//     ]);
// })->name('home_page');

/* All */
Route::get('/search', [GameController::class, "searchGame"]);
Route::get('/game/{name}', [GameController::class, "gameDetail"]);
Route::get('/allgames', [GameController::class, "viewAllGame"]);


/* Guest Only */
Route::get('/', [Controller::class, "onboarding"])->name('boarding_page');
Route::get('/login', [UserController::class, "index_login"])->name('login_page');
Route::post('/login/auth', [UserController::class, "login"])->name('login');

Route::get('/register', [UserController::class, "index_register"])->name('register_page');
Route::post('/register/auth', [UserController::class, "register"])->name('register');

/* Member Only */
Route::middleware('auth')->group(function() {
    Route::post('/game/{name}', [MemberController::class, "topupGame"]);
    Route::get('/transaction', [MemberController::class, "transactionPage"]);
    Route::get('/transaction/{id}', [MemberController::class, "transactionDetail"])->name('transaction_detail_page');
    Route::get('/transaction/{id}/cancel', [MemberController::class, "cancelTransaction"]);
    Route::get('/transaction/{id}/upload', [MemberController::class, "uploadPaymentPage"]);
    Route::post('/transaction/{id}/upload',[MemberController::class, "uploadPayment"]);
    Route::get('/history', [MemberController::class, "historyPage"]);
    Route::get('/history/{id}', [MemberController::class, "historyDetail"]);
    Route::delete('/history/{id}/delete', [MemberController::class, "deleteHistory"]);
    Route::delete('/history/delete', [MemberController::class, "deleteAllHistory"]);
});

/* Admin Only */
Route::middleware('admin')->group(function() {
    Route::get('/manage-game', [AdminController::class, "manageGamePage"]);
    Route::get('/manage-game/addGame', [AdminController::class, "addGamePage"]);
    Route::post('/manage-game/addGame', [AdminController::class, "addGame"]);
    Route::get('/manage-game/{name}', [AdminController::class, "editGamePage"]);
    Route::post('/manage-game/{name}', [AdminController::class, "editGame"]);
    Route::delete('/manage-game/{name}/delete', [AdminController::class, "deleteGame"]);

    Route::get('/manage-transaction', [AdminController::class, "manageTransactionPage"]);
    Route::get('/manage-transaction/{id}', [AdminController::class, "manageTransactionDetail"]);
    // both accept reject
    Route::post('/manage-transaction/{id}', [AdminController::class, "finalizeTransaction"]);
});

/* Member and Admin */
Route::middleware(['auth'])->group(function() {
    Route::get('/home', [Controller::class, "homePage"])->name('home_page');
    Route::get('/profile', [Controller::class, "profilePage"]);
    Route::post('/profile', [Controller::class, "editProfilePage"]);
    Route::get('/logout', [UserController::class, "logout"])->name('logout');
});

/* Lang */
Route::get('/lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    // session()->put('fallback_locale', $locale);
    return back();
});
