<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Web Page</title>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href=" {{ asset('css/index.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
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
		<a href="#" class="brand"> Portal Web</a>
		<div class="navbar-right">
				<a href="" class="link">PRODUCTO</a>
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
	
	<section id="section-presentacion" class="contenedor">

		<div class="fullscreen-video-wrap">
			<video autoplay loop muted preload="auto" poster="image2.jpg">
				<source src="/videos/{{$presentacion->videoFondo}}" type="video/mp4">
			</video>
		</div>
		<div class="overlay"></div>
		<div class="content">
			<p>{{$presentacion->descripcion}}</p>
			
		</div>
	</section>
	
	<section id="section-producto">
		<div class="tema1" >
			<div class="titulo">
				<h3 ">Generamos Cambio</h3>
			</div>
			<div class="subtitulo">
				<p>Enfocamos nuestra energía creando nuevos emprendimientos desde cero, transformando nuestro ecosistema de empresas inspirando a nuestros líderes empresariales, y explorando lo recientemente posible.</p>
			</div>
			<a href="#section-videos"><div class="tema1-arrow"></div></a>


		</div>
	</section>


	<section class="section-videos" id="section-videos">
		<video 
			id="video-background" 
			autoplay
			muted 
			playsinline
			src="/videos/fondo1.mp4" 
			type="video/mp4"
			></video>
		<div class="video-group">
			<i class="arrow left" id="arrow-left"></i>
			<div id="slider">
				@if(count($productos)==0)
				<div class="slide">
					<div class="slide-content">
						<video 
							src=""
							controls	
						></video>				
					</div>
				</div>
				@endif
				@foreach($productos as $producto)
				<div class="slide">
					<div class="slide-content">
						<video 
							src="/videos/{{$producto->video}}"
							controls	
						></video>				
					</div>
				</div>
				@endforeach				
			</div>
			<div class="section-text-container">
				@if(count($productos)==0)
				<div class="section-text-body">
					<h2>No tiene ningun Producto registrado</h2>
					<p>Entre a su sesion de usuario y en la parte de productos agregue los que desee</p>	
				</div>
				@endif
				@foreach($productos as $producto)
				<div class="section-text-body">
					<h2>{{$producto->etiqueta}}</h2>
					<p>{{$producto->descripcion}}</p>	
				</div>
				@endforeach
				<div class="btn-container">
					<div id="section-btn">
						<a class="btn">Ver video</a>
					</div>
				</div>
			</div>
			<i class="arrow right" id="arrow-right"></i>
		</div>
		<div id="overlay"></div>
	</section>

	<section id="section-blog">
		<!-- <a href="#" class="btn">Ver video</a> -->
		<div class="blog-container">
			<div class="blog-texto">
				<div class="blog-titulo">
					@if(isset($blog))
					{{$blog->titulo}}
					@endif
				</div>
				<div class="blog-resumen">
					@if(isset($blog))
					{{$blog->resumen}}
					@endif
				</div>
				@if(isset($blog))
				<a href="/suscri/{{$blog->id}}" class="btn">Descargar completo</a>
				@endif
			</div>
			<div style="padding-top: 90px;">
				@if(isset($blog))
				<img src="/images/{{$blog->imagen}}" class="blog-imagen">
				@endif
			</div>
		</div>
	</section>

	<!--
	<section id="section-producto">
		<div class="tema1" >
			<div class="titulo">
				<h3 ">Generamos Impacto</h3>
			</div>
			<div class="subtitulo">
				<p>We focus our energy on creating new ventures from scratch, transforming our ecosystem of Intercorp companies, inspiring our business leaders, and exploring the recently possible.</p>
			</div>
			<a href="#section-videos"><div class="tema1-arrow"></div></a>


		</div>
	</section>
	

	<section id="section-trabajo">
		<div>
			<div class="cabecera-trabajo">
				We’re always looking for changemakers
			</div>
			<div class="flex-horizontal">
				<div class="flexy">
					<div class="titulo-trabajo">
						Design Researcher
					</div>
					<div class="descripcion-trabajo">
						Your background
					</div>
					<a href="/empleo/nombre" class="boton-unete">
						Unete
					</a>
				</div>
				<div class="flexy">
					<div class="titulo-trabajo">
						Design Researcher
					</div>
					<div class="descripcion-trabajo">
						Your background is 
					</div>
					<a href="/empleo/nombre" class="boton-unete">
						Unete
					</a>
					
				</div>
			</div>
		</div>
	</section>
	<section id="footer">
		<i class="far fa-envelope"></i>
	</section>

	-->

	<footer>
		<div class="footer-container">

			<div class="footer-main">
				<div class="footer-columna">
					<h3>Direccion</h3>
					<span class="fa fa-map-marker"><p>244 Av. Los Incas - Peru</p></span>
					<span class="fa fa-phone"><p>(+51) 67 333723</p></span>
					<span class="fa fa-envelope"><p>info@codigomasters.ocm</p></span>
				</div>
			</div>

			
		</div>

		<div class="footer-copy-redes">
			<div class="main-copy-redes">
				<div class="footer-copy">
					&copy; 2018, Todos los derechos reservados -| CodigoBrandon|.
				</div>
				<div class="footer-redes">
					<a href="#" class="fab fa-facebook-f"></a>
					<a href="#" class="fab fa-twitter"></a>
					<a href="#" class="fab fa-youtube"></a>
					<a href="#" class="fab fa-github"></a>
				</div>
			</div>
		</div>
	</footer>

	<script>
		

		// -------------------- VARIABLES GLOBALES ----------------------------------

		const contenido = document.querySelector('.content');
		const videoBtn = document.getElementById('section-btn')
		const btnBlock = document.querySelector('.section-text-container')
		const textBlock = btnBlock.querySelectorAll('.section-text-body')
		const btnContainer = videoBtn.parentElement;
		const overlay = document.getElementById('overlay')
		const slider = document.getElementById('slider');
		const videoGroup = document.querySelectorAll('.slide video')

		let sliderImages = document.querySelectorAll('.slide'),
			videoBackground = document.getElementById('video-background');

		let slideIndex = 0;

		// -------------------- FUNCIONES ----------------------------------

		// Aparece y desaparece el bloque de título y texto
		function textBlockEngine(index, arr) {
			reset(arr)
			arr[index].style.display = 'block'
		}

		// Manejo del video carrusel
		function plusSlides(n, slides) {
			showSlides(slideIndex += n, slides);
		}

		function showSlides(n, slides) {
			if (n > slides.length - 1) {
				slideIndex = 0;
			}

			if (n < 0) {
				slideIndex = slides.length - 1;
			}

			reset(slides);

			const slide = slides[slideIndex];

			slide.style.display = 'block';
		}
		
		//clear all images
		function reset(slides) {
			for (let i = 0; i < slides.length; i++){
				slides[i].style.display = 'none';
			}
		}

		function videoLoop(video) {
			setInterval(function() {
				if(video.currentTime >= 5) {
					video.currentTime = 0;
					video.play();
				}
			}, 300)
		}

		//initializes the slider
		function startSlide(slides) {
			reset(slides);
			reset(textBlock)
			textBlock[0].style.display = 'block'
			slides[0].style.display = 'block';
		}
		

		function slidesEngine(num, slides) {
			plusSlides(num, slides);
		}
		
		// Reseta los videos
		function resetVideo(video) {
			video.currentTime = 0;
			video.pause();
		}
		
		// Reseta los videos, setea el video correspondiente al background e inicia el vídeo
		function videoEngine(Index) {
			videoGroup.forEach(video => resetVideo(video))
			videoBackground.src = videoGroup[Index].src;
			videoGroup[Index].play();
		}

		// Muestre el vídeo con un overlay
		function showVideo() {
			// Desaparece al botón
			btnBlock.style.display = 'none'
			// Aparece el overlay
			overlay.classList.add('overlay-active');
			// Aparece los videos
			slider.style.display = 'block';
			slider.style.animation = 'appear .5s forwards'
			// Inicia el video escogido
			videoGroup[slideIndex].play()
		}

		// Remueve el overlay al tocar 
		function removeOverlay() {
			// Resetea el video
			resetVideo(videoGroup[slideIndex]);
			// Remueve el overlay
			overlay.classList.remove('overlay-active');
			// Remueve a los vídeos
			slider.style.display = 'none';
			// Aparece el botón
			btnBlock.style.display = 'inline-block'

		}

		/* startSlide(); */
		startSlide(sliderImages);
		videoLoop(videoBackground);

		// -------------------- EVENTOS ----------------------------------

		const arrowLeft = document.querySelector('#arrow-left');
		arrowLeft.addEventListener('click', function () {
			slidesEngine(-1, sliderImages);
			textBlockEngine(slideIndex, textBlock)
			videoEngine(slideIndex);
		})

		const arrowRight = document.querySelector('#arrow-right');
		arrowRight.addEventListener('click', function () {
			slidesEngine(1, sliderImages);
			textBlockEngine(slideIndex, textBlock)
			videoEngine(slideIndex);
		})
		
		const navHamburger = document.querySelector('#navHamburger');
		navHamburger.addEventListener('click', function() {
			navHamburger.parentElement.classList.toggle('active');
			contenido.classList.toggle('active');
			
		});

		videoBtn.addEventListener('click', showVideo);
		overlay.addEventListener('click', removeOverlay);


	</script>
</body>
</html>