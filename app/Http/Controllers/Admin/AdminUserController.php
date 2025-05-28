<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
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
        $users = User::all(); // Pode ajustar para paginação se quiser
        return view('admin.users.index', compact('users'));
    }
}
