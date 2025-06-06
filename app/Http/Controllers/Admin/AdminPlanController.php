<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class AdminPlanController extends Controller
{
    // Construtor: protege as rotas para apenas administradores
    public function __construct()
    {
        // Middleware para checar se o usuário é admin
        $this->middleware(function ($request, $next) {
            // Se não estiver autenticado ou não for admin, aborta com 403
            if (!auth()->user() || !auth()->user()->isAdmin()) {
                abort(403, 'Acesso não autorizado.');
            }
            return $next($request);
        });
    }

    // Lista os planos, com opção de filtro por status (ativo/inativo)
    public function index(Request $request)
    {
        // Busca o filtro de status na querystring (?status=ativo/inativo)
        $status = $request->query('status');

        // Inicia a query base dos planos
        $plans = Plan::query();

        // Se o filtro de status foi informado, aplica na query
        if (!is_null($status)) {
            $statusValue = $status === 'ativo' ? 1 : 0;
            $plans->where('status', $statusValue);
        }

        // Executa a query e pega os resultados
        $plans = $plans->get();

        // Retorna para a view, passando os planos e o status filtrado
        return view('admin.plans.index', compact('plans', 'status'));
    }

    // Atualiza um plano existente
    public function update(Request $request, Plan $plan)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'velocidade' => 'required|integer|min:1',
            'preco' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ]);

        // Atualiza o plano apenas com os campos validados
        $plan->update($request->only('nome', 'descricao', 'velocidade', 'preco', 'status'));

        // Redireciona para a listagem com mensagem de sucesso
        return redirect()->route('admin.plans.index')->with('success', 'Plano atualizado com sucesso!');
    }

    // Remove um plano do sistema
    public function destroy(Plan $plan)
    {
        // Deleta o plano do banco
        $plan->delete();

        // Redireciona para a listagem com mensagem de sucesso
        return redirect()->route('admin.plans.index')->with('success', 'Plano excluído com sucesso!');
    }
}