<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Web Page</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href=" {{ asset('css/index.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<title>Portal web</title>
</head>
<body>
	<div class="navbar">
		<a href="#" class="toggle" id="navHamburger">
			<i class="fas fa-bars"></i>
		</a>
		<a href="#" class="brand"> Myname</a>
		<div class="navbar-right">
				<a href="" class="link">PRODUCTO</a>
				<a href="" class="link">NOSOTROS</a>
				<a href="" class="link">BLOG</a>
				<a href="/contact" class="link">CONTACTANOS</a>
				@if (Route::has('login'))
	                @auth
	            <a href="{{ url('/home') }}" class="link"">Home</a>
	                @else
	            <a href="{{ route('login') }}" class="link">Login</a>
	            <a href="{{ route('register') }}" class="link">Register</a>
	                @endauth
	            </div>
	        @endif
		</div>	
	</div>
	
	<section id="section-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					@include('inc.messages')
					<h1>Contáctanos <a href="/" style="float: right;">Volver</a></h1>

					<hr>
					{!! Form::open(['action' => ['PortalController@storeMensaje'], 'method' => 'POST', ]) !!}
					<div class="form-group">
						{{Form::label('nombre', 'Nombre')}}
						{{Form::text('nombre', '', ['class' => 'form-control' , 'placeholder' => 'Nombre'])}}
					</div>
					<div class="form-group">
						{{Form::label('correo', 'Email')}}
						{{Form::email('correo', '', ['class' => 'form-control' , 'placeholder' => 'Email'])}}
					</div>
					<div class="form-group">
						{{Form::label('mensaje', 'Mensaje')}}
						{{Form::textArea('mensaje', '', ['class' => 'form-control' , 'placeholder' => 'Mensaje' ,'style' => 'resize:none;'])}}
					</div>

					{{Form::submit('Enviar',['class' =>'btn btn-primary'])}}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>
	<br>
	<br><br>
	<script type="text/javascript" src="index.js"></script>

</body>
</html>