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
		<div class="wrap">
			<div class="iframe-group">
				<i class="arrow left" id="arrow-left"></i>
				<div id="slider">
					<div class="slide slide1">
						<div class="slide-content">
							<span>Image One</span>				
						</div>
					</div>
					<div class="slide slide2">
						<div class="slide-content">
							<span>Image Two</span>
							<iframe class="iframe" src="https://www.youtube.com/embed/88PMbKJnqfM?enablejsapi=1" frameborder="0"
	                            allow="autoplay; encrypted-media" allowfullscreen>
	                        </iframe>
						</div>
					</div>
					<div class="slide slide3">
						<div class="slide-content">
							<span>Image Three</span>
							<iframe class="iframe" src="https://www.youtube.com/embed/8LNW_Psocjk?enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media"
	                            allowfullscreen>
	                        </iframe>
						</div>
					</div>
				</div>
				<i class="arrow right" id="arrow-right"></i>
			</div>

		</div>
	</section>
	<section id="section-nosotros">
		<a href="#" class="btn">Ver video</a>
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

		const navHamburger = document.querySelector('#navHamburger');
		const contenido = document.querySelector('.content');

		navHamburger.addEventListener('click', (e) =>{
			navHamburger.parentElement.classList.toggle('active');
			contenido.classList.toggle('active');		
			
		});

		let sliderImages = document.querySelectorAll('.slide'),
			arrowLeft = document.querySelector('#arrow-left'),
			arrowRight = document.querySelector('#arrow-right'),
			current = 0;
		//clear all iamges
		function reset(){
			for (let i = 0; i < sliderImages.length; i++){
				sliderImages[i].style.display = 'none';				
			}
		}

		//initializes the slider
		function startSlide(){
			reset();
			sliderImages[0].style.display = 'block';
		}

		//show previous
		function slideLeft() {
			reset();
			sliderImages[current - 1].style.display = 'block';
			current--;
		}

		//show next
		function slideRight(){
			reset();
			sliderImages[current + 1].style.display = 'block';
			current ++;
		}


		//Left arrowclick
		arrowLeft.addEventListener('click',function(){
			if(current === 0){
				current = sliderImages.length;
			}
			slideLeft();
		});

		//Right arrowclick
		arrowRight.addEventListener('click',function(){
			if(current === sliderImages.length -1){
				current = -1;
			}
			slideRight();
		});


		startSlide();



	</script>
	<script type="text/javascript" src="index.js"></script>

</body>
</html>