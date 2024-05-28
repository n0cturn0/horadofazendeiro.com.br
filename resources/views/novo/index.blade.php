<!DOCTYPE html>
<html lang="pt-br">

<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>horadofazendeiro.com.br</title>
  <meta name="description"
        content="O maior portal de compra e venda de animais da pecuária da internet.                          Compre e venda gado comercial, touros e vacas PO e os melhores cavalos                          diretamente." />
  <link rel="icon"
        type="image/png"
        href="https://www.erural.net/assets/favicons/erural-e30eff7e0ba0ac688712feb7e21d5d7b49b071642048cfe61331b5de18653474.png" />
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet"
        media="all"
        href="{{ asset('novo2/application-b810806e416ea3457c4deeea7c836b1a9af56599736dfbc366794e409d56bfde.css') }}" />

  <link rel="stylesheet"
        media="screen"
        href="{{ asset('novo2/application-b810806e416ea3457c4deeea7c836b1a9af56599736dfbc366794e409d56bfde.css') }}" />
  <link rel="stylesheet"
        media="screen"
        href="{{ asset('novo2/article-1920c26607f361958a333b0a02c099f3d1065161c9e92c2bb4bc3b3bddc1dfed.css') }}" />
  <link rel="stylesheet"
        media="screen"
        href="{{ asset('novo2/crawled_featured_auction_card-a7b390a11208542e691dd4df007c3e2f9ae23c2844762a801549e1e66d560b8f.css') }}" />
  <link rel="stylesheet"
        media="screen"
        href="{{ asset('novo2/product-c195428572d35e0e147f86261e974724314ac2f74c138dd1ed79721a4e4a303d.css') }}" />

  <meta property="og:title"
        content="horadofazendeiro - Pecuária de ponta a ponta" />
  <meta property="og:description"
        content="A maior plataforma de negócios, que conecta a pecuária de todo Mato Grosso do Sul" />
  <meta property="og:image"
        content="https://www.erural.net/assets/logos/erural_e_color_small_bg_white-497ad60426c82663527e41d3ed5c5e4e0c77d9b66bb26f20bc2f0950c7fb9fa8.png" />
</head>

<body>
  <div id="vueApp">
    <header>
      <div class="desktop is-hidden-touch desktop-header">
        <div class="container is-flex is-align-items-center top-header">
          <a href="https://www.erural.net/"
             class="logo is-flex"
             aria-label="Home erural">
            <img class="logo-img"
                 alt="Home - erural"
                 src="https://www.erural.net/assets/logos/erural_color-29185a2792a68a60c53900c81e4b9d1cf8486c1cb2d6bfbde78ee28a037e5ebb.svg" />
          </a>
          <search-field></search-field>
          <user-infos :user-name="null"
                      :avatar-url="null"
                      :logged="false">
          </user-infos>
        </div>
        <div class="subheader">
          <div class="container links-container">
            <a href="https://www.erural.net/">Início</a>
            <a href="https://www.erural.net/agenda-eventos">Agenda de Eventos</a>
            <a
               href="https://www.erural.net/search?classifications=Gen%C3%A9tica&amp;genetic=P.O.%2CP.A.%2CP.C.%2CCEIP">Genética</a>
            <a href="https://www.erural.net/search?categories=S%C3%AAmen+Genex">Sêmen Genex</a>
            <a href="https://www.erural.net/rankings">Rankings</a>
            <a href="https://www.erural.net/selecoes">Seleções</a>
            <a href="https://www.erural.net/venda_conosco">Venda conosco</a>
            <a href="https://blog.erural.net/">Blog</a>
          </div>
        </div>
      </div>
      <div class="mobile-header-container">
        <mobile-header :avatar-url="null"
                       :user-name="null"
                       :logged="false" />
      </div>
    </header>
    <div class="inner-wrap">
      <div class="container">
        <section class="section banners-section body-top-campaign">
          <div class="columns is-centered is-multiline">
            <div class="column is-6">
              <a href="https://www.erural.net/search?classifications=Genética&amp;genetic=P.O.%2CP.A.%2CP.C.%2CCEIP">
                <figure class="image is-2by1 banner">
                  <img alt="Compre seu touro ou sua matriz com as melhores condições"
                       src="assets/banners/nono.jpeg" />
                </figure>
              </a>
            </div>
            <div class="column is-6">
              <a href="https://www.erural.net/evento/1-shopping-selecoes-especiais-ad3f?utm_medium=banner-site"
                 target="_blank">
                <figure class="image is-2by1 banner">
                  <img alt="SELEÇÕES ESPECIAIS"
                       src="assets/banners/teste.jpg" />
                </figure>
              </a>
            </div>
            <div class="column">
              <a href="https://meulote.erural.net/#animal-profile">
                <figure class="image is-5by1 banner is-hidden-tablet">
                  <img alt="Descubra o lote ideal para o seu projeto - Pequena"
                       src="https://www.erural.net/assets/banners/campaign_1_small-235cbffe6de16d565dd3804090feac46f887b439ce0e9e7ddcaf1a6e3c0f237d.png" />
                </figure>
                <figure class="image is-10by1 banner is-hidden-mobile">
                  <img alt="Descubra o lote ideal para o seu projeto - Grande"
                       src="https://www.erural.net/assets/banners/campaign_1_large-e6bb736409744f1f99b82570386c1ba8d6dcf90938df6a690f382761a987e8c7.png" />
                </figure>
              </a>
            </div>
          </div>
        </section>

        <section class="section batches-section">
          <h3 class="title section-title">Lotes em destaque</h3>
          <div class="columns is-mobile is-multiline is-centered is-variable is-1-mobile">
            <div class="column column is-6-touch is-3-desktop">
              <a id="productId127711"
                 class="card-link"
                 href="https://www.erural.net/evento/shopping-nelore-vc-2024-nova-geracao-3d42/lotes/lote-69-c8b6">
                <div class="card product pure">
                  <div class="card-image">
                    <figure class="image is-5by3">
                      <img src="https://i.ytimg.com/vi_webp/ZH7fb4tySp0/sd2.webp"
                           alt="Garrote Nelore VCA-8128"
                           class="scale" />
                      <div class="image-overlay has-text-weight-bold"
                           style="display: none">
                        VENDIDO
                      </div>
                    </figure>

                  </div>
                  <div class="card-content shopping">
                    <div class="content">
                      <div class="tags">
                        <span class="tag"> Lote 70</span><!---->
                      </div>
                      <!----><span class="locator">Shopping Nelore VC 2024 - Nova Geração </span><span
                            class="title">Garrote Nelore VCA-8888</span><span class="promotion"> Por <b>NELORE
                          VC</b></span><span class="promotion"><b>Frete grátis*</b></span><!----><!----><!---->
                    </div>
                  </div>
                  <div class="card-footer">
                    <div>
                      <span class="price"><span>30x </span> R$ 420
                        <!----></span><span class="legend"><span class="has-text-warning"><span
                                class="is-hidden-mobile"> Total de </span> R$
                          12.600,00</span><span class=""> + 8% de comissão </span></span>
                    </div>
                  </div>
                </div>
              </a>
            </div>



            <div class="column column is-6-touch is-3-desktop">
              <a id="productId127711"
                 class="card-link"
                 href="https://www.erural.net/evento/shopping-nelore-vc-2024-nova-geracao-3d42/lotes/lote-69-c8b6">
                <div class="card product pure">
                  <div class="card-image">
                    <figure class="image is-5by3">
                      <img src="https://i.ytimg.com/vi_webp/ZH7fb4tySp0/sd2.webp"
                           alt="Garrote Nelore VCA-8128"
                           class="scale" />
                      <div class="image-overlay has-text-weight-bold"
                           style="display: none">
                        VENDIDO
                      </div>
                    </figure>
                    <!---->
                  </div>
                  <div class="card-content shopping">
                    <div class="content">
                      <div class="tags">
                        <span class="tag"> Lote 70</span><!---->
                      </div>
                      <!----><span class="locator">Shopping Nelore VC 2024 - Nova Geração </span><span
                            class="title">Garrote Nelore VCA-8888</span><span class="promotion"> Por <b>NELORE
                          VC</b></span><span class="promotion"><b>Frete grátis*</b></span><!----><!----><!---->
                    </div>
                  </div>
                  <div class="card-footer">
                    <div>
                      <span class="price"><span>30x </span> R$ 420
                        <!----></span><span class="legend"><span class="has-text-warning"><span
                                class="is-hidden-mobile"> Total de </span> R$
                          12.600,00</span><span class=""> + 8% de comissão </span></span>
                    </div>
                  </div>
                </div>
              </a>
            </div>











            <div class="column column is-6-touch is-3-desktop">
              <a id="productId127711"
                 class="card-link"
                 href="https://www.erural.net/evento/shopping-nelore-vc-2024-nova-geracao-3d42/lotes/lote-69-c8b6">
                <div class="card product pure">
                  <div class="card-image">
                    <figure class="image is-5by3">
                      <img src="https://i.ytimg.com/vi_webp/ZH7fb4tySp0/sd2.webp"
                           alt="Garrote Nelore VCA-9999"
                           class="scale" />
                      <div class="image-overlay has-text-weight-bold"
                           style="display: none">
                        VENDIDO
                      </div>
                    </figure>
                    <!---->
                  </div>
                  <div class="card-content shopping">
                    <div class="content">
                      <div class="tags">
                        <span class="tag"> Lote 69</span><!---->
                      </div>
                      <!----><span class="locator">Shopping Nelore VC 2024 - Nova Geração </span><span
                            class="title">Garrote Nelore VCA-8128</span><span class="promotion"> Por <b>NELORE
                          VC</b></span><span class="promotion"><b>Frete grátis*</b></span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div>
                      <span class="price"><span>30x </span> R$ 420
                        <!----></span><span class="legend"><span class="has-text-warning"><span
                                class="is-hidden-mobile"> Total de </span> R$
                          12.600,00</span><span class=""> + 8% de comissão </span></span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="column column is-6-touch is-3-desktop">
              <a id="productId121035"
                 class="card-link"
                 href="https://www.erural.net/evento/erural-embryo-venda-permanente-7b89/lotes/embriao-nelore-mbo-1709-bibana-fiv-de-maripa-2022">
                <div class="card product pure">
                  <div class="card-image">
                    <figure class="image is-5by3">
                      <img src="https://i.ytimg.com/vi_webp/5lalgpXCxvs/sd3.webp"
                           alt="PACOTE 02 AGRO MARIPÁ "
                           class="scale" />
                      <div class="image-overlay has-text-weight-bold"
                           style="display: none">
                        VENDIDO
                      </div>
                    </figure>
                    <!---->
                  </div>
                  <div class="card-content shopping">
                    <div class="content">
                      <div class="tags">
                        <span class="tag"> Lote 12</span><!---->
                      </div>
                      <!----><span class="locator">ERURAL EMBRYO - VENDA PERMANENTE </span><span class="title">PACOTE
                        02 AGRO MARIPÁ </span><!----><span class="promotion"><b>Frete
                          grátis*</b></span><!----><!----><!---->
                    </div>
                  </div>
                  <div class="card-footer">
                    <div>
                      <span class="price"><span>30x </span> R$ 1.000
                        <!----></span><span class="legend"><span class="has-text-warning"><span
                                class="is-hidden-mobile"> Total de </span> R$
                          30.000,00</span><span class=""> + % de comissão </span></span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div class="column column is-6-touch is-3-desktop">
              <a id="productId127816"
                 class="card-link"
                 href="https://www.erural.net/evento/2-leilao-nelore-lupera-1751/lotes/lote-42-4b82">
                <div class="card product pure">
                  <div class="card-image">
                    <figure class="image is-5by3">
                      <img src="https://i.ytimg.com/vi_webp/h9nnteAUVSM/sd2.webp"
                           alt="Novilha Nelore LUPE-618"
                           class="scale" />
                      <div class="image-overlay has-text-weight-bold"
                           style="display: none">
                        VENDIDO
                      </div>
                    </figure>
                    <!---->
                  </div>
                  <div class="card-content auction">
                    <div class="content">
                      <div class="tags">
                        <span class="tag"> Lote 42</span><!---->
                      </div>
                      <!----><span class="locator">2° LEILÃO NELORE LUPERA - 09/04/2024</span><span
                            class="title">Novilha Nelore LUPE-618</span><span class="promotion"> Por <b>Nelore
                          Lupera</b></span><span class="promotion"><b>Frete grátis*</b></span><!----><!----><!---->
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="button is-outlined is-warning is-fullwidth">
                      Veja o Lote
                    </button>
                  </div>
                </div>
              </a>
            </div>
            <div class="column column is-6-touch is-3-desktop">
              <a id="productId127802"
                 class="card-link"
                 href="https://www.erural.net/evento/2-leilao-nelore-lupera-1751/lotes/lote-26-7752">
                <div class="card product pure">
                  <div class="card-image">
                    <figure class="image is-5by3">
                      <img src="https://i.ytimg.com/vi_webp/5-eysmeal6Y/sd2.webp"
                           alt="Matriz Nelore LUPE-486"
                           class="scale" />
                      <div class="image-overlay has-text-weight-bold"
                           style="display: none">
                        VENDIDO
                      </div>
                    </figure>
                    <!---->
                  </div>
                  <div class="card-content auction">
                    <div class="content">
                      <div class="tags">
                        <span class="tag"> Lote 26</span><!---->
                      </div>
                      <!----><span class="locator">2° LEILÃO NELORE LUPERA - 09/04/2024</span><span
                            class="title">Matriz Nelore LUPE-486</span><span class="promotion"> Por <b>Nelore
                          Lupera</b></span><span class="promotion"><b>Frete grátis*</b></span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="button is-outlined is-warning is-fullwidth">
                      Veja o Lote
                    </button>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </section>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="footer-hub mb-6"></div>
        <div class="level links">
          <div class="level-left redirects is-flex px-2">
            <a class="mr-6"
               href="https://www.erural.net/termos_uso">Termos de uso</a>
            <a class="mr-6"
               href="https://www.erural.net/politica_privacidade">Política de privacidade</a>
            <a href="https://www.erural.net/politica_cookies">Política de cookies</a>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="text-container is-flex-row is-justify-content-center is-align-content-center">
            <div class="copyright">
              © 2024 - erural - Todos os direitos reservados
              <br class="is-hidden-desktop" />
              CNPJ: 31.793.454/0001-90
            </div>
            <div class="address">
              Edifício TK Tower - Sala 1806, Av Professor Magalhães Neto,
              1856, Pituba, Salvador, BA - 41810-011
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</body>

</html>
