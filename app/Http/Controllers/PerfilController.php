<?php

namespace App\Http\Controllers;
use App\Models\PerfilModel;
use App\Models\PerfilControlleModel;
use App\Models\PacoteModel;
use App\Models\HistoricoPacoteModel  as Historico;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('perfil.index');
    }

    /**
     * Verififica se o usuario possui algum perfil, se nao possui define perfil com grátis
     */
    public function verify()
    {
        
        $user_id=auth()->id();
        // $pacote_id=2;
        $perfil = PerfilModel::where('idusuario', $user_id)->first();
        $perfilControle = PerfilControlleModel::where('idusuario', $user_id)->first();
        if(!$perfil)
        {
            $perfil = new PerfilModel();
            $perfil->idusuario = $user_id;
            $perfil->idpacote = 4;
            $perfil->save(); 

            $historico = new Historico();
            $historico->idusuario = $user_id;
            $historico->idpacote = 4;
            $historico->save(); 

        } else {
            if ($perfil->idpacote == 4) {
               echo ('Usuário com perfil grátis,possui'.$perfilControle->totalauncios);
            } else {
                $pacote = PacoteModel::where('id',$perfil->idpacote)->first();
                echo $pacote->pacote;
            }
        }
        if (!$perfilControle) {
            $perfilControle = new PerfilControlleModel();
            $perfilControle->idusuario = $user_id;
            $perfilControle->totalauncios =  1;  
            $perfilControle->save();    
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
