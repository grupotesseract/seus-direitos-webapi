@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Propaganda
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($propaganda, ['route' => ['propagandas.update', $propaganda->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('propagandas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
