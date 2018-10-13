@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sellers
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'sellers.store','files' => true]) !!}

                        @include('sellers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
