@extends('templates.template_main')

@section('titre')

Connexion

@stop

@section('contenu')

    <!-- main -->
    <div class=container">
      
        <div id="w3ls_form" class="signin-form">
            <!-- Sign In Form -->
            {!! Form::open(array('url' => '/login','id' => 'signin','method' => 'POST')) !!}

                <h2>Connexion</h2>

                {!! Form::email('email', null ,['required', 'placeholder' => 'Email *','value' => "{{ old('email') }}"]) !!}
                {{ $errors->first('email', '<small class="help-block">:message</small>') }}


                {!! Form::password('password',['required', 'placeholder' => "Mot de passe *"]) !!}
                {{ $errors->first('password', '<small class="help-block">:message</small>') }}

         
                <input type="checkbox" id="brand" value="">
                <label for="brand"><span></span> Rester connecté</label> 

                <input type="submit" value="Connexion">

                <div class="signin-agileits-bottom"> 
                    <p><a href="{{ url('/password/reset') }}">Mot de passe oublié?</a></p>    
                </div> 

                {!! Form::token() !!}

            {!! Form::close() !!}
            <!-- Sign up Form-->
        </div>
    </div>
@stop

