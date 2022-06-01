<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOGIN PAUS</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="public/assets/vendor/bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="public/assets/vendor/font-awesome/css/font-awesome.min.css">

  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="public/assets/css/fontastic.css">

  <!-- Google fonts - Poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">

  <!-- theme stylesheet-->
  <link rel="stylesheet" href="public/assets/css/style.default.css" id="theme-stylesheet">

  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="public/assets/css/custom.css">

  <!-- CSS SWEETALERT -->
  <link rel="stylesheet" href="lib/sweetalert/dist/sweetalert2.min.css">

  <!-- Favicon-->
  <link rel="shortcut icon" href="public/assets/img/favicon.ico">

  <!--CSS MAIN-->
  <link rel="stylesheet" href="public/css/main.css">
</head>

<body>
  <div class="page login-page">
    <div class="container d-flex align-items-center">
      <div class="form-holder has-shadow">
        <div class="row">
          <!-- Logo & Information Panel-->
          <div class="col-lg-6">
            <div class="info d-flex align-items-center">
              <div class="content">
                <div class="logo">
                  <h1>PLATAFORMA DE ATENCION AL USUARIO</h1>
                </div>
                <p>PAUS - GESTION DE INCIDENCIAS.</p>
              </div>
            </div>
          </div>
          <!-- Form Panel    -->
          <div class="col-lg-6 bg-white">
            <div class="form d-flex align-items-center">
              <div class="content">
                <form method="post" id="frmAjaxLogin" class="form-validate">

                  <div class="form-group">
                    <input id="login-username" type="text" name="txt_usuario" id="txt_usuario" required data-msg="Please enter your username" class="input-material">
                    <label for="login-username" class="label-material">User Name</label>
                  </div>

                  <div class="form-group">
                    <input id="login-password" type="password" name="txt_contra" id="txt_contra" required data-msg="Please enter your password" class="input-material">
                    <label for="login-password" class="label-material">Password</label>
                  </div>

                  <div><input type="submit" class="btn btn-primary" name="btn-login" id="btn-login" value="INGRESAR"></div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyrights text-center">
      <p>PAUS - <a href="https://bootstrapious.com/p/admin-template" class="external">GESTION</a>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      </p>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="public/assets/vendor/jquery/jquery.min.js"></script>
  <script src="public/assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="public/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="public/assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="public/assets/vendor/chart.js/Chart.min.js"></script>
  <script src="public/assets/vendor/jquery-validation/jquery.validate.min.js"></script>

  <!--SWEETALERT JS-->
  <script src="lib/sweetalert/dist/sweetalert2.all.min.js"></script>

  <!-- Main File-->
  <script src="public/assets/js/front.js"></script>
  <script src="public/js/ajax.js"></script>
</body>

</html>