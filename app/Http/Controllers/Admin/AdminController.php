<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;

class AdminController extends Controller
{
    // Construtor para proteger as rotas, permitindo acesso apenas a administradores
    public function __construct()
    {
        // Middleware personalizado para verificar se o usuário é admin
        $this->middleware(function ($request, $next) {
            // Se o usuário não estiver autenticado ou não for admin, retorna erro 403
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403, 'Acesso não autorizado.');
            }
            return $next($request);
        });
    }

    // Método principal para exibir o dashboard administrativo
    public function index()
    {
        // Conta o total de usuários cadastrados
        $totalUsers = User::count();

        // Conta quantos usuários são administradores
        $adminCount = User::where('role', 'admin')->count();

        // Conta quantos usuários são provedores
        $provedorCount = User::where('role', 'provedor')->count();

        // Conta o total de planos ATIVOS
        $totalActivePlans = Plan::where('status', 1)->count();

        // Conta o total de planos INATIVOS
        $totalInactivePlans = Plan::where('status', 0)->count();

        // Busca as velocidades disponíveis dos planos, agrupando para não repetir
        $planSpeeds = Plan::select('velocidade')
                          ->groupBy('velocidade')
                          ->pluck('velocidade');

        // Conta quantos planos existem para cada velocidade
        $planSpeedCounts = Plan::selectRaw('velocidade, COUNT(*) as count')
                               ->groupBy('velocidade')
                               ->pluck('count');

        // Retorna a view do dashboard passando todas as variáveis acima
        return view('admin.dashboard', compact(
            'totalUsers', 
            'adminCount', 
            'provedorCount', 
            'totalActivePlans', 
            'totalInactivePlans', 
            'planSpeeds', 
            'planSpeedCounts'
        ));
    }
}