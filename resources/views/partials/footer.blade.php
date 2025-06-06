@guest
<!-- Footer público, exibido para visitantes não autenticados -->
<footer class="py-8 border-t" style="background-color: #113c44">
  <div class="container mx-auto max-w-6xl px-6 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-200">
  
    <!-- Sobre a empresa -->
    <div class="flex flex-col md:items-start items-start">
      <h4 class="font-semibold text-lg mb-4 text-[#02afd0]">Smart Telecom</h4>
      <p class="text-sm">
        Gestão eficiente e simplificada para provedores de internet de todos os tamanhos. 
        Conecte-se ao futuro com a nossa plataforma.
      </p>
    </div>
  
    <!-- Links rápidos de navegação -->
    <div class="flex flex-col md:items-start items-start">
      <h4 class="font-semibold text-lg mb-4 text-[#02afd0]">Links</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="/" class="hover:text-[#02afd0] transition">Início</a></li>
        <li><a href="#funcionalidades" class="hover:text-[#02afd0] transition">Funcionalidades</a></li>
        <li><a href="#depoimentos" class="hover:text-[#02afd0] transition">Depoimentos</a></li>
        <li><a href="#faq" class="hover:text-[#02afd0] transition">FAQ</a></li>
        <li><a href="#equipe" class="hover:text-[#02afd0] transition">Equipe</a></li>
      </ul>
    </div>
  
    <!-- Informações de contato -->
    <div class="flex flex-col md:items-start items-start">
      <h4 class="font-semibold text-lg mb-4 text-[#02afd0]">Contato</h4>
      <ul class="space-y-2 text-sm">
        <li><i class="bi bi-envelope-fill mr-2"></i>suporte@smarttelecom.com</li>
        <li><i class="bi bi-telephone-fill mr-2"></i>(11) 99999-9999</li>
        <li><i class="bi bi-geo-alt-fill mr-2"></i>São Paulo, SP - Brasil</li>
      </ul>
    </div>
  
    <!-- Redes sociais -->
    <div class="flex flex-col md:items-start items-start">
      <h4 class="font-semibold text-lg mb-4 text-[#02afd0]">Siga-nos</h4>
      <div class="flex space-x-4">
        <a href="#" class="text-gray-300 hover:text-[#02afd0] transition text-xl"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-gray-300 hover:text-[#02afd0] transition text-xl"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-gray-300 hover:text-[#02afd0] transition text-xl"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  
  </div>
  
  <!-- Rodapé final com direitos autorais -->
  <div class="mt-8 text-center text-xs text-gray-400">
    &copy; {{ date('Y') }} Smart Telecom. Todos os direitos reservados.
  </div>
</footer>
@endguest

@auth
<!-- Footer privado, exibido para usuários autenticados no painel -->
<footer class="content-footer footer" style="background-color: #113c44; color: #cbd5e1;">
  <div class="container mx-auto px-6 py-4 flex flex-col md:flex-row items-center justify-between">
    <div class="mb-2 md:mb-0 text-sm">
      &copy; <script>document.write(new Date().getFullYear())</script> Smart Telecom. Feito com ❤️ por 
      <a href="" target="_blank" class="underline text-[#02afd0] hover:text-[#0289b5]">Smart Telecom</a>
    </div>
  </div>
</footer>
@endauth