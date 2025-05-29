<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPlanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/l', function () {
    return view('landing-page');
});

Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'),'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/planos', function() {
        return view('plans.index');
    })->name('plans');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acesso não autorizado.');
        }
        return app(AdminController::class)->index();
    })->name('admin.dashboard');

    // CRUD completo de usuários: index, edit, update, destroy
    Route::resource('users', AdminUserController::class)
        ->names('admin.users')
        ->except(['show', 'create', 'store']);

        Route::resource('plans', AdminPlanController::class)
        ->names('admin.plans')
        ->except(['show', 'create', 'store']);

});
