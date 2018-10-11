<table class="table table-responsive" id="buyers-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>City</th>
        <th>Telephone</th>
        <th>Super Name</th>
        
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($buyers as $buyers)
        <tr>
            <td>{!! $buyers->name !!}</td>
            <td>{!! $buyers->email !!}</td>
            <td>{!! $buyers->city !!}</td>
            <td>{!! $buyers->telephone !!}</td>
            <td>{!! $buyers->super_name !!}</td>
            
            <td>
                {!! Form::open(['route' => ['buyers.destroy', $buyers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('buyers.show', [$buyers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <!-- <a href="{!! route('buyers.edit', [$buyers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>