@extends('layouts.app')

@section('title', 'Dasboard Admin')

@section('content')
<div class="flex justify-center py-12 bg-gray-50 min-h-screen">
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-xl p-10">
        <h1 class="text-4xl font-bold mb-10 text-center">Painel de Administração</h1>

        <p class="text-gray-700 mb-12 text-center">
            Bem-vindo, <strong>{{ auth()->user()->name }}</strong>! Você está logado como <span class="font-semibold" style="color: #02afd0">Administrador</span>.
        </p>

        {{-- Botões de Acesso --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <a href="{{ route('admin.users.index', ['role' => 'provedor']) }}" class="block">
                <div class="text-white rounded-lg p-6 shadow-md transform hover:scale-105 transition duration-300 flex items-center justify-between" style="background-color: #02afd0;">
                    <i class="bi bi-people-fill text-4xl"></i>
                    <h2 class="text-xl font-semibold text-center flex-1">Provedores</h2>
                    <p class="text-3xl font-bold">{{ $totalUsers }}</p>
                </div>
            </a>
            

            <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" class="block">
                <div class="text-white rounded-lg p-6 shadow-md transform hover:scale-105 transition duration-300 flex items-center justify-between" style="background-color: #4C808F">
                    <i class="bi bi-person-badge-fill text-4xl"></i>
                    <h2 class="text-xl font-semibold text-center flex-1">Administradores</h2>
                    <p class="text-3xl font-bold">{{ $adminCount }}</p>
                </div>
            </a>

            <a href="{{ route('admin.plans.index', ['status' => 'ativo']) }}" class="block">
                <div class="text-white rounded-lg p-6 shadow-md transform hover:scale-105 transition duration-300 flex items-center justify-between" style="background-color: #005466">
                    <i class="bi bi-card-checklist text-4xl"></i>
                    <h2 class="text-xl font-semibold text-center flex-1">Planos Ativos</h2>
                    <p class="text-3xl font-bold">{{ $totalActivePlans }}</p>
                </div>
            </a>
        </div>

        


        {{-- Gráficos --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Distribuição de Usuários por Tipo --}}
            <div class="bg-gray-100 rounded-lg p-6 shadow-md">
                <h3 class="text-xl font-semibold mb-4">Usuários por Tipo</h3>
                <canvas id="userTypeChart" height="200"></canvas>
            </div>

            {{-- Planos por Status --}}
            <div class="bg-gray-100 rounded-lg p-6 shadow-md">
                <h3 class="text-xl font-semibold mb-4">Planos por Status</h3>
                <canvas id="planStatusChart" height="200"></canvas>
            </div>

            {{-- Planos por Velocidade --}}
            <div class="bg-gray-100 rounded-lg p-6 shadow-md">
                <h3 class="text-xl font-semibold mb-4">Planos por Velocidade</h3>
                <canvas id="planSpeedChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico: Distribuição de usuários por tipo
    const userTypeCtx = document.getElementById('userTypeChart').getContext('2d');
    new Chart(userTypeCtx, {
        type: 'doughnut',
        data: {
            labels: ['Administradores', 'Provedores', 'Outros'],
            datasets: [{
                data: [{{ $adminCount }}, {{ $provedorCount }}, {{ $totalUsers - $adminCount - $provedorCount }}],
                backgroundColor: ['#4C808F', '#02afd0', '#005466'],
                borderWidth: 1
            }]
        },
        options: { responsive: true, cutout: '70%' }
    });

    // Gráfico: Planos por Status
    const statusCtx = document.getElementById('planStatusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['Ativos', 'Inativos'],
            datasets: [{
                label: 'Planos',
                data: [{{ $totalActivePlans }}, {{ $totalInactivePlans }}],
                backgroundColor: ['#4C808F', '#005466']
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });

    // Gráfico: Planos por Velocidade
    const planSpeedCtx = document.getElementById('planSpeedChart').getContext('2d');
    new Chart(planSpeedCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($planSpeeds) !!},
            datasets: [{
                label: 'Planos',
                data: {!! json_encode($planSpeedCounts) !!},
                backgroundColor: '#005466'
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
</script>
@endsection
