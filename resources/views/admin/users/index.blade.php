@extends('layouts.app')

@section('title', 'Gerenciamento de Usuários')

@section('content')
<div class="container mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6">Gerenciamento de Usuários</h1>

  @if(!empty($role))
      <div class="mb-4 p-3 bg-yellow-100 border border-yellow-300 text-yellow-800 rounded">
          Filtro aplicado: <strong>{{ ucfirst($role) }}</strong>
          <a href="{{ route('admin.users.index') }}" class="ml-4 text-blue-500 hover:underline">Remover Filtro</a>
      </div>
  @endif

  <table id="datatables" class="min-w-full bg-white rounded-lg shadow">
    <thead>
      <tr>
        <th class="py-3 px-4 border-b text-center">ID</th>
        <th class="py-3 px-4 border-b text-center">Nome</th>
        <th class="py-3 px-4 border-b text-center">Email</th>
        <th class="py-3 px-4 border-b text-center">Perfil</th>
        <th class="py-3 px-4 border-b text-center">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr class="hover:bg-gray-100">
        <td class="py-3 px-4 border-b text-center">{{ $user->id }}</td>
        <td class="py-3 px-4 border-b text-center">{{ $user->name }}</td>
        <td class="py-3 px-4 border-b text-center">{{ $user->email }}</td>
        <td class="py-3 px-4 border-b text-center">{{ $user->role ?? 'N/A' }}</td>
        <td class="py-3 px-4 border-b">
          <div class="flex justify-center items-center gap-2">
              <button type="button" 
                  class="inline-flex items-center justify-center text-white font-semibold rounded-md transition"
                  style="width: 40px; height: 40px; background-color: #02afd0;"
                  data-bs-toggle="modal"
                  data-bs-target="#editUserModal"
                  data-id="{{ $user->id }}"
                  data-name="{{ $user->name }}"
                  data-email="{{ $user->email }}"
                  data-role="{{ $user->role }}"
                  onmouseover="this.style.backgroundColor='#029cb7'"
                  onmouseout="this.style.backgroundColor='#02afd0'">
                  <i class="bi bi-pencil-fill text-lg"></i>
              </button>
      
              <button type="button"
                  class="inline-flex items-center justify-center text-white font-semibold rounded-md transition"
                  style="width: 40px; height: 40px; background-color: #dc3545;"
                  title="Excluir"
                  onclick="showConfirmToast({{ $user->id }}, '{{ $user->nome }}')"
                  onmouseover="this.style.backgroundColor='#bb2d3b'"
                  onmouseout="this.style.backgroundColor='#dc3545'">
                  <i class="bi bi-trash-fill text-lg"></i>
              </button>
          </div>
      </td>
                 
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('admin.users.modal')
@endsection

<!-- Toast de Confirmação -->
<div class="toast-container position-fixed top-25 end-0 p-3" style="top: 20%; z-index: 1050;">
  <div id="confirmToast" class="toast bg-white text-dark" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-white text-dark">
          <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
          <strong class="me-auto px-2 py-1 rounded" style="background-color: #dc3545; color: #fff;">Confirmação</strong>
          <button type="button" class="btn-close" onclick="hideConfirmToast()" aria-label="Fechar"></button>
          </div>
          <div class="toast-body">
          <span id="confirmMessage"></span>
          <div class="mt-2 d-flex justify-content-end">
              <button type="button" class="btn btn-sm me-2" 
              style="background-color: #02afd0; color: white; border: none;" 
              onclick="hideConfirmToast()">Cancelar</button>        
              <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion()">Confirmar</button>
          </div>
      </div>
  </div>
</div>
  
<!-- Toast de Sucesso -->
@if (session()->has('success'))
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
  <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
          <div class="toast-body">
              <i class="bi bi-check-circle-fill me-2"></i>
              {{ session('success') }}
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
  </div>
</div>
@endif

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // -------------------- MODAL DE EDIÇÃO --------------------
    var editUserModal = document.getElementById('editUserModal');
    if (editUserModal) {
      editUserModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var id = button.getAttribute('data-id');
        var name = button.getAttribute('data-name');
        var email = button.getAttribute('data-email');
        var role = button.getAttribute('data-role');

        editUserModal.querySelector('#modalName').value = name;
        editUserModal.querySelector('#modalEmail').value = email;
        editUserModal.querySelector('#modalRole').value = role;

        var form = editUserModal.querySelector('#editUserForm');
        form.action = `/admin/users/${id}`;
      });
    }

    // -------------------- TOAST DE CONFIRMAÇÃO DE EXCLUSÃO --------------------
    let deleteUserId = null;

    window.showConfirmToast = function(id, name) {
      deleteUserId = id;
      document.getElementById('confirmMessage').innerText = `Deseja excluir o usuário "${name}"?`;

      const toastEl = document.getElementById('confirmToast');
      new bootstrap.Toast(toastEl).show();
    }

    window.hideConfirmToast = function() {
      const toastEl = document.getElementById('confirmToast');
      const toast = bootstrap.Toast.getInstance(toastEl);
      if (toast) {
        toast.hide();
      }
    }

    window.confirmDeletion = function() {
      hideConfirmToast();

      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/admin/users/${deleteUserId}`;

      const token = document.createElement('input');
      token.type = 'hidden';
      token.name = '_token';
      token.value = '{{ csrf_token() }}';

      const method = document.createElement('input');
      method.type = 'hidden';
      method.name = '_method';
      method.value = 'DELETE';

      form.appendChild(token);
      form.appendChild(method);

      document.body.appendChild(form);
      form.submit();
    }
  });
</script>
