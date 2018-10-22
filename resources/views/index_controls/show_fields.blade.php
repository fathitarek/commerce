<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $indexControl->id !!}</p>
</div>

<!-- Paragraph Field -->
<div class="form-group">
    {!! Form::label('paragraph', 'Paragraph:') !!}
    <p>{!! $indexControl->paragraph !!}</p>
</div>

<!-- Image1 Field -->
<div class="form-group">
    {!! Form::label('image1', 'Image1:') !!}
    <p>
<img src="/images/index_control/{{$indexControl->image1}}" alt="{{$indexControl->paragraph}}"  height="300px" width="300px">
    </p>
</div>

<!-- Title2 Field -->
<div class="form-group">
    {!! Form::label('title2', 'Title2:') !!}
    <p>{!! $indexControl->title2 !!}</p>
</div>

<!-- Paragraph Field -->
<div class="form-group">
    {!! Form::label('paragraph2', 'Paragraph2:') !!}
    <p>{!! $indexControl->paragraph2 !!}</p>
</div>

<!-- Image2 Field -->
<div class="form-group">
    {!! Form::label('image2', 'Image2:') !!}
    <p>
          <img src="/images/index_control/{{$indexControl->image2}}" alt="{{$indexControl->title2}}"  height="300px" width="300px">

    </p>

</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $indexControl->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $indexControl->updated_at !!}</p>
</div>

