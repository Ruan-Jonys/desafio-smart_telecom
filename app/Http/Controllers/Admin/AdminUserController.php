<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Lista usuários, com filtro opcional por papel (role)
    public function index(Request $request)
    {
        // Obtém o filtro de papel da query (?role=admin, provedores, etc)
        $role = $request->query('role');

        // Inicializa a query de usuários
        $users = User::query();

        // Se um papel foi informado, filtra os usuários por esse papel
        if (!is_null($role)) {
            $users->where('role', $role);
        }

        // Executa a query e obtém os usuários
        $users = $users->get();

        // Retorna a view passando os usuários e o papel filtrado
        return view('admin.users.index', compact('users', 'role'));
    }

    // Exibe o formulário/modal de edição de um usuário específico
    public function edit(User $user)
    {
        // Retorna a view para editar o usuário
        return view('admin.users.modal', compact('user'));
    }

    // Atualiza os dados de um usuário no banco
    public function update(Request $request, User $user)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,provedor,membro',
        ]);

        // Atualiza apenas os campos validados
        $user->update($request->only('name', 'email', 'role'));

        // Redireciona para a listagem com mensagem de sucesso
        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Remove um usuário do sistema
    public function destroy($id)
    {
        // Busca o usuário pelo ID informado
        $user = User::findOrFail($id);

        // Deleta o usuário do banco
        $user->delete();

        // Redireciona para a listagem com mensagem de sucesso
        return redirect()->route('admin.users.index')->with('message', 'Usuário excluído com sucesso!');
    }
}