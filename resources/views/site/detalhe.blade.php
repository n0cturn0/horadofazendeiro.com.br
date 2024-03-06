@extends('template.template')
@section('content')
<section class="inner-section ad-details-part">
    <div class="container">
        <div class="row content-reverse">
            <div class="col-lg-4">
                <div class="common-card price">
                    <h3>$2347<span>/negotiable</span></h3><i class="fas fa-tag"></i>
                </div><button type="button" class="common-card number" data-toggle="modal" data-target="#number">
                    <h3>(+880)<span>Click to show</span></h3><i class="fas fa-phone"></i>
                </button>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">author info</h5>
                    </div>
                    <div class="ad-details-author"><a href="#" class="author-img active"><img
                                src="images/avatar/01.jpg" alt="avatar"></a>
                        <div class="author-meta">
                            <h4><a href="#">Jackon Honson</a></h4>
                            <h5>joined: february 02, 2021</h5>
                            <p>Corporis dolore libero temporibus minus tempora quia voluptas nesciunt.</p>
                        </div>
                        <div class="author-widget"><a href="profile.html" title="Profile" class="fas fa-eye"></a><a
                                href="message.html" title="Message" class="fas fa-envelope"></a><button
                                type="button" title="Follow" class="follow fas fa-heart"></button><button
                                type="button" title="Number" class="fas fa-phone" data-toggle="modal"
                                data-target="#number"></button><button type="button" title="Share"
                                class="fas fa-share-alt" data-toggle="modal" data-target="#profile-share"></button>
                        </div>
                     
                    </div>
                </div>
                
              
               
                
            </div>
            <div class="col-lg-8">
                <div class="common-card">
                    <ol class="breadcrumb ad-details-breadcrumb">
                        <li><span class="flat-badge sale">for sale</span></li>
                        <li class="breadcrumb-item"><a href="#">Property</a></li>
                        <li class="breadcrumb-item active" aria-current="page">house</li>
                    </ol>
                    <h5 class="ad-details-address">1420 west jalkuri, shiddirganj, Narayanganj</h5>
                    <h3 class="ad-details-title">Lorem ipsum dolor sit amet consectetur adipisicing elit Maxime ab
                        nesciunt dignissimos.</h3>
                    <div class="ad-details-meta"><a class="view"><i
                                class="fas fa-eye"></i><span><strong>(134)</strong>preview</span></a><a
                            class="click"><i class="fas fa-mouse"></i><span><strong>(76)</strong>click</span></a><a
                            href="#review" class="rating"><i
                                class="fas fa-star"></i><span><strong>(29)</strong>review</span></a></div>
                    <div class="ad-details-slider-group">
                        <div class="ad-details-slider slider-arrow">
                            @foreach ( $agrupado as $foto )
                            @if(!empty($foto->arquivo))
                            @php
                                 $primeiraImagem = $foto->arquivo;
                                 $url = Storage::disk('public')->url($primeiraImagem);
                            @endphp
                            <div><img src="{{ $url }}" alt="details"></div>
                            @endif
                            @endforeach
                           
                           
                            {{-- <div><img src="images/product/01.jpg" alt="details"></div>
                            <div><img src="images/product/01.jpg" alt="details"></div>
                            <div><img src="images/product/01.jpg" alt="details"></div> --}}
                        </div>
                        <div class="cross-vertical-badge ad-details-badge"><i
                                class="fas fa-clipboard-check"></i><span>recommend</span></div>
                    </div>
                    <div class="ad-thumb-slider">
                        @foreach ( $agrupado as $foto )
                        @if(!empty($foto->arquivo))
                        @php
                             $primeiraImagem = $foto->arquivo;
                             $url = Storage::disk('public')->url($primeiraImagem);
                        @endphp
                        <div><img src="{{ $url }}" alt="details"></div>
                        @endif
                        @endforeach
                        {{-- <div><img src="images/product/01.jpg" alt="details"></div>
                        <div><img src="images/product/01.jpg" alt="details"></div>
                        <div><img src="images/product/01.jpg" alt="details"></div>
                        <div><img src="images/product/01.jpg" alt="details"></div> --}}
                    </div>
                    <div class="ad-details-action"><button type="button" class="wish"><i
                                class="fas fa-heart"></i>bookmark</button><button type="button"><i
                                class="fas fa-exclamation-triangle"></i>report</button><button type="button"
                            data-toggle="modal" data-target="#ad-share"><i class="fas fa-share-alt"></i>share
                        </button></div>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">Specification</h5>
                    </div>
                    <ul class="ad-details-specific">
                        <li>
                            <h6>price:</h6>
                            <p>$2,347</p>
                        </li>
                        <li>
                            <h6>seller type:</h6>
                            <p>personal</p>
                        </li>
                        <li>
                            <h6>published:</h6>
                            <p>february 02, 2021</p>
                        </li>
                        <li>
                            <h6>location:</h6>
                            <p>jalkuri, narayanganj</p>
                        </li>
                        <li>
                            <h6>category:</h6>
                            <p>property</p>
                        </li>
                        <li>
                            <h6>condition:</h6>
                            <p>used</p>
                        </li>
                        <li>
                            <h6>price type:</h6>
                            <p>negotiable</p>
                        </li>
                        <li>
                            <h6>ad type:</h6>
                            <p>sales</p>
                        </li>
                    </ul>
                </div>
                <div class="common-card">
                    <div class="card-header">
                        <h5 class="card-title">description</h5>
                    </div>
                    <p class="ad-details-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut magni
                        natus vitae qui perferendis, amet suscipit placeat quas, officia non commodi ipsam
                        consequatur, consectetur similique corrupti rerum. Libero reiciendis laudantium quis?
                        Dolorum numquam illo blanditiis delectus adipisci iure distinctio quibusdam earum quia fuga
                        vero odio omnis exercitationem eius unde fugit rerum architecto autem quos dicta quod ab
                        dolores, neque quae</p>
                </div>
               
            </div>
        </div>
    </div>
</section>
@endsection