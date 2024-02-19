@extends('template.template')
@section('content')

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
                <h2>Bem-vindo</h2>
                <p>Seu usuário e senha para acessar os anúncios.</p>
            </div>
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group"><input type="text" class="form-control"
                                placeholder="Usuário / e-mail"><small class="form-alert">seu@email.com 
                                </small></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><input type="password" class="form-control" id="pass"
                                placeholder="Senha"><button type="button" class="form-icon"><i
                                    class="eye fas fa-eye"></i></button><small class="form-alert">No mínimo 6 caractéres</small></div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox"><input type="checkbox"
                                    class="custom-control-input" id="signin-check"><label
                                    class="custom-control-label" for="signin-check">Remember me</label></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group text-right"><a href="#" class="form-forgot">Forgot password?</a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><button type="submit" class="btn btn-inline"><i
                                    class="fas fa-unlock"></i><span>Acessar</span></button></div>
                    </div>
                </div>
            </form>
            <div class="user-form-direction">
                <!-- <p>Don't have an account? click on the <span>( sign up )</span>button above.</p> -->
            </div>
        </div>
        <div class="tab-pane" id="register-tab">
            <div class="user-form-title">
                <h2>Register</h2>
                <p>Setup a new account in a minute.</p>
            </div>
            <ul class="user-form-option">
                <li><a href="#"><i class="fab fa-facebook-f"></i><span>facebook</span></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i><span>twitter</span></a></li>
                <li><a href="#"><i class="fab fa-google"></i><span>google</span></a></li>
            </ul>
            <div class="user-form-devider">
                <p>or</p>
            </div>
            <form>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group"><input type="text" class="form-control"
                                placeholder="Phone number"><small class="form-alert">Please follow this example -
                                01XXXXXXXXX</small></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><input type="password" class="form-control"
                                placeholder="Password"><button class="form-icon"><i
                                    class="eye fas fa-eye"></i></button><small class="form-alert">Password must be 6
                                characters</small></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><input type="password" class="form-control"
                                placeholder="Repeat Password"><button class="form-icon"><i
                                    class="eye fas fa-eye"></i></button><small class="form-alert">Password must be 6
                                characters</small></div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox"><input type="checkbox"
                                    class="custom-control-input" id="signup-check"><label
                                    class="custom-control-label" for="signup-check">I agree to the all <a
                                        href="#">terms & consitions</a>of bebostha.</label></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group"><button type="submit" class="btn btn-inline"><i
                                    class="fas fa-user-check"></i><span>Create new account</span></button></div>
                    </div>
                </div>
            </form>
            <div class="user-form-direction">
                <p>Already have an account? click on the <span>( sign in )</span>button above.</p>
            </div>
        </div>
    </div>
</section>

@endsection