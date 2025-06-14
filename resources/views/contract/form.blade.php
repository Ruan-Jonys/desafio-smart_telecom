@extends('layouts.app')

@section('title', 'Gerador de Contrato')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Gerar Contrato de Prestação de Serviço</h1>

    <div class="flex flex-row gap-8 items-stretch">
        <!-- Formulário de geração do contrato -->
        <div class="flex-1 min-w-[300px] bg-white p-6 rounded-lg shadow-md border flex flex-col justify-between min-h-[500px]">
            <form method="POST" action="{{ route('contract.generate') }}" class="space-y-4">
                @csrf

                <!-- Campo: Data de Início -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Data de Início</label>
                    <input type="date" name="start_date" id="start_date" class="form-control w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Campo: Data de Término -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Data de Término</label>
                    <input type="date" name="end_date" id="end_date" class="form-control w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Campo: Valor do contrato -->
                <div>
                    <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Valor do Contrato (R$)</label>
                    <input type="number" step="0.01" name="value" id="value" class="form-control w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Campo: Cidade -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Cidade</label>
                    <input type="text" name="city" id="city" class="form-control w-full rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Botão de envio -->
                <button type="submit" 
                class="btn btn-primary w-full text-white font-semibold py-2 px-4 rounded-md transition" 
                style="background-color: #02afd0;" 
                onmouseover="this.style.backgroundColor='#029cb7'" 
                onmouseout="this.style.backgroundColor='#02afd0'">
                Gerar Contrato
                </button>
            </form>
        </div>

        <!-- Visualização do PDF do contrato gerado -->
        <div class="flex-1 bg-white p-6 rounded-lg shadow-md border flex flex-col min-h-[500px]">
            <h2 class="text-lg font-semibold mb-4">Visualização do Contrato</h2>
            
            {{-- Se houver um PDF gerado, mostra o iframe, senão mostra mensagem padrão --}}
            @if(isset($pdfPath))
                <iframe src="{{ $pdfPath }}?t={{ time() }}" class="w-full h-full border-none flex-1"></iframe>
            @else
                <div class="flex-1 flex items-center justify-center text-gray-500">
                    <p>Nenhum contrato gerado ainda.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection