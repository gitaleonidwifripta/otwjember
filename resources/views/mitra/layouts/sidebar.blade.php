<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('dash.des')}}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('mitra/img/logo_persid.png') }}" width="50" height="50" class="navbar-brand-img" alt="...">
        </div>
        <div class="sidebar-brand-text mx-6">Mitra OTW Jember</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dash.des')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Berita Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDestinasi" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-plane"></i>
            <span>DESTINASI</span>
        </a>
        <div id="collapseDestinasi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Destinasi Wisata</h6>
                <a class="collapse-item" href="{{route('mitra.des')}}">Lihat Destinasi</a>
                <a class="collapse-item" href="{{route('mitra.des.create')}}">Tambah Destinasi</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Berita Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGambar" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-camera-retro"></i>
            <span>GAMBAR</span>
        </a>
        <div id="collapseGambar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gambar Wisata</h6>
                <a class="collapse-item" href="{{route('mitra.gambar')}}">Lihat Gambar</a>
                <a class="collapse-item" href="{{route('mitra.gambar.create')}}">Tambah Gambar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tiket Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTiket" aria-expanded="true" aria-controls="collapseTiket">
            <i class="fas fa-fw fa-id-card"></i>
            <span>TIKET</span>
        </a>
        <div id="collapseTiket" class="collapse" aria-labelledby="headingTiket" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tiket Wisata</h6>
                <a class="collapse-item" href="{{route('mitra.tiket')}}">Lihat Tiket Wisata</a>
                <a class="collapse-item" href="{{route('mitra.tiket.create')}}">Tambah Tiket Wisata</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Tim Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>TRANSAKSI</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Managemen Transaksi</h6>
                <a class="collapse-item" href="{{route('mitra.trans')}}">Lihat Transaksi</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->