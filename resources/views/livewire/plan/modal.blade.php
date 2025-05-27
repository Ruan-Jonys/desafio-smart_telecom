<!-- Modal -->
<div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title" id="planModalLabel">
          {{ $isEdit ? 'Editar Plano' : 'Novo Plano' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        
        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input type="text" wire:model.defer="nome" class="form-control" placeholder="Nome do plano">
          @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
          <label class="form-label">Descrição</label>
          <textarea wire:model.defer="descricao" class="form-control" placeholder="Descrição do plano"></textarea>
          @error('descricao') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Velocidade (Mbps)</label>
          <input type="number" wire:model.defer="velocidade" class="form-control" placeholder="Ex: 100">
          @error('velocidade') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        
        <div class="mb-3">
          <label class="form-label">Preço (R$)</label>
          <input type="number" step="0.01" wire:model.defer="preco" class="form-control" placeholder="Ex: 99,99">
          @error('preco') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Cancelar
        </button>
        <button type="button" class="btn btn-primary" wire:click="save">
          Salvar
        </button>
      </div>
    
    </div>
  </div>
</div>