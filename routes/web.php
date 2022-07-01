<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web as Web;
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

Route::middleware('role:super-admin')->group( function () {
    Route::get('/dashboard', [Web\AdminController::class, 'index'])->name('dashboard');
    Route::get('/teacher', [Web\TeacherController::class, 'index'])->name('teacher');
});
