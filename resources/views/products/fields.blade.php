<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('p_name', 'Name:') !!}
    {!! Form::text('p_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category:') !!}
   {{ Form::select('category_id',$categories,null,['placeholder' => 'Select Category...','class'=> '','id'=>'category_id'],['option'=>'Please Select Category','class' => 'form-control']) }}

</div>

<!-- Seller Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seller_id', 'Seller:') !!}
       {{ Form::select('seller_id',$sellers,null,['placeholder' => 'Select Seller...','class'=> '','id'=>'seller_id'],['option'=>'Please Select Seller','class' => 'form-control']) }}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>


<!-- city Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('city', 'city:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div> -->

<div class="form-group col-sm-6">
    {!!Form::label('publish','Publish: ')!!}
    {!!Form::checkbox('publish',null,false) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
