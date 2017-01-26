@extends('templates.template_main')

@section('titre')

Connexion

@stop

@section('contenu')
    <div class="container">
        <div class="row  mb50 mt50">
             <div class="col-md-8 col-md-offset-2 contact-left">
                {!! Form::open(array('url' => '/login','class' => 'form-horizontal')) !!}

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">

                        {!! Form::email('email', null ,['required', 'placeholder' => 'Email *','value' => "{{ old('email') }}",'style' =>'margin-left:0px;']) !!}
                        {{ $errors->first('email', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">

                        {!! Form::password('password', null ,['required', 'placeholder' => 'Mot de passe *']) !!}
                        {{ $errors->first('password', '<small class="help-block">:message</small>') }}

                    </div>

                    <div class="form-group">
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Se souvenir de moi
                            </label>
                        </div>
                      
                    </div>

                    <div class="form-group">
                       
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Se connecter
                        </button>

                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Mot de passe oublié?</a>  
                        
                    </div>

                    {!! Form::token() !!}

            {!! Form::close() !!}
        </div>
            
        </div>
    </div>
@stop

