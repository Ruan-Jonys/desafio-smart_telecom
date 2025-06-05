@extends('layouts.app')

@section('title', 'Gerenciamento de Planos')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Gerenciamento de Planos</h1>

    @if(!empty($status))
        <div class="mb-4 p-3 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded">
            Filtro aplicado: <strong>{{ ucfirst($status) }}</strong>
            <a href="{{ route('admin.plans.index') }}" class="ml-4 text-blue-500 hover:underline">Remover Filtro</a>
        </div>
    @endif

    <table id="datatables" class="min-w-full bg-white rounded-lg shadow">
        <thead>
            <tr>
                <th class="py-3 px-4 border-b text-center">ID</th>
                <th class="py-3 px-4 border-b text-center">Nome</th>
                <th class="py-3 px-4 border-b text-center">Descrição</th>
                <th class="py-3 px-4 border-b text-center">Velocidade</th>
                <th class="py-3 px-4 border-b text-center">Preço</th>
                <th class="py-3 px-4 border-b text-center">Status</th>
                <th class="py-3 px-4 border-b text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
            <tr class="hover:bg-gray-100">
                <td class="py-3 px-4 border-b text-center">{{ $plan->id }}</td>
                <td class="py-3 px-4 border-b text-center">{{ $plan->nome }}</td>
                <td class="py-3 px-4 border-b text-center">{{ $plan->descricao }}</td>
                <td class="py-3 px-4 border-b text-center">{{ $plan->velocidade }} Mbps</td>
                <td class="py-3 px-4 border-b text-center">R$ {{ number_format($plan->preco, 2, ',', '.') }}</td>
                <td class="py-3 px-4 border-b text-center">
                    @if ($plan->status == 1)
                        <span class="text-green-600 font-semibold">Ativo</span>
                    @else
                        <span class="text-red-600 font-semibold">Inativo</span>
                    @endif
                </td>
                <td class="py-3 px-4 border-b">
                    <div class="flex justify-center items-center gap-2">
                        <button type="button"
                            class="inline-flex items-center justify-center text-white font-semibold rounded-md transition"
                            style="width: 40px; height: 40px; background-color: #02afd0;"
                            data-bs-toggle="modal"
                            data-bs-target="#editPlanModal"
                            data-id="{{ $plan->id }}"
                            data-nome="{{ $plan->nome }}"
                            data-descricao="{{ $plan->descricao }}"
                            data-velocidade="{{ $plan->velocidade }}"
                            data-preco="{{ $plan->preco }}"
                            data-status="{{ $plan->status }}"
                            onmouseover="this.style.backgroundColor='#029cb7'"
                            onmouseout="this.style.backgroundColor='#02afd0'">
                            <i class="bi bi-pencil-fill text-lg"></i>
                        </button>
                
                        <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST"
                              onsubmit="return confirm('Tem certeza que deseja excluir este plano?');"
                              class="inline-flex items-center justify-center m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium rounded shadow transition"
                                style="width: 40px; height: 40px;">
                                <i class="bi bi-trash-fill text-lg"></i>
                            </button>
                        </form>
                    </div>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('admin.plans.modal')

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editPlanModal = document.getElementById('editPlanModal');
        editPlanModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;

            // Pega os dados do botão
            var id = button.getAttribute('data-id');
            var nome = button.getAttribute('data-nome');
            var descricao = button.getAttribute('data-descricao');
            var velocidade = button.getAttribute('data-velocidade');
            var preco = button.getAttribute('data-preco');
            var status = button.getAttribute('data-status');

            // Preenche os campos do modal
            editPlanModal.querySelector('#modalNome').value = nome;
            editPlanModal.querySelector('#modalDescricao').value = descricao;
            editPlanModal.querySelector('#modalVelocidade').value = velocidade;
            editPlanModal.querySelector('#modalPreco').value = preco;
            editPlanModal.querySelector('#modalStatus').value = status;

            // Ajusta a action do form para o ID correto
            var form = editPlanModal.querySelector('#editPlanForm');
            form.action = `/admin/plans/${id}`;
        });
    });
</script>