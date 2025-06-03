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
    </div>
    @endif
    <!-- FIM ALERTA -->

    <div class="flex justify-between items-center px-4 pt-4">
        <h1 class="text-2xl font-bold">Planos de Internet</h1>
        
        <!-- Botão -->
        <button
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition"
            data-bs-toggle="modal"
            data-bs-target="#planModal"
            wire:click="create">
            <i class="bi bi-plus-lg me-2"></i> Novo Plano
        </button>
    </div>

    <div class="table-responsive text-nowrap p-5">
        <table id="datatables" class="table text-center">
            <thead>
                <tr>
                    <th class="text-center">Plano</th>
                    <th class="text-center">Velocidade</th>
                    <th class="text-center">Preço</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Ações</th>
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
                        <td colspan="5" class="text-center">Nenhum plano registrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="m-3 text-center">
        {{ $plans->links() }}
    </div>

    @include('livewire.plan.modal')
</div>
