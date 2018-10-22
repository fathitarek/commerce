<!-- Paragraph Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paragraph', 'Paragraph:') !!}
    {!! Form::text('paragraph', null, ['class' => 'form-control']) !!}
</div>

<!-- Image1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image1', 'Image1:') !!}
    {!! Form::file('image1', null, ['class' => 'form-control']) !!}
</div>

<!-- Title2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title2', 'Title2:') !!}
    {!! Form::text('title2', null, ['class' => 'form-control']) !!}
</div>

<!-- Paragraph Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paragraph2', 'Paragraph2:') !!}
    {!! Form::text('paragraph2', null, ['class' => 'form-control']) !!}
</div>

<!-- Image2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image2', 'Image2:') !!}
    {!! Form::file('image2', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('indexControls.index') !!}" class="btn btn-default">Cancel</a>
</div>
