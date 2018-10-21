<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    {!! Form::file('logo', null, ['class' => 'form-control']) !!}
    
</div>

<!-- fb_link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fb_link', 'fb_link:') !!}
    {!! Form::text('fb_link', null, ['class' => 'form-control']) !!}
</div>
<!-- instgram_link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('instgram_link', 'instgram_link:') !!}
    {!! Form::text('instgram_link', null, ['class' => 'form-control']) !!}
</div>
<!-- twitter_link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitter_link', 'twitter_link:') !!}
    {!! Form::text('twitter_link', null, ['class' => 'form-control']) !!}
</div>

<!-- address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('settings.index') !!}" class="btn btn-default">Cancel</a>
</div>
