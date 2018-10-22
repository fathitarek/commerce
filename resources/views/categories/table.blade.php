<table class="table table-responsive" id="categories-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Image</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $categories)
        <tr>
            <td>{!! $categories->name !!}</td>
            <td>{!!$categories->image ? '<img src="/public/images/categories/'.$categories->image.'" height="40"/>':''!!}</td>
            
            <td>
                {!! Form::open(['route' => ['categories.destroy', $categories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('categories.show', [$categories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('categories.edit', [$categories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>