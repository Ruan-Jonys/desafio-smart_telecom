<x-guest-layout>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo da plataforma centralizado -->
                        <div class="app-brand justify-content-center mb-4">
                            <x-authentication-card-logo/>
                        </div>
                        <!-- /Logo -->
  
                        <!-- Título e subtítulo de boas-vindas -->
                        <h4 class="mb-1">Bem-vindo! 👋</h4>
                        <p class="mb-6">Faça login na sua conta para acessar a plataforma.</p>
  
                        <!-- Exibição de erros de validação -->
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
  
                        <!-- Exibição de mensagens de status (por exemplo: redefinição de senha enviada) -->
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
  
                        <!-- Formulário de Login -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
  
                            <!-- Campo de Email -->
                            <div class="mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Entre com seu email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                />
                            </div>
  
                            <!-- Campo de Senha com botão de mostrar/ocultar -->
                            <div class="mb-6 form-password-toggle">
                                <label class="form-label" for="password">Senha</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        placeholder="••••••••••••"
                                    />
                                    <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
                                </div>
                            </div>
  
                            <!-- Opções: lembrar-me e link para esqueci a senha -->
                            <div class="mb-8">
                                <div class="d-flex justify-content-between">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember" />
                                        <label class="form-check-label" for="remember_me">Lembrar-me</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            <span>Esqueceu a senha?</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
  
                            <!-- Botão de Login -->
                            <div class="mb-6">
                              <button class="btn d-grid w-100 text-white" type="submit" style="background-color: #02afd0; border-color: #02afd0;">
                                  Login
                              </button>
                            </div>
                        </form>
  
                        <!-- Link para registro de novo usuário -->
                        <p class="text-center">
                            <span>Novo em nossa plataforma?</span>
                            <a href="{{ route('register') }}">
                                <span>Criar conta</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-guest-layout>