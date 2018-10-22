@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Index Control
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($indexControl, ['route' => ['indexControls.update', $indexControl->id], 'method' => 'patch','files' => true]) !!}

                        @include('index_controls.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection