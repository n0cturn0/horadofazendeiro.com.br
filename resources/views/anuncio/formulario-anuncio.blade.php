


   

   

       





<section class="adpost-part">
    <div class="container">
        <x-alert />
        
    <form id="formularioAnuncio" method="post" action="{{ route('anuncio-add') }} " enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <form class="adpost-form">
                    <div class="adpost-card">
                        <div class="adpost-title">
                            <h3>Informações do anúncio</h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group"><label class="form-label">Título Anúncio</label>
                                    <input
                                    name="titulo" value="{{ old('titulo') }}" placeholder="Título Anúncio"   type="text" class="form-control" placeholder="Type your product title here">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Selecione sua cidade</label>
                                    <select  name="cidade" id="precotipo"
                                        class="form-control custom-select">
                                        <option selected>=-Selecione-=</option>
                                        <option value="Rio Negro">Rio Negro</option>
                                        <option value="Corguinho">Corguinho</option>
                                       
                                    </select></div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Preço Kg / Un</label>
                                    <select name="precotipo" id="precotipo"
                                        class="form-control custom-select">
                                        <option selected>=-Selecione-=</option>
                                        <option value="0">Kg</option>
                                        <option value="1">Unidade</option>
                                       
                                    </select></div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group"><label class="form-label">Preço</label>
                                    <input type="number"  name="preco" value="{{ old('preco') }}" placeholder="Preço R$"
                                        class="form-control"></div>
                            </div>



                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Enviar fotos</label>
                                   <input type="file" class="btn btn-inline"  name="fotos[]" multiple >
                                </div>
                            </div>

                            
                       
                            <div class="col-lg-12">
                                <div class="form-group"><label class="form-label">Descreça seu anúncio</label>
                                    <textarea  class="form-control" name="anuncio"  placeholder="DIGITE O ANÚNCIO">{{ old('anuncio') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="adpost-card pb-2">
                        <div class="adpost-agree">
                            <div class="form-group"><input type="checkbox" class="form-check"></div>
                           
                        </div>
                        <div class="form-group text-right">
                            {{-- <input type="submit" value="Cria anuncio" /> --}}
                                    <button class="btn btn-inline"><i
                                    class="fas fa-check-circle"></i><span>publicar meu anúncio</span></button></div>
                    </div>
                </form>
            </div>
           
        </div>
    </div>
</section>
</form>
