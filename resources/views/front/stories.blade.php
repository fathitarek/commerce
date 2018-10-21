  @extends('front.layouts.app')
      <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">

@section('content')
  <!--page-news-->
    <div class="page-stories">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{URL('/')}}">home</a></li>
                <li class="active">stories</li>
            </ol><!--/.breadcrumb-->
            <div class="row">
                @foreach( $stories as $story)
                <div class="col-md-12">
                    <div class="stories">
                        <div class="embd-stories pull-right">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{!! $story->url !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div><!--/.embd-stories-->
                        <div class="text-stories">
                            <h4>{!! $story->title !!}</h4>
                            <p>{!! $story->description !!}</p>
                        </div>
                    </div><!--/.stories-->
                </div><!--/.col-->
                  @endforeach
              
               {{$stories->render()}}

        </div><!--/.container-->
    </div>
    <!--/.page-stories-->
    @endsection