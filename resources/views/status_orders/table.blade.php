<table class="table table-responsive" id="statusOrders-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusOrders as $statusOrder)
        <tr>
            <td>{!! $statusOrder->name !!}</td>
            <td>
                {!! Form::open(['route' => ['statusOrders.destroy', $statusOrder->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusOrders.show', [$statusOrder->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusOrders.edit', [$statusOrder->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>