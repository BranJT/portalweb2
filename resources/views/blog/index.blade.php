@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-9 ">
            @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Posts</h3></div>
                <div class="panel-body">
                	Listado de todos las publicaciones hechas en donde puede realizar las siguientes funciones
                	<ul>
                		<li>Agregar un nuevo Post</li>
                		<li>Editar un post</li>
                		<li>Hacer portada al post, que se vea en el portal web</li>
                		<li>Vincular archivos pdfs y agregar imagenes a los posts</li>
                	</ul>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        	<div class="panel panel-default">
                <div class="panel-heading"><h4>Crear un nuevo Post</h3></div>

                <div class="panel-body">
					<div class="row" align="center">
						<div class="col-md-12">
							<a href="/blog/create" class="btn btn-primary">Nuevo Post</a>
						</div>
					</div><hr>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Portada</h4></div>

                <div class="panel-body">

                    <div class="well">
                        @if(isset($blogPortada))
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<img style="width:100%" src="/images/{{$blogPortada->imagen}}">
							</div>
							<div class="col-md-6 col-sm-6">
								<h3><a href="#">{{$blogPortada->titulo}}</a></h3>
								<p>{{$blogPortada->resumen}}</p>
							<small>Creada el {{$blogPortada->created_at->toDateString()}}</small>
							</div>
	                      	
						</div>
                        @else
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <img style="width:100%" src="/images/">
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <h3><a href="#">Sin titulo</a></h3>
                                <p>Lotem impsus</p>
                            <small>Creada el </small>
                            </div>
                            
                        </div>
                        @endif
        						
        			</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        	<div class="panel panel-default">
                <div class="panel-heading"><h4>Opciones</h3></div>

                <div class="panel-body">
					<div class="row" align="center">
                        @if(isset($blogPortada))
						<div class="col-md-12">
							<a href="/blog/downloadPDF/{{$blogPortada->id}}" class="btn btn-primary">Ver PDF</a>
						</div>
                        @endif
					</div><br>
					<div class="row" align="center">
                        @if(isset($blogPortada))
						<div class="col-md-12">
							<a href="/blog/edit/{{$blogPortada->id}}" class="btn btn-warning">Editar</a>
						</div>
                        @endif
					</div>
        						
        			
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Posts</h4></div>

            <div class="box-body">
                <table id="listado" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="15%">Titulo</th>
                        <th width="30%">Resumen</th>
                        <th>Imagen</th>
                        <th>Descargas</th>
                        <th width="8%">Fecha Publicacion</th>
                        <th width="26%" class="nosort">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    	@if( count($blogs)== 0)
                    	<th colspan="6" >No hay posts Nuevos </th>
                    	@endif
                    	@foreach($blogs as $blog)
                        <tr>
                            <td>{{ $blog->titulo }}</td>
                            <td>{{ $blog->resumen }}</td>
                            <td align="center"><img width="150px" src="/images/{{$blog->imagen}}"></td>
                            <td>1</td>
                            <td>{{$blog->created_at->toDateString()}}</td>
                            <td align="center">                            	
                            	<a href="/blog/edit/{{$blog->id}}" class="btn btn-warning">Editar</a>
                            	<a href="/blog/portada/{{$blog->id}}" class="btn btn-info">Hacer Portada</a>
                                {!!Form::open(['action'=>['BlogController@destroy' , $blog->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Eliminar',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    	</div>
    </div>
    
</div>

	
@endsection