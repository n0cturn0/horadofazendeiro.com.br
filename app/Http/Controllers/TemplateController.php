<?php

namespace App\Http\Controllers;

use App\Models\AnuncioModel as Anuncio;
use App\Models\PacoteModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\FotosModel;
use App\Models\User;
use DOMXPath;
use Symfony\Component\CssSelector\XPath\XPathExpr;

class TemplateController extends Controller
{

    private function getAnuncio($id)
    {
        $anunciosCompleto = [];
        $anuncios = DB::table('controleanuncios')->where('status', $id)->get();
        $idsAnuncios = $anuncios->pluck('idanuncio')->toArray();


        $informacoes = Anuncio::whereIn('id', $idsAnuncios)->get();
        foreach ($informacoes as $info) {
            $anunciosCompleto[$info->id] = [
                'anuncio' => $info,
                'fotos' => [], // Inicializa um array vazio para armazenar as fotos do anúncio
            ];
        }

        $fotos = FotosModel::whereIn('idanuncio', $idsAnuncios)->get();
        foreach ($fotos as $foto) {
            if (isset($anunciosCompleto[$foto->idanuncio])) {
                // Adiciona a foto ao array de fotos do anúncio
                $anunciosCompleto[$foto->idanuncio]['fotos'][] = $foto;
            }
        }


        return $anunciosCompleto;
    }

    private function getAnuncioComUsuario($id)
    {
        $anuncioComUsuario = [];
        $idusuario = DB::table('controleanuncios')->where('idanuncio', $id)->first();
        $anuncio = ($idusuario->status == 0) ? Anuncio::find($id) : '';
        $user = User::find($idusuario->idusuario);
        $anuncioComUsuario['anuncio'] = $anuncio;
        $anuncioComUsuario['usuario']['nome'] = $user->name;
        $anuncioComUsuario['usuario']['telefone'] = $user->telefone;
        return $anuncioComUsuario;
    }

    private function getFotosAnuncio($id)
    {

        $ControleAnuncio = DB::table('controleanuncios')->where('idanuncio', $id)->first();
        $fotos = ($ControleAnuncio->status == 0) ? FotosModel::where('idanuncio', $id)->get() : '';
        return $fotos;
    }
    public function isValid($id = NULL)
    {
        $valid = DB::table('controleanuncios')->where('idanuncio', $id)->first();
        $AnuncioValid = ($valid &&  $valid->status == 0) ? true : false;
        return $AnuncioValid;
    }

    public function detalhe($id = NULL)
    {
        $valido = $this->isValid($id);
        if (!$valido) {
            return redirect()->route('template');
        }
        $fotos = $this->getFotosAnuncio($id);
        $anuncio = $this->getAnuncioComUsuario($id);
        // dd($fotos, $anuncio);
        return view('site.detalhe', compact('fotos', 'anuncio'));
    }


    public function index()
    {

        $anuncios = $this->getAnuncio(0);



        $pacote = PacoteModel::where('id', 5)->get();


        return view('site.index', compact('anuncios', 'pacote'));
    }



    public function logintemp()
    {
        return view('site.registro');
    }
    public function formulario()
    {
        return view('site.formulario');
    }

    public function profiletemp()
    {
        return view('site.profile');
    }

    public function scraping()
    {
        $internalErrors = libxml_use_internal_errors(true);
        // Obtém o conteúdo HTML da página
        $content = file_get_contents('https://portal.sistemafamasul.com.br/cotacoes-online');

        $document = new \DOMDocument();
        // Carrega o conteúdo HTML no DOMDocument
        $document->loadHTML($content);
        $xPath = new \DOMXPath($document);

        // Busca o elemento da tabela com o seletor especificado
        $table = $xPath->query('//*[@id="block-system-main"]/div/div[2]/div/div/div[2]/table[1]');
        $vaca = $xPath->query('//*[@id="block-system-main"]/div/div[2]/div/div/div[2]/table[2]');

        // Verifica se encontrou alguma tabela
        // if ($table->length > 0) {
        //     // Inicia a construção da tabela HTML
        //     $html = '<table border="1" class="views-table cols-4">';
        //     $html .= '<caption>@Boi</caption>';
        //     $html .= '<thead>';
        //     $html .= '<tr>';
        //     $html .= '<th class="views-field views-field-field-data-cot" scope="col">Data</th>';
        //     $html .= '<th class="views-field views-field-field-pra-as-pecuaria" scope="col">Praça</th>';
        //     $html .= '<th class="views-field views-field-field-r-" scope="col">Valor</th>';
        //     $html .= '<th class="views-field views-field-field-r-com-funrural-boi" scope="col">Com Funrural</th>';
        //     $html .= '</tr>';
        //     $html .= '</thead>';
        //     $html .= '<tbody>';

        //     // Itera sobre os elementos da lista
        //     foreach ($table as $tableNode) {
        //         // Itera sobre as linhas da tabela
        //         foreach ($tableNode->getElementsByTagName('tr') as $rowNode) {
        //             // Verifica se é um nó de elemento (ignora nós de texto e comentários)
        //             if ($rowNode->nodeType === XML_ELEMENT_NODE) {
        //                 // Adiciona uma nova linha à tabela HTML
        //                 $html .= '<tr>';

        //                 // Itera sobre as células da linha
        //                 foreach ($rowNode->getElementsByTagName('td') as $cellNode) {
        //                     // Verifica se é um nó de elemento (ignora nós de texto e comentários)
        //                     if ($cellNode->nodeType === XML_ELEMENT_NODE) {
        //                         // Adiciona uma célula à linha da tabela HTML
        //                         $html .= '<td>' . $cellNode->textContent . '</td>';
        //                     }
        //                 }

        //                 $html .= '</tr>';
        //             }
        //         }
        //     }

        //     $html .= '</tbody>';
        //     $html .= '</table>';

        //     // Exibe a tabela HTML
        //     echo $html;
        // } else {
        //     echo "Nenhuma tabela encontrada.";
        // }


        // if ($vaca->length > 0) {
        //     // Inicia a construção da tabela HTML
        //     $html = '<table border="1" class="views-table cols-4">';
        //     $html .= '<caption>vaca</caption>';
        //     $html .= '<thead>';
        //     $html .= '<tr>';
        //     $html .= '<th class="views-field views-field-field-data-cot" scope="col">Data</th>';
        //     $html .= '<th class="views-field views-field-field-pra-as-pecuaria" scope="col">Praça</th>';
        //     $html .= '<th class="views-field views-field-field-r-" scope="col">Valor</th>';
        //     $html .= '<th class="views-field views-field-field-r-com-funrural-boi" scope="col">Com Funrural</th>';
        //     $html .= '</tr>';
        //     $html .= '</thead>';
        //     $html .= '<tbody>';

        //     // Itera sobre os elementos da lista
        //     foreach ($vaca as $tableNode) {
        //         // Itera sobre as linhas da tabela
        //         foreach ($tableNode->getElementsByTagName('tr') as $rowNode) {
        //             // Verifica se é um nó de elemento (ignora nós de texto e comentários)
        //             if ($rowNode->nodeType === XML_ELEMENT_NODE) {
        //                 // Adiciona uma nova linha à tabela HTML
        //                 $html .= '<tr>';

        //                 // Itera sobre as células da linha
        //                 foreach ($rowNode->getElementsByTagName('td') as $cellNode) {
        //                     // Verifica se é um nó de elemento (ignora nós de texto e comentários)
        //                     if ($cellNode->nodeType === XML_ELEMENT_NODE) {
        //                         // Adiciona uma célula à linha da tabela HTML
        //                         $html .= '<td>' . $cellNode->textContent . '</td>';
        //                     }
        //                 }

        //                 $html .= '</tr>';
        //             }
        //         }
        //     }

        //     $html .= '</tbody>';
        //     $html .= '</table>';

        //     // Exibe a tabela HTML
        //     echo $html;
        // } else {
        //     echo "Nenhuma tabela encontrada.";
        // }
        return view('site.cotacao', compact('vaca', 'table'));
    }
}
