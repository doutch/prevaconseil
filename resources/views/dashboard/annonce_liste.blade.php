@extends('templates.template_dashboard')

@section('titre')

Liste des annonces

@stop

@section('contenu')

<!-- message de retour  -->
@if (session('retour'))
	<div class="alert alert-success">
    	{{ session('retour') }}
  	</div>
@endif

<section class="content">

<section class="content">

	<!-- Bouton pour déposer les annonces-->
	@if(session('statut') == 'user')
		<div class = 'row'>

			<a class = "btn btn-primary" href="{!! route('annonce.create',['typeAnnonce' => 'candidature']) !!}">Déposer une candidature</a>
			<br><br>

			<a class = "btn btn-primary" href="{!! route('annonce.create',['typeAnnonce' => 'offre']) !!}">Déposer une offre</a>
			<br><br>
		
		</div>
	@endif

	<div class = 'box'>
		<div class = 'box-header with-border'>
		</div>

		<div class= 'box-body'>
			<table class = 'table table-bordered'>

				<thead>
					<tr>
						<th>Annonce</th>
						<th>Type</th>
						<th>Date</th>

						@if(session('statut') == 'user')
							<th>Statut</th>
						@endif

						<!-- Seuls les administrateurs ont le droit d'activer'-->
						@if(session('statut') == 'admin')
							<th>Utilisateur</th>
							<th>Activation</th>
						@endif

						<th>Voir</th>

						<!-- Seuls les utilisateurs ont le droit de modifier et supprimer-->
						@if(session('statut') == 'user')
							<th>Modifier</th>
							<th>Supprimer</th>
						@endif
					</tr>
				</thead>

				@foreach ($liste_annonces as $annonce)
					@if($annonce->active== '0')
		  				<tr class = 'warning'>
		  			@else
		  				<tr> 
		  			@endif
		  				<!-- Titre de l'annonce -->
		    			<td class="text-primary"><strong>{{ $annonce->titre}}</strong></td>

		    			<!-- Type de l'annonce -->
		    			<td class="text-primary"><strong>{{ $annonce->type_annonce}}</strong></td>

		    			<!-- Affichage de l'activation suivant le type d'utilisateur -->
		    			<td>{{ Carbon\Carbon::parse($annonce->created_at)->format('d/m/Y') }}</td> 
	    				@if(session('statut') == 'admin')

	    					<td>{{ $annonce->nom}}</td> 
	      					
	      					<td>{!! Form::checkbox('active', $annonce->slug, $annonce->active,array('id' => 'checkbox_active')) !!}</td>
	      				@else
	      					@if($annonce->active== '0')
	      						<td>En attente de validation</td>
	      					@else
	      						<td>Validée</td>
	      					@endif
		    			@endif
		    			
		    			<td><a class href="{!! route('annonce.show',$annonce->slug) !!}"><i class="fa fa-file-text-o">Voir</i></a></td>

		    			<!-- Seuls les utilisateurs ont le droit de modifier et supprimer-->
		    			@if(session('statut') == 'user')
			    			
			    			<td><a class = "btn btn-warning btn-block btn" href="{!! route('annonce.edit',$annonce->slug) !!}">Modifier</a></td>
			    			<td>
						    	{!! Form::open(['method' => 'DELETE', 'route' => array('annonce.destroy', $annonce->slug),'class' => 'form_delete']) !!}
						      		{!! Form::submit('Supprimmer', array('class' => 'btn btn-danger btn-block')) !!}
						      		
						      		<!-- protection crscf -->	
									{!! Form::token() !!}
									
						    	{!! Form::close() !!}
						    </td>

						@endif
		  			</tr> 
				@endforeach
			</table>
		</div>
	</div>

</section>  

@stop

@section('script_js')

	@if(session('statut') == 'admin')

		<!-- Mise à jour de la publication-->
		<script>

			//changement d'état de la checkbox
			$('#checkbox_active').on('change', function() {

	  			//remplacement de la checkbox par une animation de loading
	  			$(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
	  			
	  			//fonction ajax
	  			$.ajax({
			    url: '{{ url('dashboard/annonce-active') }}' + '/' + this.value,	//appel de l'url annonce active avec l'id de l'annonce
			    type: 'PUT',
			    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },	//champ token pour la validation du formulaire en POSt ou PUT
			    data: {
			    	
			    	"active": this.checked		//paramètres
			    	
			    }								
			    
			  })
			  .done(function() {												//ok
			    $('.fa-spin').remove();											//retrait de l'animation
			    $('#checkbox_active').show();									//affichage de la checkbox
			    $('#checkbox_active').parents('tr').toggleClass('warning');		//affichage ou non de la classe warning pour le tableau 

			   
			  })
			  .fail(function() {										//fail
			    $('.fa-spin').remove();
			    chk = $('#checkbox_active');		//message warning
			    chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('warning');
			    alert('Poblème lors de la validation de la checkbox');
			  });
			});

		</script>
	@endif

	<!-- Liste de scripts perso -->
	<script src = "{{ asset('/js/perso.js') }}" type="text/javascript">></script>

	<!-- Script d'alert pour avant la suppression -->
	<script>
		confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette annonce?");
	</script>
	
@stop


