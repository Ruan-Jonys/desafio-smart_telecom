<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    // Mostra o formulário
    public function showForm()
    {
        return view('contract.form',[
            'pdfPath' => asset('contract/contrato-exemplo.pdf'),  // caminho do pdf público
        ]);
    }

    // Gera o contrato
    public function generate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'value' => 'required|numeric',
            'city' => 'required|string'
        ]);

        $user = Auth::user();
        $dataAtual = date('d/m/Y');
        $periodo = $this->calcularPeriodo($request->start_date, $request->end_date);
        $valor = number_format($request->value, 2, ',', '.');
        $cidade = $request->city;

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Estilos
        $titleStyle = ['bold' => true, 'size' => 14, 'alignment' => Jc::CENTER];
        $clauseTitle = ['bold' => true, 'size' => 12];
        $normalText = ['size' => 11];

        // Título
        $section->addText('Contrato de Prestação de Serviço', $titleStyle);
        $section->addTextBreak(1);  // quebra de linha

        // Dados principais
        $section->addText('Empresa Contratante: ' . $user->name, $normalText);
        $section->addText('CNPJ: ' . $user->cnpj, $normalText);
        $section->addText('Cidade: ' . $cidade, $normalText);
        $section->addText('Período de Vigência: ' . $periodo, $normalText);
        $section->addText('Valor do Contrato: R$ ' . $valor, $normalText);
        $section->addTextBreak(1);

        // Cláusulas
        $section->addText('Cláusula 1 - Objeto', $clauseTitle);
        $section->addText('Este contrato tem como objeto a prestação de serviços relacionados à oferta de planos de internet, conforme as condições estabelecidas entre as partes.', $normalText);
        $section->addTextBreak(1);

        $section->addText('Cláusula 2 - Obrigações da Contratada', $clauseTitle);
        $section->addText('A empresa ' . $user->name . ' compromete-se a fornecer os serviços acordados com qualidade e eficiência, respeitando as normas técnicas e regulatórias vigentes.', $normalText);
        $section->addTextBreak(1);

        $section->addText('Cláusula 3 - Vigência', $clauseTitle);
        $section->addText('O presente contrato terá início na data de sua assinatura e vigorará pelo período de ' . $periodo . ', podendo ser renovado mediante acordo entre as partes.', $normalText);
        $section->addTextBreak(1);

        $section->addText('Cláusula 4 - Valor', $clauseTitle);
        $section->addText('O valor total acordado para os serviços contratados é de R$ ' . $valor . ', a ser pago conforme as condições estabelecidas em comum acordo.', $normalText);
        $section->addTextBreak(1);

        $section->addText('Cláusula 5 - Foro', $clauseTitle);
        $section->addText('Para dirimir quaisquer controvérsias oriundas deste contrato, as partes elegem o foro da cidade de ' . $cidade . '.', $normalText);
        $section->addTextBreak(2);

        // Assinatura
        $section->addText('Assinatura:________________________________________', $normalText);
        $section->addText($user->name, $normalText);
        $section->addText('Data: ' . $dataAtual, $normalText);

        // Criar arquivo temporário com extensão .docx
        $tempFile = tempnam(sys_get_temp_dir(), 'contract') . '.docx';

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        $writer->save($tempFile);

        // Retorna para download e apaga o arquivo temporário após
        return response()->download($tempFile, 'Contrato_prestacao_servico.docx')->deleteFileAfterSend(true);
    }

    // Função auxiliar para calcular período no formato "X meses" ou "X dias"
    private function calcularPeriodo(string $startDate, string $endDate): string
    {
        $start = new \DateTime($startDate);
        $end = new \DateTime($endDate);
        $diff = $start->diff($end);

        if ($diff->y > 0) {
            $anos = $diff->y;
            return $anos . ' ano' . ($anos > 1 ? 's' : '');
        }

        if ($diff->m > 0) {
            $meses = $diff->m;
            return $meses . ' mês' . ($meses > 1 ? 'es' : '');
        }

        return $diff->d . ' dia' . ($diff->d > 1 ? 's' : '');
    }
}
