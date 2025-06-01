@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Gerenciamento de Planos</h1>

    <table id="datatables" class="min-w-full bg-white rounded-lg shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nome</th>
                <th class="py-2 px-4 border-b">Descrição</th>
                <th class="py-2 px-4 border-b">Velocidade</th>
                <th class="py-2 px-4 border-b">Preço</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plans as $plan)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ $plan->id }}</td>
                <td class="py-2 px-4 border-b">{{ $plan->nome }}</td>
                <td class="py-2 px-4 border-b">{{ $plan->descricao }}</td>
                <td class="py-2 px-4 border-b">{{ $plan->velocidade }} Mbps</td>
                <td class="py-2 px-4 border-b">R$ {{ number_format($plan->preco, 2, ',', '.') }}</td>
                <td class="py-2 px-4 border-b">
                    @if ($plan->status == 1)
                        <span class="text-green-600 font-semibold">Ativo</span>
                    @else
                        <span class="text-red-600 font-semibold">Inativo</span>
                    @endif
                </td>
                <td class="py-2 px-4 border-b space-x-2 flex">
                    <button type="button"
                        class="flex items-center justify-center gap-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded shadow transition"
                        style="height: 50px;"
                        data-bs-toggle="modal"
                        data-bs-target="#editPlanModal"
                        data-id="{{ $plan->id }}"
                        data-nome="{{ $plan->nome }}"
                        data-descricao="{{ $plan->descricao }}"
                        data-velocidade="{{ $plan->velocidade }}"
                        data-preco="{{ $plan->preco }}"
                        data-status="{{ $plan->status }}">
                        <i class="bi bi-pencil-fill"></i>
                    </button>

                    <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este plano?');" class="inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center justify-center gap-1 bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded shadow transition"
                            style="height: 50px;">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
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