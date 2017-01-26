@extends('templates.template_main')

@section('titre')

Liste des formations

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

		<h3 class = 'titre_accueil mt50'>Liste des formations</h3>

		<table class = 'table table-bordered mb50 mt50'>

				<thead>
					<tr>
						<th>Catalogue</th>
						<th>Description</th>
						<th>Date</th>
						<th>Voir</th>
						
					</tr>
				</thead>

				@foreach ($liste_fichiers as $catalogue)
					
		  			<tr> 
		  			
		  				<!-- Titre du catalogue -->
		    			<td class="text-primary"><strong>{{ $catalogue->nom}}</strong></td>

		    			<!-- Description du catalogue -->
		    			<td class="text-primary"><strong>{{ $catalogue->description}}</strong></td>

		    			<!-- Affichage de l'activation -->
		    			<td>{{ Carbon\Carbon::parse($catalogue->created_at)->format('d/m/Y') }}</td> 
	    				
		    			
		    			<td><a <a href="{{ asset('uploads/'.$catalogue->nom_fichier) }}" target = "_blank"><i class="fa fa-file-text-o">Voir</i></a></td>
			    			
		    			
						
		  			</tr> 
				@endforeach
		</table>
	
	</div>
	
<!-- //contact -->

@stop