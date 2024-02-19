<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pacotes</title>
</head>
<body>
    <h2>Escolha um Pacote para assinar</h2>
    @foreach ( $pacotes as $pacote )
        
   
    <p>
        Pacote:{{ $pacote->pacote }}<br>
        Valor: {{ $pacote->valor }}<br>
        Quantidade de anúncios do pacote:{{ $pacote->quantidade}}<br>
        Quantidade de dias ativos de cadas anúncios:{{ $pacote->diasativos }}<br>
        Características:{{ $pacote->caracteristicas }}<br>
       <a href="{{ url('pacote/'.$pacote->id) }}"> COMPRAR  </a><br>
    </p>
    <hr>
    @endforeach
</body>
</html>