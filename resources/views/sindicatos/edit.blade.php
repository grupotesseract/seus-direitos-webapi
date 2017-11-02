@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sindicato
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sindicato, ['route' => ['sindicatos.update', $sindicato->id], 'method' => 'patch']) !!}

                        @include('sindicatos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection