<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Category </th>
        <th>Quantity</th>
        <th>Seller</th>
        <th>Price</th>
        <th>Discount</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $products)
        <tr>
            <td>{!! $products->p_name !!}</td>
            <td>{{ $products->category->name }}</td>
            <td>{!! $products->quantity !!}</td>
            <td>{{ $products->seller }}</td>
            <td>{!! $products->price !!}</td>
            <td>{!! $products->discount !!}</td>
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