<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class AdminPlanController extends Controller
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
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'velocidade' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        $plan->update($request->only('nome', 'descricao', 'velocidade', 'preco', 'status'));

        return redirect()->route('admin.plans.index')->with('success', 'Plano atualizado com sucesso!');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('admin.plans.index')->with('success', 'Plano excluído com sucesso!');
    }

}
