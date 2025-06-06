<div class="card m-5">

    {{-- Toast de sucesso ao salvar/editar/excluir plano --}}
    @if (session()->has('message'))
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('message') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="flex justify-between items-center px-4 pt-4">
        <h1 class="text-2xl font-bold">Planos de Internet</h1>
        
        <!-- Botão para abrir modal de novo plano -->
        <button
        class="text-white font-semibold py-2 px-4 rounded-md transition"
        data-bs-toggle="modal"
        data-bs-target="#planModal"
        wire:click="create"
        style="background-color: #02afd0;"
        onmouseover="this.style.backgroundColor='#029cb7'"
        onmouseout="this.style.backgroundColor='#02afd0'">
            <i class="bi bi-plus-lg me-2"></i> Novo Plano
        </button>
    </div>

    <div class="table-responsive text-nowrap p-5">
        <table id="datatables" class="table text-center">
            <thead>
                <tr>
                    <th class="py-3 px-4 border-b text-center">Plano</th>
                    <th class="py-3 px-4 border-b text-center">Velocidade</th>
                    <th class="py-3 px-4 border-b text-center">Preço</th>
                    <th class="py-3 px-4 border-b text-center">Status</th>
                    <th class="py-3 px-4 border-b text-center">Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                {{-- Itera sobre os planos e exibe cada linha --}}
                @foreach($plans as $plan)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $plan->nome }}</span>
                            {{-- Exibe a descrição do plano como texto menor, se existir --}}
                            @if($plan->descricao)
                                <br><small class="text-muted">{{ $plan->descricao }}</small>
                            @endif
                        </td>
                        <td>{{ $plan->velocidade }} Mbps</td>
                        <td>R$ {{ number_format($plan->preco, 2, ',', '.') }}</td>
                        <td>
                            {{-- Badge de status do plano --}}
                            @if($plan->status)
                                <span class="badge bg-label-success">Ativo</span>
                            @else
                                <span class="badge bg-label-secondary">Inativo</span>
                            @endif
                        </td>
                        <td>
                            {{-- Botão para editar o plano (abre modal preenchido) --}}
                            <button 
                            wire:click.prevent="edit({{ $plan->id }})"
                            class="text-white font-semibold py-2 px-3 rounded-md transition me-2"
                            title="Editar"
                            data-bs-toggle="modal"
                            data-bs-target="#planModal"
                            style="background-color: #02afd0;"
                            onmouseover="this.style.backgroundColor='#029cb7'"
                            onmouseout="this.style.backgroundColor='#02afd0'">
                                <i class="bi bi-pencil-fill"></i>
                            </button>

                            <!-- Botão para excluir (abre toast de confirmação) -->
                            <button 
                            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-3 rounded-md transition"
                            title="Excluir"
                            onclick="showConfirmToast({{ $plan->id }}, '{{ $plan->nome }}')">
                            <i class="bi bi-trash-fill"></i>
                            </button>
  
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal para cadastro/edição de plano --}}
    @include('livewire.plan.modal')

    <!-- Toast de Confirmação para Exclusão -->
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
  
<script>
    // Armazena o ID do plano a ser excluído
    let deletePlanId = null;

    // Mostra o toast de confirmação, exibindo o nome do plano
    function showConfirmToast(id, name) {
        deletePlanId = id;
        document.getElementById('confirmMessage').innerText = `Deseja excluir o plano "${name}"?`;
        
        const toast = document.getElementById('confirmToast');
        toast.classList.add('show');
    }

    // Esconde o toast de confirmação
    function hideConfirmToast() {
        const toast = document.getElementById('confirmToast');
        toast.classList.remove('show');
    }

    // Ao confirmar, chama o método Livewire para excluir o plano e recarrega a página
    function confirmDeletion() {
        @this.call('delete', deletePlanId);
        hideConfirmToast();

        // Dá um delay para garantir que a exclusão foi processada antes do reload
        setTimeout(() => {
            location.reload();
        }, 500);
    }
</script>