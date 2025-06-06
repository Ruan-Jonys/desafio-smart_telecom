<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role');

        $users = User::query();

        if (!is_null($role)) {
            $users->where('role', $role);
        }

        $users = $users->get();

        return view('admin.users.index', compact('users', 'role'));
    }

    public function edit(User $user)
    {
        return view('admin.users.modal', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,provedor,membro',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'Usuário excluído com sucesso!');
    }
}