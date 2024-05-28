@extends('template.template')
@section('content')
  <section class="single-banner dashboard-banner">

  </section>
  <section class="dash-header-part">
    <div class="container">
      <x-alert />
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
              @if (session('success'))
                <div class="alert alert-danger">
                  {{ session('success') }}
                </div>
              @endif
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
    </div>
  </section>
  @include('anuncio.formulario-anuncio')
@endsection
