@extends('templates.template_dashboard')

@section('titre')

Modifier votre actualite

@stop

@section('contenu')

<section class="content">

	<!-- message de retour si l'actualite a été modifiée -->
	@if (session('retour'))
    	<div class="alert alert-success">
        	{{ session('retour') }}
      	</div>
    @endif
	
	{!! Form::open(['method' => 'PUT','route' => array('actualite.update', $actualite->slug)]) !!}

		<div class = 'col-md-12'>
			<!-- Box Comment -->
			<div class="box box-widget">
				<div class="box-header with-border">
					<div class="user-block">
				    	<span class="username"><a href="#">{{ $user_actualite->name }}</a></span>
				    	<span class="description">actualite crée le : {{ $actualite->created_at }}</span>
				  	</div><!-- /.user-block -->
			  
					<div class="box-body">
			  		<!-- post text -->
			  			<div class = 'form-group'>
			  			
			  				{!! Form::label('titre','Titre') !!}

			  				{!! Form::text('titre',$actualite->titre ,['required' => 'required']) !!}
			  			</div> 

			  			<div class = 'form-group'>

			  				{!! Form::label('actualite','Actualite') !!}
			  				{!! Form::textarea('contenu', $actualite->contenu ,['required' => 'required','class' => 'ckeditor', 'id' => "contenu",'rows' =>"10",'cols' => "80"]) !!}
			
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
    	confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette actualite?");
  	</script>


	<!-- script pour le cke editor -->
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

	<script>
      $(function () {
        // Replace the <textarea id="contenu"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('contenu');
        
    </script>
	
@stop



