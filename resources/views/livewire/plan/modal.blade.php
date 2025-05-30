<!-- Modal -->
<div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-lg shadow-lg">

      <div class="modal-header bg-gray-100 border-b">
        <h5 class="modal-title text-xl font-semibold" id="planModalLabel">
          {{ $isEdit ? 'Editar Plano' : 'Novo Plano' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-4 space-y-4">

        <div>
          <label class="form-label font-medium">Nome</label>
          <input type="text" wire:model.defer="nome" class="form-control" placeholder="Nome do plano">
          @error('nome') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
          <label class="form-label font-medium">Descrição</label>
          <textarea wire:model.defer="descricao" class="form-control" placeholder="Descrição do plano"></textarea>
          @error('descricao') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
          <label class="form-label font-medium">Velocidade (Mbps)</label>
          <input type="number" wire:model.defer="velocidade" class="form-control" placeholder="Ex: 100">
          @error('velocidade') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
          <label class="form-label font-medium">Preço (R$)</label>
          <input type="number" step="0.01" wire:model.defer="preco" class="form-control" placeholder="Ex: 99,99">
          @error('preco') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <div>
          <label class="form-label font-medium">Status</label>
          <select wire:model.defer="status" class="form-control">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
          </select>
          @error('status') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

      </div>

      <div class="modal-footer bg-gray-100 border-t flex justify-end space-x-2 p-3">
        <button 
            type="button" 
            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md transition" 
            data-bs-dismiss="modal">
            Cancelar
        </button>
        <button 
            type="button" 
            class="btn bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition shadow" 
            wire:click="save">
            Salvar
        </button>
      </div>

    </div>
  </div>
</div>