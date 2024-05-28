<section class="adpost-part">
  <div class="container">
    <x-alert />

    <form id="formularioAnuncio"
          method="post"
          action="{{ route('anuncio-add') }} "
          enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-12">
          <form class="adpost-form">
            <div class="adpost-card">
              <div class="adpost-title">
                <h3>Informações do anúncio</h3>
              </div>
              <div class="row">
                <div class="col-lg-10">
                  <div class="form-group"><label class="form-label">Título Anúncio</label>
                    <input name="titulo"
                           value="{{ old('titulo') }}"
                           placeholder="Título Anúncio"
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">Animal</label>
                    <input name="animal"
                           value="{{ old('animal') }}"
                           placeholder="Ex.: 1 Touro Nelore | 56 Bezerros Nelore"
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">Classificação</label>
                    <input name="classificacao"
                           value="{{ old('classificacao') }}"
                           placeholder="Ex.: Genética Reposição"
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">Tipo Genética</label>
                    <input name="tipogenetica"
                           value="{{ old('tipogenetica') }}"
                           placeholder="Ex.: P.O - Pura Origem"
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">Registro</label>
                    <input name="registro"
                           value="{{ old('registro') }}"
                           placeholder="Ex.: "
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">iABCZ</label>
                    <input name="iabcz"
                           value="{{ old('iabcz') }}"
                           placeholder="Ex.: 15,52 "
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">Peso</label>
                    <input name="peso"
                           value="{{ old('peso') }}"
                           placeholder="Ex.: 60@ "
                           type="text"
                           class="form-control">
                  </div>
                </div>

                <div class="col-lg-5">
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

                <div class="col-lg-5">
                  <div class="form-group"><label class="form-label">Arroba / Unidade</label>
                    <select name="precotipo"
                            id="precotipo"
                            class="form-control hfazendeiro-select2">
                      <option selected>Arroba / Unidade / Lote</option>
                      <option value="0">Arroba</option>
                      <option value="1">Unidade</option>
                      <option value="2">Lote</option>

                    </select>
                  </div>
                </div>


                <div class="col-lg-3">
                  <div class="form-group"><label class="form-label">Preço</label>
                    <input type="number"
                           name="preco"
                           value="{{ old('preco') }}"
                           placeholder="Preço R$"
                           class="form-control">
                  </div>
                </div>



                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-label">Enviar fotos</label>
                    <input type="file"
                           class="btn btn-inline"
                           accept="image/gif, image/jpeg, image/png"
                           name="fotos[]"
                           multiple>
                  </div>
                </div>


                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-label">Enviar vídeo</label>
                    <input class="btn btn-inline"
                           type="file"
                           name="video">

                  </div>
                </div>







                <div class="col-lg-12">
                  <div class="form-group"><label class="form-label">Descreça seu anúncio</label>
                    <textarea class="form-control"
                              name="anuncio"
                              placeholder="DIGITE O ANÚNCIO">{{ old('anuncio') }}</textarea>
                  </div>
                </div>
              </div>
            </div>


            <div class="adpost-card pb-2">
              <div class="adpost-agree">
                <div class="form-group"><input type="checkbox"
                         class="form-check"></div>

              </div>
              <div class="form-group text-right">
                {{-- <input type="submit" value="Cria anuncio" /> --}}
                <button class="btn btn-inline"><i class="fas fa-check-circle"></i><span>publicar meu
                    anúncio</span></button>
              </div>
            </div>
          </form>
        </div>

      </div>
  </div>
</section>
</form>
