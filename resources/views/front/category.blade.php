  @extends('front.layouts.app')
      <link rel="stylesheet" href="{{ asset('front/css/style-pages.css')}}">

@section('content')
    <!--page-category-->
    <div class="page-category">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{URL('/')}}">home</a></li>
                <li class="active">Categories</li>
            </ol><!--/.breadcrumb-->
            <div class="row">
                @foreach( $categories as $category)

                <div class="col-md-offset-3 col-md-8">
                    <a href="proudcts.html">
                        <div class="gategory">
                            <div class="text-catergory">
                                <h4>{!! $category->name !!}</h4>
                                <p>
                                  {!! $category->description !!}
                                </p>
                            </div><!--/.text-catergory-->
                            <div class="image-catergory">
                                {!!$category->image ? '  <img class="img-responsive" src="/public/images/categories/'.$category->image.'" alt="'.$category->name.'" >':''!!}
                               
                            </div><!--/.image-catergory-->
                        </div><!--/.gategory-->
                    </a>
                </div><!--/.col-->
            @endforeach
                
            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--/.page-category-->
    @endsection