<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403, 'Acesso não autorizado.');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $totalUsers = User::count();
        $adminCount = User::where('role', 'admin')->count();
        $provedorCount = User::where('role', 'provedor')->count();

        $totalActivePlans = Plan::where('status', 1)->count();
        $totalInactivePlans = Plan::where('status', 0)->count();

        // Planos por velocidade
        $planSpeeds = Plan::select('velocidade')
                          ->groupBy('velocidade')
                          ->pluck('velocidade');

        $planSpeedCounts = Plan::selectRaw('velocidade, COUNT(*) as count')
                               ->groupBy('velocidade')
                               ->pluck('count');

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
