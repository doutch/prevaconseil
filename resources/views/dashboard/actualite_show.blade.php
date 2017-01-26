@extends('templates.template_dashboard')

@section('titre')

Votre actualite

@stop

@section('contenu')

<section class="content">
  <div class = 'col-md-6'>

    <!-- Box Comment -->
    <div class="box box-widget">
      <div class="box-header with-border">
        
        <div class="user-block">
          <span class="username"><a href="#">{{ $user_actualite->name }}</a></span>
          <span class="description">Actualité crée le : {{ $actualite->created_at }}</span>
        </div><!-- /.user-block -->
  
      <div class="box-body">
      <!-- post text -->

	     <h1>{{ $actualite->titre }}</h1>

  	   {!! $actualite->contenu !!}

      </div><!-- /.box-comment -->

    </div><!-- /.box-footer -->


      <div class="box-footer">

        {!! Form::open(['method' => 'DELETE', 'route' => array('actualite.destroy', $actualite['slug']),'class' => 'form_delete']) !!}
          {!! Form::submit('Supprimmer', array('class' => 'btn btn-danger pull-right')) !!}
      
          <!-- protection crscf --> 
          {!! Form::token() !!}

        {!! Form::close() !!}

        <a class = "btn btn-warning" href="{!! route('actualite.edit',$actualite['slug']) !!}">Modifier</a>

      </div><!-- /.box-footer -->
    </div><!-- /.box -->
  </div>       

</section>  

@stop

@section('script_js')

  <!-- Liste de scripts perso -->
  <script src = "{{ asset('/js/perso.js') }}" type="text/javascript">></script>

  <!-- Script d'alert pour avant la suppression -->
  <script>
    confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette actualité?");
  </script>

@stop




