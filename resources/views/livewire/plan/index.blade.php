<div class="card" style="max-width: 900px; margin: 20px auto;">
    <h5 class="card-header text-center" style="font-weight: 900; font-size: 1.8rem; letter-spacing: 1px; padding: 1.2rem 0;">
        Planos de Internet
    </h5>

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

    <div class="table-responsive text-nowrap">
        <table class="table" style="border-collapse: collapse; width: 100%; border: 1px solid #ccc !important; box-shadow: none !important;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-weight: 700;">Nome</th>
                    <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-weight: 700;">Velocidade</th>
                    <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-weight: 700;">Preço</th>
                    <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-weight: 700;">Status</th>
                    <th style="border: 1px solid #ccc; padding: 8px; text-align: center; font-weight: 700;">Ação</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" style="border: 1px solid #ccc;">
                @foreach($plans as $plan)
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">
                            <strong>{{ $plan->nome }}</strong>
                            @if($plan->descricao)
                                <br><small class="text-muted">{{ $plan->descricao }}</small>
                            @endif
                        </td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">{{ $plan->velocidade }} Mbps</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">R$ {{ number_format($plan->preco, 2, ',', '.') }}</td>
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">
                            @if($plan->status)
                                <span class="badge bg-success">Ativo</span>
                            @else
                                <span class="badge bg-secondary">Inativo</span>
                            @endif
                        </td>                        
                        <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">
                            <button 
                                wire:click.prevent="edit({{ $plan->id }})"
                                class="btn btn-sm btn-primary me-2"
                                title="Edit"
                                data-bs-toggle="modal"
                                data-bs-target="#planModal">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button 
                                onclick="if(confirm('Tem certeza que vai excluir o plano {{ $plan->nome }}?')) @this.call('delete', {{ $plan->id }})" 
                                class="btn btn-sm btn-danger" 
                                title="Delete">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="m-3">
        {{ $plans->links() }}
    </div>

    <!-- Botão Flutuante -->
    <button
        class="btn btn-primary rounded-circle"
        style="position: fixed; bottom: 30px; right: 30px; width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0,0,0,0.3);"
        data-bs-toggle="modal"
        data-bs-target="#planModal"
        wire:click="create">
        <i class="bi bi-plus-lg" style="font-size: 1.5rem;"></i>
    </button>

    @include('livewire.plan.modal')
</div>