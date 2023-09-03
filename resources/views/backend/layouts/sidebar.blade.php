<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route ('dashboard')}}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('backend/img/logo_persid.png') }}" width="50" height="50" class="navbar-brand-img" alt="...">
        </div>
        <div class="sidebar-brand-text mx-6">Admin OTW Jember</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
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
                <a class="collapse-item" href="{{route('admin.des')}}">Lihat Destinasi</a>
                <a class="collapse-item" href="{{route('admin.des.create')}}">Tambah Destinasi</a>
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
                <a class="collapse-item" href="{{route('admin.gambar')}}">Lihat Gambar</a>
                <a class="collapse-item" href="{{route('admin.gambar.create')}}">Tambah Gambar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pertandingan Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-list"></i>
            <span>KATEGORI</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kategori Wisata</h6>
                <a class="collapse-item" href="{{route('admin.kate')}}">Lihat Kategori</a>
                <a class="collapse-item" href="{{route('admin.kate.create')}}">Tambah Kategori</a>

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
                <a class="collapse-item" href="{{route('admin.tiket')}}">Lihat Tiket Wisata</a>
                <a class="collapse-item" href="{{route('admin.tiket.create')}}">Tambah Tiket Wisata</a>

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
                <a class="collapse-item" href="{{route('admin.trans')}}">Lihat Transaksi</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Galeri Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGallery" aria-expanded="true" aria-controls="collapseGallery">
            <i class="fas fa-fw fa-users"></i>
            <span>PENGGUNA</span>
        </a>
        <div id="collapseGallery" class="collapse" aria-labelledby="headingGallery" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Managemen Pengguna</h6>
                <a class="collapse-item" href="{{route('admin.peng')}}">Lihat Pengguna</a>
                <a class="collapse-item" href="{{route('admin.peng.create')}}">Tambah Pengguna</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Sponsorship Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSponsor" aria-expanded="true" aria-controls="collapseSponsor">
            <i class="fas fa-fw fa-comments"></i>
            <span>FEEDBACK</span>
        </a>
        <div id="collapseSponsor" class="collapse" aria-labelledby="headingGallery" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Feedback</h6>
                <a class="collapse-item" href="{{route('admin.feed')}}">Lihat Feedback</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - FAQ Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaq" aria-expanded="true" aria-controls="collapseFaq">
            <i class="fas fa-fw fa-question"></i>
            <span>FAQ</span>
        </a>
        <div id="collapseFaq" class="collapse" aria-labelledby="headingGallery" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom FAQ</h6>
                <a class="collapse-item" href="{{route('admin.faq')}}">Lihat FAQ</a>
                <a class="collapse-item" href="{{route('admin.faq.create')}}">Tambah FAQ</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.news')}}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Newsletter</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->