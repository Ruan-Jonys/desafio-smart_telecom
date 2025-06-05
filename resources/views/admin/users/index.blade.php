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
      
              <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');"
                    class="inline-flex items-center justify-center m-0 p-0">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                      class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white font-medium rounded shadow transition"
                      style="width: 40px; height: 40px;">
                      <i class="bi bi-trash-fill text-lg"></i>
                  </button>
              </form>
          </div>
      </td>
                 
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@include('admin.users.modal')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
      var editUserModal = document.getElementById('editUserModal');
      editUserModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
  
        var id = button.getAttribute('data-id');
        var name = button.getAttribute('data-name');
        var email = button.getAttribute('data-email');
        var role = button.getAttribute('data-role');
  
        var modalName = editUserModal.querySelector('#modalName');
        var modalEmail = editUserModal.querySelector('#modalEmail');
        var modalRole = editUserModal.querySelector('#modalRole');
        var form = editUserModal.querySelector('#editUserForm');
  
        modalName.value = name;
        modalEmail.value = email;
        modalRole.value = role;
  
        form.action = `/admin/users/${id}`;
      });
    });
  </script>