@extends('template.template')
@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
<section class="user-form-part">
    <div class="user-form-banner">
        <div class="user-form-content"><a href="#"><img src="images/logo.png" alt="logo"></a>
            <h1>horadofazendeiro.com.br <span></span></h1>
            {{-- <p>Biggest Online Advertising Marketplace in the World.</p> --}}
        </div>
    </div>
    <div class="user-form-category">
        <div class="user-form-header"><a href="#"><img src="images/logo.png" alt="logo"></a><a href="index.html"><i
                    class="fas fa-arrow-left"></i></a></div>
        <div class="user-form-category-btn">
            <ul class="nav nav-tabs">
                <li><a href="{{ url('login') }}" class="nav-link active" data-toggle="tab">Acessar</a></li>
                <li><a href="{{ url('formulario') }}" class="nav-link" data-toggle="tab">Registrar</a></li>
            </ul>
        </div>
        <div class="tab-pane active" id="login-tab">
           
          
                <div class="user-form-title">
                    <h2>Registrar usuário</h2>
                    <p>Para anunciar é necessário realizar o cadastro.</p>
                </div>
              
                
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <x-text-input id="name" class="form-control" placeholder="Seu nome" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            {{-- <input type="text" class="" placeholder="Seu nome"> --}}
                            <small class="form-alert">Digite seu nome </small>
                        </div>
                        </div>


                        <div class="col-12">
                        <div class="form-group">
                        <x-text-input id="email" class="form-control" type="email" placeholder="Seu e-mail" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        {{-- <input name="email" type="text" class="form-control" placeholder="Seu e-mail"> --}}
                        <small class="form-alert">seu@email.com.br</small>
                        </div>
                        </div>
                        
                        
                        
                        <div class="col-12">
                        <div class="form-group">
                        <x-text-input id="telefone" class="form-control" type="text" placeholder="Seu telefone" name="telefone" :value="old('telefone')" required autocomplete="telefone" />
                        <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                        {{-- <input name="telefone" type="text" class="form-control"placeholder="Seu telefone"> --}}
                        <small class="form-alert">067 99999-0000</small>
                        </div>
                        </div>
                        
                        
                      
                        <div class="col-12">
                        <div class="form-group">
                        {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                        <x-text-input id="password" placeholder="Sua senha" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <button class="form-icon">
                        <i class="eye fas fa-eye"></i>
                        </button>
                        <small class="form-alert">Senha no mínimo 8 caracteres</small>
                        </div>
                        </div>





                        <div class="col-12">
                        <div class="form-group">
                            <x-text-input id="password_confirmation" placeholder="Confirme a senha" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />    
                        {{-- <input type="password" class="form-control" placeholder="Repeat Password"> --}}
                        <button class="form-icon">
                        <i class="eye fas fa-eye"></i>
                        </button>
                        <small class="form-alert">Confirme a sua senha</small>
                        </div>
                        </div>






                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox"><input type="checkbox"
                                        class="custom-control-input" id="signup-check"><label
                                        class="custom-control-label" for="signup-check">Li e aceito os <a
                                            href="#">termos e condições</a>.</label></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group"><button type="submit" class="btn btn-inline"><i
                                        class="fas fa-user-check"></i><span>Criar novo usuário</span></button></div>
                        </div>
                    </div>
                </form>
                
         
           
        </div>
        
    </div>
</section>
</form>
@endsection