@extends('front.layouts.app')
@section('content')


    <!--.navbar-->
   
    <!--/.login-wrap-->
    <!--.header-->
    <header class="header">
        <div class="intro">
            <a href="{{$settings->fb_link}}" target="_blank" rel="nofollow"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="{{$settings->instgram_link}}" target="_blank" rel="nofollow"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="{{$settings->twitter_link}}" target="_blank" rel="nofollow"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div><!--/.intro-->
        <div class="text-intro"><h3>YO CREO, YO LE COMPRO A BOYACÁ</h3></div>
    </header>
    <!--/.header-->
    <!--.proudcts-->
    <div class="proudcts">
        <div class="container">
            <h2 class="text-center">Proudctos Popular</h2>
            <div class="row">
@foreach( $productsPopular as $product)
                <div class="col-md-3">
                    <div class="proudct">
                        <a href="proudct.html">
                            <div class="img-proudct">
                                
                               {!!$product->images_product['image_url'] ? '<img class="img-responsive" src="/public/images/products/'.$product->images_product['image_url'].'" alt="'.$product->p_name.'">':''!!}
                            </div><!--/.img-proudct-->
                            <h4>{!! $product->p_name !!}</h4>
                            <span class="pull-left"><a href="vendor.html"><i class="fa fa-user"></i> {{ $product->seller['name'] }}</a></span>
                            <span class="pull-right">{!! $product->price !!}</span>
                        </a>
                    </div><!--/.proudct-->
                </div><!--/.col-->
               @endforeach
                
            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--/.proudcts-->
    <!--.about-->
    <div class="about text-center">
        <div class="container">
            <img class="img-responsive" src="{{ asset('front/img/20228_especial-guacamayas-g.jpg')}}" alt="">
            <div class="text-about">
                <h2>ARTESANÍAS DE BOYACÁ</h2>
                <p>
                    El programa <strong>Artesanías de Boyacá</strong> siendo el fruto de un proceso de transformación administrativa y productiva,
                    que ha liderado la Secretaría de Productividad, TIC y Gestión del Conocimiento de la Gobernación de Boyacá,
                    viene trabajando en cuatro líneas de apo¬yo y fortalecimiento, de una parte preservando y protegiendo la identidad cultural del territorio,
                    artesano innovador adoptando el mejoramiento de procesos, capacitación y diseño,
                    así como el es¬tímulo hacia la asociatividad y formalización como artesano em¬prendedor y el impulso hacia el artesano competitivo
                    a través de la búsqueda de modernos canales de comercialización.
                </p>
            </div>
        </div><!--/.container-->
    </div>
    <!--/.about-->
    <!--.footer-->
   

@endsection
