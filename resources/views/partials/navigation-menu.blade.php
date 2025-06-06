<nav>
    @if (request()->routeIs('landing'))
        <!-- Navbar para a landing page (visitantes não autenticados) -->
        <nav x-data="{ open: false }" class="fixed top-4 left-10 right-10 z-50 bg-gray-100 border border-gray-500 rounded-xl shadow-lg mx-2 sm:mx-4 lg:mx-8">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo da empresa -->
                    <div class="flex items-center space-x-2">
                        <img src="/assets/img/logo/logo-p.png" alt="" width="50px">
                    </div>
                    <!-- Links de navegação da landing -->
                    <div class="hidden md:flex space-x-10">
                        <a href="#funcionalidades" class="text-gray-700 hover:text-blue-500">Funcionalidades</a>
                        <a href="#depoimentos" class="text-gray-700 hover:text-blue-500">Depoimentos</a>
                        <a href="#equipe" class="text-gray-700 hover:text-blue-500">Equipe</a>
                        <a href="#faq" class="text-gray-700 hover:text-blue-500">FAQ</a>
                        <a href="#contato" class="text-gray-700 hover:text-blue-500">Contato</a>
                    </div>
                    <!-- Botão de login -->
                    <div>
                        <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 hover:bg-indigo-700 text-white font-semibold rounded transition" style="background-color: #02afd0">
                            <i class="bi bi-box-arrow-in-right mr-2"></i> Entrar
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    @else
        <!-- Navbar para usuários autenticados (dashboard, admin, etc) -->
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between items-center h-16">
    
                    <!-- Logo da plataforma (linka para dashboard) -->
                    <div class="flex items-center space-x-2 shrink-0">
                        <a href="{{ route('dashboard') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a>
                    </div>
    
                    <!-- Links de navegação principais (adaptado por perfil/admin/provedor) -->
                    <div class="hidden md:flex space-x-10">
                        @if (auth()->check() && auth()->user()->isAdmin())
                            <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                                {{ __('Gerenciamento de Usuários') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('admin.plans.index') }}" :active="request()->routeIs('admin.plans.*')">
                                {{ __('Gerenciamento de Planos') }}
                            </x-nav-link>
                        @endif
    
                        @if (auth()->check() && auth()->user()->isProvedor())
                            <x-nav-link href="{{ route('plans') }}" :active="request()->routeIs('plans') || request()->routeIs('dashboard')">
                                {{ __('Planos') }}
                            </x-nav-link>
                            <x-nav-link href="{{ route('contract.form') }}" :active="request()->routeIs('contract.*')">
                                {{ __('Geração de Contrato') }}
                            </x-nav-link>
                        @endif
                    </div>
    
                    <!-- Área do usuário: dropdown de equipe e usuário -->
                    <div class="hidden md:flex items-center space-x-4">
    
                        {{-- Dropdown de times (Jetstream), exceto admin --}}
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && !auth()->user()->isAdmin())
                            <div class="relative">
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->currentTeam->name ?? 'Sem equipe' }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <!-- Links de gerenciamento de equipe -->
                                        <div class="px-4 py-2 text-xs text-gray-400 mb-3">
                                            {{ __('Gerenciar equipe') }}
                                        </div>
                                        <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" class="mb-3">
                                            {{ __('Configurações da equipe') }}
                                        </x-dropdown-link>
                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}" class="mb-3">
                                                {{ __('Criar nova equipe') }}
                                            </x-dropdown-link>
                                        @endcan
                                        @if (Auth::user()->allTeams()->count() > 1)
                                            <div class="border-t border-gray-200 mb-3"></div>
                                            <div class="px-4 py-2 text-xs text-gray-400 mb-3">
                                                {{ __('Switch Teams') }}
                                            </div>
                                            @foreach (Auth::user()->allTeams() as $team)
                                                <x-switchable-team :team="$team" class="mb-2" />
                                            @endforeach
                                        @endif
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @endif
    
                        <!-- Dropdown do usuário para perfil, tokens, logout -->
                        <div class="relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    @endif
                                </x-slot>
                                <x-slot name="content">
                                    <div class="px-4 py-2 text-xs text-gray-400">
                                        {{ __('Gerenciar conta') }}
                                    </div>
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('Tokens de API') }}
                                        </x-dropdown-link>
                                    @endif
                                    <div class="border-t border-gray-200"></div>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                            {{ __('Sair') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
    
                    <!-- Botão hamburguer para abrir menu mobile -->
                    <div class="-mr-2 flex items-center md:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    
            <!-- Menu mobile responsivo -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden md:hidden bg-gray-100 border border-gray-500 rounded-b-xl shadow-lg mx-2 sm:mx-4 lg:mx-8">
                <div class="pt-2 pb-3 space-y-1 px-4">
                    <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    @if (auth()->check() && auth()->user()->isAdmin())
                        <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard Admin') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                            {{ __('Gerenciamento de Usuários') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('admin.plans.index') }}" :active="request()->routeIs('admin.plans.*')">
                            {{ __('Gerenciamento de Planos') }}
                        </x-responsive-nav-link>
                    @endif
                    @if (auth()->check() && auth()->user()->isProvedor())
                        <x-responsive-nav-link href="{{ route('plans') }}" :active="request()->routeIs('plans') || request()->routeIs('dashboard')">
                            {{ __('Planos') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('contract.form') }}" :active="request()->routeIs('contract.*')">
                            {{ __('Geração de Contrato') }}
                        </x-responsive-nav-link>
                    @endif
                </div>
    
                <!-- Área do usuário e equipes no menu mobile -->
                <div class="pt-4 pb-1 border-t border-gray-300 px-4">
                    <div class="flex items-center">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif
                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Perfil') }}
                        </x-responsive-nav-link>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('Tokens de API') }}
                            </x-responsive-nav-link>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Sair') }}
                            </x-responsive-nav-link>
                        </form>
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures() && !auth()->user()->isAdmin())
                            <div class="border-t border-gray-200 mt-3"></div>
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Gerenciar equipe') }}
                            </div>
                            <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Configurações da equipe') }}
                            </x-responsive-nav-link>
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Criar nova equipe') }}
                                </x-responsive-nav-link>
                            @endcan
                            @if (Auth::user()->allTeams()->count() > 1)
                                <div class="border-t border-gray-200 mt-3"></div>
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>
                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" component="responsive-nav-link" />
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    @endif
    </nav>