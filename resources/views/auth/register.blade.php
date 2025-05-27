<!doctype html>
<html lang="pt-br" class="layout-wide customizer-hide" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  {{-- Token CSRF --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Register</title>

  {{-- Favicon e fontes --}}
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans&display=swap" rel="stylesheet" />

  {{-- Estilos principais --}}
  <link rel="stylesheet" href="../assets/vendor/css/core.css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

  {{-- Scripts essenciais --}}
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>

  {{-- Biblioteca para máscaras de input --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.4.3/imask.min.js"></script>

  {{-- Estilo para transição entre as etapas do formulário --}}
  <style>
    .step-form {
      transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .hidden { opacity: 0; transform: translateX(50px); pointer-events: none; position: absolute; }
    .visible { opacity: 1; transform: translateX(0); pointer-events: auto; position: relative; }
  </style>
</head>

<body>
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <div class="card px-sm-6 px-0">
          <div class="card-body">

            {{-- Logo --}}
            <div class="app-brand justify-content-center mb-6">
              <a href="{{ url('/') }}" class="app-brand-link gap-2">
                <img src="/assets/img/logo/logo-g.png" alt="logo" width="250px">
              </a>
            </div>

            {{-- Título e descrição --}}
            <h4 class="mb-1">Cadastre-se</h4>
            <p class="mb-6">e acompanhe de perto a nossa consultoria Smart!</p>

            {{-- Exibição de erros de validação --}}
            @if ($errors->any())
              <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            {{-- Formulário de cadastro --}}
            <form id="registerForm" method="POST" action="{{ route('register') }}">
              @csrf

              {{-- Dados Pessoais --}}
              <div id="step1" class="step-form visible">
                <h5>Dados Pessoais:</h5>

                <div class="mb-3">
                  <label for="name" class="form-label">Nome Completo</label>
                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Seu nome completo" required autofocus/>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="exemplo@email.com" required />
                </div>

                <div class="mb-3 form-password-toggle">
                  <label for="password" class="form-label">Senha</label>
                  <div class="input-group input-group-merge">
                    <input id="password" type="password" class="form-control" name="password" placeholder="********" required />
                    <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3 form-password-toggle">
                  <label for="password_confirmation" class="form-label">Confirme Senha</label>
                  <div class="input-group input-group-merge">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="********" required />
                    <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                  </div>
                </div>

                <button type="button" class="btn btn-primary d-grid w-100" onclick="nextStep()">Continuar</button>
              </div>

              {{-- Dados da Empresa --}}
              <div id="step2" class="step-form hidden">
                <h5>Dados da Empresa:</h5>
              
                <div class="mb-3">
                  <label for="cnpj" class="form-label">CNPJ</label>
                  <input id="cnpj" type="text" class="form-control" name="cnpj" placeholder="00.000.000/0000-00" required />
                  <div class="form-text" id="cnpj-loading" style="display:none;">Consultando...</div>
                  <div class="invalid-feedback" id="cnpj-error" style="display:none;"></div>
                </div>
                
                <div class="mb-3">
                  <label for="razao_social" class="form-label">Razão Social</label>
                  <input id="razao_social" type="text" class="form-control" name="razao_social" placeholder="Razão Social da empresa" readonly />
                </div>
              
                <div class="mb-3">
                  <label for="zipcode" class="form-label">CEP</label>
                  <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" placeholder="00000-000" required />
                  <div class="form-text" id="cep-loading" style="display:none;">Consultando...</div>
                  <div class="invalid-feedback" id="cep-error" style="display:none;"></div>
                </div>
                
                <div class="mb-3">
                  <label for="full_address" class="form-label">Endereço Completo</label>
                  <input id="full_address" type="text" class="form-control" name="full_address" value="{{ old('full_address') }}" placeholder="Rua, Número - Bairro" required />

                  {{-- Campos ocultos para armazenar informações do endereço --}}
                  <input type="hidden" id="address" name="address">
                  <input type="hidden" id="neighborhood" name="neighborhood">
                  <input type="hidden" id="city" name="city">
                  <input type="hidden" id="state" name="state">
                </div>

                {{-- Checkbox Termos de Serviço e Politica de Privacidade --}}
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                  <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required />
                    <label class="form-check-label" for="terms">
                      Eu concordo com os <a target="_blank" href="{{ route('terms.show') }}">termos de serviços</a> e <a target="_blank" href="{{ route('policy.show') }}">políticas de privacidade</a>.
                    </label>
                  </div>
                @endif
              
                <div class="d-flex justify-content-between">
                  <button type="button" class="btn btn-secondary" onclick="prevStep()">Voltar</button>
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
              </div>
            </form>

            {{-- Link para Login --}}
            <p class="text-center mt-4">
              <span>Já tem uma conta?</span>
              <a href="{{ route('login') }}"><span>Faça Login</span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Scripts JS essenciais --}}
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <script src="../assets/js/main.js"></script>

  <script>
    // Alternância de visualização de senha
    document.querySelectorAll('.form-password-toggle .input-group-text').forEach(el => {
      el.addEventListener('click', function () {
        const input = this.previousElementSibling;
        input.type = input.type === 'password' ? 'text' : 'password';
        this.querySelector('i').classList.toggle('bx-hide');
        this.querySelector('i').classList.toggle('bx-show');
      });
    });

    // Função para avançar para a próxima etapa
    function nextStep() {
      const step1 = document.getElementById('step1');
      const step2 = document.getElementById('step2');

      // Validação dos campos da etapa 1
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const password = document.getElementById('password').value;
      const confirm = document.getElementById('password_confirmation').value;

      if (!name || !email || !password || !confirm) {
        alert('Por favor, preencha todos os campos da etapa 1.');
        return;
      }
      if (password !== confirm) {
        alert('As senhas não coincidem.');
        return;
      }

      // Transição entre as etapas
      step1.classList.remove('visible');
      step1.classList.add('hidden');
      step2.classList.remove('hidden');
      step2.classList.add('visible');
    }

    // Função para voltar à etapa anterior
    function prevStep() {
      document.getElementById('step2').classList.add('hidden');
      document.getElementById('step2').classList.remove('visible');
      document.getElementById('step1').classList.remove('hidden');
      document.getElementById('step1').classList.add('visible');
    }

    // Máscaras de input para CNPJ e CEP
    IMask(document.getElementById('cnpj'), { mask: '00.000.000/0000-00' });
    IMask(document.getElementById('zipcode'), { mask: '00000-000' });

    // Busca de informações do CEP
    const zipcodeInput = document.getElementById('zipcode');

    zipcodeInput.addEventListener('input', function () {
      const cep = zipcodeInput.value.replace(/\D/g, '');
      if (cep.length === 8) buscarCEP(cep);
    });

    function buscarCEP(cep) {
      const cepLoading = document.getElementById('cep-loading');
      const cepError = document.getElementById('cep-error');

      cepLoading.style.display = 'block';
      cepError.style.display = 'none';
      zipcodeInput.classList.remove('is-invalid');

      fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
          cepLoading.style.display = 'none';
          if (data.erro) {
            cepError.textContent = 'CEP não encontrado.';
            cepError.style.display = 'block';
            zipcodeInput.classList.add('is-invalid');
          } else {
            document.getElementById('city').value = data.localidade;
            document.getElementById('state').value = data.uf;
          }
        })
        .catch(() => {
          cepLoading.style.display = 'none';
          cepError.textContent = 'Erro ao consultar o CEP.';
          cepError.style.display = 'block';
          zipcodeInput.classList.add('is-invalid');
        });
    }

    // Validação final
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      const city = document.getElementById('city').value;
      const state = document.getElementById('state').value;

      if (!city || !state) {
        e.preventDefault();
        alert('Por favor, digite um CEP válido para preencher Cidade e Estado automaticamente.');
        return;
      }

      // Separação do endereço completo
      const fullAddress = document.getElementById('full_address').value.trim();

      if (!fullAddress) {
        e.preventDefault();
        alert('Por favor, preencha o endereço completo.');
        return;
      }

      const parts = fullAddress.split('-').map(part => part.trim());

      if (parts.length < 2) {
        e.preventDefault();
        alert('Por favor, insira o endereço no formato: Rua, Número - Bairro.');
        return;
      }

      document.getElementById('address').value = parts[0];       
      document.getElementById('neighborhood').value = parts[1];  
    });

    // Consulta do CNPJ
    const cnpjInput = document.getElementById('cnpj');
    const loading = document.getElementById('cnpj-loading');
    const error = document.getElementById('cnpj-error');
    const razaoSocialInput = document.getElementById('razao_social');

    cnpjInput.addEventListener('input', function () {
      const cnpj = cnpjInput.value.replace(/\D/g, '');
      if (cnpj.length === 14) {
        buscarCNPJ(cnpj);
      }
    });

    function buscarCNPJ(cnpj) {
      loading.style.display = 'block';
      error.style.display = 'none';
      razaoSocialInput.value = '';

      fetch('/api/consulta-cnpj', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ cnpj: cnpj })
      })
      .then(response => response.json())
      .then(data => {
        loading.style.display = 'none';
        if (data.error) {
          error.textContent = data.error;
          error.style.display = 'block';
        } else {
          razaoSocialInput.value = data.razao_social;
        }
      })
      .catch(() => {
        loading.style.display = 'none';
        error.textContent = 'Erro ao consultar o CNPJ.';
        error.style.display = 'block';
      });
    }
  </script>
</body>
</html>
