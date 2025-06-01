@extends('layouts.app')

@section('content')
<div class="flex justify-center py-12 bg-gray-50 min-h-screen">
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-xl p-10">
        <h1 class="text-4xl font-bold mb-10 text-center">Painel de Administração</h1>

        <p class="text-gray-700 mb-12 text-center">
            Bem-vindo, <strong>{{ auth()->user()->name }}</strong>! Você está logado como <span class="text-blue-600 font-semibold">Administrador</span>.
        </p>

        {{-- Estatísticas --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-indigo-600 text-white rounded-lg p-4 shadow-md transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <i class="bi bi-people-fill text-3xl"></i>
                <h2 class="text-md font-semibold text-center flex-1">Usuários</h2>
                <p class="text-2xl font-bold">{{ $totalUsers }}</p>
            </div>

            <div class="bg-green-600 text-white rounded-lg p-4 shadow-md transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <i class="bi bi-person-badge-fill text-3xl"></i>
                <h2 class="text-md font-semibold text-center flex-1">Administradores</h2>
                <p class="text-2xl font-bold">{{ $adminCount }}</p>
            </div>

            <div class="bg-yellow-500 text-white rounded-lg p-4 shadow-md transform hover:scale-105 transition duration-300 flex items-center justify-between">
                <i class="bi bi-card-checklist text-3xl"></i>
                <h2 class="text-md font-semibold text-center flex-1">Planos Ativos</h2>
                <p class="text-2xl font-bold">{{ $totalActivePlans }}</p>
            </div>
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
                backgroundColor: ['#4ade80', '#60a5fa', '#facc15'],
                borderWidth: 1
            }]
        },
        options: { responsive: true, cutout: '70%' }
    });

    // Gráfico: Planos por Status
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'bar',
        data: {
            labels: ['Ativos', 'Inativos'],
            datasets: [{
                label: 'Planos',
                data: [{{ $totalActivePlans }}, {{ $totalInactivePlans }}],
                backgroundColor: ['#34d399', '#f87171']
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });


    // Gráfico: Planos por Velocidade
    const planSpeedCtx = document.getElementById('planSpeedChart').getContext('2d');
    new Chart(planSpeedCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($planSpeeds) !!}, // ['50Mbps', '100Mbps', ...]
            datasets: [{
                label: 'Planos',
                data: {!! json_encode($planSpeedCounts) !!}, // [5, 10, ...]
                backgroundColor: '#818cf8'
            }]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
</script>
@endsection
