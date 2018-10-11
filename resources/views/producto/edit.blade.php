@extends('layouts.app')

@section('content')
<div class="container">	
    <div class="row">    	
        <div class="col-md-8 col-md-offset-2">
            @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Productos<a href="/presentacion" style="float:right;">Volver</a>
                </div>
                <div class="panel-body">
                    Editar los productos que ofrece la empresa.     
                </div>
                <div class="well">
				{!! Form::open(['action' => ['PresentacionController@updateProducto',$producto->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
			    	<div class="form-group">
			    		{{Form::label('etiqueta', 'Etiqueta')}}
			    		{{Form::text('etiqueta', $producto->etiqueta,['class' => 'form-control', 'placeholder' => 'Etiqueta'])}}
			    	</div>
                    <div class="form-group">
                        {{Form::label('descripcion', 'Descripcion')}}
                        {{Form::text('descripcion', $producto->descripcion,['class' => 'form-control', 'placeholder' => 'Descripcion'])}}
                    </div>
			        <div class="form-group">
                        {{Form::label('videoFondo', 'Video de Fondo')}}
			            {{Form::file('videoFondo')}}
			        </div>
                    <div class="form-group">
                        {{Form::label('video', 'Video Principal')}}
                        {{Form::file('video')}}
                    </div>
			    	{{Form::submit('Actualizar',['class' =>'btn btn-primary'])}}
				{!! Form::close() !!}
				</div>
            </div>
        </div>
    </div>
</div>
@endsection