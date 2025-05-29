<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;

class AdminController extends Controller
{
    public function __construct()
    {
        // Garante que só admins acessem
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
        $totalPlans = Plan::where('status', 1)->count();
        $plans = Plan::all();

        return view('admin.dashboard', compact('totalUsers', 'adminCount', 'totalPlans'));
    }
}

