@extends('templates.template_dashboard')

@section('titre')

Tableau de bord

@stop

@section('contenu')

	@if(session('statut') == 'admin')

		@foreach ($nbrUsers as $user)
			<!-- Nombre d'annonces -->
		<div class="col-lg-3 col-xs-6">
            
			<div class = 'small-box bg-aqua'>

				<div class = 'inner'>
					<h3>{{ $user->nbre }}</h3>
	    			<p>Nombre d'utilisateurs</p>
	    		</div>

	    		<div class = 'icon'>
	    			<i class = 'ion-document-text' ></i>
	    		</div>
	    	</div>
	    </div>
	    
		@endforeach

		@foreach ($nBreActualites as $actualite)

		<!-- Nombre d'annonces -->
		<div class="col-lg-3 col-xs-6">
            
			<div class = 'small-box bg-aqua'>

				<div class = 'inner'>
					<h3>{{ $actualite->nbre }}</h3>
	    			<p>Nombre d'actualités</p>
	    		</div>

	    		<div class = 'icon'>
	    			<i class = 'ion-document-text' ></i>
	    		</div>
	    	</div>
	    </div>

		@endforeach

	@endif

	@foreach ($nbrePosts as $post)
		<div class = 'row'>

			<!-- Nombre d'annonces -->
			<div class="col-lg-3 col-xs-6">
	            
				<div class = 'small-box bg-aqua'>

					<div class = 'inner'>
						<h3>{{ $post->nbre }}</h3>
		    			<p>Nombre d'annonces</p>
		    		</div>

		    		<div class = 'icon'>
		    			<i class = 'ion-document-text' ></i>
		    		</div>
		    	</div>
		    </div>
	@endforeach

	    
    @if(session('statut') == 'user')

	    <!-- Controle du profil -->
		<div class="col-lg-6 col-xs-6">
            
            @if($profil == 'OK')
            	<div class = 'small-box bg-green'>
            @else
            	<div class = 'small-box bg-red'>
            @endif

				<div class = 'inner'>
					@if($profil == 'OK')
						<h3>Votre profil est OK</h3>
	    				<p>Les personnes intéressées par vo(s) annonces pourront vous joindre</p>
	    			@else
	    				<h3>Vous n'avez pas créé votre profil</h3>
	    				<p>Vous ne pourrez être joint par les personnes intéressées par vo(s) annonce(s)</p>
	    			@endif
	    		</div>

	    		<div class = 'icon'>
	    			<i class = 'ion-person' ></i>
	    		</div>
	    	</div>
	    </div>
	@endif

		
    </div>


@stop