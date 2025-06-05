@extends('layouts.app')

@section('title', 'Início | Smart Telecom')

@section('content')

<!-- Banner -->
<section class="relative bg-cover bg-center text-white min-h-screen px-8 lg:px-24 flex items-center" style="background-image: url('/assets/img/backgrounds/banner.jpg');">

  <div class="relative max-w-2xl ml-10">
      <h2 class="text-5xl font-extrabold mb-6 leading-tight">Gestão Eficiente para Provedores de Internet</h2>
      
      <!-- Benefícios -->
      <ul class="mb-8 space-y-3 text-lg">
          <li class="flex items-start">
              <i class="bi bi-check-circle-fill text-green-400 mr-2 mt-1" style="color: #02afd0"></i>
              Gestão centralizada de clientes e contratos
          </li>
          <li class="flex items-start">
              <i class="bi bi-check-circle-fill text-green-400 mr-2 mt-1" style="color: #02afd0" ></i>
              Controle financeiro automatizado
          </li>
          <li class="flex items-start">
              <i class="bi bi-check-circle-fill text-green-400 mr-2 mt-1" style="color: #02afd0"></i>
              Emissão rápida de faturas e boletos
          </li>
      </ul>

      <!--Botões-->
      <div class="flex space-x-4">
        <a href="/login" 
           class="inline-block px-6 py-3 border border-white text-white font-semibold rounded-lg shadow-md transition text-base"
           style="background-color: transparent; border: 1px solid white;"
           onmouseover="this.style.backgroundColor='rgba(2, 175, 208, 0.8)'; this.style.borderColor='transparent';"
           onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white';">
            Entrar
        </a>
    
        <a href="/register" 
           class="inline-block px-6 py-3 border border-white text-white font-semibold rounded-lg shadow-md transition text-base"
           style="background-color: transparent; border: 1px solid white;"
           onmouseover="this.style.backgroundColor='rgba(2, 175, 208, 0.8)'; this.style.borderColor='transparent';"
           onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white';">
            Cadastre-se
        </a>
    </div>
  </div>
</section>


<!-- Funcionalidades -->
<section id="funcionalidades" class="relative py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50">
  <div class="container text-center max-w-6xl px-6 mx-auto">
    <h2 class="text-4xl font-bold mb-12">Funcionalidades</h2>
    <div class="grid grid-cols-4 gap-8">
      <div class="group relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 animate-fadeIn">
        <div class="flex justify-center mb-4">
          <i class="bi bi-people-fill text-4xl transition" style="color: #02afd0;"></i>
        </div>
        <h4 class="text-xl font-semibold mb-2">Gerenciamento de Times</h4>
        <p class="text-gray-600">Crie times com usuários e papéis distintos para melhor organização.</p>
      </div>

      <div class="group relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 animate-fadeIn delay-100">
        <div class="flex justify-center mb-4">
          <i class="bi bi-shield-lock-fill text-4xl transition" style="color: #02afd0;"></i>
        </div>
        <h4 class="text-xl font-semibold mb-2">Controle de Papéis</h4>
        <p class="text-gray-600">Owner, Membro e Convidado com permissões específicas e seguras.</p>
      </div>

      <div class="group relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 animate-fadeIn delay-200">
        <div class="flex justify-center mb-4">
          <i class="bi bi-table text-4xl transition" style="color: #02afd0;"></i>
        </div>
        <h4 class="text-xl font-semibold mb-2">DataTables Avançadas</h4>
        <p class="text-gray-600">Filtros, busca global, paginação e exportação em CSV, PDF e mais.</p>
      </div>

      <div class="group relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 animate-fadeIn delay-300">
        <div class="flex justify-center mb-4">
          <i class="bi bi-ui-checks-grid text-4xl transition" style="color: #02afd0;"></i>
        </div>
        <h4 class="text-xl font-semibold mb-2">Formulários Dinâmicos</h4>
        <p class="text-gray-600">Validação em tempo real, feedback claro e envio AJAX para melhor UX.</p>
      </div>
    </div>
  </div>
</section>


<!-- Depoimentos -->
<section id="depoimentos" class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50">
  <div class="container max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold mb-12">Depoimentos</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white border rounded-xl shadow p-6 flex flex-col justify-between hover:shadow-lg transition">
        <p class="italic mb-6">"O sistema facilitou demais a gestão da minha provedora. Recomendo muito!"</p>
        <div class="flex items-center space-x-4">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Carlos Silva" class="w-12 h-12 rounded-full">
          <div class="text-left">
            <h5 class="font-semibold">Carlos Silva</h5>
            <p class="text-sm text-gray-500">Provedor XYZ</p>
          </div>
        </div>
      </div>

      <div class="bg-white border rounded-xl shadow p-6 flex flex-col justify-between hover:shadow-lg transition">
        <p class="italic mb-6">"Contratos automáticos e controle de planos foram essenciais para o crescimento."</p>
        <div class="flex items-center space-x-4">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Ana Souza" class="w-12 h-12 rounded-full">
          <div class="text-left">
            <h5 class="font-semibold">Ana Souza</h5>
            <p class="text-sm text-gray-500">Provedor ABC</p>
          </div>
        </div>
      </div>

      <div class="bg-white border rounded-xl shadow p-6 flex flex-col justify-between hover:shadow-lg transition">
        <p class="italic mb-6">"Interface intuitiva e suporte rápido. Muito satisfeito!"</p>
        <div class="flex items-center space-x-4">
          <img src="https://randomuser.me/api/portraits/men/65.jpg" alt="João Pereira" class="w-12 h-12 rounded-full">
          <div class="text-left">
            <h5 class="font-semibold">João Pereira</h5>
            <p class="text-sm text-gray-500">Provedor 123</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Equipe -->
<section id="equipe" class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50">
  <div class="container max-w-6xl mx-auto px-4 text-center">
    <h3 class="text-4xl font-bold mb-2">Nossa Equipe</h3>
    <p class="text-gray-500 mb-12">Conheça as pessoas incríveis que impulsionam nossa empresa com talento, dedicação e inovação.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      
      <!-- Membro -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="/assets/img/avatars/4.png" alt="Mariana Lima" class="w-full h-64 object-cover">
        <div class="p-6 text-center">
          <h5 class="font-semibold text-lg mb-2">Francisco Lima</h5>
          <span class="inline-block bg-blue-50 text-[#02afd0] text-sm font-medium px-3 py-1 rounded-full" style="color: #02afd0">CEO & Fundador</span>
        </div>
      </div>

      <!-- Membro -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="/assets/img/avatars/1.png" alt="Lucas Almeida" class="w-full h-64 object-cover">
        <div class="p-6 text-center">
          <h5 class="font-semibold text-lg mb-2">Lucas Almeida</h5>
          <span class="inline-block bg-blue-50 text-[#02afd0] text-sm font-medium px-3 py-1 rounded-full" style="color: #02afd0">CTO</span>
        </div>
      </div>

      <!-- Membro -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="/assets/img/avatars/2.png" alt="Fernanda Costa" class="w-full h-64 object-cover">
        <div class="p-6 text-center">
          <h5 class="font-semibold text-lg mb-2">Fernando Costa</h5>
          <span class="inline-block bg-blue-50 text-[#02afd0] text-sm font-medium px-3 py-1 rounded-full" style="color: #02afd0">Gerente de Produto</span>
        </div>
      </div>

      <!-- Membro -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <img src="/assets/img/avatars/3.png" alt="Carlos Silva" class="w-full h-64 object-cover">
        <div class="p-6 text-center">
          <h5 class="font-semibold text-lg mb-2">Valderlanea Sousa</h5>
          <span class="inline-block bg-blue-50 text-[#02afd0] text-sm font-medium px-3 py-1 rounded-full" style="color: #02afd0">UI/UX Designer</span>
        </div>
      </div>
      
    </div>
  </div>
</section>


<!-- FAQ -->
<section class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50">
  <div class="container mx-auto max-w-6xl px-4 grid md:grid-cols-2 gap-8">

    <!-- Coluna Esquerda -->
    <div class="bg-indigo-600 text-white p-8 rounded-xl shadow-lg" style="background-color: #02afd0">
      <div class="flex items-center mb-4">
        <h2 class="text-2xl font-bold">Ainda tem dúvidas?</h2>
      </div>
      
      <div class="space-y-3">
        <button class="w-full flex items-center gap-2 px-4 py-3 bg-indigo-500 hover:bg-indigo-400 rounded-lg" style="background-color: #009ab9">
          <i class="fas fa-envelope"></i> Suporte por E-mail
        </button>
        <button class="w-full flex items-center gap-2 px-4 py-3 bg-indigo-500 hover:bg-indigo-400 rounded-lg" style="background-color: #009ab9">
          <i class="fas fa-comments"></i> Chat ao Vivo
        </button>
        <button class="w-full flex items-center gap-2 px-4 py-3 bg-indigo-500 hover:bg-indigo-400 rounded-lg" style="background-color: #009ab9">
          <i class="fas fa-phone"></i> Ligue para Nós
        </button>
      </div>
    </div>

    <!-- Coluna Direita - FAQ -->
    <div class="space-y-4" id="faq">
      <details class="p-4 bg-white rounded-lg shadow cursor-pointer">
        <summary class="font-semibold text-gray-800">Como posso entrar em contato com o suporte?</summary>
        <p class="mt-2 text-gray-600">Você pode entrar em contato conosco por e-mail, chat ao vivo ou telefone. Estamos disponíveis para ajudar!</p>
      </details>

      <details class="p-4 bg-white rounded-lg shadow cursor-pointer">
        <summary class="font-semibold text-gray-800">Quais são os horários de atendimento?</summary>
        <p class="mt-2 text-gray-600">Nosso suporte está disponível de segunda a sexta, das 8h às 18h (horário de Brasília).</p>
      </details>

      <details class="p-4 bg-white rounded-lg shadow cursor-pointer">
        <summary class="font-semibold text-gray-800">Como faço para acompanhar meu pedido?</summary>
        <p class="mt-2 text-gray-600">Após a compra, você receberá um e-mail com informações de rastreamento. Também pode consultar a seção "Meus Pedidos" no site.</p>
      </details>

      <details class="p-4 bg-white rounded-lg shadow cursor-pointer">
        <summary class="font-semibold text-gray-800">Posso cancelar ou alterar meu pedido?</summary>
        <p class="mt-2 text-gray-600">Sim, desde que o pedido ainda não tenha sido enviado. Entre em contato com nosso suporte o quanto antes para realizar alterações.</p>
      </details>
    </div>

  </div>
</section>

<!-- Script para FAQ -->
<script>
  const details = document.querySelectorAll('#faq details');

  details.forEach((targetDetail) => {
    targetDetail.addEventListener('toggle', () => {
      if (targetDetail.open) {
        details.forEach((detail) => {
          if (detail !== targetDetail) {
            detail.removeAttribute('open');
          }
        });
      }
    });
  });
</script>

<!-- Contato -->
<section id="contato" class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50">
  <div  class="container mx-auto max-w-6xl px-4 grid gap-8 lg:grid-cols-2">

    <!-- Formulário de Contato-->
    <div class="bg-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Fale Conosco</h2>
      <p class="text-gray-600 mb-6">
        Preencha o formulário e nossa equipe retornará o mais breve possível.
      </p>

      <form class="space-y-4">
        <div class="flex gap-4 flex-col md:flex-row">
          <input type="text" placeholder="Seu Nome" class="w-full md:w-1/2 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#02afd0]">
          <input type="email" placeholder="Seu E-mail" class="w-full md:w-1/2 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#02afd0]">
        </div>
        <div>
          <input type="text" placeholder="Assunto" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#02afd0]">
        </div>
        <div>
          <textarea placeholder="Mensagem" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#02afd0]"></textarea>
        </div>
        <button type="submit" class="bg-[#02afd0] text-white px-6 py-3 rounded-md hover:bg-[#029bb9] transition duration-300">
          Enviar Mensagem
        </button>
      </form>
    </div>

    <!-- Informações de Contato -->
    <div class="text-white p-10 rounded-3xl shadow-xl hover:shadow-2xl transition" style="background-color: #113c44">
      <h2 class="text-3xl font-bold mb-4">Informações de Contato</h2>
      <p class="mb-8 opacity-90">
        Entre em contato conosco para tirar dúvidas, solicitar informações ou conversar com nossa equipe.
      </p>

      <div class="space-y-8">
        <div class="flex items-start gap-4">
          <div class="text-3xl">📍</div>
          <div>
            <h4 class="text-lg font-semibold mb-1">Nosso Endereço</h4>
            <p class="opacity-90">Rua Exemplo, 108<br>São Paulo, SP 01234-567</p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="text-3xl">📞</div>
          <div>
            <h4 class="text-lg font-semibold mb-1">Telefones</h4>
            <p class="opacity-90">+55 (11) 5589-5548<br>+55 (11) 6678-2544</p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="text-3xl">📧</div>
          <div>
            <h4 class="text-lg font-semibold mb-1">E-mail</h4>
            <p class="opacity-90">info@exemplo.com<br>contato@exemplo.com</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Chamada para Ação -->
<section class="py-12 bg-gradient-to-r from-blue-50 via-white to-blue-50">
  <div class="container max-w-6xl mx-auto px-6">
    <div class="flex flex-col items-center justify-center text-white rounded-3xl p-10 text-center shadow-md hover:shadow-lg transition" 
         style="background-color:#02afd0; min-height: 400px;">
      <h2 class="text-4xl font-bold mb-6">Pronto para transformar sua gestão?</h2>
      <p class="mb-10 text-lg">
        Simplifique e otimize a gestão do seu provedor de internet com a nossa plataforma completa e eficiente.
      </p>
      <a href="/register" 
         class="inline-block px-8 py-4 border border-white text-white font-semibold rounded-lg shadow-md transition text-xl"
         style="background-color: transparent; border: 1px solid white;"
         onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.2)'; this.style.borderColor='transparent';"
         onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='white';">
        Cadastre-se Agora
      </a>
    </div>
  </div>
</section>





@endsection