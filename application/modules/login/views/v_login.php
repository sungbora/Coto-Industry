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
                <h4 class="text-center"><b>Selamat Datang di Bank Sampah</b></h4>
                <hr>
                <form action="<?php echo site_url('login/Login/LoginCheck') ?>" method="post">
                  <div class="form-group">
                    <label for="totalSampah"><b>username</b></label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="username">
                  </div>
                  <div class="form-group">
                    <label for="totalSampah"><b>Password</b></label>
                    <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="*******">
                  </div>
                  <input type="submit" class="btn btn-success text-center" value="Login">
                  <a href="<?php echo site_url('login/Login/super') ?>" class="btn btn-warning d-inline" style="float : right;"><i class="far fa-question-circle"></i> Kamu Operator?</a>
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