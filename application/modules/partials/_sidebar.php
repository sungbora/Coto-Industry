<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <?php
      switch ($this->session->userdata('level')) {
        case 'operator':
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin/Dashboard/op') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin/Dashboard/addSampah') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Input Sampah</span>
              </a>
            </li>
          <?php
          break;
        
        case 'admin':
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin/Dashboard/admin') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin/Dashboard/ListSampah') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">List Sampah</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin/Dashboard/listUser') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Manajemen Akun</span>
              </a>
            </li>
          <?php
          break;

        case 'user':
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('users/User') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('admin/Dashboard/ListSampahKamu') ?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">List Sampah</span>
              </a>
            </li>
          <?php
          break;
      }
    ?>
  </ul>
</nav>