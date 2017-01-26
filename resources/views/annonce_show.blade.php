@extends('templates.template_main')

@section('titre')

Annonce

@stop

@section('contenu')

	<!-- banner -->
	<div class="banner1">
		<div class="container">
			<div class="banner1-info">
				<h3><span>Better Vision</span> For A Better Life</h3>
				<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
					esse quam nihil molestiae consequatur.</p>
			</div>
		</div>
	</div>
	<!-- //banner -->

	<!-- contact -->
	<div class="container container_corps">

	<h3 class = 'titre_accueil mt50'>Annonces</h3>

		<section class="content">
		  <div class = 'col-md-6 col-md-offset-3'>

		    <!-- Box Comment -->
		    <div class="panel panel-default ">
		      <div class="panel-heading">
		        <h3 class="panel-title">{!! $annonce->titre !!}</h3>

		         <div class="user-block">
		            <p><span class="username">Utilisateur: <a href="#">{{ $user_annonce->name }}</a></span></p>
		            <span class="description">Annonce crée le : {{ Carbon\Carbon::parse($annonce->created_at)->format('d/m/Y')  }}</span>
		        </div><!-- /.user-block -->

		       </div><!-- /.box-header -->


		  
		      <div class="panel-body">

		        

		  	     {!! $annonce->contenu !!}

		      </div><!-- /.box-comment -->
		    </div><!-- /.box -->
		  </div>       

		</section>  
	</div>
	
<!-- //contact -->

@stop