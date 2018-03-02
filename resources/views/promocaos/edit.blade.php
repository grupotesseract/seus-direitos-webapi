@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Promocao
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($promocao, ['route' => ['promocaos.update', $promocao->id], 'method' => 'patch']) !!}

                        @include('promocaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection