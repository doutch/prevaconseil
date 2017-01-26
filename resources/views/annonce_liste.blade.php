@extends('templates.template_main')

@section('titre')

Liste des annonces

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

		<h3 class = 'titre_accueil mt50'>Liste des annonces</h3>

		<table class = 'table table-bordered mt50 mt50'>

				<thead>
					<tr>
						<th>Annonce</th>
						<th>Type</th>
						<th>Catégorie</th>
						<th>Nom</th>
						<th>Date</th>
						<th>Voir</th>

					</tr>
				</thead>

				@foreach ($liste_annonces as $annonce)
				
		  			<tr> 
		  			
		  				<!-- Titre de l'annonce -->
		    			<td class="text-primary"><strong>{{ $annonce->titre}}</strong></td>

		    			<!-- Type de l'annonce -->
		    			<td class="text-primary"><strong>{{ $annonce->type_annonce}}</strong></td>

		    			<!-- Catégorie de l'annonce -->
		    			<td class="text-primary"><strong>{{ $annonce->categorie}}</strong></td>

		    			<!-- Nom de l'utilisateur -->
		    			<td class="text-primary"><strong>{{ $annonce->nom}}</strong></td>

		    			<!-- Affichage de l'activation suivant le type d'utilisateur -->
		    			<td>{{ Carbon\Carbon::parse($annonce->created_at)->format('d/m/Y') }}</td> 
	    				
		    			<td><a class href="{!! route('annonce.showWeb',$annonce->slug) !!}"><i class="fa fa-file-text-o">Voir</i></a></td>
		  			</tr> 
				@endforeach
			</table>
	</div>
	
<!-- //contact -->

@stop