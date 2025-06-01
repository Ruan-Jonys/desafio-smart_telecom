<div class="card m-5">

   <!-- ALERTA FLUTUANTE -->
   @if (session()->has('message'))
    <div 
        class="alert alert-success alert-dismissible fade show d-flex align-items-center justify-content-between"
        role="alert"
        style="position: fixed; top: 20px; right: 20px; z-index: 1050; min-width: 250px;">
        
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            <span>{{ session('message') }}</span>
        </div>

        <button 
            type="button" 
            class="btn-close ms-2" 
            data-bs-dismiss="alert" 
            aria-label="Close"
            style="transform: scale(0.4); padding-bottom: 6px">
        </button>
    </div>
    @endif
    <!-- FIM ALERTA -->


    <h1 class="text-2xl font-bold mb-6 px-4 pt-4">Planos de Internet</h1>

    <div class="table-responsive text-nowrap p-5">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>Plano</th>
                    <th>Velocidade</th>
                    <th>Preço</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($plans as $plan)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $plan->nome }}</span>
                            @if($plan->descricao)
                                <br><small class="text-muted">{{ $plan->descricao }}</small>
                            @endif
                        </td>
                        <td>{{ $plan->velocidade }} Mbps</td>
                        <td>R$ {{ number_format($plan->preco, 2, ',', '.') }}</td>
                        <td>
                            @if($plan->status)
                                <span class="badge bg-label-success">Ativo</span>
                            @else
                                <span class="badge bg-label-secondary">Inativo</span>
                            @endif
                        </td>
                        <td>
                            <button 
                                wire:click.prevent="edit({{ $plan->id }})"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-3 rounded-md transition me-2"
                                title="Editar"
                                data-bs-toggle="modal"
                                data-bs-target="#planModal">
                                <i class="bi bi-pencil-fill"></i>
                            </button>

                            <button 
                                onclick="if(confirm('Tem certeza que vai excluir o plano {{ $plan->nome }}?')) @this.call('delete', {{ $plan->id }})" 
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-3 rounded-md transition"
                                title="Excluir">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Nenhum plano registrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="m-3 text-center">
        {{ $plans->links() }}
    </div>

    <!-- Botão Flutuante -->
    <button
        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-3 rounded-md transition me-2 rounded-circle"
        style="position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.3);"
        data-bs-toggle="modal"
        data-bs-target="#planModal"
        wire:click="create">
        <i class="bi bi-plus-lg" style="font-size: 1.5rem;"></i>
    </button>

    @include('livewire.plan.modal')
</div>
