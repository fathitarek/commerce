  @extends('front.layouts.app')
      <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">

@section('content')
    <!--.sellers-page-->
    <div class="sellers-page">
        <div class="container">
            <ol class="breadcrumb">
               <li><a href="{{URL('/')}}">home</a></li>
                <li><a href="#">lorem2</a></li>
                <li class="active">Sellers</li>
            </ol><!--/.breadcrumb-->
            <div class="row">
                 @foreach( $sellers as $seller)
                <div class="seller">
                    


                     {!!$seller->logo ? ' <img  src="/public/images/sellers/'.$seller->logo.'" alt="'.$seller->name.'" >':''!!}
                    <div class="overlay">
                        <div class="text">
                            <h3>{!! $seller->name !!} {!! $seller->super_name !!}</h3>
                            <span><i class="fa fa-map-marker"></i> {!! $seller->city !!}</span>
                            <a class="view-seller" href="{{URL('vendor/')}}/{!! $seller->id !!}"><i class="fa fa-arrow-right"></i> view profile</a>
                        </div>
                    </div>
                </div><!--/.seller-->

  @endforeach
               
            </div><!--/.row-->
            <div class="col-md-12">
                <div class="row">
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8144344.122586517!2d-78.83513751389037!3d4.642084560322682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e15a43aae1594a3%3A0x9a0d9a04eff2a340!2sColombia!5e0!3m2!1sen!2seg!4v1536462246746" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>                        </div><!--/.maps-->
                </div><!--/.row-->
            </div><!--/.col-->
        </div><!--/.container-->
    </div>
    <!--/.sellers-page-->
    @endsection