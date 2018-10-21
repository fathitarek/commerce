<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $settings->id !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $settings->email !!}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Location:') !!}
    <p>{!! $settings->location !!}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{!! $settings->telephone !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{!! $settings->logo !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', 'Logo:') !!}
    <p>{!! $settings->logo !!}</p>
              <img src="/images/logo/{{$settings->logo}}" alt="{{$settings->email}}"  height="300px" width="300px">

</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('fb_link', 'FaceBook link:') !!}
    <p>{!! $settings->fb_link !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('instgram_link', 'instgram link:') !!}
    <p>{!! $settings->instgram_link !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('address', 'address:') !!}
    <p>{!! $settings->address !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('twitter_link', 'twitter link:') !!}
    <p>{!! $settings->twitter_link !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $settings->updated_at !!}</p>
</div>

