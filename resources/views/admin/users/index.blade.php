@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Gerenciar Usuários</h1>

    <table id="users-table" class="min-w-full bg-white rounded-lg shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Perfil</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ $user->role ?? 'N/A' }}</td>
                <td class="py-2 px-4 border-b space-x-2 flex">
                    <a href="{{ route('admin.users.edit', $user->id) }}"
                       class="flex items-center gap-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded shadow transition">
                        <!-- Ícone de edição -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 5h2m1 0h5a2 2 0 012 2v5m0 0v5a2 2 0 01-2 2h-5m0 0h-5a2 2 0 01-2-2v-5m0 0V7a2 2 0 012-2h5m-5 0V5" />
                        </svg>
                        Editar
                    </a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" 
                          onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');" 
                          class="inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded shadow transition">
                            <!-- Ícone de lixeira -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                            </svg>
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection