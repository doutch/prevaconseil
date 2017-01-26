@extends('templates.template_dashboard')

@section('titre')

Créer une annonce

@stop

@section('contenu')

	<div class="container">

		@if (session('retour'))
	    	<div class="alert alert-success">
	        	{{ session('retour') }}
	      	</div>
	    @endif

	    <div class="box box-info">
	    	
	    	<div class="box-header with-border">
	    		@if ($typeAnnonce == "offre")
	      			<h3 class="box-title">Déposer une offre</h3>

	      		@else
	      			<h3 class="box-title">Déposer une candidature</h3>
	      		@endif
	    	</div>

	    	<div class="box-body">

				{!! Form::open(['route' => ['annonce.store',$typeAnnonce]]) !!}

					<h3>Annonce</h3>

					<div class = 'form-group'>

						{!! Form::text('titre',null,['placeholder' => "Titre",'required' => 'required']) !!}
					</div>

					<div class = 'form-group'>

						{!! Form::select('categorie',$liste_categories,null) !!}
					</div>

					<div class = 'form-group'>
						{!! Form::textarea('contenu', null,['placeholder' => "Entrez votre texte ici",'required' => 'required']) !!}
					</div>
							
					<!-- protection crscf -->	
					{!! Form::token() !!}

					<div class = 'form-group'>
						{!! Form::submit('Envoyer',['class' => "btn btn-primary"]) !!}
					</div>
						
				{!! Form::close() !!}
			</div>

		</div>
	
	</div>

@stop
