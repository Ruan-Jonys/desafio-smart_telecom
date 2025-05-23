<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CnpjController extends Controller
{
    public function consultar(Request $request)
    {
        $cnpj = preg_replace('/\D/', '', $request->cnpj);

        if (strlen($cnpj) !== 14) {
            return response()->json(['error' => 'CNPJ inválido.'], 400);
        }

        $response = Http::get("https://brasilapi.com.br/api/cnpj/v1/{$cnpj}");

        if ($response->failed()) {
            return response()->json(['error' => 'Erro ao consultar a API.'], 500);
        }

        $data = $response->json();

        if (isset($data['message'])) {
            return response()->json(['error' => $data['message']], 404);
        }

        return response()->json([
            'razao_social' => $data['razao_social'] ?? 'Não informado'
        ]);
    }
}
