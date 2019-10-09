@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Videos Landing
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($videosLanding, ['route' => ['videosLandings.update', $videosLanding->id], 'method' => 'patch']) !!}

                        @include('videos_landings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection