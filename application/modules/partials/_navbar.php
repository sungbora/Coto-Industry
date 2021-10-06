<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?php echo base_url('admin/images/logo.svg') ?>" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url('admin/images/logo-mini.svg') ?>" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?php echo base_url('/image/pp/user.png') ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <?php
                switch ($this->session->userdata('level')) {
                  case 'user':
                    ?>
                      <a class="dropdown-item" href="<?php echo site_url('users/User/Setting/' . $this->session->userdata('idUser')) ?>">
                        <i class="ti-settings text-primary"></i>
                        Settings
                      </a>
                    <?php
                    break;
                  
                    default:
                    ?>
                      <a class="dropdown-item" href="<?php echo site_url('admin/Dashboard/Setting') ?>">
                        <i class="ti-settings text-primary"></i>
                        Settings
                      </a>
                    <?php
                    break;
                }
              ?>
              <a href="<?php echo site_url('login/Login/Logout') ?>" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <!-- <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>