<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view("../../partials/_head.php") ?>
</head>

<body>
  <div class="container-scroller">
    <?php $this->load->view("../../partials/_navbar.php") ?>
    <div class="container-fluid page-body-wrapper">
      <?php $this->load->view("../../partials/_settings-panel.php") ?>
      <?php $this->load->view("../../partials/_sidebar.php") ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <h2 class="text-center"></h2>
          <div class="row">
            <div class="col-lg-3 pb-4">
              <a href="<?php echo site_url('admin/Dashboard/ListUserAkun') ?>" style="color: #000000; text-decoration: none;">
                <div class="card shadow text-center">
                  <div class="card-body">
                    <i class="fas fa-user-friends fa-7x pb-3"></i>
                    <h3><b>Akun User</b></h3>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3">
              <a href="<?php echo site_url('admin/Dashboard/ListUserSuper') ?>" style="color: #000000; text-decoration: none;">
                <div class="card shadow text-center">
                  <div class="card-body">
                    <i class="fas fa-users-cog fa-7x pb-3"></i>
                    <h3><b>Super Admin</b></h3>
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../partials/_js.php") ?>
</body>

</html>