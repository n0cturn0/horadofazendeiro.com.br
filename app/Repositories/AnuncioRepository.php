<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\AnuncioFormRequest;
use App\Models\PerfilControlleModel;
use App\Models\PerfilModel;
use App\Models\PacoteModel;
use Illuminate\Support\Carbon;
use App\Models\AnuncioModel as Anuncio;
use App\Models\ControleDeAnuncioModel;
use App\Models\FotosModel;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AnuncioRepository
{
    public function add(AnuncioFormRequest $request)
    {


        $id = auth()->id();
        $perfilControle = PerfilControlleModel::where('idusuario', $id)->first();
        $perfil = PerfilModel::where('idusuario', $id)->first();

        $pacotes = PacoteModel::where('id', $perfil->idpacote)->first();



        if ($perfilControle->totalauncios === 0) {
            // return redirect()->back()->with('error', 'Você não possui crédito para anunciar.');
            return  Session::flash('error', 'Você não possui crédito para anunciar.');
        } else {
            //Cria anuncio

            $dataAtual = Carbon::now();
            // $token = $dataAtual->format('YmdHis');
            // dd($token);
            $dataFormatada = $dataAtual->toDateString();

            $fotos = $request->file('fotos');
            $contafotos = count($request->file('fotos'));


            $anuncio =  new Anuncio();
            $anuncio->titulo        = $request->input('titulo');
            $anuncio->cidade        = $request->input('cidade');
            $anuncio->estado        = 'MS';
            $anuncio->datacriacao   = $dataFormatada;
            $anuncio->precotipo     = $request->input('precotipo');
            $anuncio->preco         = $request->input('preco');
            $anuncio->anuncio       = $request->input('anuncio');
            $anuncio->save();
            $dataAtual = Carbon::now();
            $dataAtual->addDays($pacotes->diasativos);
            $dataVencimento = $dataAtual->toDateString();
            $controleanuncio = new ControleDeAnuncioModel();
            $controleanuncio->idanuncio = $anuncio->id;
            $controleanuncio->idusuario = $id;
            $controleanuncio->datacriacao = $dataFormatada;
            $controleanuncio->datavencimento = $dataVencimento;
            $controleanuncio->status = 0;
            $controleanuncio->save();





            $numeroDeFotosExistente = FotosModel::where('idanuncio', $anuncio->id)->count();
            $controlefotos = ($numeroDeFotosExistente + $contafotos);
            if ($fotos !== null && $controlefotos <= 5) {
                if ($request->hasFile('fotos')) {
                    foreach ($fotos as $foto) {
                        $caminho = $foto->store('fotos', 'public');
                        FotosModel::create([
                            'arquivo' => $caminho,
                            'idanuncio' => $anuncio->id
                        ]);
                    }
                }
                $removecredito = ($perfilControle->totalauncios - 1);
                $perfilControle->totalauncios = $removecredito;
                $perfilControle->update();
                return Session::flash('success', 'Anúncio Publicado com sucesso.');
            } else {
                Session::flash('erro', 'Você só pode enviar 5 fotos.');
            }
        }
    }
}
