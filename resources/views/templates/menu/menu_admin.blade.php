<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span> </a></li>

<li class="treeview">
    <a href="#">
    <i class="fa fa-sticky-note"></i>
    <span>Annonces</span>
    <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('annonce.liste') }}"><i class="fa fa-circle-o"></i> Liste des annonces</a></li>
        <li><a href="{{ route('categorie.liste',['typeCategorie' => 'annonce']) }}"><i class="fa fa-circle-o"></i> Categorie des annonces</a></li>
    </ul>
</li>

<li><a href="{{ route('fichier.liste',['typeFichier' => 'catalogue']) }}"><i class="fa fa-file-pdf-o"></i> <span>Catalogues</span> </a></li>

<li><a href="{{ route('email.index') }}"><i class="fa fa-envelope"></i> <span>Email</span> </a></li>


<li><a href="{{ route('actualite.liste') }}"><i class="fa fa-sticky-note"></i> <span>Actualités</span> </a></li>

<li class="treeview">
    <a href="#">
    <i class="fa fa-user"></i>
    <span>Mon profil</span>
    <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Mes infos personnelles</a></li>
        <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Modifier mon mot de passe</a></li>
    </ul>
</li>