@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Bienvenido</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4><strong>Acaba de iniciar sesion, Bienvenido.</strong></h4>

                    <p>Esta es una plataforma para la administracion del portal web con distintas caracteristicas dando facil y rapido mantenimiento a la pagina web.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Usuarios</div>

                <div class="panel-body">
                    <a href="/usuario/create"  class="btn btn-sm btn-success">
                        <i class="fa fa-plus"></i>Añadir usuario
                    </a> 
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de usuarios</div>
                <div class="box-body">
                    <table id="listado" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Correo</th>
                            <th class="nosort">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($usuarios) == 0)
                            <th colspan="4">No hay datos para mostrar</th>
                        @endif
                        @foreach($usuarios as $usuario)
                            <tr data-id="{{ $usuario->id }}">
                                <td>{{ $usuario->name }}</td>
                                <td></td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <a href="/usuario/suspender/{{$usuario->id}}"
                                       class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Suspender
                                    </a>
                                    <a href="/usuario/clave/{{$usuario->id}}"
                                       class="btn btn-primary">
                                        <i class="fa fa-edit"></i> Cambiar Contraseña
                                    </a>
                                    {!!Form::open(['action'=>['HomeController@destroyUsuario' , $usuario->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
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

    <div class="row">
        
    </div>
</div>
@endsection
