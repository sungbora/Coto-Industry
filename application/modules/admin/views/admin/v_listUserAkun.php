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
          <div class="card shadow col-lg-12">
            <div class="card-body">
              <h3 class="d-inline"><b>Manajemen Akun User</b></h3>
              <hr>
              <div class="table-responsive">
                <table class="display expandable-table table-hover" id="ksajdkasdj" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <!-- <th>Poin</th> -->
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($dataUser as $value) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $value->username ?></td>
                        <td><?php echo $value->name ?></td>
                        <?php
                        if ($value->is_active != 'nonaktif') {
                          echo '<td><a href="javascript:void(0)" class="btn btn-success btn-sm">Aktif</a></td>';
                        } else {
                          echo '<td><a href="javascript:void(0)" class="btn btn-danger btn-sm">Belum Aktif</a></td>';
                        }
                        ?>
                        <!-- <td><?php echo $value->totalPoin ?></td> -->
                        <td>
                          <?php
                            if ($value->is_active != 'nonaktif') {
                              echo '<a href="javascript:void(0)" class="btn btn-warning text-center"><i class="fas fa-key"></i></a>';
                            } else {
                              echo '<a href="javascript:void(0)" class="btn btn-success text-center" onclick="modalSetujuUser(this)" data-id="'.$value->id.'"><i class="fas fa-check-circle"></i></a>';
                            }
                          ?>
                          <a href="<?php echo site_url('admin/Dashboard/DetailUserAkun/' . $value->id) ?>" onclick="sendsegment(this)" data-id="<?php echo $value->id ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i></i></a>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../partials/_js.php") ?>
</body>

</html>