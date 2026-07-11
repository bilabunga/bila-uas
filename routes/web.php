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
    Route::get('/home', [EventController::class, 'home'])->name('home');

    Route::get('/events-user', [EventController::class, 'userIndex'])
        ->name('user.events.index');

    Route::get('/events-user/{event}', [EventController::class, 'show'])
        ->name('user.events.show');

    // ================= ADMIN =================
    Route::middleware('isAdmin')->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('admin/users', UserController::class);

        Route::resource('events', EventController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('registrations', RegistrationController::class);

    });

});