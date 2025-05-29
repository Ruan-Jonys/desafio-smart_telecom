<!-- Modal Editar Usuário -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <form id="editUserForm" method="POST">
          @csrf
          @method('PUT')
  
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel">Editar Usuário</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
  
          <div class="modal-body">
            <div class="mb-3">
              <label for="modalName" class="form-label">Nome</label>
              <input type="text" name="name" id="modalName" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="modalEmail" class="form-label">Email</label>
              <input type="email" name="email" id="modalEmail" class="form-control" required>
            </div>
  
            <div class="mb-3">
              <label for="modalRole" class="form-label">Perfil</label>
              <select name="role" id="modalRole" class="form-select @error('role') is-invalid @enderror" required>
                <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="provedor" {{ old('role', $user->role ?? '') === 'provedor' ? 'selected' : '' }}>Provedor</option>
                <option value="membro" {{ old('role', $user->role ?? '') === 'membro' ? 'selected' : '' }}>Membro</option>
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
  