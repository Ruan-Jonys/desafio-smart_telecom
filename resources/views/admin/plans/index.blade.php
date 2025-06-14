@extends('layouts.app')

@section('title', 'Gerenciamento de Planos')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Gerenciamento de Planos</h1>

    {{-- Exibe aviso de filtro aplicado, se existir --}}
    @if(!empty($status))
        <div class="mb-4 p-3 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded">
            Filtro aplicado: <strong>{{ ucfirst($status) }}</strong>
            <a href="{{ route('admin.plans.index') }}" class="ml-4 text-blue-500 hover:underline">Remover Filtro</a>
        </div>
    @endif

    {{-- Tabela de planos --}}
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
            {{-- Loop pelos planos --}}
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
                        {{-- Botão editar: preenche modal com dados do plano --}}
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
                        {{-- Botão excluir: abre toast de confirmação --}}
                        <button type="button"
                            class="inline-flex items-center justify-center text-white font-semibold rounded-md transition"
                            style="width: 40px; height: 40px; background-color: #dc3545;"
                            title="Excluir"
                            onclick="showConfirmToast({{ $plan->id }}, '{{ $plan->nome }}')"
                            onmouseover="this.style.backgroundColor='#bb2d3b'"
                            onmouseout="this.style.backgroundColor='#dc3545'">
                            <i class="bi bi-trash-fill text-lg"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Inclui o modal de edição de plano --}}
@include('admin.plans.modal')

@endsection

<!-- Toast de Confirmação de exclusão -->
<div class="toast-container position-fixed top-25 end-0 p-3" style="top: 20%; z-index: 1050;">
    <div id="confirmToast" class="toast bg-white text-dark" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-white text-dark">
            <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
            <strong class="me-auto px-2 py-1 rounded" style="background-color: #dc3545; color: #fff;">Confirmação</strong>
            <button type="button" class="btn-close" onclick="hideConfirmToast()" aria-label="Fechar"></button>
            </div>
            <div class="toast-body">
            <span id="confirmMessage"></span>
            <div class="mt-2 d-flex justify-content-end">
                <button type="button" class="btn btn-sm me-2" 
                style="background-color: #02afd0; color: white; border: none;" 
                onclick="hideConfirmToast()">Cancelar</button>        
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion()">Confirmar</button>
            </div>
        </div>
    </div>
</div>
    
<!-- Toast de Sucesso após ação -->
@if (session()->has('success'))
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // MODAL DE EDIÇÃO DE PLANO
        var editPlanModal = document.getElementById('editPlanModal');
        if (editPlanModal) {
            editPlanModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;

                // Obtém os dados do plano do botão
                var id = button.getAttribute('data-id');
                var nome = button.getAttribute('data-nome');
                var descricao = button.getAttribute('data-descricao');
                var velocidade = button.getAttribute('data-velocidade');
                var preco = button.getAttribute('data-preco');
                var status = button.getAttribute('data-status');

                // Preenche os campos do modal com os dados do plano
                editPlanModal.querySelector('#modalNome').value = nome;
                editPlanModal.querySelector('#modalDescricao').value = descricao;
                editPlanModal.querySelector('#modalVelocidade').value = velocidade;
                editPlanModal.querySelector('#modalPreco').value = preco;
                editPlanModal.querySelector('#modalStatus').value = status;

                // Atualiza a action do formulário para enviar para o plano correto
                var form = editPlanModal.querySelector('#editPlanForm');
                form.action = `/admin/plans/${id}`;
            });
        }
    });

    // Variável global para armazenar o ID do plano a ser excluído
    let deletePlanId = null;

    // Mostra o toast de confirmação de exclusão, armazena o ID do plano
    function showConfirmToast(id, name) {
        deletePlanId = id;
        document.getElementById('confirmMessage').innerText = `Deseja excluir o plano "${name}"?`;

        const toastEl = document.getElementById('confirmToast');
        new bootstrap.Toast(toastEl).show();
    }

    // Esconde o toast de confirmação
    function hideConfirmToast() {
        const toastEl = document.getElementById('confirmToast');
        const toast = bootstrap.Toast.getInstance(toastEl);
        if (toast) {
            toast.hide();
        }
    }

    // Confirma a exclusão: cria e envia um formulário DELETE dinamicamente
    function confirmDeletion() {
        hideConfirmToast();

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/plans/${deletePlanId}`;

        // Adiciona o token CSRF
        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = '{{ csrf_token() }}';

        // Adiciona o spoof do método DELETE
        const method = document.createElement('input');
        method.type = 'hidden';
        method.name = '_method';
        method.value = 'DELETE';

        form.appendChild(token);
        form.appendChild(method);

        document.body.appendChild(form);
        form.submit();
    }
</script>