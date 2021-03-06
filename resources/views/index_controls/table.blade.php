<table class="table table-responsive" id="indexControls-table">
    <thead>
        <tr>
            <th>Paragraph</th>
        <th>Image1</th>
        <th>Title2</th>
        
        <th>Image2</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($indexControls as $indexControl)
        <tr>
            <td>{!! $indexControl->paragraph !!}</td>
              <td>{!!$indexControl->image1 ? '<img src="/public/images/index_control/'.$indexControl->image1.'" height="40"/>':''!!}</td>
            <td>{!! $indexControl->title2 !!}</td>
           
              <td>{!!$indexControl->image2? '<img src="/public/images/index_control/'.$indexControl->image2.'" height="40"/>':''!!}</td>
            <td>
                {!! Form::open(['route' => ['indexControls.destroy', $indexControl->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('indexControls.show', [$indexControl->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('indexControls.edit', [$indexControl->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <!--  -->
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>