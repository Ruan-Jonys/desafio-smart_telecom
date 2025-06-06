<style>
  /* Remove as setas dos campos type=number nos principais browsers */
  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Remove as setas do input type=number no Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }

  /* Define borda padrão e arredondamento para os campos do formulário */
  input.form-control, textarea.form-control, select.form-control {
    border: 2px solid #02afd0;
    border-radius: 0.375rem; /* Arredondamento md do Tailwind */
  }

  /* Destaque azul ao focar nos campos */
  input.form-control:focus, textarea.form-control:focus, select.form-control:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(2, 175, 208, 0.5);
    border-color: #02afd0;
  }
</style>

<!-- Modal Livewire para criar/editar planos -->
<div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-lg shadow-lg">

      <!-- Cabeçalho do modal: muda o texto dependendo se é edição ou novo -->
      <div class="modal-header text-white border-b" style="background: #02afd0">
        <h5 class="modal-title text-xl font-semibold" id="planModalLabel">
          {{ $isEdit ? 'Editar Plano' : 'Novo Plano' }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-4 space-y-4">
        <!-- Campo Nome -->
        <div>
          <label class="form-label font-medium">Nome</label>
          <input type="text" wire:model.defer="nome" class="form-control" placeholder="Nome do plano">
          @error('nome') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Campo Descrição -->
        <div>
          <label class="form-label font-medium">Descrição</label>
          <textarea wire:model.defer="descricao" class="form-control resize-none" placeholder="Descrição do plano"></textarea>
          @error('descricao') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Campo Velocidade -->
        <div>
          <label class="form-label font-medium">Velocidade (Mbps)</label>
          <input 
            type="number" 
            min="0"
            step="1"
            inputmode="numeric"
            wire:model.defer="velocidade" 
            class="form-control" 
            placeholder="Ex: 100"
          >
          @error('velocidade') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>        

        <!-- Campo Preço -->
        <div>
          <label class="form-label font-medium">Preço (R$)</label>
          <input 
            type="text"
            wire:model.defer="preco" 
            class="form-control" 
            placeholder="Ex: 99,99"
            oninput="formatarPreco(this)"
          >
          @error('preco') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
        
        <!-- Campo Status -->
        <div>
          <label class="form-label font-medium">Status</label>
          <select wire:model.defer="status" class="form-control">
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
          </select>
          @error('status') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
        </div>
      </div>

      <!-- Rodapé do modal: botões de cancelar e salvar -->
      <div class="modal-footer bg-gray-100 border-t flex justify-end space-x-2 p-3">
        <button 
            type="button" 
            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md transition" 
            data-bs-dismiss="modal">
            Cancelar
        </button>
        <button 
          type="button" 
          class="btn text-white font-semibold py-2 px-4 rounded-md transition shadow hover:opacity-90" 
          wire:click="save"
          style="background-color: #02afd0;">
          Salvar
        </button>
      </div>

    </div>
  </div>
</div>

<script>
  // Função JS para formatar o campo de preço em tempo real
  function formatarPreco(input) {
      let valor = input.value;

      // Remove tudo que não for número ou vírgula
      valor = valor.replace(/[^\d,]/g, '');

      // Se já tiver vírgula, impede mais de uma
      const partes = valor.split(',');
      if (partes.length > 2) {
          valor = partes[0] + ',' + partes[1];
      }

      // Mantém no máximo duas casas decimais
      if (partes[1]) {
          partes[1] = partes[1].substring(0, 2);
          valor = partes[0] + ',' + partes[1];
      }

      input.value = valor;
  }
</script>