<style type="text/css">
    .pagination{
        position: absolute;
        right: 5px;
    }


</style>

<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category </th>
        <th>Seller</th>
        <th>Price($)</th>
        <!-- <th>Status</th> -->
        <!-- <th>City</th> -->
        <th>Publish</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
 <tr>
    <form action="../products/search" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <td><!-- <input type="" name="" style="width: 25px;"> --></td>
       <td></td>
       <td><input type="text" name="p_name" style="width: 70px;"></td>
       <td><input type="text" name="category_name" style="width: 70px;"></td>
        <td><input type="text" name="seller_name" style="width: 70px;"></td>
        <td><input type="text" name="price" style="width: 70px;"></td>
        <td><!--<input type="text" name="publish" style="width: 70px;"> -->

<select name="publish" style="width: 70px;">
  <option value=""></option>
  <option value="1">Publish</option>
  <option value="0">Not Publish</option>
</select>
       </td>
     <td><input type="submit" class="btn btn-primary" value="press" name="" style="width: 70px;"></td>
       {!! Form::close() !!}
        </tr>

<?php 
if(isset($_GET['page'])){
     $numpage= (int)$_GET['page'];
      $sum = 5+$numpage-1;
  }else{$numpage=0;}
      ?>
  @if(count($products))
    @foreach($products as $index=>$product)

        <tr>
            <td>
                <?php 
                if ($numpage>1) {
                   echo $sum++;
                }else{
                    echo ++$index ; 
                }
                ?>                   
                </td>
            <td>{!!$product->images_product['image_url'] ? '<img src="/public/images/products/'.$product->images_product['image_url'].'" height="40"/>':''!!}</td>
            <td>{!! $product->p_name !!}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->seller['name'] }}</td>
            <td>{!! $product->price !!}</td>
            <td>@if($product->publish==1)
                 <span class="glyphicon glyphicon-ok"></span>
@else
<span class="glyphicon glyphicon-remove"></span>
@endif
            </td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
   @else <h1> Not Found </h1>
   @endif
    </tbody>
</table>
{{$products->render()}}
<!-- <span id="numOfProducts"> </span>/{{$count_products}} -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    
$(function() {
    var numOfPages=$('.pagination .active span').text();
   var numOfProducts= numOfPages*5;
   console.log(numOfPages*5  );
   $('#numOfProducts').text(numOfProducts);
// alert('fe');
});


</script>