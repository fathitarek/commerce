<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Category </th>
        <th>Quantity</th>
        <th>Seller</th>
        <th>Price</th>
        <th>Discount</th>
        <!-- <th>City</th> -->
        <th>Publish</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
    @foreach($products as $products)

        <tr>
            <td>{!!$i++ !!}</td>
            <td>{!!$products->images_product->image_url ? '<img src="/public/images/products/'.$products->images_product->image_url.'" height="40"/>':''!!}</td>
            <td>{!! $products->p_name !!}</td>
            <td>{{ $products->category->name }}</td>
            <td>{!! $products->quantity !!}</td>
            <td>{{ $products->seller['name'] }}</td>
            <td>{!! $products->price !!}</td>
            <td>{!! $products->discount !!}</td>
            <!-- <td>{!! $products->city !!}</td> -->
            <td>{!! $products->publish !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $products->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$products->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$products->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>