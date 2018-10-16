<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $products->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $products->p_name !!}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{!! $products->category->name !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! $products->quantity !!}</p>
</div>

<!-- Seller Id Field -->
<div class="form-group">
    {!! Form::label('seller_id', 'Seller Id:') !!}
    <p>{!! $products->seller['name'] !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price($):') !!}
    <p>{!! $products->price !!}</p>
</div>

<!-- Discount Field -->
<div class="form-group">
   <!--  {!! Form::label('discount', 'Discount ($):') !!}
    <p>{!! $products->discount !!}</p> -->
</div>

<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $products->description !!}</p>
</div>

<!-- city Field -->
<!-- <div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{!! $products->city !!}</p>
</div>
 --><!-- publish Field -->
<div class="form-group">
    {!! Form::label('publish', 'Publish:') !!}
    <p>{!! $products->publish !!}</p>
</div>
<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $products->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $products->updated_at !!}</p>
    
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
 <div class="carousel-inner">
  <!-- Wrapper for slides -->
  <?php 
  $i=0;
   

  foreach($images_products as $image){?>
  <?php if($i==0) { ?>
    <div class="item active">
      <img src="/public/images/products/{{$image->image_url}}" alt="Los Angeles">
    </div>
 <?php }else { ?>
<div class="item ">
      <img src="/public/images/products/{{$image->image_url}}" alt="Los Angeles">
    </div>

 <?php }
$i++;    
}
  ?>
</div>
  <!--   <div class="item">
      <img src="chicago.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div> -->

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

