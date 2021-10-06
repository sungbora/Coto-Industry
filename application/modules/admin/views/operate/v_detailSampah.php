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
          <div class="card shadow col-lg-6">
            <div class="card-body">
              <h3 class="d-inline"><b>Detail Sampah</b></h3>
              <hr>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="totalSampah"><b>Nama Operator</b></label>
                    <input type="text" class="form-control" value="<?php echo $detail->opName ?>" aria-describedby="emailHelp" readonly>
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Nama User</b></label>
                    <input type="text" class="form-control" value="<?php echo $detail->name ?>" aria-describedby="emailHelp" readonly>
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Upload Foto</b></label>
                    <br>
                    <img id="blah" src="<?php echo base_url('./image/' . $detail->image); ?>"  style="height: 200px;" alt="Preview Gambar..." class="form-control" readonly />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="totalSampah"><b>Total Sampah</b></label>
                    <input type="text" value="<?php echo $detail->total_sampah ?> Kg" class="form-control" aria-describedby="emailHelp" readonly>
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Tanggal Input</b></label>
                    <input type="text" value="<?php echo date('d M Y', strtotime($detail->tanggal)) ?>" class="form-control" aria-describedby="emailHelp" readonly>
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Keterangan</b></label>
                    <textarea class="form-control text-dark" value="<?php echo $detail->keterangan ?>" cols="30" rows="3" placeholder="Tidak ada keterangan..." readonly></textarea>
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Status</b></label>
                    <?php 
                      // $detail->tanggal != 0 ? $return = 'Terkonfirmasi' : $return = 'Belum Terkonfirmasi';
                      if($detail->status != 0) echo '<input type="text" value="Terkonfirmasi" class="form-control border-success" aria-describedby="emailHelp" readonly>';
                      else echo '<input type="text" value="Belum Terkonfirmasi" class="form-control border-danger" aria-describedby="emailHelp" readonly>';
                    ?>
                  </div>
                </div>
              </div>
              <?php
                switch ($this->session->userdata('level')) {
                  case 'admin':
                    ?> 
                      <a href="<?php echo site_url('admin/Dashboard/admin') ?>" class="btn btn-success"><b>Kembali</b></a> 
                      <a href="<?php echo site_url('admin/Dashboard/DeleteSampah/' . $detail->id) ?>" class="btn btn-danger"><b>Hapus</b></a>
                    <?php
                    break;
                  
                  case 'operator':
                    ?> 
                      <a href="<?php echo site_url('admin/Dashboard/op') ?>" class="btn btn-success"><b>Kembali</b></a>
                    <?php
                    break;
                  
                  case 'user':
                    ?> 
                      <a href="<?php echo site_url('users/User') ?>" class="btn btn-success"><b>Kembali</b></a>
                    <?php
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