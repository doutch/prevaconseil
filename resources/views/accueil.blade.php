@extends('templates.template_main')

@section('titre')

Accueil

@stop

@section('contenu')

	<!-- Bannière de l'accueil -->
	<div class="banner ">
	
		<div id="slider1_container" style="position: relative; width: 1920px;height: 580px;float:right;box-shadow: 0px 0px 8px 2px rgba(119, 119, 119, 0.75); margin-bottom:30px;">

			<!-- Loading Screen -->
			<div u="loading" style="position: absolute; top: 0px; left: 0px;">
				<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				<div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;top: 0px; left: 0px; width: 100%; height: 100%;"></div>
			</div>

			<!-- Slides Container -->
			<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1920px;height: 580px; overflow: hidden;">
				<div>
					<img src="{{ asset('img/slideshow_accueil/1_split.jpg') }}">
					
					<div style="position: absolute; top: 125px; left: 125px; width: 350px;height: 50px;">
        				
        				<a href="#" class="push-candidature_slideshow">      
		            		<span class="p1">Vous donner les outils</span>
		            		<span class="p2">pour assurer votre prévention</span>
		    			</a>
    				</div>
				</div>

				<div>
					<img src="{{ asset('img/slideshow_accueil/3_split.jpg') }}">
					<div style="position: absolute; top: 125px; left: 125px; width: 350px;height: 50px;">
        				
        				<a href="#" class="push-candidature_slideshow">      
		            		<span class="p1">Vous aider à ameliorer</span>
		            		<span class="p2">vos conditions de sécurité</span>
		    			</a>
    				</div>
				</div>
				
				<div>
					<img src="{{ asset('img/slideshow_accueil/2_split.jpg') }}">
					<div style="position: absolute; top: 125px; left: 125px; width: 350px;height: 50px;">
        				
        				<a href="#" class="push-candidature_slideshow">      
		            		<span class="p1">Vous former pour</span>
		            		<span class="p2">vous rendre plus performant</span>
		    			</a>
    				</div>
				</div>
				
				<div>
					<img src="{{ asset('img/slideshow_accueil/EVACUATION.jpg') }}">
					<div style="position: absolute; top: 125px; left: 125px; width: 350px;height: 50px;">
        				
        				<a href="#" class="push-candidature_slideshow">      
		            		<span class="p1">Formations adaptées</span>
		           
		    			</a>
    				</div>
				</div>

			</div>

			<!-- bullet navigator container -->
			<div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
				<!-- bullet navigator item prototype -->
				<div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
			</div>
			<!-- Bullet Navigator Skin End -->

			<!-- Arrow Left -->
			<span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
			</span>
			<!-- Arrow Right -->
			<span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px">
			</span>

		<!-- Jssor Slider End -->
		</div>
	</div>

	<div class = 'container'>

		<div class="row mb50">

			<div class="col-md-3">
				<div id="tile10" class="tile">
    	 
		           	<div id="text-carousel" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
		          		<div class="carousel-inner">

		            		<div class="item active">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class = 'text-center'>Formateur certifié</h3>
		              				</div>
		              			</div>
		            		</div>
		            
		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3  class = 'text-center'>DUERP</3>
		              				</div>
		              			</div>
		            		</div>
		            
		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Plan bleu</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Pénibilité</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Technique d’évacuation</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Incendie</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Sécurité domestique</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Extincteur</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Exercice d’évacuation</h3>
		              				</div>
		              			</div>
		            		</div>
 
		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Premiers secours</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Secouriste du travail</h3>
		              				</div>
		              			</div>
		            		</div>

		      				<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Prévention des chutes</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Gestes et postures</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Manutention</h3>
		              				</div>
		              			</div>
		            		</div>

		            		<div class="item">
		            			<div class="carousel-content">
                        			<div>
		              					<h3 class="text-center">Expert</h3>
		              				</div>
		              			</div>
		            		</div>
        
		          		</div>
		        	</div>
				</div>
			</div> 

			<div class="col-md-3">
				
				<a href="#" class="push-candidature_1">      
            		<span class="p1">Visualiser</span>
            		<span class="p2">télécharger le catalogue</span>
    			</a>
			</div>

			<div class="col-md-3">

				<a href="#" class="push-candidature_2">      
            		<span class="p1">Facile</span>
            		<span class="p2">à lire et à comprendre</span>
    			</a>
				
			</div>

			<div class="col-md-3">
				<a href="#" class="push-candidature_3">      
            		<span class="p1">L'expertise</span>
            		<span class="p2">de nos formateurs</span>
    			</a>
			</div>
		</div>
	</div>

	<div class = 'container'>

		<div class="row mb50">

			<h1 class="text-center titre_accueil"><b>Notre mission:</b> vous aider à diagnostiquer et éviter les situations dangereuses.</h1>
		</div>

		<div class="row  mb50">

			<p class = 'text-center'>Fort de son experience, <b>PREVA CONSEILS</b>, cabinet conseil et organisme de formationspécialisé dans la sécurité des personnes et des biens, a pour vocation de vous former et vous accompagner dans votre démarche.</p>
			<br>
			<p class = 'text-center'> Nous vous aidons à appréhender et à gerer les situations de danger et les risques professionnels ou domestiques au sein de votre structure, de manière à améliorer la sécurité et les conditions de travail et de vie de vos résidents, du personnel salarié et de tout public concerné.</p>
		</div>
	</div>

	<div class = 'container'>

		<div class="row">

			<div class="col-md-12">
				 <!--  Title -->
	            <div class="bm-header">
	                <h2>Services</h2>
	                <div class="widget-title-bar"><div class="color-bar"></div></div>
	            </div>
	        </div>

		</div>

		<div class="row service mb50">

			<div class="col-md-3 service-item">
				<div class="image-container">
	            	<img src="{{ asset('img/303608339.jpg') }}" alt=" " class="img-responsive" />
	                <div class="sandbox"></div>
	                <a href="photos/service1.jpg" class="zoom" data-rel="prettyPhoto"><i class="icon-eye-open"></i></a>
	                <a href="#" class="link"><i class="icon-link"></i></a>
	            </div>
	            <h2><a href="#">Audit</a></h2>
	            <p>Analyse de votre situation en regard des législations et réglementations en vigueur. <br>
		            Vérification de l'application des normes, règlements et procédures.<br>
		            Evaluation des écarts avec le référentiel normatif.<br>
		            Rapport d'audit.
		        </p>
			</div>

			<div class="col-md-3 service-item">
				<div class="image-container">
	            	<img src="{{ asset('img/127066619.jpg') }}" alt=" " class="img-responsive" />
	                <div class="sandbox"></div>
	                <a href="photos/service1.jpg" class="zoom" data-rel="prettyPhoto"><i class="icon-eye-open"></i></a>
	                <a href="#" class="link"><i class="icon-link"></i></a>
	            </div>
	            <h2><a href="#">Conseil</a></h2>
	            <p>Analyse des besoins. <br>
	            	Détection et évaluation des risques <br>
	            	Définition des actions à mener. <br>
	            	Propositions d'amélioration et d'évolution.

	            </p>
			</div>

			<div class="col-md-3 service-item">
				<div class="image-container">
	            	<img src="{{ asset('img/129657923.jpg') }}" alt=" " class="img-responsive" />
	                <div class="sandbox"></div>
	                <a href="photos/service1.jpg" class="zoom" data-rel="prettyPhoto"><i class="icon-eye-open"></i></a>
	                <a href="#" class="link"><i class="icon-link"></i></a>
	            </div>
	            <h2><a href="#">Formation</a></h2>
	            <p>Pédagogie et utilisation d'outils adaptés. <br>
	            	Connaissance aprofondie des milieux et publics concernés. <br>
	            	Apports méthodologiques, de connaissances et de compétence.
	            </p>
			</div>

			<div class="col-md-3 service-item">
				<div class="image-container">
	            	<img src="{{ asset('img/426654388.jpg') }}" alt=" " class="img-responsive" />
	                <div class="sandbox"></div>
	                <a href="photos/service1.jpg" class="zoom" data-rel="prettyPhoto"><i class="icon-eye-open"></i></a>
	                <a href="#" class="link"><i class="icon-link"></i></a>
	            </div>
	            <h2><a href="#">Accompagnement</a></h2>
	            <p>Suivi des actions mises en oeuvres. <br>
	            	Evaluation et déroulement de la démarche. <br>
	            	Assistance et échange sur le terrain.
	            </p>
			</div>
		</div>
	</div>

	<div class = 'container'>

		<div class="row mb50">
			<div class="col-md-12">
				 <!--  Title -->
	            <div class="bm-header">
	                <h2>Annonces</h2>
	                <div class="widget-title-bar"><div class="color-bar"></div></div>
	            </div>
	        </div>
		</div>

		<div class="row mb50">

			<div class="col-md-12">
				<p class = 'text-center'>Vous recherchez une personne qualifiée dans les secteurs médico-social, sanitaire et social..</p>
				<p class = 'text-center'>Vous cherchez un emploi, un stage ou un contrat en alternance dans une structure spécialisée.</p>
				<p class = 'text-center'>Nous vous proposons un espace dédié afin de vous mettre en relation.</p>
				<br>
				<b><p class = 'text-center'>Déposez votre annonce ou votre candidature.</p></b>
			</div>
		</div>

		<div class="row mb50">
			<div class="events-grids">

				<div class="col-md-4 events-grid">

					<div class = 'listing_header mb50'>
						<h3>Nos dernières offres</h3>
					</div>

					<section class="listing-cont"></section>

					<div class="mnth-date">
						<div class="col-xs-5 mnth-date-left">
							<h4>15<span>Septembre 2016</span></h4>
						</div>
						<div class="col-xs-7 mnth-date-right">
							<p><b>Davy</b></p>
							<p>Foyer de vie</p>
						</div>
						<div class="clearfix"> </div>
						<p class="quasi">Bonjour, je vous propose mes services dans le secteur ...</p>
						
					</div>

					<hr>

					<div class="mnth-date">
						<div class="col-xs-5 mnth-date-left">
							<h4>18<span>Septembre 2016</span></h4>
						</div>
						<div class="col-xs-7 mnth-date-right">
							<p><b>David</b></p>
							<p>ESAT</p>
						</div>
						<div class="clearfix"> </div>
						<p class="quasi">Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
							accusantium doloremque laudantium, totam rem aperiam.</p>
				
					</div>

					<div class="mnth-date">
					
						<div class="more m1">
							<a href="single.html" class="hvr-curl-bottom-right">Toute les offres</a>
						</div>
					</div>
				</div>

				<div class="col-md-4 events-grid">

					<div class = 'listing_header mb50'>
						<h3>Nos dernières candidatures</h3>
					</div>

					<section class="listing-cont"></section>

					<div class="mnth-date">
						<div class="col-xs-5 mnth-date-left">
							<h4>15 <span>Septembre 2016</span></h4>
						</div>
						<div class="col-xs-7 mnth-date-right">
							<p><b>Davy</b></p>
							<p>Foyer de vie</p>
						</div>
						<div class="clearfix"> </div>
						<p class="quasi">Bonjour, je vous propose mes services dans le secteur ...</p>
						
					</div>

					<hr>

					<div class="mnth-date">
						<div class="col-xs-5 mnth-date-left">
							<h4>18<span>Septembre 2016</span></h4>
						</div>
						<div class="col-xs-7 mnth-date-right">
							<p><b>David</b></p>
							<p>ESAT</p>
						</div>
						<div class="clearfix"> </div>
						<p class="quasi">Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
							accusantium doloremque laudantium, totam rem aperiam.</p>
				
					</div>

					<div class="mnth-date">
						
						<div class="more m1">
							<a href="single.html" class="hvr-curl-bottom-right">Toute les candidatures</a>
						</div>
					</div>
				</div>

				<div class="col-md-4">

					<p></p>

					<a href="#" class="push-candidature_1">      
	            		<span class="p1">Déposer</span>
	            		<span class="p2">une candidature</span>
	    			</a>

	    			<a href="#" class="push-candidature_2">      
	            		<span class="p1">Déposer</span>
	            		<span class="p2">une offre</span>
	    			</a>


	    			<a href="#" class="push-candidature_3">      
	            		<span class="p1">Des questions? </span>
	            		<span class="p2">Contactez nous</span>
	    			</a>
				</div>
			</div>
		</div>
	</div>

	<!-- featured-services -->
	<div class="additional-services">
		<div class="container">
			<div class="additional-service-grid">
				<div class="col-md-12">
				 <!--  Title -->
	            <div class="bm-header">
	                <h2>Secteurs d'activites</h2>
	                <div class="widget-title-bar"><div class="color-bar"></div></div>
	            </div>
	        </div>
				<div class="additional-service-grids">

						<div class="col-md-3 additional-service-grd">
							<h4>EHPAD,MAS,FAM<br>Foyer de vie,hébergement</h4>
							<br>
							<img src="{{ asset('img/154153388.jpg') }}" alt=" " class="img-responsive" />
							
							<br>
							<div class="more">
								<a href="single.html" class="hvr-curl-bottom-right">En savoir plus</a>
							</div>
						</div>

						<div class="col-md-3 additional-service-grd">
							<h4>ESAT,EA</h4>
							<br>
							<br>
							<img src="{{ asset('img/378347191.jpg') }}" alt=" " class="img-responsive" />
							
							<br>
							<div class="more">
								<a href="single.html" class="hvr-curl-bottom-right">En savoir plus</a>
							</div>
						</div>

						<div class="col-md-3 additional-service-grd">

							<h4>IME,IEM,IMPRO</h4>
							<br>
							<br>
							<img src="{{ asset('img/285122015.jpg') }}" alt=" " class="img-responsive" />
							
							<br>
							<div class="more">
								<a href="single.html" class="hvr-curl-bottom-right">En savoir plus</a>
							</div>
						</div>

						<div class="col-md-3 additional-service-grd">
							<h4>PME,Industries,Bureau</h4>
							<br>
							<br>
							<img src="{{ asset('img/349318949.jpg') }}" alt=" " class="img-responsive" />
							
							<br>
							<div class="more">
								<a href="single.html" class="hvr-curl-bottom-right">En savoir plus</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //featured-services -->	

	<div class="events">
		<div class="container">

			<di class = 'row'>
				<div class="col-md-12">
					 <!--  Title -->
		            <div class="bm-header">
		                <h2>Preva Conseils En chiffres</h2>
		                <div class="widget-title-bar"><div class="color-bar"></div></div>
		            </div>
		        </div>

			<div class="events-grids-bottom">
				<div class="col-md-4 events-grids-btm">
					<div class="col-xs-4 events-grids-btm-left">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 events-grids-btm-right">
						<h4>13</h4>
						<p>Années d'expertises</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!--
				<div class="col-md-4 events-grids-btm">
					<div class="col-xs-4 events-grids-btm-left">
						<span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 events-grids-btm-right">
						<h4>30</h4>
						<p>Formations qualifiantes</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 events-grids-btm">
					<div class="col-xs-4 events-grids-btm-left">
						<span class="glyphicon glyphicon-check" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 events-grids-btm-right">
						<h4>3000</h4>
						<p>personnes formées</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<-->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>


@stop