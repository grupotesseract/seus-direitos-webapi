@extends('layouts.app')

@section('css')
    <script src="/css/app.css"></script>
@endsection

@section('head_scripts')
    <script src="/js/app.js"></script>
@endsection

@section('content')
    <section class="content-header">
        <h1>Instituições</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($instituicao, ['route' => ['instituicaos.update', $instituicao->id], 'method' => 'patch']) !!}

                        @include('instituicaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
