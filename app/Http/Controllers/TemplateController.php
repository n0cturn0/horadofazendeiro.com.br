<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {

       
        $agrupado = [];
        $getfotos = [];
        //id
        $array1 = DB::table('controleanuncios')
        ->join('anuncio', 'controleanuncios.idanuncio', '=', 'anuncio.id')
        ->select(
            'anuncio.id',
            'anuncio.titulo',
            'anuncio.cidade',
            'anuncio.estado',
            'anuncio.datacriacao',
            'anuncio.precotipo',
            'anuncio.preco',
            'anuncio.anuncio',
            'anuncio.created_at',
            'anuncio.updated_at'
        )
        ->where('controleanuncios.status', '=', 0)
        ->distinct()
        ->get();
        foreach ($array1 as $item) {
            if (!isset($agrupado[$item->id])) {
                $getfotos[]=$item->id;
                $agrupado[$item->id] = $item;
                $agrupado[$item->id]->fotos = [];
            }
        }
        //idanuncio
        $array2 = DB::table('fotos')
        ->whereIn('idanuncio',$getfotos)
        ->get();
         
        // Mescla os arrays com base no valor dos campos 'id' e 'idanuncio'
        $agrupado = collect($array1)->map(function ($item) use ($array2) 
        {
        // Procura um item no segundo array com o mesmo valor em 'idanuncio'
        $item2 = collect($array2)->firstWhere('idanuncio', $item->id);
        // Se encontrado, mescla os dois arrays
        return $item2 ? (array)$item + (array)$item2 : $item;
        })->toArray();   
        return view('site.index', compact('agrupado'));
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
}
