@extends('front.layouts.app')
      <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">
      @section('content')
<!--.proudct-->
    <div class="proudct">
        <div class="container">
            <ol class="breadcrumb">
               <li><a href="{{URL('/')}}">home</a></li>
                <li><a href="{{URL('/products')}}">Products</a></li>
                <li class="active">lorem3</li>
            </ol><!--/.breadcrumb-->
            {{$product->image_url}}
            <div class="details-product">
                <div class="row">
                    <div class="col-md-6">
                        <!--****SKITTER****-->
                        <div class="skitter skitter-large">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);"><img src="img/C9D287pXoAAorJp.jpg" class="cut" /></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="img/C9D28rKXYAAFPU2.jpg" class="swapBlocks" /></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="img/C9D287pXoAAorJp.jpg" class="swapBarsBack" /></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><img src="img/C9D28rKXYAAFPU2.jpg" class="cut" /></a>
                                </li>
                            </ul>
                        </div><!--/.skitter-->
                        <!--****/SKITTER****-->
                        <div class="caption">
                            <h3>Description</h3>
                            <p>
                                {{ $product->description }}
                            </p>
                        </div><!--/.caption-->
                    </div><!--/.col-->
                    <div class="col-md-6">
                        <div class="details">
                            <ul class="list-unstyled">
                                <h4>Coucho</h4>
                                <li><b><i class="fa fa-map-marker"></i> Municipio: </b><span>jumbotron-style</span></li>
                                <li><b><i class="fa fa-map-marker"></i> Material: </b><span>jumbotron-style</span></li>
                                <li><b><i class="fa fa-map-marker"></i> Dimensiones: </b><span>jumbotron-style</span></li>
                                <li><b><i class="fa fa-map-marker"></i> categoria: </b><span>{{ $product->category->name }}</span></li>
                                <li><b><i class="fa fa-map-marker"></i> precio: </b><span>${!! $product->price !!}</span></li>
                            </ul>
                            <a class="btn-proudct"><i class="fa fa-shopping-bag"></i> Anadir Al Carrito</a>
                            <form action="" method="post">
                                <label>cantidad </label><input type="number" value="3">
                            </form>
                        </div><!--/.details-->
                        <div class="acount">
                            <p><strong>Vendedor:</strong></p>
                            <a href="vendor.html">
                             <img  class="img-circle img-thumbnail"  src="{{URL('/images/sellers/')}}/{{$product->seller['logo']}}" alt="{{ $product->seller['name'] }}"/>
                                
                                <span>{{ $product->seller['name'] }}</span>
                                <span class="rate">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> 
                                    <i style="color: #4e2a24;">(6)</i>
                                </span>
                            </a>
                            <div class="about-vendor">
                                <strong><p>calling extra attention</p></strong>
                                <span class="pull-left"><i class="fa fa-money"></i> $12.000 Ciduas</span>
                                <span class="pull-right"><i class="fa fa-money"></i> $20.000 Nacional</span>
                                <br>
                                <br>
                                <strong class="text-center"><p>"calling extra attention"</p></strong>
                            </div><!--/.about-vendor-->
                        </div><!--/.acount-->
                    </div><!--/.col-->
                </div><!--/.row-->
            </div><!--/.details-product-->
        </div><!--/.container-->
    </div>
    <!--/.proudct-->

@endsection