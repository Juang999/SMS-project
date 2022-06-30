<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Web;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role:staff');

// ->middleware('role:super-admin');

Route::middleware('role:super-admin')->group( function () {
    Route::get('/admin', [Web\AdminController::class, 'index'])->name('dashboard');
});
