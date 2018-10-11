@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('inc.messages')
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Presentacion</h3></div>

                <div class="panel-body">

                    <p>Es la primera pagina que se muestra al acceder a nuestra pagina</p>
                    <p>Cuenta con los siguiente elementos</p>
                    <ul>
                        <li>Una breve descripcion de introduccion</li>
                        <li>Un video de fondo</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Presentacion</h4></div>

                <div class="box-body">
                    <table id="listado" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Video de fondo</th>
                            <th class="nosort">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $presentacion->descripcion }}</td>
                                <td>{{ $presentacion->videoFondo }}</td>
                                <td>
                                    <a href="/presentacion/editar"
                                       class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="box-body">
                    <div style="padding:30px;">
                        <video class="video" src="./videos/{{$presentacion->videoFondo}}" controls style="width:100%"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Producto</h3></div>

                <div class="panel-body">

                    <p>Es la segunda seccion de portal web</p>
                    <p>Cuenta con los siguiente elementos</p>
                    <ul>
                        <li>Video de muestra de los distintos produtos o servicios que se ofrece</li>
                        <li>Una descripcion y una etiqueta de dichos productos</li>
                        <li>Un video donde explica el negocio de cada uno de los productos</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Producto</h4></div>

                <div class="box-body">
                    <table id="listado" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="21%">Etiqueta</th>
                            <th width="21%">Descripcion</th>
                            <th width="21%">Video de fondo</th>
                            <th width="21%">Video Principal</th>
                            <th width="6%"class="nosort">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($productovideos) == 0)
                                <th colspan="5">No hay datos para mostrar</th>
                            @endif
                            @foreach($productovideos as $productovideo)
                            <tr>
                                <td>{{ $productovideo->etiqueta }}</td>
                                <td>{{ $productovideo->descripcion }}</td>
                                <td>{{ $productovideo->videoFondo }}</td>
                                <td>{{ $productovideo->video }}</td>
                                <td>
                                    <a href="/producto/editar/{{$productovideo->id}}"
                                       class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    {!!Form::open(['action'=>['PresentacionController@destroyProducto' , $productovideo->id], 'method'=>'POST', ])!!}
                                            {{Form::hidden('_method','DELETE')}}
                                            {{Form::submit('Eliminar',['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!} 
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <video class="video" src="./videos/{{$productovideo->videoFondo}}" controls style="width:100%"></video>
                                </td>
                                <td colspan="2" align="center">
                                    <video class="video" src="./videos/{{$productovideo->video}}" controls style="width:100%"></video>
                                </td>
                                <td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--  Empleado
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Empleo</h3>
                </div>

                <div class="panel-body">

                    <p>Es aqui donde estan los distintos puestos de trabajo que tenemos vacante en la empresa</p>
                    <p>Cuenta con los siguiente elementos</p>
                    <ul>
                        <li>Cargo o funcion en la empresa</li>
                        <li>Una descripcion del empleo</li>
                        <li>Un resumen del empleo en donde puedes postular</li>
                    </ul>
                </div>
                <div class="panel-body" align="center">
                    <a href="/empleo/create"  class="btn btn-sm btn-success">
                        Añadir empleo
                    </a> 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Empleo</h4></div>

                <div class="box-body">
                    <table id="listado" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="21%">Nombre</th>
                            <th width="21%">Descripcion</th>
                            <th width="21%">Resumen</th>
                            <th width="6%"class="nosort">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($empleos) == 0)
                                <th colspan="5">No hay datos para mostrar</th>
                            @endif
                            @foreach($empleos as $empleo)
                            <tr>
                                <td>{{ $empleo->nombre }}</td>
                                <td>{{ $empleo->descripcion }}</td>
                                <td>{{ $empleo->resumen }}</td>
                                <td>
                                    <a href="/empleo/editar/{{$empleo->id}}/"
                                       class="btn btn-warning">
                                        <i class="fa fa-edit"></i> Editar
                                    </a>
                                    <a href="/empleo/editar/{{$empleo->id}}/"
                                       class="btn btn-primary">
                                        <i class="fa fa-edit"></i> Ver Detalle
                                    </a>
                                    {!!Form::open(['action'=>['PresentacionController@destroyEmpleo' , $empleo->id], 'method'=>'POST', ])!!}
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

    -->
</div>
@endsection