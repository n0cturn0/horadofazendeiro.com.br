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
                        <div class="dash-avatar"><a href="#"><img src="images/avatar/01.jpg" alt="avatar"></a></div>
                        <div class="dash-intro">
                            <h4><a href="#">gackon Honson</a></h4>
                            <h5>new seller</h5>
                            <ul class="dash-meta">
                                <li><i class="fas fa-phone-alt"></i><span>(123) 000-1234</span></li>
                                <li><i class="fas fa-envelope"></i><span>gackon@gmail.com</span></li>
                                <li><i class="fas fa-map-marker-alt"></i><span>Los Angeles, West America</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="dash-header-right">
                        
                        <div class="dash-focus dash-book">
                            <h2>2433</h2>
                            <p>total follower</p>
                        </div>
                        <div class="dash-focus dash-rev">
                            <h2>2433</h2>
                            <p>total review</p>
                        </div>
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
    </div>
</section>
@endsection