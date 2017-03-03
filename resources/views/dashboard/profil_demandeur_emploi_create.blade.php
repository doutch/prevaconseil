@extends('templates.template_dashboard')

@section('titre')

Création de votre votre profil

@stop

@section('contenu')

<section class="content">

	<!-- message de retour si l'annonce a été modifiée -->
	@if (session('retour'))
    	<div class="alert alert-success">
        	{{ session('retour') }}
      	</div>
    @endif

    <div class = 'row'>

    	<div class = 'col-md-6 col-md-offset-3'>

    		<div class = 'box box-primary'>

    			<div class="box-header with-border">
						
					<div class="box-header with-border">
						<h3>Créez votre profil</h3>
					</div>
							  
					<div class="box-body">
							  		
						{!! Form::open(['method' => 'PUT','role' => 'form','route' => array('profil.create')]) !!}

				  			<div class="row">

				  				<div class="col-md-3">
						  			<div class = 'form-group'>

						  				{!! Form::label('civilite','Civilité*') !!}
						  				{!! Form::select('civilite',['mr' => 'Mr','me' => 'Mme']) !!}
						
						  			</div> 
						  		</div>

					  		</div>


				  			<div class = 'form-group'>
				  			
				  				{!! Form::label('prenom','Prénom *') !!}

				  				{!! Form::text('prenom',$prenom ,['required' => 'required','class' => 'form-control']) !!}
				  			</div> 

				  			<div class = 'form-group'>

				  				{!! Form::label('nom','Nom *') !!}
				  				{!! Form::text('nom',$nom ,['required' => 'required','class' => 'form-control']) !!}
				
				  			</div> 

				  			<div class = 'form-group'>

				  				{!! Form::label('email','Email *') !!}
				  				{!! Form::text('email',$email ,['required' => 'required','class' => 'form-control']) !!}
				
				  			</div> 

				  			<div class="row">

				  				<div class="col-md-6">
						  			<div class = 'form-group'>

						  				{!! Form::label('date_naissance','Date de naissance *') !!}
				  						{!! Form::text('date_naissance',null ,['required' => 'required','class' => 'form-control']) !!}
						
						  			</div> 
						  		</div>

						  		<div class="col-md-6">
						  			<div class = 'form-group'>

						  				{!! Form::label('telephone','N. de téléphone *') !!}
				  						{!! Form::text('telephone',null ,['required' => 'required','class' => 'form-control']) !!}
						
						  			</div> 
						  		</div>

					  		</div>

				  			<div class = 'form-group'>

				  				{!! Form::label('adresse','Adresse *') !!}
				  				{!! Form::text('adresse',null ,['required' => 'required','class' => 'form-control']) !!}
				
				  			</div> 

				  			<div class="row">

				  				<div class="col-md-6">
						  			<div class = 'form-group'>

						  				{!! Form::label('cp','Code postal *') !!}
						  				{!! Form::text('cp',null ,['required' => 'required','class' => 'form-control']) !!}
						
						  			</div> 
						  		</div>

						  		<div class="col-md-6">
						  			<div class = 'form-group'>

						  				{!! Form::label('ville','Ville *') !!}
						  				{!! Form::text('ville',null ,['required' => 'required','class' => 'form-control']) !!}
						
						  			</div> 
						  		</div>

					  		</div>

				  			<div class = 'form-group'>

				  				{!! Form::label('photo','Photo') !!}
				  				{!! Form::file('photo',null ,['class' => 'form-control']) !!}
				
				  			</div> 

				  			<!-- protection crscf -->	
							{!! Form::token() !!}

				  			<div class="box-footer">

								<div class = 'form-group'>
									{!! Form::submit('Enregistrer',['class' => "btn btn-success "]) !!}
								</div>

							</div><!-- /.box-footer -->

				  			
						{!! Form::close() !!} 

					</div>
				</div>
			</div>
		</div>
	</div> 

</section>  


@stop
