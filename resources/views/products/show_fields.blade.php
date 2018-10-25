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
<div class="form-group">
    {!! Form::label('updated_at', 'Images:') !!}
</div>

  <?php  $i=0;
   foreach($images_products as $image){
 ?>
  <div class="form-group  col-sm-6">
          <img src="{{URL('/images/products/')}}/{{$image->image_url}}" alt="{{$products->p_name}}"  height="300px" width="300px">

</div>
<?php    
}
?>
 
                               
  