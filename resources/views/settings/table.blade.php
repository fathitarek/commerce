<table class="table table-responsive" id="settings-table">
    <thead>
        <tr>
            <th>Email</th>
        <th>Location</th>
        <th>Telephone</th>
        <th>Logo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($settings as $settings)
        <tr>
            <td>{!! $settings->email !!}</td>
            <td>{!! $settings->location !!}</td>
            <td>{!! $settings->telephone !!}</td>
                           <td>{!!$settings->logo ? '<img src="/public/images/settings/'.$settings->logo.'" height="40"/>':''!!}</td>

            <td>
                {!! Form::open(['route' => ['settings.destroy', $settings->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('settings.show', [$settings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('settings.edit', [$settings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                   <!--  {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>