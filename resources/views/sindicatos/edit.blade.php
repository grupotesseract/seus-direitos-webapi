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
    
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('sindicatos.index') !!}" class="btn btn-default">Cancelar</a>
                        </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
