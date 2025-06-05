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
                @foreach($plans as $plan)
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
                            class="text-white font-semibold py-2 px-3 rounded-md transition me-2"
                            title="Editar"
                            data-bs-toggle="modal"
                            data-bs-target="#planModal"
                            style="background-color: #02afd0;"
                            onmouseover="this.style.backgroundColor='#029cb7'"
                            onmouseout="this.style.backgroundColor='#02afd0'">
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
                @endforeach
            </tbody>
        </table>
    </div>

    @include('livewire.plan.modal')
</div>