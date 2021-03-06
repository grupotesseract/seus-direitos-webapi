@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Evento
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($evento, ['route' => ['eventos.update', $evento->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('eventos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection