@extends('templates.template_dashboard')

@section('titre')

Votre catégorie

@stop

@section('contenu')

<section class="content">
  <div class = 'col-md-3 col-md-offset-3'>

    <!-- Box Comment -->
    <div class="box ">
      <div class="box-header with-border">
        <b>Catégorie:</b>{{ $categorie->categorie }}

       </div><!-- /.box-header -->


  
      <div class="box-body">

      <b>Description:</b> <br><br>
  	     {{ $categorie->description }}

      </div><!-- /.box-comment -->

   


      <div class="box-footer">

  
        {!! Form::open(['method' => 'DELETE', 'route' => array('categorie.destroy', $categorie['slug']),'class' => 'form_delete']) !!}
          {!! Form::submit('Supprimmer', array('class' => 'btn btn-danger pull-right')) !!}
      
          <!-- protection crscf --> 
          {!! Form::token() !!}

        {!! Form::close() !!}

        <a class = "btn btn-warning" href="{!! route('categorie.edit',$categorie['slug']) !!}">Modifier</a>


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
    confirmBeforeDelete("Etes vous sûr de vouloir supprimer cette catégorie?");
  </script>

@stop




