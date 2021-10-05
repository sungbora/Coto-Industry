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
              <h3 class="d-inline"><b>Super User</b></h3>
              <a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-sm" class="d-inline btn btn-primary btn-sm" style="float: right;">Tambah</a>
              <hr>
              <div class="table-responsive">
                <table class="display expandable-table table-hover" id="ksajdkasdj" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>level</th>
                      <th>Status</th>
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
                        <td><?php echo $value->level ?></td>
                        <?php
                        if ($value->is_active != 'nonaktif') {
                          echo '<td><a href="javascript:void(0)" class="btn btn-success btn-sm">Aktif</a></td>';
                        } else {
                          echo '<td><a href="javascript:void(0)" class="btn btn-danger btn-sm">Belum Aktif</a></td>';
                        }
                        ?>
                        <td>
                          <?php
                          if ($value->is_active != 'nonaktif') {
                            echo '<a href="" class="btn btn-warning text-center"><i class="fas fa-key"></i></a>';
                          } else {
                            echo '<a href="javascript:void(0)" onclick="modalSetujuSuperUser(this)" data-id="' . $value->id . '" class="btn btn-success text-center"><i class="fas fa-check-circle"></i></a>';
                          }
                          ?>
                          <a href="javascript:void(0)" data-id="<?php echo $value->id."~".$value->username."~".$value->name."~".$value->is_active ?>" onclick="detailSuperAkun(this)" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-primary"><i class="fas fa-info-circle"></i></i></a>
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

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3>Buat Akun</h3>
        <hr>
        <form action="<?php echo site_url('login/Login/CreateUseSuper') ?>" method="post">
          <div class="form-group">
            <label for="totalSampah"><b>Username</b></label>
            <input type="text" class="form-control form-control-sm" name="usmCreate" aria-describedby="emailHelp" placeholder="Contoh : 89jokowi">
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Password</b></label>
            <input type="password" class="form-control form-control-sm" name="pswCreate" aria-describedby="emailHelp" placeholder="Contoh : 89u37wnr98475">
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Name</b></label>
            <input type="text" class="form-control form-control-sm" name="nmCreate" aria-describedby="emailHelp" placeholder="Contoh : Suyatno">
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Level</b></label>
            <select name="lvlCreate" id="" class="form-control form-control-sm">
              <option value="">- pilih level -</option>
              <option value="operator">operator</option>
              <option value="admin">admin</option>
            </select>
          </div>
          <input type="submit" class="btn btn-success text-center" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="d-inline">Detail Akun</h3>
        <!-- <a class="btn btn-danger btn-sm d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Matikan</a> -->
        <hr>
        <form action="<?php echo site_url('login/Login/DeleteSuperAkun') ?>" method="post">
          <div class="form-group">
            <input type="hidden" id="idGet1" name="idPostSA">
            <label for="totalSampah"><b>Username</b></label>
            <input type="text" class="form-control form-control-sm" id="usmGet1" aria-describedby="emailHelp" readonly>
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Name</b></label>
            <input type="text" class="form-control form-control-sm" id="nmGet1" aria-describedby="emailHelp" readonly>
          </div>
          <input type="submit" class="btn btn-danger text-center" value="Hapus">
        </form>
      </div>
    </div>
  </div>
</div>