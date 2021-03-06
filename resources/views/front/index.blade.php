@extends('front.layouts.app')
@section('content')


    <!--.navbar-->
   
    <!--/.login-wrap-->
    <!--.header-->
    <style type="text/css">
        
        .header {
    background: url(/public/images/index_control/{{$index_control->image2}});

    </style>
    <header class="header">
        <div class="intro">
            <a href="{{$settings->fb_link}}" target="_blank" rel="nofollow"> <i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="{{$settings->instgram_link}}" target="_blank" rel="nofollow"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="{{$settings->twitter_link}}" target="_blank" rel="nofollow"> <i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div><!--/.intro-->
        <div class="text-intro"><h3>{{$index_control->paragraph}}</h3></div>
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
            <img class="img-responsive" src="/public/images/index_control/{{$index_control->image2}}" alt="">
            <div class="text-about">
                <h2>{{$index_control->title2}}</h2>
                <p>
                    {!! $index_control->paragraph2 !!}
                </p>
            </div>
        </div><!--/.container-->
    </div>
    <!--/.about-->
    <!--.footer-->
   

@endsection
