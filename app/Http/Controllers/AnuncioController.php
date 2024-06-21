<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnuncioFormRequest;
use App\Models\AnuncioModel as Anuncio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PerfilControlleModel;
use App\Models\PerfilModel;
use App\Models\ControleDeAnuncioModel;
use Illuminate\Support\Facades\DB;
use App\Models\FotosModel;
use App\Models\PacoteModel;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Repositories\AnuncioRepository;

class AnuncioController extends Controller
{



    public function __construct()
    {
        $this->validaanuncios();
    }

    private function validaanuncios()
    {
        $anuncios = ControleDeAnuncioModel::where('status', 0)->get();
        foreach ($anuncios as  $value) {
            if (Carbon::parse($value->datavencimento)->isPast()) {
                // Atualiza o status para 1 se a data estiver vencida
                $value->update(['status' => 1]);
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('anuncio.index');
    }



    /**
     *
     * Verifica data de validade do anuncio
     */
    public function checkanuncio()
    {
        $anuncios = ControleDeAnuncioModel::where('status', 0)->get();
        foreach ($anuncios as  $value) {
            $vencimento = Carbon::parse($value->datavencimento);
            if ($vencimento->isPast()) {
                $value->update(['status' => 1]);
            } elseif ($vencimento->isFuture()) {
            }
        }
    }

    private function getFotosAnuncio($id)
    {

        $ControleAnuncio = DB::table('controleanuncios')->where('idanuncio', $id)->first();
        $fotos =  FotosModel::where('idanuncio', $id)->get();
        return $fotos;
    }
    private function getAnuncioComUsuario($id)
    {
        $anuncioComUsuario = [];
        $idusuario = DB::table('controleanuncios')->where('idanuncio', $id)->first();

        $anuncio =  Anuncio::find($id);
        $user = User::find($idusuario->idusuario);
        $anuncioComUsuario['anuncio'] = $anuncio;
        $anuncioComUsuario['usuario'] = $user->name;
        $anuncioComUsuario['controle'] = $idusuario->status;
        return $anuncioComUsuario;
    }
    /**
     *
     * Página de detalles do anúncio
     */
    public function detalhe($id = NULL)
    {
        $fotos = $this->getFotosAnuncio($id);
        $anuncio = $this->getAnuncioComUsuario($id);

        return view('site.detalhe', compact('fotos', 'anuncio'));
    }

    /**
     *
     * Gera view da página de exibição do anuncio.
     */

    public function generatemain()
    {


        $this->checkanuncio();
        $itens = DB::table('controleanuncios')
            ->join('anuncio', 'controleanuncios.idanuncio', '=', 'anuncio.id')
            ->join('fotos', 'fotos.idanuncio', '=', 'anuncio.id')
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
                'anuncio.updated_at',
                'fotos.arquivo'
            )
            ->where('controleanuncios.status', '=', 0)
            ->get();
        $agrupado = [];

        foreach ($itens as $item) {
            if (!isset($agrupado[$item->id])) {
                // Se ainda não existe uma entrada para este id, criamos uma nova
                $agrupado[$item->id] = $item;
                $agrupado[$item->id]->fotos = [];
            }

            // Adicionamos a foto à lista de fotos deste id
            $agrupado[$item->id]->fotos[] = $item->arquivo;
        }



        return view('site.index', compact('agrupado'));
    }



    /**
     * Verifica se possui perfil ativo
     */
    public function verify()
    {
        $user_id = auth()->id();
        $perfilControle = PerfilControlleModel::where('idusuario', $user_id)->first();
        $perfil = PerfilModel::where('idusuario', $user_id)->first();
        if ($perfil && $perfilControle) {
            if ($perfilControle->totalauncios == 0) {
                dd('Você não possui crédito para anunciar. Clique aqui para adicionar crédito');
            } else {
                echo ('Voce pode fazer:' . $perfilControle->totalauncios . ' Anúncio(s)<br> ');
            }
        } else {
            dd('Voce nao possui Perfil ativo');
        }
    }

    public function CheckSaldo()
    {
        $perfilControle = PerfilControlleModel::where('idusuario', auth()->id())->first();
        if ($perfilControle->totalauncios > 0) {
            // Usuário possui anúncios
        } else {
            // Usuário não possui anúncios
            $response = redirect()->route('anuncio-novo')->with('credit', 'Você não possui crédito para novos anúncios. Clique aqui para adicionar créditos');;
            if ($response->isServerError()) {
                // Erro ao redirecionar
                return response()->view('errors.500');
            }
        }
    }


    public function atualizafoto($id = NULL)
    {
    }
    public function create(AnuncioFormRequest $request)
    {
        // $anuncio = $repository->add($request);
        $this->CheckSaldo();
        $id = auth()->id();
        $perfilControle = PerfilControlleModel::where('idusuario', $id)->first();
        $perfil = PerfilModel::where('idusuario', $id)->first();

        $pacotes = PacoteModel::where('id', $perfil->idpacote)->first();



        if ($perfil && $perfilControle) {
            if ($perfilControle->totalauncios == 0) {
                // dd('Você não possui crendeciais para anunciar. Clique aqui para adicionar crendeciais');
                // return redirect()->back()->with('error', 'Você nao possui crédito para anunciar.');
                return back()->with('erro', 'Anúncio Publicado com sucessogggggggggggggg.');
                Session::flash('erro', 'Você não possui crédito para anunciar.');
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
                $anuncio->animal        = $request->input('animal');
                $anuncio->classificacao = $request->input('classificacao');
                $anuncio->tipogenetica  = $request->input('tipogenetica');
                $anuncio->registro      = $request->input('registro');
                $anuncio->iabcz         = $request->input('iabcz');
                $anuncio->peso          = $request->input('peso');




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
                    return back()->with('success', 'Anúncio Publicado com sucesso.');
                } else {
                    Session::flash('erro', 'Você só pode enviar 5 fotos.');
                    // return back()->with('erro', 'Você só pode enviar 5 fotos.');
                }
            }
        } else {
            Session::flash('erro', 'Algo deu errado.');
        }
        // return redirect()->route('anuncio-novo');
        // return back()->with('success', 'Anúncio Publicado com sucesso.');
    }

    public function perfil()
    {
        $perfil = DB::table('pacote')
            ->join('perfil', 'pacote.id', '=', 'perfil.idpacote')
            ->select('pacote.*')
            ->where('perfil.idusuario', '=', auth()->id())
            ->first();
    }

    public function perfilAtivo()
    {
        //Perfil
        $perfil = DB::table('pacote')
            ->join('perfil', 'pacote.id', '=', 'perfil.idpacote')
            ->select('pacote.*')
            ->where('perfil.idusuario', '=', auth()->id())
            ->get();
        return $perfil;
    }

    public function controleAnuncio()
    {
        $anuncio = PerfilControlleModel::where('idusuario', auth()->id())->first();
        return $anuncio;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $perfil = $this->perfilAtivo();
        $anuncio = $this->controleAnuncio();
        return view('anuncio.store', compact('perfil', 'anuncio'));
    }

    public function addfoto($id = NULL)
    {
        return view('anuncio.upload', ['id' => $id]);
    }
    public function fotostore(Request $request)
    {
        $request->validate([
            'fotos.*' => 'required|image|mimes:jpeg,png,jpg,gif', // Exemplo de validação para tipos específicos e tamanho máximo de 2MB
        ]);
        $fotos = $request->file('fotos');
        $numeroDeFotosExistente = FotosModel::where('idanuncio', auth()->id())->count();
        $limiteDeFotos = 5;
        if ($numeroDeFotosExistente + count($request->file('fotos')) > $limiteDeFotos) {
            // return redirect()->back()->with('error', 'Você só pode enviar no máximo 5 fotos.');
            dd('Você só pode enviar no máximo 5 fotos.');
        }
        if ($request->hasFile('fotos')) {
            foreach ($fotos as $foto) {

                $caminho = $foto->store('fotos', 'public');

                FotosModel::create([
                    'arquivo' => $caminho,
                    'idanuncio' => auth()->id()
                ]);
            }
        }

        dd('sucesso');
    }

    public function meusanuncios()
    {
        $public = DB::table('controleanuncios')
            ->join('anuncio', 'controleanuncios.idanuncio', '=', 'anuncio.id')
            ->where('idusuario', '=', auth()->id())
            ->get();
        //   dd($public);

        $perfil = DB::table('pacote')
            ->join('perfil', 'pacote.id', '=', 'perfil.idpacote')
            ->select('pacote.*')
            ->where('perfil.idusuario', '=', auth()->id())
            ->get();
        $anuncio = PerfilControlleModel::where('idusuario', auth()->id())->first();
        return view('anuncio.list', compact('perfil', 'anuncio', 'public'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id = NULL)
    {
        $anuncios = DB::table('anuncio')
            ->join('controleanuncios', 'anuncio.id', '=', 'controleanuncios.idanuncio')
            ->select('anuncio.*')
            ->get();

        return view('anuncio.lista', compact('anuncios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id = NULL)
    {
        $fotos = $this->getFotosAnuncio($id);
        $anuncio = $this->getAnuncioComUsuario($id);
        // dd($fotos, $anuncio);
        return view('anuncio.detalhe', compact('fotos', 'anuncio'));
    }

    public function editfoto()
    {
        dd($_POST);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnuncioModel $anuncioModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnuncioModel $anuncioModel)
    {
        //
    }
    public function deletefoto($id = NULL)
    {

        $delete = DB::table('fotos')->where('id', '=', $id)->delete();
        // Session::flash('success', 'Anúncio Publicado com sucesso.');
        return redirect()->back()->with('success', 'Foto removida com sucesso.');
        // return redirect()->route('anuncio-editar')->with('success', 'Foto removida com sucesso.');
    }
}
