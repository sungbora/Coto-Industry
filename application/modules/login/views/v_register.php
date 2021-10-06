<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view("../../partialsMain/_head.php") ?>
  <style type="text/css">
    html,
    body {
      height: 100%;
    }
  </style>
</head>

<body>

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="d-flex justify-content-center mt-5">
            <div class="card shadow-lg col-lg-4 mt-5 border border-primary align-center">
              <div class="card-body">
                <h4 class="text-center"><b>Daftar di Bank Sampah</b></h4>
                <hr>
                <form action="<?php echo site_url('login/Login/registered') ?>" method="post">
                  <div class="row">
                    <div class="col-8 pb-2">
                      <label for=""><b>Email</b></label>
                      <input type="text" class="form-control" id="emailInputRegist" name="emailInputRegist" placeholder="isi email kamu...">
                    </div>
                    <div class="col">
                      <label for=""></label>
                      <a href="javascript:void(0)" id="storeEmailz" onclick="sendCodetoEmail()" class="form-control btn btn-primary">Submit</a>
                    </div>
                    <div class="col-8">
                      <label for=""><b>Kode Unik</b></label>
                      <input type="text" id="kdOenik" class="form-control" placeholder="Cek Email Kamu..." disabled>
                    </div>
                    <div class="col">
                      <label for=""></label>
                      <a href="javascript:void(0)" id="checkKodes" onclick="null" class="form-control btn btn-primary">Submit</a>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <label for=""><b>Username</b></label>
                      <input type="text" id="usmRegist" name="usmRegist" class="form-control" placeholder="isi email kamu..." disabled>
                    </div>
                    <div class="col pb-2">
                      <label for=""><b>Password</b></label>
                      <input type="password" id="passwordRegist" name="passwordRegist" class="form-control" placeholder="isi password kamu..." disabled>
                      <!-- <small class="text-danger"><b>*Jangan Sampe Lupa Yak!</b></small> -->
                    </div>
                  </div>
                  <div class="form-group">
                    <label for=""><b>Nama</b></label>
                    <input type="text" id="namaRegist" name="namaRegist" class="form-control" placeholder="isi Nama kamu..." disabled>
                  </div>
                  <input type="submit" class="form-control btn btn-primary" value="Daftar">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<script>
  function sendCodetoEmail() {
    let emailInput = $('#emailInputRegist').val()

    if (emailInput !== "") {
      $.ajax({
        url: site + "/login/Login/CheckEmail",
        type: "post",
        data: { 'emailInputCheck': emailInput },
        success: function (data) {
          if(data == null) {
            $.ajax({
              url: site + "/login/Login/sendEmail",
              type: "post",
              data: { 'emailInput': emailInput },
              success: function (data) {
                swal("Sukses!!", "Berhasil, Cek Email Kamu!", "success");
                document.getElementById("storeEmailz").setAttribute( "onClick", "null" );
                $('#emailInputRegist').prop("readonly", true);
                document.getElementById("checkKodes").setAttribute( "onClick", "checkKodes();" );
                $('#kdOenik').prop("disabled", false);
              }, error: function (x) {
                swal("Gagal!!", "Gagal, Isi Email Lu dulu Bego!", "error");
              }
            });
          } else {
            swal("Gagal!!", "Gagal, Email Udah Terpakai!", "error");  
          }
        }, error: function (x) {
          swal("Gagal!!", "Error!", "error");
        }
      });
    } else {
      swal("Gagal!!", "Gagal, Isi kodenya dulu Bego!", "error");
    }
      
  }

  function checkKodes() {
    let kode = $('#kdOenik').val()
    let emailInput = $('#emailInputRegist').val()

    if (kode !== "") {
      $.ajax({
        url: site + "/login/Login/checkKode",
        type: "post",
        data: { 'emailInputan': emailInput },
        success: function (data) {
          if(kode == data) {
            swal("Sukses!!", "Berhasil, Lanjut!", "success");
            document.getElementById("checkKodes").setAttribute( "onClick", "null" );
            $('#kdOenik').prop("disabled", true);
            $('#usmRegist').prop("disabled", false);
            $('#passwordRegist').prop("disabled", false);
            $('#namaRegist').prop("disabled", false);
          } else {
            swal("Gagal!!", "Gagal, Kode mu salah!", "error");  
          }
        }, error: function (x) {
          swal("Gagal!!", "Gagal, Isi kodenya dulu Bego!", "error");
        }
      });
    } else {
      swal("Gagal!!", "Gagal, Isi kodenya dulu Bego!", "error");
    }
  }
</script>