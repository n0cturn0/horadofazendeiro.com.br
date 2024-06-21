@extends('template.template')
@section('content')
  <header class="header-part">
    <div class="container">
      <div class="header-content">
        <div class="header-left"><a href="#"
             class="header-logo">horadofazendeiro.com.br</a><a href="{{ route('login') }}"
             class="header-widget header-user"></a><button type="button"
                  class="header-widget search-btn"><i class="fas fa-search"></i></button></div>
        <form class="header-form">
          <div class="header-search"><button type="submit"
                    title="Search Submit "><i class="fas fa-search"></i></button><input type="text"
                   placeholder="Pesquisar..."><button type="button"
                    title="Search Option"
                    class="option-btn"><i class="fas fa-sliders-h"></i></button></div>
          <div class="header-option">
            <div class="option-grid">
              <div class="option-group"><input type="text"
                       placeholder="Cidade"></div>
              {{-- <div class="option-group"><input type="text" placeholder="State"></div> --}}
              <div class="option-group"><input type="text"
                       placeholder="Preço Mínimo"></div>
              <div class="option-group"><input type="text"
                       placeholder="Preço Máximo"></div><button type="submit"><i
                   class="fas fa-search"></i><span>Pesquisar</span></button>
            </div>
          </div>
        </form>
        <div class="header-right">
          <a href="{{ route('cotacao') }}"
             class="btn btn-inline post-btn"><i class="fas fa-plus-circle"></i><span>Cotação</span></a>

          <a href="{{ route('login') }}"
             class="btn btn-inline post-btn"><i class="fas fa-plus-circle"></i><span>Faça Seu anúncio</span></a>
        </div>

      </div>
    </div>
    </div>
  </header>

  <nav class="mobile-nav">
    <div class="container">
      <div class="mobile-group"><a href=""
           class="mobile-widget">
          <i class="fas fa-home"></i><span>Principal</span></a>
        <a href="{{ route('login') }}"
           class="mobile-widget plus-btn"><i class="fas fa-plus"></i><span>Anunciar</span></a>
        <a href="{{ route('login') }}"
           class="mobile-widget">
          <i class="fas fa-user"></i><span>Entrar</span></a>
        <!-- <a
                                                                                                                                                                                                                                                                                                                                                      href="notification.html" class="mobile-widget"><i
                                                                                                                                                                                                                                                                                                                                                          class="fas fa-bell"></i><span>notify</span><sup>0</sup></a> -->
        <!-- <a href="message.html"
                                                                                                                                                                                                                                                                                                                                                      class="mobile-widget"><i class="fas fa-envelope"></i><span>message</span><sup>0</sup></a></div> -->
      </div>
    </div>
  </nav>
  @include('site.single-banner')



  <section class="section trend-part">


    <div class="container">
      <div class="row justify-content-center">
        @foreach ($anuncios as $id => $item)
          <div class="col-md-11 col-lg-8 col-xl-6"
               style="padding-bottom: 3px;">



            <div class="product-card
               standard">

              <div class="product-media">
                @if (count($item['fotos']) > 0)
                  @foreach ($item['fotos'] as $foto)
                    @php
                      $primeiraImagem = $foto->arquivo ?? null;
                      $url = $primeiraImagem ? Storage::disk('public')->url($primeiraImagem) : null;
                    @endphp
                  @endforeach
                @endif


                <div class="product-img">
                  <a href="{{ url('site/detalhe/' . $item['anuncio']->id) }}">
                    <img src="{{ $url }}"
                         alt="product"> </a>
                </div>






                {{-- <div class="cross-vertical-badge product-badge"><i
                                class="fas fa-bolt"></i><span>trending</span></div> --}}
                {{-- <div class="product-type"><span class="flat-badge sale">Venda</span></div> --}}
                <ul class="product-action">
                  {{-- <li class="view"><i class="fas fa-eye"></i><span>264</span></li>
                  <li class="click"><i class="fas fa-mouse"></i><span>134</span></li>
                  <li class="rating"><i class="fas fa-star"></i><span>4.5/7</span></li> --}}
                </ul>
              </div>
              <div class="product-content">
                <ol class="breadcrumb product-category">
                  <li><i class="fas fa-tags"></i></li>
                  {{-- <li class="breadcrumb-item"><a href="#">Compra</a></li> --}}
                  <li class="breadcrumb-item active"
                      aria-current="page">Venda Direta</li>
                </ol>
                <h5 class="product-title"><a
                     href="{{ url('site/detalhe/' . $item['anuncio']->id) }}">{{ $item['anuncio']->titulo }}</a></h5>
                <div class="product-meta"><span><i class="fas fa-map-marker-alt"></i>{{ $item['anuncio']->cidade }}
                  </span></div>
                <div class="product-info">
                  <h5 class="product-price">R$ {{ $item['anuncio']->preco }}<span></span></h5>
                  {{-- <div class="product-btn"><a href="compare.html"
                       title="Compare"
                       class="fas fa-compress"></a><button type="button"
                            title="Wishlist"
                            class="far fa-heart"></button></div> --}}
                </div>
              </div>
            </div>

          </div>
        @endforeach




      </div>

    </div>







  </section>


  <section class="intro-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <!-- <h2>Do you have something to advertise?</h2> -->
            <p style="color: #e1e8f5; font-size: 30px; font-weight: bold;  margin-bottom: 20px;">Conduzindo o futuro da
              agropecuária, um boi de cada vez. Encontre seu parceiro ideal no pasto virtual dos negócios!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="price-part">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-center-heading">
            <h1 style="color: #0044bb; font-size: 60px; font-weight: bold; text-align: center; margin-bottom: 1px;">
              ANUNCIE AGORA

          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($pacote as $itemPacote)
          <div class="col-md-6 col-lg-4">
            <div class="price-card">
              <div class="price-head">
                <h3>{{ $itemPacote->pacote }}</h3>
                <h4>R$: {{ $itemPacote->valor }} </h4>
              </div>
              <ul class="price-list">
                <li><i class="fas fa-plus"></i>
                  <p>{{ $itemPacote->quantidade }} Anúncios</p>
                </li>
                <!-- <li><i class="fas fa-times"></i>
                                                                                                                                                                                                                                                                                                                                                                  <p>Grátis</p>
                                                                                                                                                                                                                                                                                                                                                              </li> -->
                <li><i class="fas fa-times"></i>
                  <p>Válido por {{ $itemPacote->diasativos }} dias</p>
                </li>
                <!-- <li><i class="fas fa-times"></i> -->
                <!-- <p>No Ad will be bumped up</p>
                                                                                                                                                                                                                                                                                                                                                              </li>
                                                                                                                                                                                                                                                                                                                                                              <li><i class="fas fa-plus"></i>
                                                                                                                                                                                                                                                                                                                                                                  <p>Limited Support</p>
                                                                                                                                                                                                                                                                                                                                                              </li> -->
              </ul>
              <div class="price-btn"><a href="{{ route('login') }}"
                   class="btn btn-inline"><i class="fas fa-sign-in-alt"></i><span>Anúncie grátis</span></a></div>
            </div>
          </div>
        @endforeach
        {{-- <div class="col-md-6 col-lg-4">
                <div class="price-card price-active">
                    <div class="price-head">
                        <h3>$23</h3>
                        <h4>Assinatura Bronze</h4>
                    </div>
                    <ul class="price-list">
                        <li><i class="fas fa-plus"></i>
                            <p>1 Recom Ad for 30 days</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Featured Ad Available</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Ad will be bumped up</p>
                        </li>
                        <li><i class="fas fa-times"></i>
                            <p>No Top Ad Available</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Basic Support</p>
                        </li>
                    </ul>
                    <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                </div>
            </div> --}}
        {{-- <div class="col-md-6 col-lg-4">
                <div class="price-card">
                    <div class="price-head">
                        <h3>$49</h3>
                        <h4>Assinatura Ouro</h4>
                    </div>
                    <ul class="price-list">
                        <li><i class="fas fa-plus"></i>
                            <p>1 Featured Ad for 60 days</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Access to All features</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>With Recommended</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Ad Top Category</p>
                        </li>
                        <li><i class="fas fa-plus"></i>
                            <p>Priority Support</p>
                        </li>
                    </ul>
                    <div class="price-btn"><a href="user-form.html" class="btn btn-inline"><i
                                class="fas fa-sign-in-alt"></i><span>Register Now</span></a></div>
                </div>
            </div> --}}
      </div>
    </div>
  </section><br>
  <footer class="footer-part">
    <div class="container">

      {{-- <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content">
                    <h3>Contato</h3>
                    <ul class="footer-address">
                        <li><i class="fas fa-map-marker-alt"></i>
                            <p>Mato Grosso do Sul <span>Campo Grande</span></p>
                        </li>
                        <!-- <li><i class="fas fa-envelope"></i>
                            <p>support@classicads.com <span>info@classicads.com</span></p>
                        </li> -->
                        <li><i class="fas fa-phone-alt"></i>
                            <p>+55 67 99130-2726 <span></span></p>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content">
                    <h3>Quick Links</h3>
                    <ul class="footer-widget">
                        <li><a href="#">Store Location</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Size Guide</a></li>
                        <li><a href="#">Faq</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-content">
                    <h3>Information</h3>
                    <ul class="footer-widget">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery System</a></li>
                        <li><a href="#">Secure Payment</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="footer-info"><a href="#"><img src="images/logo.png" alt="logo"></a>
                    <ul class="footer-count">
                        <li>
                            <h5>929,238</h5>
                            <p>Registered Users</p>
                        </li>
                        <li>
                            <h5>242,789</h5>
                            <p>Community Ads</p>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div> --}}

    </div>
    <div class="footer-end">
      <div class="container">
        <div class="footer-end-content">
          <p>Direitos reservados &copy; 2024- Criado por <a
               href="https://www.horadofazendeiro.com.br">horadofazendeiro.com.br</a> <a
               href=" https://wa.me//5567991302726?text=Mensagem direta da horadofazendeiro.co.br">Contato</a></p>

        </div>
      </div>
    </div>
  </footer>
  <div class="modal fade"
       id="currency">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Choose a Currency</h4><button class="fas fa-times"
                  data-dismiss="modal"></button>
        </div>

      </div>
    </div>
  </div>
  <div class="modal fade"
       id="language">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Choose a Language</h4><button class="fas fa-times"
                  data-dismiss="modal"></button>
        </div>
        <div class="modal-body"><button class="modal-link active">English</button><button
                  class="modal-link">bangali</button><button class="modal-link">arabic</button><button
                  class="modal-link">germany</button><button class="modal-link">spanish</button></div>
      </div>
    </div>
  </div>
@endsection
