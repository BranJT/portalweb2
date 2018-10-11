@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Mensajes</h3></div>

                <div class="panel-body">

                    <p>Listado de mensajes</p>
                </div>

                <div class="box-body">
                    <table id="listado" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        	<th>Numero</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Mensaje</th>
                            <th class="nosort">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        	@if( count($mensajes)== 0)
                        	<th colspan="5" >No hay mensajes Nuevos </th>
                        	@endif
                        	@foreach($mensajes as $mensaje)
                            <tr>
                                <td>{{ $mensaje->id }}</td>
                                <td>{{ $mensaje->nombre }}</td>
                                <td>{{ $mensaje->correo }}</td>
                                <td>{{ $mensaje->mensaje }}</td>
                                <td>
                                	<a href="/mensaje/visto/{{$mensaje->id}}" class="btn btn-info">Marcar Visto</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection