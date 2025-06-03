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
        <th class="py-2 px-4 border-b">ID</th>
        <th class="py-2 px-4 border-b">Nome</th>
        <th class="py-2 px-4 border-b">Email</th>
        <th class="py-2 px-4 border-b">Perfil</th>
        <th class="py-2 px-4 border-b">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr class="hover:bg-gray-100">
        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
        <td class="py-2 px-4 border-b">{{ $user->role ?? 'N/A' }}</td>
        <td class="py-2 px-4 border-b space-x-2 flex">
          <button type="button" 
          class="flex items-center justify-center gap-1 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-3 rounded-md transition me-2"
          style="height: 50px;"
          data-bs-toggle="modal"
          data-bs-target="#editUserModal"
          data-id="{{ $user->id }}"
          data-name="{{ $user->name }}"
          data-email="{{ $user->email }}"
          data-role="{{ $user->role }}">
          <i class="bi bi-pencil-fill"></i>
      </button>
          
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');" class="inline-flex">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="flex items-center justify-center gap-1 bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded shadow transition"
                      style="height: 50px;">
                <i class="bi bi-trash-fill"></i>
              </button>
            </form>
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