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
              <h3 class="d-inline"><b>Detail Akun</b></h3>
              <hr>
              <form action="<?php echo site_url('login/Login/UpdateDataAkun') ?>" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="hidden" name="idPostUA" value="<?php echo $usr->id ?>">
                    <div class="form-group">
                      <label for="totalSampah"><b>Total Poin</b></label>
                      <input type="text" value="<?php $totalPoint == null ? $poin = 0 : $poin = $totalPoint->poin; echo $poin ?>" class="form-control" aria-describedby="emailHelp" readonly>
                    </div>
                    <div class="form-group">
                      <label for="totalSampah"><b>Nama User</b></label>
                      <input type="text" name="nmPostUA" value="<?php echo $usr->name ?>" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                      <label for="totalSampah"><b>Username</b></label>
                      <input type="text" name="usmPostUA" value="<?php echo $usr->username ?>" class="form-control" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                      <label for="totalSampah"><b>Email</b></label>
                      <input type="text" value="<?php echo $usr->email ?>" class="form-control" aria-describedby="emailHelp" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="totalSampah"><b>No Telp</b></label>
                      <input type="text" name="nmbrPostUA" value="<?php echo $usr->tel_number ?>" class="form-control" aria-describedby="emailHelp" placeholder="Tidak ada keterangan...">
                    </div>
                    <div class="form-group">
                      <label for="totalSampah"><b>Provinsi</b></label>
                      <input type="text" value="<?php echo $usr->province ?>" class="form-control" aria-describedby="emailHelp" placeholder="Tidak ada keterangan..." readonly>
                      <small data-toggle="modal" data-target=".bs-example-modal-sm"><a href="javascript:void(0)">Mau Diubah?</a></small>
                    </div>
                    <div class="form-group">
                      <label for="totalSampah"><b>Kota</b></label>
                      <input type="text" value="<?php echo $usr->city ?>" class="form-control" aria-describedby="emailHelp" placeholder="Tidak ada keterangan..." readonly>
                    </div>
                    <div class="form-group">
                      <label for="totalSampah"><b>Kecamatan</b></label>
                      <input type="text" value="<?php echo $usr->districts ?>" class="form-control" aria-describedby="emailHelp" placeholder="Tidak ada keterangan..." readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="totalSampah"><b>Alamat</b></label>
                  <textarea class="form-control text-dark" name="adPostUA" cols="30" rows="3" placeholder="Tidak ada keterangan..." readonly><?php echo $usr->address ?></textarea>
                </div>
                <b><input type="submit" class="btn btn-success" value="Simpan"></b>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("../../partials/_js.php") ?>
</body>

</html>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="d-inline">Ganti Alamat</h3>
        <!-- <a class="btn btn-danger btn-sm d-inline" style="float : right;"><i class="fas fa-plus-square"></i> Matikan</a> -->
        <hr>
        <form action="<?php echo site_url('login/Login/UpdateAdressAkun') ?>" method="post">
          <div class="form-group">
            <input type="hidden" value="<?php echo $usr->id ?>" name="selectPostid">
            <label for="totalSampah"><b>Provinsi</b></label>
            <select name="selectPostProv" id="selectProv" class="form-control form-control-sm" onchange="selectKabupaten()" required>
              <option value="">- pilih provinsi -</option>
              <?php 
                foreach ($prov as $value) {
                  echo '<option value="'.$value->provinsi_id."~".$value->nama_provinsi.'">'.$value->nama_provinsi.'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Kota</b></label>
            <select name="selectPostKota" id="selectKota" class="form-control form-control-sm" onchange="selectKecamatans()" required>
              <option value="">- pilih kota -</option>
            </select>
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Kecamatan</b></label>
            <select name="selectPostKec" id="selectKecamatan" class="form-control form-control-sm" required>
              <option value="">- pilih kecamatan -</option>
            </select>
          </div>
          <div class="form-group">
            <label for="totalSampah"><b>Alamat Rumah</b></label>
            <textarea name="selectPostAdd" id="" cols="30" rows="2" class="form-control form-control-sm" placeholder="Tidak ada keterangan..." required></textarea>
          </div>
          <input type="submit" class="btn btn-primary text-center" value="Simpan">
        </form>
      </div>
    </div>
  </div>
</div>