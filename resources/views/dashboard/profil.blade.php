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
                    
                  <h3 class="box-title">Identité</h3>

                </div>
        
                <div class="box-body">

                    <div class = 'row'>

                      <div class = 'col-md-3'>
                        <img class="img-circle img-responsive img-thumbnail center-block" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                      </div>
                      <div class = 'col-md-6'>
               
                          <h1>Mr Dupont Eric</h1>
                          <h2>Formateur en sécurité</h2>

                          <h3><b>Localisation:</b> Région Ile de France</h3>

                          <h3><b>Secteur travail:</b> Sécurité incendie.</h3>
                          <h3><b>Postes recherchés: </b> Pompiers - Gardien</h3>
                        
                      </div>
                    </div>

                    <div class = 'row'>

                        <div class = 'col-md-6 col-md-offset-3'>
                          <p>Bonjour. JE m'appelle Eric Dupont et je suis à la recherche d'un poste dans le secteur de la sécurité. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                  
                <h3 class="box-title">Formations suivies</h3>

              </div>
      
              <div class="box-body">

                  <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                      <h4><b>Formation à la sécurité des personnes</b> </h4>
                      <p>Consiste à sécuriser des biens</p>
                    </div>
                  </div>

                  <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                      <h4><b>Formation à la sécurité des biens</b> </h4>
                      <p>Consiste à sécuriser des personnes</p>
                    </div>
                  </div>

                  <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                      <h4><b>Formation premiers secours</b> </h4>
                      <p>Consiste à apprendre les premiers secours</p>
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
                  
                <h3 class="box-title">Expériences</h3>

              </div>
      
              <div class="box-body">

                  <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                      <h4><b>Prévaconseil</b> </h4>
                      <p>2012 - 2013</p>
                      <p>Durant cette période je suis parti .....</p>
                    </div>
                  </div>

                 
                  <div class = 'row'>
                    <div class = 'col-md-8 col-md-offset-1'>
                      <h4><b>Halteaufeu</b> </h4>
                      <p>2014 - 2016</p>
                      <p>Durant cette période j'ai effectué'.....</p>
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