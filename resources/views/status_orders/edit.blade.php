@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Order
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusOrder, ['route' => ['statusOrders.update', $statusOrder->id], 'method' => 'patch']) !!}

                        @include('status_orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection