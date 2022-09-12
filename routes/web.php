<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', 'login');

Route::middleware('auth')->prefix('dashboard')->group(function () {
  Route::get('', DashboardController::class)->name('dashboard');
  Route::resource('users', UserController::class);
  Route::resource('tickets', TicketController::class);
  Route::resource('tickets-types', TicketTypeController::class);
  Route::get('profile', [UserController::class, 'profile'])->name('profile');
});



require __DIR__ . '/auth.php';
