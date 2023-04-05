<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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


/* Route::get('/', function () {
    return view('expenses.add-expense');
});

Route::resource('/expense', ExpenseController::class);
*/

/* Devetee Routes */

Route::get('/', [ExpenseController::class, 'create'])->name('InvoiceSubmit');


/* Login Route */

Route::get('/cockpit', [AuthController::class, 'index'])->name('LoginForm');

/* Two Step Auth */
Route::get('/verification', [AuthController::class, 'varification'])->name('EmailVerification');