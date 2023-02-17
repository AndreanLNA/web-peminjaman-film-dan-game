<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('Home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span>
        </a>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-book"></i>
            <span>Game</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/C_dgame/tambah') ?>">New Data</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/C_subpos') ?>">List Data</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/C_rgame/tambah') ?>">New Rent</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/C_rgame') ?>">List Rent</a>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-book"></i>
            <span>CD</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/C_cd') ?>">List CD</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/C_sewacd') ?>">List Rent CD</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/C_catatan') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Catatan</span></a>
    </li>


    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="far fa-chart-bar"></i>
            <span>Grafik</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/C_sewacd/grafik') ?>">Grafik Rent CD</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/C_rgame/grafik') ?>">Grafik Rent Game</a>
        </div>
    </li>

</ul>