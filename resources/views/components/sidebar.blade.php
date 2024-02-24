<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <span><img src="./../favicon.ico" class="rounded-pill" alt="logo" width="45" height="45"></span>
        </div>
        <div class="sidebar-brand-text mx-3">Larbiota <sup>ajg</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pages
    </div>

    <!-- Nav Item - Beranda -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span>
        </a>
    </li>
    @if (Auth::check() && Auth::user())
        <!-- Nav Item - Pesertadidik -->
        <li class="nav-item {{ Request::is('pesertadidik') ? 'active' : '' }}">
            <a class="nav-link" href="/pesertadidik">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Pesertadidik</span>
            </a>
        </li>
    @endif

    @if (Auth::check() && Auth::user()->role == 'admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Service
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Nav Item - Data Pesertadidik -->
        <li class="nav-item {{ Request::is('datapesertadidik') ? 'active' : '' }}">
            <a class="nav-link" href="/datapesertadidik">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Data Pesertadidik</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
