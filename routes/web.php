<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DoctorController;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\PatientController;

use App\Http\Controllers\ShiftController;
use App\Models\Doctor;

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
    return view('clients.home');
});

Route::prefix('admins')->name('admins.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('doctor', DoctorController::class);
    Route::resource('patient', PatientController::class);

});
