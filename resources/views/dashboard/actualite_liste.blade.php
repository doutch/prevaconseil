@extends('templates.template_dashboard')

@section('titre')

Liste des actualités

@stop

@section('contenu')

<!-- message de retour  -->
@if (session('retour'))
	<div class="alert alert-success">
    	{{ session('retour') }}
  	</div>
@endif

<section class="content">

	<div class = 'row'>
		<a class = "btn btn-primary" href="{!! route('actualite.create') !!}">Créer une actualite</a>
		<br><br>
	</div>

	<div class = 'row'>

		<div class = 'box'>
			<div class = 'box-header with-border'>
			</div>

			<div class= 'box-body'>
				<table class = 'table table-bordered'>

					<thead>
						<tr>
							<th>Actualité</th>
							<th>Date</th>
							<th>Pseudo</th>
							@if(session('statut') == 'admin')
								<th>Activation</th>
							@endif

							<th>Voir</th>
							<th>Modifier</th>
							<th>Supprimer</th>

						</tr>
					</thead>

					@foreach ($liste_actualites as $actualite)
						@if($actualite->active == '0')
			  				<tr class = 'warning'>
			  			@else
			  				<tr> 
			  			@endif
			  				<!-- Titre de l'annonce -->
			    			<td class="text-primary"><strong>{{ $actualite->titre }}</strong></td>

			    			<!-- Date  de l'annonce -->
			    			<td>{{ $actualite->created_at }}</td> 
		    				@if(session('statut') == 'admin')
		      					<td>{{ $actualite->nom}}</td>
		      					<td>{!! Form::checkbox('active', $actualite->slug, $actualite->active) !!}</td>
		      				@else
		      					@if($actualite->active== '0')
		      						<td>En attente de validation</td>
		      					@else
		      						<td>Validée</td>
		      					@endif
			    			@endif
			    			<td><a class = "btn btn-success btn-block btn" href="{!! route('actualite.show',$actualite->slug) !!}">Voir</a></td>
			    			<td><a class = "btn btn-warning btn-block btn" href="{!! route('actualite.edit',$actualite->slug) !!}">Modifier</a></td>
			    			<td>
						    	{!! Form::open(['method' => 'DELETE', 'route' => array('actualite.destroy', $actualite->slug),'class' => 'form_delete']) !!}
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
	</div>

</section>  

@stop

@section('script_js')

	@if(session('statut') == 'admin')

		<!-- Mise à jour de la publication-->
		<script>

			//changement d'état de la checkbox
			$(document).on('change', ':checkbox[name="active"]', function() {
	  			
	  			//remplacement de la checkbox par une animation de loading
	  			$(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
	  
	  			//récupération du token crsf
	  			var token = $('input[name="_token"]').val();
	  			
	  			//fonction ajax
	  			$.ajax({
			    url: '{{ url('dashboard/annonce-active') }}' + '/' + this.value,	//appel de l'url annonce active avec l'id de l'annonce
			    type: 'PUT',											//route de type PUT
			    data: "active=" + this.checked + "&_token=" + token     //retour des valeurs active et token
			  })
			  .done(function() {										//ok
			    $('.fa-spin').remove();									//retrait de l'animation
			    $('input:checkbox[name="active"]:hidden').show();		//affichage de la checkbox
			  })
			  .fail(function() {										//fail
			    $('.fa-spin').remove();
			    chk = $('input:checkbox[name="active"]:hidden');		//message warning
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


