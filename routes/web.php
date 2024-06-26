<?php

use App\Http\Controllers\CTRLAppointment;
use App\Http\Controllers\DoctorCTRL;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('dash', 'dash');

// User Route
Route::get('add-appointment', [CTRLAppointment::class, 'create'])->name('add.appointment');

Route::post('add-appointment', [CTRLAppointment::class, 'store'])->name('add.appointment');

Route::get('appointment-list', [CTRLAppointment::class, 'index'])->name('appointment.list');

Route::get('/edit-appointment/{appointment_id}', [CTRLAppointment::class, 'edit'])->name('edit.appointment');

Route::put('/update-appointment/{appointment_id}', [CTRLAppointment::class, 'update'])->name('update.appointment');

Route::delete('/delete-appointment/{appointment_id}', [CTRLAppointment::class, 'destroy'])->name('delete.appointment');

// Doctor Route
Route::controller(DoctorCTRL::class)->group(function () {
    Route::get('/add-schedule', 'create')->name('add.schedule');
    Route::post('', 'store');
});
Route::view('/doctor-schedule', 'doctor');


// Auth
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'user'])
    ->name('dashboard');

Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');

Route::view('doctor', 'doctor')
    ->middleware(['auth', 'verified', 'doctor'])
    ->name('doctor');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
