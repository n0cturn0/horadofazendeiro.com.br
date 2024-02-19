<?php

namespace App\Http\Controllers;

use App\Models\PacoteModel;
use App\Models\PerfilModel as Perfil;
use App\Models\PerfilControlleModel ;
use Illuminate\Http\Request;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\SDK;
use MercadoPago\Client\Common\RequestOptions;
use Illuminate\Support\Carbon;


class PacoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pacote.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id=NULL)
    {
        $id_usuario = 100;
        $pacote = PacoteModel::where('id',$id)->first();
        $perfil = Perfil::where('idusuario', $id_usuario)->first();
        $perfilControle = PerfilControlleModel::where('idusuario', $id_usuario)->first();
       
        //Atualiza id do pacote em perfil
        $perfil->idpacote = $pacote->id;
        $perfil->update();
        //Atualiza quantidade de anuncio do pacote adiquirido
        $perfilControle->totalauncios = ($pacote->quantidade+$perfilControle->totalauncios);
        $perfilControle->update();

        dd('Voce tem :'.$perfilControle->totalauncios);
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    }

    public function pacote($id=NULL)
    {
        $idusuario = 999;
        $pacote = PacoteModel::where('id',$id)->first();
        return view('pacote.formulariopagamento', ['pacote' => $pacote]);
       
    }
    public function payment(Request $request)
    {
        MercadoPagoConfig::setAccessToken("APP_USR-6065432141553962-020311-fab8358899965bdf4498733c337ff91e-1452715641");
        


        $createRequest = [
            "transaction_amount" => 1,
            "description" => "horadofazendeiro",
            "external_reference" => "HF0001",
            "installments" => 1,
            "payment_method_id" => "pix",
            "payer" => [
                "entity_type" => "individual",
                "email" => "meuemail@gmail.com",
                "identification" => [
                    "type" => "CPF",
                    "number" => "95749019047",
                ],
                "first_name" => "Guto",
                "last_name" => "Oliveira",
            ],
          ];
        
          $client = new PaymentClient();
          $request_options = new RequestOptions();
          $request_options->setCustomHeaders(["X-Idempotency-Key: 9008567857765"]);
        
          try {
            // Realize a chamada para criar o pagamento
            $payment = $client->create($createRequest, $request_options);
            $response = array(
                'status'   => $payment->status,
                'status_detail' => $payment->status_detail,
                'id'    => $payment->id,
                'ticket_url' => $payment->point_of_interaction->transaction_data->ticket_url,
                'qr_code' => $payment->point_of_interaction->transaction_data->qr_code,

            );
            // Exiba a resposta para depuração
            // echo '<pre>';
            // var_dump($payment);
            //  echo '</pre>';
            $ticketUrl = $response['ticket_url'];
            return redirect()->away($ticketUrl);
                // echo "<a href=\"{$response['ticket_url']}\">Pagar Com PIX</a>";

            // A partir daqui, você pode acessar os detalhes da resposta conforme necessário
            // Por exemplo, $payment['status'], $payment['id'], etc.
        } catch (\Exception $e) {
            // Lidar com exceções, se ocorrerem
            echo '<pre>';
            echo "Erro na requisição: " . $e->getMessage();
            echo "Código do erro: " . $e->getCode();
            echo '</pre>';
            // Se quiser, você pode exibir mais detalhes da resposta da exceção usando var_dump($e->getResponse());
        }

         
          

   











  
   


    }

    /**
     * Display the specified resource.
     */
    public function show(PacoteModel $pacoteModel)
    {
        // $pacotes = $pacoteModel->get();
        $pacotes =  $pacoteModel->joinCaracteristicas()
        ->select('pacote.*', 'pacotecaracteristica.caracteristica as caracteristica')
        ->get();

       
        return view('pacote.pacote', compact('pacotes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PacoteModel $pacoteModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PacoteModel $pacoteModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PacoteModel $pacoteModel)
    {
        //
    }
}
