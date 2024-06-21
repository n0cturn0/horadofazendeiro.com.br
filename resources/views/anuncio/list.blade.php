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
            <nav class="bg-white shadow-md rounded-lg"
                 x-data="{ open: false }">
              <div class="flex items-center justify-between px-4 py-3">
                <div class="text-xl font-semibold">Menu</div>
                <div class="lg:hidden">
                  <button @click="open = !open"
                          class="text-gray-500 focus:outline-none focus:text-gray-600">
                    <svg class="w-6 h-6"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                  </button>
                </div>
                <div class="hidden lg:block">
                  <ul class="flex space-x-4">
                    @include('perfil.menu')
                  </ul>
                </div>
              </div>
              <div :class="{ 'block': open, 'hidden': !open }"
                   class="lg:hidden">
                <ul class="px-2 pb-4">
                  @include('perfil.menu')
                </ul>
              </div>
            </nav>
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
                    {{-- <th scope="col">#</th> --}}
                    {{-- <th scope="col">Data de criação</th> --}}
                    <th scope="col">Título do anúncio</th>
                    {{-- <th scope="col">Data de expiração</th> --}}
                    <th scope="col">Fotos</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($public as $value)
                    <tr>
                      {{-- <th scope="row">{{ $value->id }}</th> --}}
                      {{-- <td>{{ \Carbon\Carbon::parse($value->datacriacao)->format('d-m-Y') }} --}}
                      </td>
                      <td>
                        <a href="{{ url('anuncio/editar/' . $value->id) }}">
                          {{ $value->titulo }} </a>
                      </td>
                      {{-- <td>{{ \Carbon\Carbon::parse($value->datavencimento)->format('d-m-Y') }}</td> --}}
                      <td><a href="{{ url('anuncio/editar/' . $value->id) }}"><i class="material-icons">camera_alt</i></a>

                      </td>
                      <td>
                        @php
                          $status =
                              $value->status == 1
                                  ? '<span title="Expirado em ' .
                                      \Carbon\Carbon::parse($value->datavencimento)->format('d-m-Y') .
                                      '"><i class="material-icons text-red-500">cancel</i></span>'
                                  : '<span title="Ativo até ' .
                                      \Carbon\Carbon::parse($value->datavencimento)->format('d-m-Y') .
                                      '"><i class="material-icons text-green-500">check_circle</i></span>';
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
