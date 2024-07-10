<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Auth;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::view('/', 'pages.home')->name('admin');
    Route::resource('branch', BranchController::class);
    Route::resource('employees', EmployeController::class);
    Route::resource('students', StudentController::class);
    Route::resource('payments', PaymentController::class);
});

Route::get('/', function () {
    return redirect()->route('login');
});








// students =====================
//Route::get('/student', function () {
//    return view('pages/students/index');
//});
//
//Route::get('/student/view', function () {
//    return view('pages/students/view');
//});
//
//Route::get('/student/edit', function () {
//    return view('pages/students/edit');
//});
//
//Route::get('/student/create', function () {
//    return view('pages/students/create');
//});
