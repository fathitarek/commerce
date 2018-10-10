<table class="table table-responsive" id="stories-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Description</th>
        <th>Url</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stories as $stories)
        <tr>
            <td>{!! $stories->title !!}</td>
            <td>{!! $stories->description !!}</td>
            <td>{!! $stories->url !!}</td>
            <td>
                {!! Form::open(['route' => ['stories.destroy', $stories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stories.show', [$stories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stories.edit', [$stories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>