@extends('layouts.app')

@section('content')

  <!-- Hero Section -->
  <section class="relative bg-cover bg-center text-white py-20 text-center" style="background-image: url('/assets/img/backgrounds/hero-background.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div> <!-- overlay escuro -->
    
    <div class="relative container mx-auto">
        <h2 class="text-4xl font-bold mb-4">Gestão de Provedores de Internet</h2>
        <p class="mb-6 text-lg">Simplifique a administração de planos, usuários e contratos com facilidade.</p>
        
        <a href="/login" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded mr-2 transition">
            <i class="bi bi-box-arrow-in-right me-2"></i> Entrar
        </a>
        
        <a href="/register" class="inline-block px-6 py-3 border border-white hover:bg-white hover:text-black text-white font-semibold rounded">
            Cadastrar
        </a>
    </div>
</section>

  <!-- Sobre o Sistema -->
  <section class="py-16">
    <div class="container mx-auto text-center">
      <h3 class="text-2xl font-bold mb-6">Por que usar nosso sistema?</h3>
      <p class="max-w-2xl mx-auto">Oferecemos uma plataforma completa para provedores de internet gerenciarem seus planos, gerarem contratos automaticamente e acompanharem estatísticas em tempo real.</p>
    </div>
  </section>

  <!-- Funcionalidades -->
  <section id="funcionalidades" class="py-16 bg-gray-200">
    <div class="container mx-auto text-center">
      <h3 class="text-2xl font-bold mb-8">Funcionalidades</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
          <h4 class="text-xl font-semibold mb-2">Login Seguro</h4>
          <p>Autenticação com validação e segurança.</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
          <h4 class="text-xl font-semibold mb-2">Cadastro de Provedores</h4>
          <p>Inclui validação automática via APIs de CNPJ e CEP.</p>
        </div>
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
          <h4 class="text-xl font-semibold mb-2">Gestão de Planos</h4>
          <p>Crie, edite e exclua planos com facilidade.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Call-to-Action -->
  <section class="py-16 text-center">
    <h3 class="text-2xl font-bold mb-4">Pronto para começar?</h3>
    <a href="/register" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded mr-2 transition">Cadastre-se agora</a>
  </section>

@endsection