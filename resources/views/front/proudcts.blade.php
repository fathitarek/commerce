 @extends('front.layouts.app')
       <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">

@section('content')

 <div class="page-proudcts">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{URL('/')}}">home</a></li>
                <li class="active">products</li>
            </ol><!--/.breadcrumb-->
             <div class="row">
             	@foreach( $products as $product)

                <div class="col-md-3">
                    <div class="proudct">
                        <a href="proudct.html">
                            <div class="img-proudct">
                              {!!$product->images_product['image_url'] ? '  <img class="img-responsive" src="/public/images/products/'.$product->images_product['image_url'].'" alt="'.$product->p_name.'" >':''!!}
                            </div><!--/.img-proudct-->
                            <h4>{!! $product->p_name !!}</h4>
                            <span class="pull-left"><a href="vendor.html"><i class="fa fa-user"></i> {{ $product->seller['name'] }}</a></span>
                            <span class="pull-right">{!! $product->price !!}$</span>
                        </a>
                    </div><!--/.proudct-->
                </div><!--/.col-->
 @endforeach
               
             
            </div><!--/.row-->
            <nav class="text-center" style="margin-top: 61px;" aria-label="...">
            	 {!! $products->render() !!}
             <!--  <ul class="pagination" style="margin: 0;">
                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
              </ul>
 -->            </nav>
        </div><!--/.container-->
    </div>
    <!--/.page-proudcts-->
@endsection