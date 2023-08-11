<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toko Buah Rizal</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        <?php echo session()->get('name') ?>
    </div>
    <!-- Nav Item - Tables -->
    <li class="nav-item active" aria-current="true">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Transaksi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="dashboard/setting">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengaturan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/logout'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->