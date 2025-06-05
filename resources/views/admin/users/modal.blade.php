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

  /* Bordas e arredondamento para inputs, textarea e select */
  input.form-control, textarea.form-control, select.form-control {
    border: 2px solid #02afd0;
    border-radius: 0.375rem; /* Arredondamento igual ao Tailwind md */
  }

  /* Foco azul nos campos */
  input.form-control:focus, textarea.form-control:focus, select.form-control:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(2, 175, 208, 0.5);
    border-color: #02afd0;
  }

  /* Modal */
  #editUserModal .modal-content {
    border-radius: 0.5rem;
    box-shadow: 0 0 15px rgb(0 0 0 / 0.15);
  }

  #editUserModal .modal-header {
    background: #02afd0;
    color: white;
    border-bottom: 1px solid #02afd0;
  }

  #editUserModal .modal-title {
    font-size: 1.25rem;
    font-weight: 600;
  }

  #editUserModal .btn-close {
    filter: brightness(0) invert(1); /* X branco */
  }

  #editUserModal .modal-body {
    padding: 1rem 1.5rem;
  }

  #editUserModal .mb-3 {
    margin-bottom: 1rem;
  }

  #editUserModal .modal-footer {
    background-color: #f3f4f6;
    border-top: 1px solid #ddd;
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
  }

  #editUserModal .btn-danger {
    background-color: #dc2626;
    border: none;
    padding: 0.5rem 1rem;
    font-weight: 600;
    border-radius: 0.375rem;
    transition: background-color 0.2s;
  }

  #editUserModal .btn-danger:hover {
    background-color: #b91c1c;
  }

  #editUserModal .btn-primary {
    background-color: #02afd0;
    border: none;
    padding: 0.5rem 1rem;
    font-weight: 600;
    border-radius: 0.375rem;
    color: white;
    transition: opacity 0.2s;
  }

  #editUserModal .btn-primary:hover {
    opacity: 0.9;
  }
</style>

<!-- Modal Editar Usuário -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-lg shadow-lg">

      <form id="editUserForm" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-header border-b">
          <h5 class="modal-title" id="editUserModalLabel">Editar Usuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>

        <div class="modal-body p-4 space-y-4">
          <div>
            <label for="modalName" class="form-label font-medium">Nome</label>
            <input type="text" name="name" id="modalName" class="form-control" required placeholder="Nome do usuário">
          </div>

          <div>
            <label for="modalEmail" class="form-label font-medium">Email</label>
            <input type="email" name="email" id="modalEmail" class="form-control" required placeholder="email@exemplo.com">
          </div>

          <div>
            <label for="modalRole" class="form-label font-medium">Perfil</label>
            <select name="role" id="modalRole" class="form-control" required>
              <option value="admin">Administrador</option>
              <option value="provedor">Provedor</option>
              <option value="membro">Membro</option>
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
  // Exemplo: abrir modal e preencher dados do usuário
  const editUserModal = document.getElementById('editUserModal');
  const modalName = document.getElementById('modalName');
  const modalEmail = document.getElementById('modalEmail');
  const modalRole = document.getElementById('modalRole');
  const editUserForm = document.getElementById('editUserForm');

  // Função para abrir modal com dados do usuário
  // Recebe um objeto user { id, name, email, role, updateUrl }
  function openEditUserModal(user) {
    modalName.value = user.name || '';
    modalEmail.value = user.email || '';
    modalRole.value = user.role || 'membro';

    // Atualiza a action do form para a rota correta de update
    if(user.updateUrl) {
      editUserForm.action = user.updateUrl;
    }

    // Abre o modal usando o Bootstrap 5 JS API
    const modal = new bootstrap.Modal(editUserModal);
    modal.show();
  }

</script>
