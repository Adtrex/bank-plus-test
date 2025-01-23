<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinanceController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('balance', [FinanceController::class, 'getBalance'])->name('balance');
Route::post('deposit', [FinanceController::class, 'deposit'])->name('deposit');
Route::post('withdraw', [FinanceController::class, 'withdraw'])->name('withdraw');
Route::get('transactions', [FinanceController::class, 'getTransactions'])->name('get.transactions');

