@extends('layouts.app')

@section('content')
<div class="container">	
    <div class="row">    	
        <div class="col-md-8 col-md-offset-2">
            @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Blog<a href="/blog" style="float:right;">Volver</a>
                </div>
                <div class="panel-body">
                    Editar un Post     
                </div>
                <div class="well">
				{!! Form::open(['action' => ['BlogController@update' , $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
			    	<div class="form-group">
			    		{{Form::label('titulo', 'Titulo')}}
			    		{{Form::text('titulo', $post->titulo,['class' => 'form-control', 'placeholder' => 'Titulo'])}}
			    	</div>
                    <div class="form-group">
                        {{Form::label('resumen', 'Resumen')}}
                        {{Form::textArea('resumen', $post->resumen,['class' => 'form-control', 'placeholder' => 'Resumen'])}}
                    </div>
			        <div class="form-group">
                        {{Form::label('imagen', 'Imagen')}}
			            {{Form::file('imagen')}}
			        </div>
                    <div class="form-group">
                        {{Form::label('archivo', 'Archivo en pdf')}}
                        {{Form::file('archivo')}}
                    </div>

                    {{Form::hidden('_method','PUT')}}
			    	{{Form::submit('Editar',['class' =>'btn btn-primary'])}}
				{!! Form::close() !!}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection