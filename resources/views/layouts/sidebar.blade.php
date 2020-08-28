<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @if(auth()->user()->can('create') || auth()->user()->can('update')  || auth()->user()->can('delete') || auth()->user()->can('show'))
                    <div class="sb-sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Manajemen</div>
                    </a><a class="nav-link" href="{{ route('jamkes.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                        Atur Jamkesmas
                    </a>
                    <a class="nav-link" href="{{ route('dokter.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-medkit"></i></div>
                        Atur Dokter
                    </a>

                    <a class="nav-link" href="{{ route('pasien.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                        Pasien
                    </a>
                    <a class="nav-link" href="{{ route('antrian.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Lihat Antrian
                    </a>
                    <a class="nav-link" href="{{ route('antrian.view') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>
                        Info Antrian
                    </a>
                    <a class="nav-link" href="{{ route('pesan.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas  fa-desktop"></i></div>
                        Pesan
                    </a>
                    @endif
                    
                    @role('admin') 
                    <div class="sb-sidenav-menu-heading">User</div>
                    <a class="nav-link" href="{{ route('role.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas  fa-user-times"></i></div>
                        User Role
                    </a>
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        User 
                    </a>
                    <a class="nav-link" href="{{ route('users.role_permission') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                        Role Permission 
                    </a>
                     @endrole 
                </div>
            </div>
        </nav>
    </div>
