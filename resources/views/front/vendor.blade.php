@extends('front.layouts.app')
      <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAvIsz3M59Jyze3pfpZSXcOmFzH7KQ79Ys"></script>
 <style type="text/css">
         #googleMap{    overflow: visible;}
     </style>
  <script>
            function initialize() {
                var locations = [];
            
                        
                        var location = ['{{$vendor->address}}', '{{trim($vendor->latitude)}}', '{{trim($vendor->languite)}}'];
                 console.log(location)
                locations.push(location);
            console.log(locations)
                       
                        var map = new google.maps.Map(document.getElementById('googleMap'), {
                        zoom: 6,
                                center: new google.maps.LatLng('{{trim($vendor->latitude)}}', '{{trim($vendor->languite)}}'),
//                               center: {lat: -34.397, lng: 150.644},
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                        }
                        );
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    console.log(locations[i][1]);
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
@section('content')
 <!--.vendors-->
    <div class="vendors">
        <div class="container">
            <ol class="breadcrumb">
               <li><a href="{{URL('/')}}">home</a></li>
                <li><a href="#">lorem2</a></li>
                <li class="active">Vendor</li>
            </ol><!--/.breadcrumb-->
            
            <div class="details-product">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image-vendor">
                            {!!$vendor->logo ? ' <img  src="/public/images/sellers/'.$vendor->logo.'" alt="'.$vendor->name.'" >':''!!}
                           
                            <div class="vendor-rate text-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!--/.vendor-rate-->
                        </div><!--/.image-vendor-->
                    </div><!--/.col-->
                    <div class="col-md-6">
                        <div class="vendor-name">
                            <h2>{{ $vendor->name }} {{ $vendor->super_name }}</h2>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-map-marker"></i>{{ $vendor->city }}</li>
                                <li><i class="fa fa-phone"></i> {{ $vendor->telephone }}</li>
                                <li><i class="fa fa-send"></i> {{ $vendor->email }}</li>
                            </ul>
                        </div><!--vendor-name-->
                        <div class="caption">
                            <h3>Description</h3>
                            <p>{{ $vendor->description }}</p>
                        </div><!--/.caption-->
                    </div><!--/.col-->
                </div><!--/.row-->
            </div><!--/.details-product-->
        </div><!--/.container-->
    </div>
    <!--/.vendors-->
    
    <!--.proudcts-->
    <div class="proudcts vendors-page">
        <div class="container">
            <h2 class="text-center">Proudctos</h2>
            <hr>
            <div class="row">
                 @foreach ($products as $product) 
                <div class="col-md-3">
                    <div class="proudct">
                        <a href="proudct.html">
                            <div class="img-proudct">
                                 {!!$product->logo ? ' <img  class="img-responsive"  src="/images/products/'.$product->image_url.'" alt="'.$product->p_name.'" >':''!!}
                            </div><!--/.img-proudct-->
                            <h4>{!! $product->p_name !!}</h4>
                            <span>{!! $product->price !!}$</span>
                        </a>
                    </div><!--/.proudct-->
               
                </div><!--/.col-->
                 @endforeach

            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--/.proudcts-->
    
    <div class="row">
        <div class="col-md-6">
            <div class="review">
                <li class="image-review">
                    <img class="img-responsive" src="/front/img/C9D287pXoAAorJp.jpg" alt="">
                </li>
                <li>
                    <h3>Loka Morad</h3>
                    <small>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                    </small>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry,
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    </p>
                </li>
            </div><!--/.review-->
        </div><!--/.col-md-6-->
        <div class="col-md-6">
            <div class="maps">
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8144344.122586517!2d-78.83513751389037!3d4.642084560322682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e15a43aae1594a3%3A0x9a0d9a04eff2a340!2sColombia!5e0!3m2!1sen!2seg!4v1536462246746" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen=""></iframe>  -->                       

<div id="googleMap"  style="height:100%;width:100%"></div>
            </div>
        </div><!--/.col-md-6-->
    </div><!--/.row-->
     @endsection
    