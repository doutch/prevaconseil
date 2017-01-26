@extends('templates.template_dashboard')

@section('titre')

Votre annonce

@stop

@section('contenu')

<section class="content">
  <div class = 'col-md-6 col-md-offset-3'>

    <!-- Box Comment -->
    <div class="box ">
      <div class="box-header with-border">
        <h1>{!! $annonce->titre !!}</h1>

         <div class="user-block">
            <span class="username">Utilisateur: <a href="#">{{ $user_annonce->name }}</a></span>
            <span class="description">Annonce crée le : {{ Carbon\Carbon::parse($annonce->created_at)->format('d/m/Y')  }}</span>
        </div><!-- /.user-block -->

       </div><!-- /.box-header -->


  
      <div class="box-body">

        

  	     {!! $annonce->contenu !!}

      </div><!-- /.box-comment -->

   


      <div class="box-footer">

         <!-- Seuls les utilisateurs ont le droit de modifier et supprimer-->
        @if(session('statut') == 'user')

          {!! Form::open(['method' => 'DELETE', 'route' => array('annonce.destroy', $annonce['slug']),'class' => 'form_delete']) !!}
            {!! Form::submit('Supprimmer', array('class' => 'btn btn-danger pull-right')) !!}
        
            <!-- protection crscf --> 
            {!! Form::token() !!}

          {!! Form::close() !!}

          <a class = "btn btn-warning" href="{!! route('annonce.edit',$annonce['slug']) !!}">Modifier</a>

         @endif
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
    confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette annonce?");
  </script>

@stop




