@extends('templates.template_dashboard')

@section('titre')

Votre catégorie - Modification

@stop

@section('contenu')

<section class="content">

	<!-- message de retour si l'annonce a été modifiée -->
	@if (session('retour'))
    	<div class="alert alert-success">
        	{{ session('retour') }}
      	</div>
    @endif
	
	{!! Form::open(['method' => 'PUT','route' => array('categorie.update', $categorie->slug)]) !!}

		<div class = 'col-md-6'>
			<!-- Box Comment -->
			<div class="box box-widget">
				<div class="box-header with-border">
					<p>Modifier votre catégorie</p>
			  
					<div class="box-body">
			  		<!-- post text -->
			  			<div class = 'form-group'>
			  			
			  				{!! Form::label('categorie','Categorie') !!}

			  				{!! Form::text('nom',$categorie->categorie ,['required' => 'required']) !!}
			  			</div> 

			  			<div class = 'form-group'>

			  				{!! Form::label('descritption','Description') !!}
			  				{!! Form::textarea('contenu', $categorie->description ,['required' => 'required']) !!}
			
			  			</div> 
			  		</div><!-- /.box-comment -->
				</div><!-- /.box-footer -->
			
				<div class="box-footer">

					<div class = 'form-group'>
						{!! Form::submit('Enregistrer',['class' => "btn btn-success "]) !!}
					</div>

				</div><!-- /.box-footer -->
			</div><!-- /.box -->
	    </div>  

	 <!-- protection crscf -->	
	{!! Form::token() !!}

	{!! Form::close() !!}     

</section>  

@stop

@section('script_js')

<!-- Liste de scripts perso -->
  <script src = "{{ asset('/js/perso.js') }}" type="text/javascript">></script>

  <!-- Script d'alert pour avant la suppression -->
  <script>
    confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette annonce?");
  </script>

@stop



