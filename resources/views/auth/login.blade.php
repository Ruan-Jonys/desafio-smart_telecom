<x-guest-layout>
  <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
              <div class="card px-sm-6 px-0">
                  <div class="card-body">
                      <!-- Logo -->
                      <div class="app-brand justify-content-center mb-4">
                          <x-authentication-card-logo/>
                      </div>
                      <!-- /Logo -->

                      <h4 class="mb-1">Bem-vindo! 👋</h4>
                      <p class="mb-6">Faça login na sua conta para acessar a plataforma.</p>

                      @if ($errors->any())
                          <div class="alert alert-danger mb-4">
                              <ul class="mb-0">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      @if (session('status'))
                          <div class="mb-4 font-medium text-sm text-green-600">
                              {{ session('status') }}
                          </div>
                      @endif

                      <form method="POST" action="{{ route('login') }}">
                          @csrf

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

                          <div class="mb-6">
                              <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                          </div>
                      </form>

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
