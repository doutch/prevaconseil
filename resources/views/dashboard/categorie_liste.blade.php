@extends('templates.template_dashboard')

@section('titre')

Liste des catégories des annoncess

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
		<a class = "btn btn-primary" href="{!! route('categorie.create',['typeCategorie' => $typeCategorie]) !!}">Ajouter une catégorie d'annonce</a>
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
							<th>Catégorie</th>

							<th>Description</th>

							<th>Voir</th>
							<th>Modifier</th>
							<th>Supprimer</th>
							
						</tr>
					</thead>

					@foreach ($liste_categories as $categorie)

						<tr>
							<td>{{ $categorie->nom }}</td>
							<td>{{ $categorie->description }}</td>
							<td><a class href="{!! route('categorie.show',$categorie->slug) !!}"><i class="fa fa-file-text-o">Voir</i></a></td>
							<td><a class href="{!! route('categorie.edit',$categorie->slug) !!}"><i class="fa fa-pencil-square-o ">Modifier</i></a></td>
							<td>
						    	{!! Form::open(['method' => 'DELETE', 'route' => array('categorie.destroy', $categorie->slug,$typeCategorie),'class' => 'form_delete']) !!}
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

  <!-- Liste de scripts perso -->
  <script src = "{{ asset('/js/perso.js') }}" type="text/javascript">></script>

  <!-- Script d'alert pour avant la suppression -->
  <script>
    confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette catégorie?");
  </script>

@stop


