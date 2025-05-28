@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-3xl font-bold mb-6">Painel de Administração</h1>

        <p class="text-gray-700 mb-4">
            Bem-vindo, <strong>{{ auth()->user()->name }}</strong>! Você está logado como <span class="text-blue-600 font-semibold">Administrador</span>.
        </p>

        {{-- Estatísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-100 rounded-lg p-4 text-center">
                <h2 class="text-xl font-semibold">Usuários</h2>
                <p class="text-2xl">{{ $totalUsers }}</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 text-center">
                <h2 class="text-xl font-semibold">Administradores</h2>
                <p class="text-2xl">{{ $adminCount }}</p>
            </div>
            <div class="bg-gray-100 rounded-lg p-4 text-center">
                <h2 class="text-xl font-semibold">Planos</h2>
                <p class="text-2xl">{{ $totalPlans }}</p>
            </div>
        </div>

        {{-- Ações administrativas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('admin.users') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-4 rounded-lg text-center">
                Gerenciar Usuários
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('admin.plans') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 px-4 rounded-lg text-center">
                Gerenciar Planos
            </a>
        </div>
    </div>
</div>
@endsection