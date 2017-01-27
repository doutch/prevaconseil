@extends('templates.template_main')

@section('titre')

Contact

@stop

@section('contenu')

	<!-- banner -->
	<div class="banner_contact">
		
	</div>
	<!-- //banner -->

	<!-- contact -->
	<div class="contact">
		<div class="container">
			<div class="col-md-4 contact-left">
				<h3>Adresse</h3>
				<p>Vous pouvez aussi nous contacter par téléphone ou nous ecrire à l'adresse suivante:
					<br>
					<span>Préva conseils</span></p>
				<ul>
					<li><p>5,rue Marceline</p></li>
					<li><p>95110 Sannois</p></li>
					<li>Télephone : 01.34.17.61.33</li>
				
					<li><a href="mailto:info@example.com">contact@preva-conseils.fr</a></li>
				</ul>
			</div>
			<div class="col-md-8 contact-left">
				
				<h3>Contact</h3>

				{!! Form::open(array('url' => 'foo/bar')) !!}

					<div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
						
						{!! Form::text('nom', null ,['required', 'placeholder' => 'Nom *']) !!}
						{{ $errors->first('nom', '<small class="help-block">:message</small>') }}

					</div>

					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

						{!! Form::email('email', null ,['required', 'placeholder' => 'Email *']) !!}
						{{ $errors->first('email', '<small class="help-block">:message</small>') }}

					</div>

					<div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
						
						{!! Form::text('telephone', null ,['required', 'placeholder' => 'Téléphone *']) !!}
						{{ $errors->first('telephone', '<small class="help-block">:message</small>') }}

					</div>

					<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
					
						{!! Form::textarea('message', null, ['required','placeholder' => "Message*",'size' => '30x5']) !!}
						{{ $errors->first('message', '<small class="help-block">:message</small>') }}
					</div>

					{!! Form::token() !!}

					{{ Form::submit('Envoyer') }}
					{{ Form::reset('Effacer') }}
				   
				{!! Form::close() !!}

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="contact-bottom">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2619.0809686606476!2d2.248043015973341!3d48.9709830792987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e666505050d301%3A0x1a2aa45978ee82f1!2s5+Rue+Marceline%2C+95110+Sannois!5e0!3m2!1sfr!2sfr!4v1459071276465" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
<!-- //contact -->

@stop