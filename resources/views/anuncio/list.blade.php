@extends('template.template')
@section('content')
  <section class="single-banner dashboard-banner">

  </section>
  <section class="dash-header-part">
    <div class="container">
      <div class="dash-header-card">
        <div class="row">
          <div class="col-lg-5">
            <div class="dash-header-left">
              <div class="dash-avatar"><a href="#"></div>
              <div class="dash-intro">

                <h4><a href="#">{{ auth()->user()->name }}</a></h4>
                <h5>anunciante</h5>
                <ul class="dash-meta">
                  <li><i class="fas fa-phone-alt"></i><span>{{ auth()->user()->telefone }}</span></li>
                  <li><i class="fas fa-envelope"></i><span>{{ auth()->user()->email }}</span></li>
                  <li><i class="fas fa-map-marker-alt"></i><span>Los Angeles, West America</span></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="dash-header-right">



              @foreach ($perfil as $value)
                @if ($value->id == 4)
                  <div class="dash-focus dash-rev">
                    <h2>Seu plano atual é o {{ $value->pacote }}</h2>
                    <p>Você tem {{ $anuncio->totalauncios }} Anúncio(s) de crédito</p>
                  </div>
                @else
                  <div class="dash-focus dash-book">
                    <h2>Seu plano atual é o {{ $value->pacote }}</h2>
                    <p>Você tem {{ $anuncio->totalauncios }} Anúncio(s) de crédito</p>
                  </div>
                @endif
              @endforeach



            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="dash-header-alert alert fade show">
              <p>Mensagem</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="dash-menu-list">
              <ul>
                @include('perfil.menu')
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="dash-header-card">
        <div class="row">
          <div class="container">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data de criação</th>
                    <th scope="col">Título</th>
                    <th scope="col">Data de expiração</th>
                    <th scope="col">Fotos</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($public as $value)
                    <tr>
                      <th scope="row">{{ $value->id }}</th>
                      <td>{{ \Carbon\Carbon::parse($value->datacriacao)->format('d-m-Y') }}
                      </td>
                      <td>{{ $value->titulo }}</td>
                      <td>{{ \Carbon\Carbon::parse($value->datavencimento)->format('d-m-Y') }}</td>
                      <td><a href="{{ url('anuncio/editar/' . $value->id) }}">Ver</a></td>
                      <td>
                        @php
                          $status = $value->status == 1 ? 'Expirado' : 'Ativo';
                          echo $status;
                        @endphp
                      </td>
                    </tr>

                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>

  </section>
@endsection
