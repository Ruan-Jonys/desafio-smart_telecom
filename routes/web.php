<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPlanController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PlanController;

Route::get('/', function () {
    return view('landing-page');
})->name('landing');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', [PlanController::class, 'index'])->name('dashboard');
        Route::get('/planos', [PlanController::class, 'index'])->name('plans');
    });

Route::middleware(['auth'])->group(function () {
    Route::get('/geracao-contrato', [ContractController::class, 'showForm'])->name('contract.form');
    Route::post('/geracao-contrato', [ContractController::class, 'generate'])->name('contract.generate');
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
