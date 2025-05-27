<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CnpjController extends Controller
{
    // Função para consultar informações do CNPJ na BrasilAPI
    public function consultar(Request $request)
    {
        // Remove caracteres não numéricos
        $cnpj = preg_replace('/\D/', '', $request->cnpj);

        // Valida se o CNPJ tem 14 dígitos
        if (strlen($cnpj) !== 14) {
            return response()->json(['error' => 'CNPJ inválido.'], 400);
        }

        // Faz a requisição para a BrasilAPI
        $response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$cnpj}");

        // Se falhar a requisição, retorna erro
        if ($response->failed()) {
            return response()->json(['error' => 'Erro ao consultar a API.'], 500);
        }

        $data = $response->json();

        // Se a API retornar uma mensagem de erro
        if (isset($data['message'])) {
            return response()->json(['error' => $data['message']], 404);
        }

        // Retorna a razão social ou "Não informado" se não tiver
        return response()->json([
            'razao_social' => $data['razao_social'] ?? 'Não informado'
        ]);
    }
}
