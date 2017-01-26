@extends('templates.template_dashboard')

@section('titre')

Liste des catalogues

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

	<!-- Bouton pour déposer un catalogue-->
	<div class = 'row'>

		<a class = "btn btn-primary" href="{!! route('fichier.create',['typeFichier' => 'catalogue']) !!}">Enregistrer un catalogue</a>
		<br><br>
	
	</div>
	

	<div class = 'box'>
		<div class = 'box-header with-border'>
		</div>

		<div class= 'box-body'>
			<table class = 'table table-bordered'>

				<thead>
					<tr>
						<th>Catalogue</th>
						<th>Date</th>

						<th>Voir</th>
						<th>Modifier</th>
						<th>Supprimer</th>
						
					</tr>
				</thead>

				@foreach ($liste_fichiers as $catalogue)
					
		  			<tr> 
		  			
		  				<!-- Titre du catalogue -->
		    			<td class="text-primary"><strong>{{ $catalogue->nom}}</strong></td>

		    			<!-- Affichage de l'activation -->
		    			<td>{{ Carbon\Carbon::parse($catalogue->created_at)->format('d/m/Y') }}</td> 
	    				
		    			
		    			<td><a <a href="{{ asset('uploads/'.$catalogue->nom_fichier) }}" target = "_blank"><i class="fa fa-file-text-o">Voir</i></a></td>
			    			
		    			<td><a class = "btn btn-warning btn-block btn" href="{!! route('fichier.edit',$catalogue->slug) !!}">Modifier</a></td>
		    			<td>
					    	{!! Form::open(['method' => 'DELETE', 'route' => array('fichier.destroy', $catalogue->slug),'class' => 'form_delete']) !!}
					      		{!! Form::submit('Supprimmer', array('class' => 'btn btn-danger btn-block')) !!}
					      		
					      		<!-- protection crscf -->	
								{!! Form::token() !!}
								
					    	{!! Form::close() !!}
					    </td>
						
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


