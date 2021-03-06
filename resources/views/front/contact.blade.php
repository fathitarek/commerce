  @extends('front.layouts.app')
      <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">

@section('content')
<!--page-contact-->
    <div class="page-contact">
        <div class="container">
            <ol class="breadcrumb">
                 <li><a href="{{URL('/')}}">home</a></li>
                <li class="active">Contact </li>
            </ol><!--/.breadcrumb-->
            <div class="row">
                <div class="col-md-6">
                    <div class="information">
                        <ul class="list-unstyled">
                            <li><i class="fa fa-send"></i> {{$settings->email}}</li>
                            <li><i class="fa fa-phone"></i> {{$settings->telephone}}</li>
                            <li><i class="fa fa-map-marker"></i> {{$settings->address}}</li>
                        </ul>
                    </div><!--/.information-->
                </div><!--/.col-->
                <div class="col-md-6">
                    <div class="contact-form">
                        <form class="form-horizontal" action="/public/fat" method="POST">
                        	{{csrf_field()}}
                            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="name" required>
                            <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="phono" required>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="email" required>
                            <textarea class="form-control" name="msg" placeholder="message"></textarea>
                            <button type="submit" value="send message" class="btn btn-contact">uuu</button>

                        </form>
                    </div><!--/.contact-form-->
                </div><!--/.col-->
                <div class="col-md-12">
                    <div class="row">
                        <div class="maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8144344.122586517!2d-78.83513751389037!3d4.642084560322682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e15a43aae1594a3%3A0x9a0d9a04eff2a340!2sColombia!5e0!3m2!1sen!2seg!4v1536462246746" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>                        </div><!--/.maps-->
                    </div><!--/.row-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--/.page-contact-->


@endsection