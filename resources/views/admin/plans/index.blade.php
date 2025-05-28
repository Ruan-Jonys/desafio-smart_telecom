@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Gerenciar Planos</h1>

    <table class="min-w-full bg-white rounded-lg shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Descrição</th>
                <th class="py-2 px-4 border-b">Velocidade</th>
                <th class="py-2 px-4 border-b">Preço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ $plan->id }}</td>
                <td class="py-2 px-4 border-b">{{ $plan->nome }}</td>
                <td class="py-2 px-4 border-b">{{ $plan->descricao }}</td>
                <td class="py-2 px-4 border-b">{{ $plan->velocidade }}</td>
                <td class="py-2 px-4 border-b">R$ {{ number_format($plan->preco, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
