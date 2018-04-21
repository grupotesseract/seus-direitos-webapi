@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Convencao
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($convencao, ['route' => ['convencaos.update', $convencao->id], 'method' => 'patch']) !!}

                        @include('convencaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection