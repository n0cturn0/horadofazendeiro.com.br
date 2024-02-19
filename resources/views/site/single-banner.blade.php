<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        /* .single-banner {
    background: url("{{ asset('public/images/bg/01.jpg') }}");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 100px 0px;
    position: relative;
    z-index: 1;
}
.banner-part {
    background: url("{{ asset('images/bg/01.jpg') }}");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding: 95px 0px 178px;
    position: relative;
    z-index: 1
} */

.intro-part::before {
    position: absolute;
    content: "";
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background: url(../../images/bg/02.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover
}
    </style>

{{-- <section class="banner-part">
    <div class="container">
        <div class="banner-content">
            
            <!-- <h1></h1> -->
            <p>Conectando criadores aos melhores lares para seus rebanhos. Encontre o parceiro perfeito para seus animais no nosso mercado de gados, onde a qualidade se encontra com a tradição.</p>
        </div>
    </div>
</section> --}}
</body>
</html>