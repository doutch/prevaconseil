@extends('templates.template_dashboard')

@section('titre')

Votre profil

@stop

@section('contenu')

    <!-- message de retour si l'annonce a été modifiée -->
    @if (session('retour'))
        <div class="alert alert-success">
            {{ session('retour') }}
        </div>
    @endif

	 <div class = 'row'>

    	<div class = 'col-md-6 col-md-offset-3'>

    		<div class="box box-widget widget-user-2">
                
                <div class="widget-user-header bg-blue">
                	
                	<div class="widget-user-image">
                    	<img src="{{ asset("uploads/img/$profil->photo") }}" alt="Avatar" class = 'img-circle'>
                  	</div>

                  	<h3 class="widget-user-username">{{$profil->civilite}} {{$prenom}} {{$nom}}</h3>
                  	<h5 class="widget-user-desc">Né le {{$profil->date_naissance}}</h5>
                </div>

                <div class="box-footer no-padding">

                	<p>Email: {{$profil->email}}</p>
                    <p>Téléphone: {{$profil->telephone}}</p>
                    <p>Date de nassance: {{$profil->date_naissance}}</p>
                    <p>Adresse: {{$profil->adresse}}</p>
                    <p>Code postal: {{$profil->cod_postal}}</p>
                    <p>Ville: {{$profil->ville}}</p>

                    <a class = "btn btn-warning" href="{!! route('profil.edit',$profil->id_profil) !!}">Modifier</a>
                </div>
            </div>

        </div>
    </div>

@stop
