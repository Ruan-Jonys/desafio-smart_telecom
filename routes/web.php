<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPlanController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PlanController;

// Rota para a landing page pública (visitantes e não autenticados)
Route::get('/', function () {
    return view('landing-page');
})->name('landing');

// Grupo de rotas que exige autenticação via Sanctum e Jetstream (usuários autenticados e verificados)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        // Dashboard: redireciona admin para dashboard admin, outros para listagem de planos
        Route::get('/dashboard', function () {
            $user = auth()->user();

            // isAdmin() está sublinhado de vermelho, isso acontece porque o editor não encontrou o método na classe User
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            // Se for provedor ou outro papel, exibe a listagem de planos
            return app(\App\Http\Controllers\PlanController::class)->index();
        })->name('dashboard');

        // Rota para visualização dos planos
        Route::get('/planos', [\App\Http\Controllers\PlanController::class, 'index'])->name('plans');
    });

// Rotas protegidas para geração de contrato (apenas autenticado)
Route::middleware(['auth'])->group(function () {
    // Exibe o formulário de geração de contrato
    Route::get('/geracao-contrato', [ContractController::class, 'showForm'])->name('contract.form');
    // Processa a geração do contrato (POST)
    Route::post('/geracao-contrato', [ContractController::class, 'generate'])->name('contract.generate');
});

// Rotas administrativas, protegidas por autenticação e prefixo 'admin'
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard do admin: só permite acesso se for admin
    Route::get('/dashboard', function () {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Acesso não autorizado.');
        }
        return app(AdminController::class)->index();
    })->name('admin.dashboard');

    // CRUD de usuários (exceto visualizar, criar e armazenar)
    Route::resource('users', AdminUserController::class)
        ->names('admin.users')
        ->except(['show', 'create', 'store']);

    // CRUD de planos (exceto visualizar, criar e armazenar)
    Route::resource('plans', AdminPlanController::class)
        ->names('admin.plans')
        ->except(['show', 'create', 'store']);

});