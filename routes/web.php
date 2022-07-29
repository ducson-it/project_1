<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\PatientController;

use App\Http\Controllers\ShiftController;


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
    Route::prefix('doctor')->name('doctor.')->group(function (){
        Route::get('/', [DoctorController::class, 'index'])->name('list-doctor');
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('edit-doctor');
        Route::post('/edit/{id}', [DoctorController::class, 'handleEdit'])->name('handle-edit-doctor');
        Route::get('/delete/{id}', [DoctorController::class, 'deleteDoctor'])->name('delete-doctor');
        Route::get('/show/{id}', [DoctorController::class, 'show'])->name('show');
    });

    Route::get('/shift', [ShiftController::class, 'index'])->name('shift');
    Route::get('/shift/add', [ShiftController::class, 'addShift'])->name('add-shift');

    Route::get('/patient', [PatientController::class, 'index'])->name('patient');
    Route::get('/patient', [PatientController::class, 'index'])->name('patient');
});

// Route::prefix('doctors')->name('doctors.')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('dashboard');
//     Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
// });
