@extends('templates.template_dashboard')

@section('titre')

Enregistrer un catalogue

@stop

@section('contenu')


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
					Enregistrement de votre catégorie
				</div>

				<div class= 'box-body'>
					{!! Form::open(['route' => ['fichier.store',$typeFichier],'files' => true,'method' => 'POST']) !!}
						<div class = 'form-group'>
							<div class = 'row'>
								<div class="col-xs-5">
									{!! Form::text('nom',null,['placeholder'  => "Nom",'required' => 'required']) !!}
								</div>
							</div>
						</div>

						<div class = 'form-group'>
							{!! Form::file('fichier', null,['required' => 'required','type' => 'file']) !!}
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




