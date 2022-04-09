<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4 mb-3" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Website SIJ SMK Negeri 1 Garut</div>
    </a>

    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Dashboard -->
    <?php if ($uriSegment == 'dashboard') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('guru/dashboard'); ?>">
                <i class="fas fa-fw fa-th-large"></i>
                <span>Dashboard</span></a>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('guru/dashboard'); ?>">
                <i class="fas fa-fw fa-th-large"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif; ?>

    <?php if ($uriSegment == 'profile') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('guru/profile'); ?>">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Profile</span></a>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('guru/profile'); ?>">
                <i class="fas fa-fw fa-user-circle"></i>
                <span>Profile</span></a>
        </li>
    <?php endif; ?>


    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Guru
    </div>

    <?php if ($uriSegment == 'publikasi_ilmiah') : ?>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('guru/publikasi_ilmiah'); ?>">
                <i class="fas fa-fw fa-atlas"></i>
                <span>Publikasi Ilmiah</span></a>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('guru/publikasi_ilmiah'); ?>">
                <i class="fas fa-fw fa-atlas"></i>
                <span>Publikasi Ilmiah</span></a>
        </li>
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class=" text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">