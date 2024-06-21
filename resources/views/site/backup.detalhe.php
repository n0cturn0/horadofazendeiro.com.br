@extends('template.template')

@section('content')
<section class="inner-section ad-details-part">


  <div class="container">
    <style>
      .youtube-player {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        /* Proporção de aspecto do vídeo 16:9 */
      }

      .youtube-player iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        aspect-ratio: 16 / 9;
      }

      .equivalente-br {
        margin-bottom: 2em;
        /* Altere o valor conforme necessário para ajustar o espaçamento */
      }
    </style>
    <x-alert />
    <div class="row content-reverse">
      <div class="col-lg-6">
        {{-- <div class="common-card"> --}}
        <h1> <i class="fas fa-tag text-center"></i> {{ $anuncio['anuncio']->titulo }}<span></span></h1>
        <div class="equivalente-br"></div>
        <div class="youtube-player" id="ytplayer"></div>
        {{-- </div> --}}

      </div>
      <div class="col-lg-6">

        <div class="common-card">
          <div class="ad-details-meta"><a href="{{ route('template') }}" class="view"><i class="fas fa-arrow-left"></i><span>Voltar<strong></strong></span></a>
          </div>


          <div class="ad-details-slider-group">
            <div class="ad-details-slider slider-arrow">
              @foreach ($fotos as $foto)
              @if (!empty($foto->arquivo))
              @php
              $primeiraImagem = $foto->arquivo;
              $url = Storage::disk('public')->url($primeiraImagem);
              @endphp
              <div><img src="{{ $url }}" alt="details"></div>
              @endif
              @endforeach
            </div>
            <div class="cross-vertical-badge ad-details-badge"><i class="fas fa-clipboard-check"></i><span>recommend</span></div>
          </div>
          <div class="ad-thumb-slider">
            @foreach ($fotos as $foto)
            @if (!empty($foto->arquivo))
            @php
            $primeiraImagem = $foto->arquivo;
            $url = Storage::disk('public')->url($primeiraImagem);
            @endphp
            <div><img src="{{ $url }}" alt="details"></div>
            @endif
            @endforeach


          </div>

          {{ $anuncio['usuario']['nome'] }}<br>
          {{ $anuncio['anuncio']->cidade }}, {{ $anuncio['anuncio']->estado }}<br>
          <a aria-label="Chat on WhatsApp" href="https://wa.me/{{ $anuncio['usuario']['telefone'] }}"><img width="40" height="40" alt="Chat on WhatsApp" src="/images/wa.png" />
            <a /><br>


        </div>
        <div class="common-card">
          <div class="card-header">
            <h5 class="card-title">Especificações</h5>
          </div>
          <ul class="ad-details-specific">
            <li>
              <h6>Preco:</h6>
              @php
              $preco = $anuncio['anuncio']->preco;
              $vpreco = !empty($preco) ? $preco : '';
              @endphp
              <p>{{ $vpreco }}</p>
            </li>
            <li>
              @php
              $animal = $anuncio['anuncio']->animal;
              $vanimal = !empty($animal) ? $animal : '';
              @endphp
              <h6>Animal:</h6>
              <p>{{ $vanimal }}</p>
            </li>
            <li>
              @php
              $classificacao = $anuncio['anuncio']->classificacao;
              $vclassificacao = !empty($classificacao) ? $classificacao : '';
              @endphp
              <h6>Classificacao:</h6>
              <p>{{ $vclassificacao }}</p>
            </li>
            <li>
              @php
              $tipogenetica = $anuncio['anuncio']->tipogenetica;
              $vtipogenetica = !empty($tipogenetica) ? $tipogenetica : '';
              @endphp
              <h6>Tipo Genético:</h6>
              <p>{{ $vtipogenetica }}</p>
            </li>
            <li>
              @php
              $registro = $anuncio['anuncio']->registro;
              $vregistro = !empty($registro) ? $registro : '';
              @endphp
              <h6>Registro:</h6>
              <p>{{ $vregistro }}</p>
            </li>
            <li>
              @php
              $iabcz = $anuncio['anuncio']->iabcz;
              $viabcz = !empty($iabcz) ? $iabcz : '';
              @endphp
              <h6>iABCZ:</h6>
              <p>{{ $viabcz }}</p>
            </li>
            <li>
              @php
              $peso = $anuncio['anuncio']->peso;
              $vpeso = !empty($peso) ? $peso : '';
              @endphp
              <h6>Peso:</h6>
              <p>{{ $vpeso }}</p>
            </li>
            {{-- <li>
                <h6>ad type:</h6>
                <p>sales</p>
              </li> --}}
          </ul>
        </div>
        <div class="common-card">
          <div class="card-header">
            <p class="ad-details-desc">
              {{ $anuncio['anuncio']->anuncio }}
            </p>
          </div>
        </div>
      </div>



    </div>

  </div>
  </div>
  </div>
</section>
<script>
  // Load the IFrame Player API code asynchronously.
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/player_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  // Replace the 'ytplayer' element with an <iframe> and
  // YouTube player after the API code downloads.
  var player;

  function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
      height: '55%',
      width: '90%',
      videoId: 'rPjQQ_bG9dw'
    });
  }
</script>
@endsection