@extends('templates.template_main')

@section('titre')

Inscription

@stop

@section('contenu')


    <div class="container">
        
        @if (session('valid_register'))
            <div class="alert alert-success">
                <strong>Merci de vous êtes enregistré! Nous vous avons envoyé un mail de confirmation.</strong>
            </div>
        @else

        <div id="w3ls_form" class="signin-form">

            {!! Form::open(array('url' => '/register','id' => 'signin','method' => 'POST')) !!}

             <h2>Inscription</h2>

                {!! Form::text('firstname', null ,['required', 'placeholder' => 'Prénom *','value' => "{{ old('firstname') }}"]) !!}
                {{ $errors->first('firstname', '<small class="help-block">:message</small>') }}

                     
                {!! Form::text('name', null ,['required', 'placeholder' => 'Nom *','value' => "{{ old('name') }}"]) !!}
                {{ $errors->first('name', '<small class="help-block">:message</small>') }}


                {!! Form::email('email', null ,['required', 'placeholder' => 'Email *','value' => "{{ old('email') }}"]) !!}
                {{ $errors->first('email', '<small class="help-block">:message</small>') }}


                {!! Form::password('password' ,['required', 'placeholder' => 'Mot de passe *']) !!}
                {{ $errors->first('password', '<small class="help-block">:message</small>') }}

           
                {!! Form::password('password_confirmation' ,['required', 'placeholder' => 'Confirmation du mot de passe *']) !!}
                {{ $errors->first('password_confirmation', '<small class="help-block">:message</small>') }}

          
                {!! Form::select('role', $listeRoles, null) !!}


                {{ Form::submit("S'inscrire") }}

                {!! Form::token() !!}

          
            {!! Form::close() !!}
            </div>
        @endif
            
    </div>
@endsection
