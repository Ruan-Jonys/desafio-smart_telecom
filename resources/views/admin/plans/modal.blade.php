<style>
    /* Remove as setas no Chrome, Safari, Edge */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  
    /* Remove as setas no Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  
    /* Define borda padrão para todos os inputs e textarea */
    input.form-control, textarea.form-control, select.form-control {
      border: 2px solid #02afd0;
      border-radius: 0.375rem; /* Arredondamento igual ao Tailwind md */
    }
  
    /* Para efeito de foco, opcional */
    input.form-control:focus, textarea.form-control:focus, select.form-control:focus {
      outline: none;
      box-shadow: 0 0 0 2px rgba(2, 175, 208, 0.5);
      border-color: #02afd0;
    }
  
    /* Estilização do modal */
    #editPlanModal .modal-content {
      border-radius: 0.5rem; /* arredondado */
      box-shadow: 0 0 15px rgb(0 0 0 / 0.15);
    }
  
    #editPlanModal .modal-header {
      background: #02afd0;
      color: white;
      border-bottom: 1px solid #02afd0;
    }
  
    #editPlanModal .modal-title {
      font-size: 1.25rem;
      font-weight: 600;
    }
  
    #editPlanModal .btn-close {
      filter: brightness(0) invert(1); /* para o X ficar branco */
    }
  
    #editPlanModal .modal-body {
      padding: 1rem 1.5rem;
    }
  
    #editPlanModal .mb-3 {
      margin-bottom: 1rem;
    }
  
    #editPlanModal .modal-footer {
      background-color: #f3f4f6; /* cinza claro */
      border-top: 1px solid #ddd;
      display: flex;
      justify-content: flex-end;
      gap: 0.5rem;
      padding: 1rem 1.5rem;
    }
  
    #editPlanModal .btn-danger {
      background-color: #dc2626;
      border: none;
      padding: 0.5rem 1rem;
      font-weight: 600;
      border-radius: 0.375rem;
      transition: background-color 0.2s;
    }
  
    #editPlanModal .btn-danger:hover {
      background-color: #b91c1c;
    }
  
    #editPlanModal .btn-primary {
      background-color: #02afd0;
      border: none;
      padding: 0.5rem 1rem;
      font-weight: 600;
      border-radius: 0.375rem;
      color: white;
      transition: opacity 0.2s;
    }
  
    #editPlanModal .btn-primary:hover {
      opacity: 0.9;
    }
  </style>
  
  <!-- Modal Editar Plano -->
  <div class="modal fade" id="editPlanModal" tabindex="-1" aria-labelledby="editPlanModalLabel" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content rounded-lg shadow-lg">
  
              <form id="editPlanForm" method="POST">
                  @csrf
                  @method('PUT')
  
                  <div class="modal-header border-b">
                      <h5 class="modal-title" id="editPlanModalLabel">Editar Plano</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                  </div>
  
                  <div class="modal-body p-4 space-y-4">
                      <div>
                          <label for="modalNome" class="form-label font-medium">Nome</label>
                          <input type="text" name="nome" id="modalNome" class="form-control" required placeholder="Nome do plano">
                      </div>
  
                      <div>
                          <label for="modalDescricao" class="form-label font-medium">Descrição</label>
                          <textarea name="descricao" id="modalDescricao" class="form-control resize-none" rows="3" required placeholder="Descrição do plano"></textarea>
                      </div>
  
                      <div>
                          <label for="modalVelocidade" class="form-label font-medium">Velocidade (Mbps)</label>
                          <input type="number" name="velocidade" id="modalVelocidade" class="form-control" min="1" step="1" inputmode="numeric" required placeholder="Ex: 100">
                      </div>
  
                      <div>
                          <label for="modalPreco" class="form-label font-medium">Preço (R$)</label>
                          <input type="text" name="preco" id="modalPreco" class="form-control" required placeholder="Ex: 99,99" oninput="formatarPreco(this)">
                      </div>
  
                      <div>
                          <label for="modalStatus" class="form-label font-medium">Status</label>
                          <select name="status" id="modalStatus" class="form-control" required>
                              <option value="1">Ativo</option>
                              <option value="0">Inativo</option>
                          </select>
                      </div>
                  </div>
  
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                  </div>
  
              </form>
          </div>
      </div>
  </div>
  
  <script>
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
  