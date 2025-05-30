<!-- Modal Editar Plano -->
<div class="modal fade" id="editPlanModal" tabindex="-1" aria-labelledby="editPlanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form id="editPlanForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editPlanModalLabel">Editar Plano</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="modalNome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="modalNome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="modalDescricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="modalDescricao" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="modalVelocidade" class="form-label">Velocidade (Mbps)</label>
                        <input type="number" name="velocidade" id="modalVelocidade" class="form-control" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="modalPreco" class="form-label">Preço (R$)</label>
                        <input type="number" step="0.01" name="preco" id="modalPreco" class="form-control" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="modalStatus" class="form-label">Status</label>
                        <select name="status" id="modalStatus" class="form-select" required>
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
