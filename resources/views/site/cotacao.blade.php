@extends('template.template')
@section('content')
  <header class="header-part">
    <div class="container">
      <div class="header-content">
        <div class="header-left"><a href="#"
             class="header-logo">horadofazendeiro.com.br</a><a href="user-form.html"
             class="header-widget header-user"></a><button type="button"
                  class="header-widget search-btn"><i class="fas fa-search"></i></button></div>
        <form class="header-form">
          <div class="header-search"><button type="submit"
                    title="Search Submit "><i class="fas fa-search"></i></button><input type="text"
                   placeholder="Pesquisar..."
                   disabled><button type="button"
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
                       placeholder="Preço Máximo"></div><button type="submit"
                      disabled><i class="fas fa-search"></i><span>Pesquisar</span></button>
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
      <div class="mobile-group"><a href="index.html"
           class="mobile-widget">
          <i class="fas fa-home"></i><span>Principal</span></a>
        <a href="{{ route('login') }}"
           class="mobile-widget plus-btn"><i class="fas fa-plus"></i><span>Anunciar</span></a>
        <a href="user-form.html"
           class="mobile-widget">
          <i class="fas fa-user"></i><span>Entrar</span></a>

        <div class="mobile-widget"><i class="fas fa-envelope"></i><span>message</span><sup>0</sup></a>
        </div>
      </div>
  </nav><br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-6">

        <div class="common-card">
          <h1><span class="badge badge-warning">VACA</span></h1>
          <div class="card-header">
            @if ($vaca->length > 0)
              <table class="table">
                <thead>
                  <tr>

                    <th scope="col">Data</th>
                    <th scope="col">Praça</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Com Funrural</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($vaca as $tableNode)
                    @foreach ($tableNode->getElementsByTagName('tr') as $rowNode)
                      @if ($rowNode->nodeType === XML_ELEMENT_NODE)
                        <tr>
                          @foreach ($rowNode->getElementsByTagName('td') as $cellNode)
                            @if ($cellNode->nodeType === XML_ELEMENT_NODE)
                              <td>{{ $cellNode->textContent }}</td>
                            @endif
                          @endforeach
                      @endif
                    @endforeach




                    </tr>
                  @endforeach


                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-6">
        <div class="common-card">
          <h1><span class="badge badge-warning">BOI</span></h1>
          <div class="card-header">
            @if ($table->length > 0)
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Praça</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Com Funrural</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($table as $tableNode)
                    @foreach ($tableNode->getElementsByTagName('tr') as $rowNode)
                      @if ($rowNode->nodeType === XML_ELEMENT_NODE)
                        {{-- Initialize a variable to track whether the row should be highlighted --}}
                        @php $highlightRow = false; @endphp

                        {{-- Loop through the cell nodes --}}
                        @foreach ($rowNode->getElementsByTagName('td') as $cellNode)
                          @if ($cellNode->nodeType === XML_ELEMENT_NODE)
                            <td>
                              {{-- Check if it's the "Praça" column --}}
                              @if ($loop->parent->index === 1 && $loop->index === 1)
                                {{-- Check if the cell value is "Mato Grosso do Sul" --}}
                                @if ($cellNode->textContent == 'Mato Grosso do Sul')
                                  {{-- If it is, set the variable to true --}}
                                  @php $highlightRow = true; @endphp
                                  {{-- Output the value with the badge --}}
                                  <span class="badge badge-warning">{{ $cellNode->textContent }}</span>
                                @else
                                  {{-- Output the value without the badge --}}
                                  {{ $cellNode->textContent }}
                                @endif
                              @else
                                {{-- Output the value of other columns --}}
                                {{ $cellNode->textContent }}
                              @endif
                            </td>
                          @endif
                        @endforeach

                        {{-- Check if the row should be highlighted --}}
                        @if ($highlightRow)
                          {{-- If it should, add the "table-primary" class to the row --}}
                          <tr class="table-primary">
                          @else
                            {{-- If it shouldn't, add a normal row --}}
                          <tr>
                        @endif
                      @endif
                    @endforeach
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
