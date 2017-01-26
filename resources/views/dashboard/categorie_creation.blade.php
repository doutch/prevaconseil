@extends('templates.template_dashboard')

@section('titre')

Créer une catégorie

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

		<div class = 'col-md-3 col-md-offset-3'>
			<div class = 'box'>
				<div class = 'box-header with-border'>
					Création de votre catégorie
				</div>

				<div class= 'box-body'>
					{!! Form::open(['route' => ['categorie.store',$typeCategorie]]) !!}
						<div class = 'form-group'>
							<div class = 'row'>
								<div class="col-xs-5">
									{!! Form::text('nom',null,['placeholder'  => "Nom",'required' => 'required']) !!}
								</div>
							</div>
						</div>

						<div class = 'form-group'>
							{!! Form::textarea('description', null,['placeholder' => "Description" ,'required' => 'required']) !!}
						</div>
								
						<!-- protection crscf -->	
						{!! Form::token() !!}

						<div class = 'form-group'>
							{!! Form::submit('Enregistrer',['class' => "btn btn-primary"]) !!}
						</div>
							
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

</section>  

@stop

@section('script_js')

	<!-- script pour le cke editor -->
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

	<script>
      $(function () {
        // Replace the <textarea id="contenu"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('contenu'{
            filebrowserBrowseUrl: '{!! url('filemanager/index.html') !!}'
        });
        
    </script>
	
@stop


