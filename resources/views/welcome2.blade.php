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
				<h3 ">Generamos Impacto</h3>
			</div>
			<div class="subtitulo">
				<p>We focus our energy on creating new ventures from scratch, transforming our ecosystem of Intercorp companies, inspiring our business leaders, and exploring the recently possible.</p>
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
			src="https://player.vimeo.com/external/158148793.hd.mp4?s=8e8741dbee251d5c35a759718d4b0976fbf38b6f&profile_id=119&oauth2_token_id=57447761" 
			type="video/mp4"
			></video>
		<div class="video-group">
			<i class="arrow left" id="arrow-left"></i>
			<div id="slider">
				<div class="slide slide1">
					<div class="slide-content">
						<video 
							src="https://player.vimeo.com/external/158148793.hd.mp4?s=8e8741dbee251d5c35a759718d4b0976fbf38b6f&profile_id=119&oauth2_token_id=57447761"
							controls	
						></video>				
					</div>
				</div>
				<div class="slide slide2">
					<div class="slide-content">
						<video 
							src="/videos/{{$presentacion->videoFondo}}"
							controls
						></video>
					</div>
				</div>
				<div class="slide slide3">
					<div class="slide-content">
						<video 
							src="https://www.videvo.net/videvo_files/converted/2014_12/preview/TV_Studio_Camera_Lens_System_Close.mp466794.webm"
							controls
						></video>
					</div>
				</div>
			</div>
			<div class="btn-container">
				<div id="section-btn">
					<a class="btn">Ver video</a>
				</div>
			</div>
			<i class="arrow right" id="arrow-right"></i>
		</div>
		<div id="overlay"></div>
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

	<script>
		

		// -------------------- VARIABLES GLOBALES ----------------------------------

		const contenido = document.querySelector('.content');
		const videoBtn = document.getElementById('section-btn')
		const btnContainer = videoBtn.parentElement;
		const overlay = document.getElementById('overlay')
		const slider = document.getElementById('slider');
		const videoGroup = document.querySelectorAll('.slide video')

		let sliderImages = document.querySelectorAll('.slide'),
			videoBackground = document.getElementById('video-background');

		let slideIndex = 0;

		// -------------------- FUNCIONES ----------------------------------

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
		function showVideo () {
			// Desaparece al botón
			btnContainer.style.display = 'none'
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
			btnContainer.style.display = 'inline-block'

		}

		/* startSlide(); */
		startSlide(sliderImages);
		videoLoop(videoBackground);

		// -------------------- EVENTOS ----------------------------------

		const arrowLeft = document.querySelector('#arrow-left');
		arrowLeft.addEventListener('click', function () {
			slidesEngine(-1, sliderImages);
			videoEngine(slideIndex);
		})

		const arrowRight = document.querySelector('#arrow-right');
		arrowRight.addEventListener('click', function () {
			slidesEngine(1, sliderImages);
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