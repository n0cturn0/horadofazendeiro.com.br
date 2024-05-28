@extends('template.template')
@section('content')
  <style>
    @keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    .blink {
      animation: blink 1s infinite;
    }
  </style>
  <section class="inner-section ad-details-part">
    <div class="container">
      <x-alert />
      <div class="row content-reverse">
        <div class="col-lg-4">
          <div class="common-card price">
            <h3>R$ {{ $anuncio['anuncio']->preco }}<span>{{ $anuncio['usuario'] }}</span></h3><i class="fas fa-tag"></i>
          </div>
          <label>Enviar Video</label>
          <input type="file"
                 name="video">







        </div>
        <div class="col-lg-8">

          <div class="common-card">
            <div class="ad-details-meta"><a href="{{ route('meus-anuncios') }}"
                 class="view"><i class="fas fa-arrow-left"></i><span><strong></strong>Voltar</span></a>
            </div>


            <div class="ad-details-slider-group">
              <div class="ad-details-slider slider-arrow">
                @foreach ($fotos as $foto)
                  @if (!empty($foto->arquivo))
                    @php
                      $primeiraImagem = $foto->arquivo;
                      $url = Storage::disk('public')->url($primeiraImagem);
                    @endphp
                    <div><img src="{{ $url }}"
                           alt="details"></div>
                  @endif
                @endforeach



              </div>
              <div class="cross-vertical-badge ad-details-badge"><i
                   class="fas fa-clipboard-check"></i><span>recommend</span></div>
            </div>
            <div class="ad-thumb-slider">
              @foreach ($fotos as $foto)
                @if (!empty($foto->arquivo))
                  @php
                    $primeiraImagem = $foto->arquivo;
                    $url = Storage::disk('public')->url($primeiraImagem);
                  @endphp
                  <div><img src="{{ $url }}"
                         alt="details"><a href="{{ url('anuncio/deletefoto/' . $foto->id) }}"
                       class="modal-link">Remover imagem</a></div>
                @endif
              @endforeach

            </div>
            <label>Enviar fotos</label><br>
            <input type="file">

          </div>
          <div class="common-card">
            @if ($anuncio['controle'] == 1)
              <ul class="blog-details-meta blink">
                <li>
                  <a href="#"><i class="far fa-share-square"></i>
                    <p>Este anúncio está expirado, clique aqui para renová-lo</p>
                  </a>
                </li>
              </ul>
            @endif

            <div class="card-header">

              <div class="form-group"><label class="form-label">Título Anúncio</label>
                <input name="titulo"
                       value="{{ $anuncio['anuncio']->titulo }}"
                       placeholder="Título Anúncio"
                       type="text"
                       class="form-control"
                       placeholder="Type your product title here">
              </div>
              <h5 class="card-title"></h5>
            </div>
            <ul class="ad-details-specific">
              <li>
                <div class="col-lg-8">
                  <div class="form-group"><label class="form-label">Preço Arroba / Un</label>
                    <select name="precotipo"
                            id="precotipo"
                            class="form-control hfazendeiro-select2">
                      <option selected>Preço Arroba / Un</option>
                      <option value="0">Arroba</option>
                      <option value="1">Unidade</option>

                    </select>
                  </div>
                </div>
              </li>
              {{-- <li>
                <h6>seller type:</h6>
                <p>personal</p>
              </li> --}}
              <li>
                <div class="col-lg-8">
                  <div class="form-group"><label class="form-label">Selecione sua cidade</label>
                    <select name="cidade"
                            id="cidade"
                            class="form-control  hfazendeiro-select2a">
                      <option selected>Selecione sua cidade=</option>
                      <option value="Rio Negro">Rio Negro</option>
                      <option value="Corguinho">Corguinho</option>

                    </select>
                  </div>
                </div>


              </li>

            </ul>
          </div>
          <div class="common-card">
            <div class="card-header">
              <ul class="ad-details-specific">
                <li>

                  @php
                    $preco = $anuncio['anuncio']->preco;
                    $vpreco = !empty($preco) ? $preco : '';
                  @endphp

                  <div class="form-group"><label class="form-label">Preço</label>
                    <input type="number"
                           name="preco"
                           value="{{ $anuncio['anuncio']->preco ?? old('preco') }}"
                           placeholder="Preço R$"
                           class="form-control">
                  </div>

                </li>
                <li>
                  @php
                    $animal = $anuncio['anuncio']->animal;
                    $vanimal = !empty($animal) ? $animal : '';
                  @endphp

                  <div class="form-group"><label class="form-label">Animal</label>
                    <input name="animal"
                           value="{{ $anuncio['anuncio']->animal ?? old('animal') }}"
                           placeholder="Ex.: 1 Touro Nelore | 56 Bezerros Nelore"
                           type="text"
                           class="form-control">
                  </div>

                </li>
                <li>
                  @php
                    $classificacao = $anuncio['anuncio']->classificacao;
                    $vclassificacao = !empty($classificacao) ? $classificacao : '';
                  @endphp

                  <div class="form-group"><label class="form-label">Classificação</label>
                    <input name="classificacao"
                           value="{{ $anuncio['anuncio']->classificacao ?? old('classificacao') }}"
                           placeholder="Ex.: Genética Reposição"
                           type="text"
                           class="form-control">
                  </div>

                </li>
                <li>
                  @php
                    $tipogenetica = $anuncio['anuncio']->tipogenetica;
                    $vtipogenetica = !empty($tipogenetica) ? $tipogenetica : '';
                  @endphp
                  <div class="form-group"><label class="form-label">Tipo Genética</label>
                    <input name="tipogenetica"
                           value="{{ $anuncio['anuncio']->tipogenetica ?? old('tipogenetica') }}"
                           placeholder="Ex.: P.O - Pura Origem"
                           type="text"
                           class="form-control">
                  </div>
                </li>
                <li>
                  @php
                    $registro = $anuncio['anuncio']->registro;
                    $vregistro = !empty($registro) ? $registro : '';
                  @endphp
                  <div class="form-group"><label class="form-label">Registro</label>
                    <input name="registro"
                           value="{{ $anuncio['anuncio']->registro ?? old('registro') }}"
                           placeholder="Ex.: "
                           type="text"
                           class="form-control">
                  </div>
                </li>
                <li>
                  @php
                    $iabcz = $anuncio['anuncio']->iabcz;
                    $viabcz = !empty($iabcz) ? $iabcz : '';
                  @endphp
                  <div class="form-group"><label class="form-label">iABCZ</label>
                    <input name="iabcz"
                           value="{{ $anuncio['anuncio']->iabcz ?? old('iabcz') }}"
                           placeholder="Ex.: 15,52 "
                           type="text"
                           class="form-control">
                  </div>
                </li>
                <li>
                  @php
                    $peso = $anuncio['anuncio']->peso;
                    $vpeso = !empty($peso) ? $peso : '';
                  @endphp
                  <div class="form-group"><label class="form-label">Peso</label>
                    <input name="peso"
                           value="{{ $anuncio['anuncio']->peso ?? old('peso') }}"
                           placeholder="Ex.: 60@ "
                           type="text"
                           class="form-control">
                  </div>
                </li>
                {{-- <li>
                <h6>ad type:</h6>
                <p>sales</p>
              </li> --}}
              </ul>
            </div>


            <div class="col-lg-12">
              <div class="form-group"><label class="form-label">Editar seu anúncio</label>
                <textarea class="form-control"
                          name="anuncio"
                          placeholder="DIGITE O ANÚNCIO">{{ $anuncio['anuncio']->anuncio }}</textarea>
              </div>
            </div>
            <p class="ad-details-desc"></p>
          </div>


          <div class="form-group text-right">
            {{-- <input type="submit" value="Cria anuncio" /> --}}
            <button class="btn btn-inline"><i class="fas fa-check-circle"></i><span>Editar
                anúncio</span></button>
          </div>


        </div>
      </div>
    </div>
  </section>
@endsection
