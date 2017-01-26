@extends('templates.template_main')

@section('titre')

Inscription

@stop

@section('contenu')


<div class="container">
    <div class="row mb50 mt50">
        <div class="col-md-8 col-md-offset-2 contact-left">

            @if (session('valid_register'))
                <div class="alert alert-success">
                    <strong>Merci de vous êtes enregistré! Nous vous avons envoyé un mail de confirmation.</strong>
                </div>
            @else

                {!! Form::open(array('url' => '/register','class' => 'form-horizontal')) !!}

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            
                        {!! Form::text('name', null ,['required', 'placeholder' => 'Nom *','value' => "{{ old('name') }}"]) !!}
                        {{ $errors->first('name', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                        {!! Form::email('email', null ,['required', 'placeholder' => 'Email *','value' => "{{ old('email') }}",'style' =>'margin-left:0px;']) !!}
                        {{ $errors->first('email', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                        {!! Form::password('password', null ,['required', 'placeholder' => 'Mot de passe *']) !!}
                        {{ $errors->first('password', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">

                        {!! Form::password('password_confirmation', null ,['required', 'placeholder' => 'Confirmation du mot de passe *']) !!}
                        {{ $errors->first('password_confirmation', '<small class="help-block">:message</small>') }}

                    </div>

                     <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">

                        {!! Form::select('role', $listeRoles, null) !!}

                    </div>

                    <div class="form-group }}">

                        {{ Form::submit("S'inscrire") }}

                    </div>

                    

                {!! Form::close() !!}
            @endif
        </div>
    </div>
</div>
@endsection
