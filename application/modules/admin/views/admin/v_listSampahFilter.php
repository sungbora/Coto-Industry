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
          <div class="card shadow col-lg-3">
            <form action="<?php echo site_url('admin/Dashboard/ListSampahFilter') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <h3 class="pb-2"><b>Tanggal</b></h3>
                  <input type="date" name="tglAwalInputAdmin" class="form-control" placeholder="Tanggal Awal">
                  <br>
                  <input type="date" name="tglAkhirInputAdmin" class="form-control" placeholder="Tanggal Akhir">
                </div>
                <input type="submit" class="btn btn-success" value="cari">
              </div>
            </form>
          </div>
          <br>
          <div class="card shadow col-lg-12">
            <div class="card-body">
              <h3 class="d-inline"><b>List Semua Sampah</b></h3>
              <hr>
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
                    foreach ($getAllSampahByDate as $value) {
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
                          echo '<td><a href="javascript:void(0)" class="btn btn-success btn-sm">Terkonfirmasi</a></td>';
                        } else {
                          echo '<td><a href="javascript:void(0)" class="btn btn-danger btn-sm">Belum Terkonfirmasi</a></td>';
                        }
                        ?>
                        <td>
                          <?php
                            if ($value->status != 1 && $this->session->userdata('level') == 'admin') {
                              ?> <a href="javascript:void(0)" onclick="modalSetujui(this)" data-id="<?php echo $value->id ?>" class="btn btn-success"><b>Setujui</b></a> <?php
                            }
                          ?>
                          <a href="<?php echo site_url('admin/Dashboard/GetDetailSampah/' . $value->id) ?>" class="btn btn-primary"><b>Detail</b></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- <a href="<?php echo site_url('admin/Dashboard/op') ?>" class="btn btn-success"><b>Kembali</b></a> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../partials/_js.php") ?>
</body>

</html>