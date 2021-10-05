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
          <?php
          if ($this->session->flashdata('successInput')) echo '<script> swal("Berhasil!", "Berhasil Menginput Sampah!!", "success") </script>';
          ?>
          <div class="alert alert-success text-dark" role="alert">
            <h4 class="">Selamat Datang, <?php echo $this->session->userdata('nama') ?></h4>
            <p>Level : <b><?php echo $this->session->userdata('level') ?></b></p>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
              <a href="<?php echo site_url('admin/Dashboard/ListSampah') ?>" class="card card-dark-blue" style="text-decoration: none;">
                <div class="card card-tale">
                  <div class="card-body">
                    <h4 class="mb-4"><b>Total Sampah Harian</b></h4>
                    <p class="fs-30 mb-2"><b><?php $numberAll->total == null ? $total = 0 : $total = $numberAll->total;
                                              echo $total; ?> Kg</b></p>
                    <p>Total Semua Sampah Hari ini</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <h4 class="mb-4"><b>Total Sampah Harian (Operator) </b></h4>
                  <p class="fs-30 mb-2"><b><?php $numberOp->total == null ? $total = 0 : $total = $numberOp->total;
                                            echo $total; ?> Kg</b></p>
                  <p>Total Sampah Operator Hari ini</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow">
            <div class="card-body">
              <h3 class=""><b>Sampah Hari ini</b></h3>
              <hr>
              <!-- <a href="<?php echo site_url('admin/Dashboard/ListSampahUser') ?>" class="btn btn-success btn-sm d-inline mb-3 shadow" style="float : right;">Lihat</a> -->
              <div class="table-responsive">
                <table class="display expandable-table table-hover" id="ksajdkasdj" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Operator</th>
                      <th>User</th>
                      <th>Total</th>
                      <th>Tanggal</th>
                      <th>Jam Ambil</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($listSampah as $value) {
                      $date = date_create($value->tanggal);
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->opName ?></td>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->total_sampah ?> Kg</td>
                        <td><?php echo date_format($date, 'd M Y') ?></td>
                        <td><?php echo date("H:i", strtotime($value->jam_ambil)) ?></td>
                        <?php
                        if ($value->status != 0) {
                          echo '<td><a href="#" class="btn btn-success btn-sm">Terkonfirmasi</a></td>';
                        } else {
                          echo '<td><a href="#" class="btn btn-danger btn-sm">Belum Terkonfirmasi</a></td>';
                        }
                        ?>
                        <td><a href="<?php echo site_url('admin/Dashboard/GetDetailSampah/' . $value->id) ?>" class="btn btn-primary"><b>Detail</b></a></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow">
                <div class="card-body">
                  <p class="card-title">Advanced Table</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table class="display expandable-table" id="ksajdkasdj" style="width:100%">
                          <thead>
                            <tr>
                              <th>Quote#</th>
                              <th>Product</th>
                              <th>Business type</th>
                              <th>Policy holder</th>
                              <th>Premium</th>
                              <th>Status</th>
                              <th>Updated at</th>
                              <th></th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../partials/_js.php") ?>
</body>

</html>