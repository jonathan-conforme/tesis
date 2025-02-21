<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNESUM TIC</title>
    <link rel="shortcut icon" href="https://static.wixstatic.com/media/28b2eb_c356be5a962d4553890562fc98d1773e~mv2.png/v1/fill/w_600,h_520,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/28b2eb_c356be5a962d4553890562fc98d1773e~mv2.png">
  

    <meta name="theme-color" content="#2091F9">

    <meta name="title" content="CONGRESO TIC UNESUM">
    <meta name="description"
        content="Bienvenido a nuestro congreso anual de Tecnología de la Información. Este evento reúne a expertos y profesionales de tu área de interés para compartir conocimientos, intercambiar ideas y explorar las últimas tendencias y avances en el campo.">


    <meta property="og:type" content="website">
    <meta property="og:url" content="http://unesum.edu.ec/relacionespublicas/wp-content/uploads/sites/2/2018/02/ESCUDO-UNESUM.png">
    <meta property="og:title" content="CONGRESO TIC UNESUM">
    <meta property="og:description"
        content="Bienvenido a nuestro congreso anual de Tecnología de la Información. Este evento reúne a expertos y profesionales de tu área de interés para compartir conocimientos, intercambiar ideas y explorar las últimas tendencias y avances en el campo.">
        <meta property="og:image" content="http://unesum.edu.ec/relacionespublicas/wp-content/uploads/sites/2/2018/02/ESCUDO-UNESUM.png">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://unesum.edu.ec/relacionespublicas/wp-content/uploads/sites/2/2018/02/ESCUDO-UNESUM.png">
    <meta property="twitter:title" content="CONGRESO TIC UNESUM">
    <meta property="twitter:description"
        content="Bienvenido a nuestro congreso anual de Tecnología de la Información. Este evento reúne a expertos y profesionales de tu área de interés para compartir conocimientos, intercambiar ideas y explorar las últimas tendencias y avances en el campo.">
    <meta property="twitter:image" content="http://unesum.edu.ec/relacionespublicas/wp-content/uploads/sites/2/2018/02/ESCUDO-UNESUM.png"> 
	
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:600,700,800|Roboto:300,400,700&display=swap" rel="stylesheet">
	
	<!-- FontAwesome JS-->
	<script defer src="assets/fontawesome/js/all.min.js"></script>

	<!-- Theme CSS -->  
	<link id="theme-style" rel="stylesheet" href="assets/css/theme.css">


</head> 

<body>    
	<header id="header" class="header fixed-top">	    
		<div class="branding">
			<div class="container-fluid">
				<nav class="main-nav navbar navbar-expand-lg">
					
                    <div>
                <a href="{{ route('index') }}" class="site-logo ">
                    <x-application-logo class="logo-icon scrollto" href="#hero-block" />
                </a>
            </div>
					
					<div class="navbar-btn order-lg-2"><a class="btn btn-secondary" href="{{ route('login') }}" target="_blank">Acceso</a></div>
					
					
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div id="navigation" class="navbar-collapse collapse  justify-content-lg-end me-lg-3">
						<ul class="nav navbar-nav">
							
							<li class="nav-item"><a class="nav-link scrollto" href="#about-section">Acerca de</a></li>                                              
							<li class="nav-item"><a class="nav-link scrollto" href="#speakers-section">Exponentes</a></li>
							<li class="nav-item"><a class="nav-link scrollto" href="#schedule-section">Cronograma</a></li>
							<li class="nav-item"><a class="nav-link scrollto" href="#tickets-section">Ventas</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('ponencias.aceptadas') }}">Ponencias</a></li>


							<li class="nav-item"><a class="nav-link " href="{{ route('register') }}">Registro</a></li>
						</ul><!--//nav-->
					</div><!--//navabr-collapse-->

				</nav><!--//main-nav-->
				
			</div><!--//container-->
		</div><!--//branding-->
	</header><!--//header-->
	
	<div id="hero-block" class="hero-block">
	<!-- Carrusel -->
<div id="hero-carousel" class="hero-carousel carousel slide carousel-fade" data-bs-ride="carousel">
    <!-- Indicadores (puntos de navegación) -->
  

    <!-- Contenido del carrusel -->
    <div class="carousel-inner">
        @foreach($images as $key => $image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100" alt="Imagen {{ $key + 1 }}">
            </div>
        @endforeach

        <!-- Plantilla de fondo si no hay imágenes -->
        @if($images->isEmpty())
            <div class="carousel-item active">
                <div class="d-flex align-items-center justify-content-center" style="height: 300px; background-color: #f8f9fa;">
                    <p class="text-muted">No hay imágenes disponibles</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Controles del Carrusel -->
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<!-- Bloque de texto -->
<div class="container d-none d-md-block">
    <div class="hero-text-block">
        <h1 class="hero-heading mb-2">{{ $setting->page_title }}</h1>
        <div class="hero-meta mb-3">
            <i class="far fa-calendar-alt me-2"></i>
            {{ $setting->date ? \Carbon\Carbon::parse($setting->date)->translatedFormat('d M Y') : 'Fecha no configurada' }}
            <i class="fas fa-map-marker-alt mx-2"></i>
            {{ $setting->canton_name ?? 'Nombre del Cantón' }}
        </div>
        <div class="hero-intro mb-4">{{ $setting->page_subtitle }}.</div>
        <div class="hero-cta">
            <a class="btn btn-primary" href="#tickets-section">Precios de Ponencias</a>
        </div>
    </div>
</div>


	</div><!--//hero-block-->
	
	<div class="stats-block theme-bg-primary text-white py-4 text-center">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-3">
					<div class="item">
						<div class="number">2000+</div>
						<div class="unit">Asistentes</div>
					</div><!--//item-->
				</div><!--//col-->
				<div class="col-6 col-md-3">
					<div class="item">
						<div class="number">3</div>
						<div class="unit">Dias</div>
					</div><!--//item-->
				</div><!--//col-->
				<div class="col-6 col-md-3">
					<div class="item">
						<div class="number">60+</div>
						<div class="unit">Negociaciones</div>
					</div><!--//item-->
				</div><!--//col-->
				<div class="col-6 col-md-3">
					<div class="item">
						<div class="number">10+</div>
						<div class="unit">Talleres</div>
					</div><!--//item-->
				</div><!--//col-->
			</div>
		</div><!--//container-->
	</div><!--//stats-block-->
	
	<section id="about-section" class="about-section section theme-bg-light">
		<div class="container">
			<h3 class="section-heading text-center mb-3">Acerca del Congreso TIC</h3>
			<div class="section-intro single-col-max mx-auto mb-4">El Congreso Internacional de Tecnologías de la Información y Comunicación (TIC) en la Universidad Estatal del Sur de Manabí, ubicada en el cantón Jipijapa, es un espacio de intercambio académico y tecnológico. Reúne expertos, investigadores y estudiantes para explorar tendencias, innovaciones y desafíos en las TIC. Este evento fomenta la colaboración, el aprendizaje y el desarrollo regional, impulsando soluciones tecnológicas en áreas como educación, negocios y sostenibilidad.</div>
			
			<div class="about-cta text-center mb-5"><a class="btn btn-secondary btn-lg  mb-5" href="#schedule-section">Cronogramas</a></div>
		</div><!--//container-->

		<div class="media-block theme-bg-primary py-5">
			<div class="container">
				<h4 class="text-white text-center mb-3">Previamente</h4>
				<div class="section-intro text-center single-col-max mx-auto text-white mb-5">Explora los videos de ediciones anteriores del Congreso, donde se destacan ponencias de expertos, debates inspiradores y talleres prácticos. Descubre la calidad y el impacto de los contenidos compartidos, motivándote a formar parte de esta experiencia transformadora. ¡Revive momentos inolvidables en nuestras plataformas multimedia!</div>
				<div class="row gx-md-5">
				@if($setting->youtube_video_1)	
				@php
        // Convertir el enlace a una URL embed válida
        $video1 = str_replace('watch?v=', 'embed/', $setting->youtube_video_1);
        $video1 = strtok($video1, '&'); // Elimina parámetros extra como "&t=14s"
    @endphp
				<div class="col-12 col-md-6 mb-3">
						<div class="ratio ratio-16x9">
							
							<iframe src="{{ $video1 }}" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div><!--//embed-responsive -->
					</div><!--//col-->
					@endif
					@if($setting->youtube_video_2)
					@php
        // Convertir el enlace a una URL embed válida
        $video2 = str_replace('watch?v=', 'embed/', $setting->youtube_video_2);
        $video2 = strtok($video2, '&'); // Elimina parámetros extra como "&t=14s"
    @endphp
					<div class="col-12 col-md-6 mb-md-5">
						<div class="ratio ratio-16x9">
							<iframe src="{{ $video2 }}"  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div><!--//embed-responsive -->
					</div><!--//col-->
					@endif
				</div><!--//row-->
			</div><!--//container-->
		</div><!--//media-block-->
	</section><!--//about-section-->
	
	<section id="speakers-section" class="speakers-section section">
		<div class="container">
			<h3 class="section-heading text-center mb-3">Exponentes</h3>
			<div class="section-intro text-center single-col-max mx-auto mb-5">Son expertos destacados que comparten conocimientos y experiencias clave, inspirando a los asistentes con ideas innovadoras y soluciones prácticas en el ámbito tecnológico y académico.</div>
			<div class="row">
			<div class="container mt-5">
    <div class="row">
        @forelse ($teamMembers as $member)
            <div class="col-6 col-lg-3 mb-4">
                <div class="card rounded-0">
                    <!-- Imagen del miembro -->
                    <a href="#modal-speaker-{{ $member->id }}" data-bs-toggle="modal" data-bs-target="#modal-speaker-{{ $member->id }}">
                        <img src="{{ $member->image_url }}" class="card-img-top rounded-0" alt="{{ $member->name }}">
                    </a>
                    <!-- Detalles del miembro -->
                    <div class="card-body  ">
                        <h5 class="card-title mb-2">{{ $member->name }}</h5>
                        <div class="card-text mb-3">
                            <div class="social-list list-inline mb-0"><li class="list-inline-item"><i class="fa-solid fa-user-graduate"></i><span class="ml 2"></span></li> {{ $member->role }}</div>
                            <div class="meta"><i class="fa-solid fa-microphone-lines"></i> <span class="ml 2">{{ $member->team }}</div>
                        </div>
                        <a href="#modal-speaker-{{ $member->id }}" data-bs-toggle="modal" data-bs-target="#modal-speaker-{{ $member->id }}">Más Información &rarr;</a>
                    </div>
                    <!-- Redes sociales -->
                    <div class="card-footer text-muted">
                        <ul class="social-list list-inline mb-0">
                            @if ($member->twitter)
                                <li class="list-inline-item"><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter fa-fw"></i></a></li>
                            @endif
                            @if ($member->linkedin)
                                <li class="list-inline-item"><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal Speaker -->
            <div class="modal modal-speaker" id="modal-speaker-{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="speaker-{{ $member->id }}-ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 id="speaker-{{ $member->id }}-ModalLabel" class="modal-title sr-only">{{ $member->name }}</h4>
                        </div>
                        <div class="modal-body p-0">
                            <div class="theme-bg-light p-5">
                                <div class="row">
                                    <div class="col-12 col-md-auto text-center">
                                        <img class="profile-image mb-3 mb-md-0 me-md-4 rounded-circle mx-auto" src="{{ $member->image_url }}" alt="{{ $member->name }}">
                                    </div>
                                    <div class="col text-center text-md-start mx-auto">
                                        <h2 class="name mb-2">{{ $member->name }}</h2>
                                        <div class="meta"><i class="fa-solid fa-user-graduate "></i><span class="ml 2"></span> {{ $member->role }}</div>
                                        <div class="meta mb-2"><i class="fa-solid fa-microphone-lines"></i> <span class="ml 2"></span> {{ $member->team }}</div>
                                        <ul class="social-list list-inline mb-0">
                                            @if ($member->twitter)
                                                <li class="list-inline-item"><a href="{{ $member->twitter }}"><i class="fab fa-twitter fa-fw"></i></a></li>
                                            @endif
                                            @if ($member->linkedin)
                                                <li class="list-inline-item"><a href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

							  <div class="desc p-4 p-lg-5">
                                <p>{{ $member->bio }}</p>
                                <p class="mb-0"> {{ $member->details }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No hay miembros del equipo registrados.</p>
            </div>
        @endforelse
    </div>
</div>


	
	
	<section id="schedule-section" class="schedule-section section">
    <div class="container">
        <h3 class="section-heading text-center mb-5">Cronograma</h3>

        <!-- Nav tabs -->
        <ul class="schedule-nav nav nav-pills nav-fill" id="myTab" role="tablist">
            <li class="nav-item me-2">
                <a class="nav-link active" id="tab-1" data-bs-toggle="tab" href="#tab-1-content" role="tab" aria-controls="tab-1-content" aria-selected="true">
				<span class="heading">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>

                   
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="schedule-tab-content tab-content">
            <div class="tab-pane active" id="tab-1-content" role="tabpanel" aria-labelledby="tab-1">
                @forelse($cronogramas as $cronograma)
                <div class="item item-talk">
				<br><br>
                    <div class="meta">
					
                        <h4 class="time mb-3">{{ date('H:i', strtotime($cronograma->hora_inicio)) }} - {{ date('H:i', strtotime($cronograma->hora_fin)) }}</h4>
                       
						<div class="profile">
                            <a href="#modal-peaker-{{ $cronograma->id }}" data-bs-toggle="modal" data-bs-target="#modal-peaker-{{ $cronograma->id }}">
                                <img class="profile-image rounded-circle mb-2" src="{{ asset('storage/' . $cronograma->foto) }}" alt="">
                            </a> 
                            <div class="name">
                                <a class="theme-link" href="#modal-peaker-{{ $cronograma->id }}" data-bs-toggle="modal" data-bs-target="#modal-peaker-{{ $cronograma->id }}">
                                    {{ $cronograma->nombre }} {{ $cronograma->apellido }}
                                </a>
                            </div>
							<br>
                        </div>
                    </div>
                    <div class="content">
                        <h3 class="title mb-3">{{ $cronograma->tema_exposicion }}</h3>
                        <div class="location mb-3"><i class="fas fa-map-marker-alt me-2"></i>{{ $cronograma->lugar }}-{{$cronograma->dia}} {{$cronograma->dia_numero}} de {{$cronograma->mes}}</div>
                        <div class="desc">
                            {{ $cronograma->descripcion }}
                        </div>
                    </div>
                </div>
                @empty
            <div class="col-12 text-center">
                <p>No hay cronogramas disponibles.</p>
            </div>
                
                @endforelse
            </div>
        </div>
    </div>
</section>

	<section id="tickets-section" class="tickets-section section theme-bg-light">
		<div class="container">
			<h3 class="section-heading text-center mb-3">Valor de las ponencias</h3>
			<div class="section-intro text-center single-col-max mx-auto mb-5">Elige y asegura tu lugar en el Congreso Internacional de Tecnologías de la Información y Comunicación (TIC). ¡No te pierdas esta oportunidad de aprender, conectar y crecer con expertos y profesionales del sector!</div>		
					<div class="container mt-5">
 						

    <div class="row pricing mb-5">
        @forelse($products as $product)
            <div class="col-12 col-md-4 p-2 p-lg-4">
                <div class="card rounded-0 border-0">
                    <div class="card-body p-0">
                        <div class="heading text-center p-3">
                            <h4 class="text-white mb-0">{{ $product->title }}</h4>
                        </div>
                        <div class="info p-3">
                            <div class="price-figure text-center mb-3">
                                <span class="currency">$</span><span class="number">{{ $product->price }}</span>
                            </div>
                            <div class="desc px-3 text-center">
                                {{ $product->description }}
                            </div>
                        </div><!--//info-->
                    </div><!--//card-body-->
                    
                </div><!--//card-->
            </div><!--//col-->
        @empty
            <div class="col-12 text-center">
                <p>No hay productos disponibles.</p>
            </div>
        @endforelse
    </div><!--//row-->
</div>

			
			<div class="offers text-center bg-white p-4 p-lg-5">
				<h4 class="mb-3">Por qué unirse a nosotros
				?</h4>
				<ul class="offers-list list-unstyled d-inline-block mx-auto text-start">
					<li><span class="icon-holder me-2"><i class="fa-solid fa-microchip"></i></i></span>Conoce las tendencias actuales en tecnologías</li>
					<li><span class="icon-holder me-2"><i class="fa-solid fa-handshake"></i></i></span>Conecta con expertos y profesionales TIC.</li>
					<li><span class="icon-holder me-2"><i class="fa-solid fa-school"></i></span>Asiste a conferencias internacionales destacadas.</li>
					<li><span class="icon-holder me-2"><i class="fa-solid fa-marker"></i></span>Participa en talleres prácticos innovadores.</li>
					<li><span class="icon-holder me-2"><i class="fa-solid fa-graduation-cap"></i></span>Enriquecimiento académico para estudiantes tecnológicos.</a></li>
					<li><span class="icon-holder me-2"><i class="fas fa-book"></i></span>Crea alianzas para proyectos tecnológicos futuros.</li>
					<li><span class="icon-holder me-2"><i class="fa-solid fa-hand-holding-heart"></i></span>Impulsa el desarrollo tecnológico regional.</li>
				</ul><!--offers-list-->
			</div><!--//offers-->

		</div><!--//container-->
	</section><!--//tickets-section-->
	
	
	
	

	<footer class="footer py-5 theme-bg-primary">
		<div class="container text-center">
			
			<ul class="social-list list-inline mb-4"> 
				<li class="list-inline-item me-3"><a href="https://www.facebook.com/UniversidadEstataldelSurdeManabi"><i class="fab fa-facebook-f"></i></a></li>
				<li class="list-inline-item me-3"><a href="https://x.com/unesumoficial"><i class="fab fa-twitter fa-fw"></i></a></li>
				<li class="list-inline-item me-3"><a href="https://www.instagram.com/ti_unesum/"><i class="fab fa-instagram fa-fw"></i></a></li>
				<li class="list-inline-item me-0"><a href="https://www.youtube.com/@unesumoficial"><i class="fab fa-youtube fa-fw"></i></a></li>
			</ul><!--//social-list-->
			
			
			
			
			 <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			<small class="copyright">Congreso Internacional  <i class="fas fa-heart" style="color: #EC645E;"></i><a href="#" >Tecnologias de la informacion y comunicacion</a> Unesum</small>
			
		</div><!--//container-->	    
	</footer>

		
	<!-- Javascript -->          
	<script src="assets/plugins/popper.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
	<script src="assets/plugins/smoothscroll.min.js"></script>
	<script src="assets/plugins/gumshoe/gumshoe.polyfills.min.js"></script> 
	<script src="assets/js/main.js"></script>  

</body>
</html> 

