@extends('templates.template_dashboard')

@section('titre')

Modifier le nom et la description du catalogue

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
					<span class="username"><a href="#">{{ $user_fichier->name }}</a></span>
				    <span class="description">catalogue crée le : {{ $fichier->created_at }}</span>
				</div>

				<div class= 'box-body'>
					{!! Form::open(['method' => 'PUT','route' => array('fichier.update', $fichier->slug)]) !!}
						<div class = 'form-group'>
							<div class = 'row'>
								<div class="col-xs-5">
									{!! Form::text('nom',$fichier->nom,['placeholder'  => "Nom",'required' => 'required']) !!}
								</div>
							</div>
						</div>

						<div class = 'form-group'>
							{!! Form::textarea('description', $fichier->description,['placeholder' => "Description" ,'required' => 'required']) !!}
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



