<table class="table table-responsive" id="sellers-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Telephone</th>
        <th>Token</th>
        <th>Super Name</th>
        <th>Address</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($sellers as $sellers)
        <tr>
            <td>{!! $sellers->name !!}</td>
            <td>{!! $sellers->email !!}</td>
            <td>{!! $sellers->password !!}</td>
            <td>{!! $sellers->telephone !!}</td>
            <td>{!! $sellers->token !!}</td>
            <td>{!! $sellers->super_name !!}</td>
            <td>{!! $sellers->address !!}</td>
            <td>{!! $sellers->description !!}</td>
            <td>
                {!! Form::open(['route' => ['sellers.destroy', $sellers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sellers.show', [$sellers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sellers.edit', [$sellers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>