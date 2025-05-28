@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Editar Usuário</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Nome</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                   class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Perfil</label>
            <select name="role" class="w-full border p-2 rounded">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="provedor" {{ $user->role === 'provedor' ? 'selected' : '' }}>Provedor</option>
                <option value="membro" {{ $user->role === 'membro' ? 'selected' : '' }}>Membro</option>
            </select>
        </div>

        <button type="submit" 
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
    </form>
</div>
@endsection
