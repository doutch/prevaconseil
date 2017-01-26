@extends('templates.template_dashboard')


@section('titre')

Mon profil

@stop

@section('contenu')

<section class="content">
    
    @if (session('retour'))
      <div class="alert alert-success">
          {{ session('retour') }}
      </div>
    @endif

    <div class="row">
      <div class = 'col-md-9 col-md-offset-3'>

        <div class = 'row'>
          <div class = 'col-md-9'>

            <div class="box box-default">
                <div class="box-header with-border">
                    
                  <h3 class="box-title">Société</h3>

                </div>
        
                <div class="box-body">

                    <div class = 'row'>

                      <div class = 'col-md-3'>
                          <img src="{{ asset('img/delicious-social-network-brand-logo.png') }}">
                      </div>

                      <div class = 'col-md-6'>
               
                          <h1>Sécuritis</h1>

                          <h3><b>Adresse:</b> 25 rue du général Galliéni 77420 Lagny Sur Marne</h3>

                          <h3><b>Secteur travail:</b> Sécurité incendie.</h3>
                          <h3><b>Postes recherchés: </b> Protection - Gardien</h3>
                          <h3><b>Type de contrat: </b> Jours - Nuit</h3>

                          <h3><b>Localisation du poste:</b> Ile de France</h3>
                          <h3><b>Date de début de contrat::</b> 02/05/2017</h3>

                      </div>

                </div>
                <!-- /.box-body -->
              </div>
          </div>
        </div>

      <div class="row">
        <div class = 'col-md-9'>

          <div class="box box-default">
              <div class="box-header with-border">
                  
                <h3 class="box-title">Description de l'annonce</h3>

              </div>
      
              <div class="box-body">

                  <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                     
                      <p>directeur de societe de protection rapprochée cherche des missions de protection en direct avec le client discretion assurée(2 agences tenues a cannes et antibes pendant pres de 20 ans) premier contact par mail...merci.phf </p>
                    </div>
                  </div>

              </div>
              <!-- /.box-body -->
            </div>
        </div>
      </div>


     
      <div class="row">
        <div class = 'col-md-9'>

          <div class="box box-default">
              <div class="box-header with-border">
                  
                <h3 class="box-title">Coordonées</h3>

              </div>
      
              <div class="box-body">

                  <div class = 'row'>

                    <div class = 'col-md-3 col-md-offset-1'>
                      <h4><b>Email: </b>testprofil@test.com</h4>
                    </div>
                    <div class = 'col-md-3'>
             
                        <h4><b>Téléphone: </b>0102030405</h4>
                      
                    </div>
                  </div>

                   <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                      <h4><b>Adresse: </b>65 rue du maréchal Leclerc 94350 Villiers sur Marne</h4>
                    </div>
                   </div>
              </div>
              <!-- /.box-body -->
            </div>
        </div>
      </div>
  </div>

  

</section>  

@stop
