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
          <!-- <div class="alert alert-primary col-lg-8" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Jangan Lupa Insert data dengan benar!
          </div> -->
          <div class="card shadow col-lg-5">
            <div class="card-body">
              <h2><b>Profile</b></h2>
              <hr>
              <br>
              <div class="form-group">
                <label for=""><h4><b>Nama</b></h4></label>
                <input type="text" class="form-control col-lg-9 border-dark" name="TotalSampah" value="<?php echo $profile->name ?>" aria-describedby="emailHelp" placeholder="Contoh : 10kg" readonly>
              </div>
              <div class="form-group">
                <label for=""><h4><b>Level</b></h4></label>
                <?php 
                  if($profile->level != "admin") {
                    echo '<input type="text" class="form-control col-lg-9 border-primary" name="TotalSampah" value="'.$profile->level.'" aria-describedby="emailHelp" placeholder="Contoh : 10kg" readonly>';
                  } else {
                    echo '<input type="text" class="form-control col-lg-9 border-success" name="TotalSampah" value="'.$profile->level.'" aria-describedby="emailHelp" placeholder="Contoh : 10kg" readonly>';
                  }
                ?>
              </div>
              <?php
                switch ($this->session->userdata('level')) {
                  case 'admin':
                    ?> <a href="<?php echo site_url('admin/Dashboard/admin') ?>" class="btn btn-success"><b>Kembali</b></a> <?php
                    break;
                  
                  case 'operator':
                    ?> <a href="<?php echo site_url('admin/Dashboard/op') ?>" class="btn btn-success"><b>Kembali</b></a> <?php
                    break;
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../partials/_js.php") ?>
</body>

</html>