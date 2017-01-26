<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span> </a></li>

<li class="treeview">
    <a href="#">
    <i class="fa fa-sticky-note"></i>
    <span>Annonces</span>
    <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('annonce.liste') }}"><i class="fa fa-circle-o"></i> Liste des annonces</a></li>
    </ul>
</li>

<li><a href="{{ route('profil') }}"><i class="fa fa-user"></i> <span>Mon profil</span> </a></li>

