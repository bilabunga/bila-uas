<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // ================= USER =================

    Route::get('/home', [EventController::class, 'home'])
        ->name('home');

    Route::get('/events-user', [EventController::class, 'userIndex'])
        ->name('user.events.index');

    Route::get('/events-user/{event}', [EventController::class, 'userShow'])
        ->name('user.events.show');

    Route::get('/events-user/{event}/register', [RegistrationController::class, 'create'])
        ->name('user.registrations.create');

    Route::post('/events-user/{event}/register', [RegistrationController::class, 'store'])
        ->name('user.registrations.store');

    Route::get('/my-registrations', [RegistrationController::class, 'myRegistrations'])
        ->name('user.registrations.index');

    Route::get('/about', [EventController::class, 'about'])
        ->name('user.about');

    Route::get('/contact', [EventController::class, 'contact'])
        ->name('user.contact');


    // ================= ADMIN =================

    Route::middleware('isAdmin')->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        Route::post('/registrations/{id}/approve', [RegistrationController::class, 'approve'])
            ->name('registrations.approve');

        Route::post('/registrations/{id}/reject', [RegistrationController::class, 'reject'])
            ->name('registrations.reject');

        Route::resource('admin/users', UserController::class);

        Route::resource('events', EventController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('registrations', RegistrationController::class);

    });

});