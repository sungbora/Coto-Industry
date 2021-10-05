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
          <div class="alert alert-primary col-lg-5" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Jangan Lupa Insert data dengan benar!
          </div>
          <div class="card shadow col-lg-5">
            <div class="card-body">
              <h3 class="text-center"><b>Input Sampah</b></h3>
              <hr>
              <form action="<?php echo site_url('admin/Dashboard/runAddSampah') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="totalSampah"><b>Total Sampah</b></label>
                  <input type="text" class="form-control" name="TotalSampah" aria-describedby="emailHelp" placeholder="Contoh : 10kg">
                  <small class="form-text text-muted">Hitungan Kilogram</small>
                </div>
                <div class="form-group">
                  <label for="totalSampah"><b>User Sampah</b></label>
                  <select name="selectedUser" class="form-control text-dark">
                    <option value="">- pilih user -</option>
                    <?php
                      foreach ($listUser as $value) {
                        echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="totalSampah"><b>Keteragan (opsional)</b></label>
                  <textarea name="keteranganInput" class="form-control" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="totalSampah"><b>Upload Foto</b></label>
                  <input type="file" class="form-control" name="imageInput" id="imgInp">
                  <br>
                  <img id="blah" src="#" style="height: 250px;" alt="Preview Gambar..." class="form-control col-lg-8" />
                </div>
                <input type="submit" class="btn btn-success text-center" value="Submit">
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

<script>
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }
</script>