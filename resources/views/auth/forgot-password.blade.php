<x-guest-layout>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Forgot Password -->
                <div class="card px-sm-6 px-0">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-6">
                            <span class="app-brand-logo demo">
                                <x-authentication-card-logo />
                            </span>
                        </div>
                        <!-- /Logo -->

                        <h4 class="mb-1">Esqueceu a senha? 🔒</h4>
                        <p class="mb-6 text-muted">
                            Informe seu e-mail e nós enviaremos as instruções para redefinir sua senha.
                        </p>

                        @if (session('status'))
                            <div class="alert alert-success mb-4" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.email') }}" id="formAuthentication" class="mb-6">
                            @csrf

                            <input 
                                id="email"
                                class="form-control" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                autocomplete="username" 
                                placeholder="Digite seu e-mail"
                            />

                            <button type="submit" class="mt-2 btn btn-primary d-grid w-100" style="background: #02afd0;">
                                Enviar link de redefinição
                            </button>
                        </form>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-flex justify-content-center">
                                <i class="bx bx-chevron-left me-1"></i>
                                Voltar para o login
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Forgot Password -->
            </div>
        </div>
    </div>
</x-guest-layout>
