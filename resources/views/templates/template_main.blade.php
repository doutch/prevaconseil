<!DOCTYPE html>
<html>
	<head>
		<title>Préva Conseils - @yield('titre')</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		 <!-- Boostrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- CSS perso -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

        <!-- Polices -->
        <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

		<!-- Font Awesome -->
		<link href="{{ asset('css/font-awesome-4.6.3/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >

		<!-- Slider Jssor-->
		<link href="{{ asset('css/jssor_perso.css') }}" rel="stylesheet" type="text/css" >
		
	</head>

	<body>

		<!-- header  + menu-->
		<div class="header">

			<div class="container">
				<div class="header-nav">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
							<div class="logo">
								<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/Logo-PrevaConseils-medium.png') }}" alt=" " class="img-responsive" /><p class = "sstitre_logo">Conseil et sécurité à la formation</p></a>
							</div>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						 <ul class="nav navbar-nav cl-effect-14">
							<li><a href="{{ url('/') }}" class="{{ Request::segment(1) === null ? 'active' : null }}">Accueil</a></li>

							<li class="dropdown">

    							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Formations <b class="caret"></b></a>

								<ul class="dropdown-menu">

    								<li><a href="{{ route('formations.liste') }}">Liste des formations</a></li>

    								<li><a href="{{ route('formations.expertise') }}">Expertise</a></li>

								</ul>

							</li>

				            <li class="dropdown">

    							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Annonces <b class="caret"></b></a>

								<ul class="dropdown-menu">

    								<li><a href="{{ route('annonce.listeWeb') }}">Voir les annonces</a></li>

    								<li><a href="{{ route('annonce.create',['typeAnnonce' => 'candidature']) }}">Déposer une candidature</a></li>

    								<li><a href="{{ route('annonce.create',['typeAnnonce' => 'offre']) }}">Déposer une offre</a></li>

								</ul>

							</li>

							<li class="dropdown">

    							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Informations pratiques<b class="caret"></b></a>

								<ul class="dropdown-menu">

    								<li><a href="#">Régler les factures</a></li>

    								<li><a href="#">Evaluation des formations</a></li>

    								<li><a href="#">Newsletter</a></li>

    								<li><a href="#">Information sécurité</a></li>

    								<li><a href="#">Réglementation</a></li>

								</ul>

							</li>

							<li class="dropdown">
							
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">La société<b class="caret"></b></a>

								<ul class="dropdown-menu">

    								<li><a href="{{ route('societe.activites') }}">Les activités de la société</a></li>

    								<li><a href="{{ route('societe.mot_directeur') }}">Le mot du directeur</a></li>

								</ul>
							</li>
							<li><a href="{{ url('/contact') }}" class="{{ Request::segment(1) === 'contact' ? 'active' : null }}"">Contact</a></li>

							<!-- Liens de connexions-->
							@if (Auth::guest())

		                        <li class="dropdown">

	    							<a href="#" data-toggle="dropdown" class="dropdown-toggle {{ Request::segment(1) === 'login' ? 'active' : null }}">Se connecter <b class="caret"></b></a>

									<ul class="dropdown-menu">

	    								<li><a href="{{ url('/login') }}">Espace client</a></li>

	    								<li><a href="#">Espace partenaire</a></li>

									</ul>

								</li>


		                        <li><a href="{{ url('/register') }}"  class="{{ Request::segment(1) === 'register' ? 'active' : null }}">S'inscrire</a></li>
		                    @else
		                        <li class="dropdown">
		                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		                                {{ Auth::user()->name }} <span class="caret"></span>
		                            </a>

		                            <ul class="dropdown-menu" role="menu">
		                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a></li>
		                            </ul>
		                        </li>
		                    @endif
						  </ul>
						</div><!-- /.navbar-collapse -->
					</nav>
				</div>
			</div>
		</div>
		<!-- //header + menu-->

		<!-- Contenu -->
		@yield('contenu')

		<!-- footer -->
		<div class="footer">	
			<div class="container">
				<div class="footer-grids">
					<div class="col-md-3 footer-grid">
						<h3 class="title">Services</h3>
						<ul>
							<li><a href="#">Audit</a></li>
							<li><a href="#">Conseil</a></li>
							<li><a href="#">Formation</a></li>
							<li><a href="#">Accompagnement</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid ctact-grid">
						<h3 class="title">Secteurs</h3>
						 <ul>
							<li><a href="#">Foyers de vie</a></li>
							<li><a href="#">Foyers d'hébergement</a></li>
							<li><a href="#">Esat</a></li>
							<li><a href="#">Ime</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid ctact-grid">
						<h3 class="title">Informations</h3>
						<ul>
							<li><a href="#">Qui somme - nous?</a></li>
							<li><a href="#">Actualités</a></li>
							<li><a href="#">Nos références</a></li>
							<li><a href="contact.html">Certifications</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid contact-grid">
							<h3 class="title">Contact</h3>
							<ul>
								<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>PREVA CONSEILS.</li>							
								<li class="adrs">5 RUE MARCELINE <br>95110 SANNOIS</li>
								<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>01.34.17.61.33</li>
								<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:example@mail.com">contact@preva-conseils.fr</a></li>
							</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="copy">
			<div class="container">
				<p>Copyright © 2017 Prévaconseil.</p>
				<div class="social-icons">
					<ul>
						<li><a href="#" class="fb"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#" class="gg"></a></li>
						<li><a href="#" class="pn"></a></li>					
					</ul>	
				</div>
			</div>
		</div>
		<!--//footer-->

		  <!-- JQuery -->
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

        <!-- Js Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

         <script src="{{ asset('js/perso.js') }}"></script>

		<!-- JS accueil -->
		@if(Request::path() === '/') 

			<script src="{{ asset('js/jssor.slider.mini.js') }}"></script>

			<script src="{{ asset('js/jssor.slideshow_accueil.js') }}"></script>
		@endif
	</body>

</html> 