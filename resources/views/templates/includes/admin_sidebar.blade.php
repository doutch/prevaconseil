<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Bonjour {{ Auth::user()->name }} </p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @if(session('statut') == 'admin')
                @include('templates/menu/menu_admin')
            @else
                @include('templates/menu/menu_user')
            @endif
        </ul>
          
    </section>
    <!-- /.sidebar -->
</aside>