@extends('layouts.app')

@section('content')
<div class="container">	
    <div class="row">    	
        <div class="col-md-8 col-md-offset-2">
            @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Presentacion<a href="/presentacion" style="float:right;">Volver</a>
                </div>
                <div class="panel-body">
                    Editar la presentacion del portal web        
                </div>
                <div class="well">
				{!! Form::open(['action' => ['PresentacionController@update'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
			    	<div class="form-group">
			    		{{Form::label('descripcion', 'Descripcion')}}
			    		{{Form::text('descripcion', $presentacion->descripcion,['class' => 'form-control', 'placeholder' => 'Descripcion'])}}
			    	</div>
			        <div class="form-group">
                        {{Form::label('videoFondo', 'Video de Fondo')}}
			            {{Form::file('videoFondo')}}
			        </div>
			    	{{Form::submit('Actualizar',['class' =>'btn btn-primary'])}}
				{!! Form::close() !!}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection