<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/logos/logo-1.png">
  <title>PRESS</title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

  <style>
    /* Add your custom styles here */
    body,
    html {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .full-height {
      min-height: 100vh;
    }

    .bg-color {
      background-color: hsl(0, 0%, 96%);
      height: 100%;
    }

    /* Adjustments for mobile */
    @media (max-width: 992px) {
      .content {
        padding: 20px;
        /* Add padding for better spacing */
      }

      .col-lg-6 {
        flex: 0 0 100%;
        /* Set column width to full width on mobile */
      }

      .form-container {
        display: block;
      }
    }
  
  </style>
</head>

<body>
  <div class="full-height">
    <section class="vh-100">
      <div class="d-flex align-items-center px-md-5 text-center text-lg-start bg-color">
        <div class="container">
          <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <h1 class="my-5 display-3 fw-bold ls-tight d-flex align-items-center px-4">
                <img src="./assets/img/logos/logo-1.png" class="navbar-brand-img" alt="main_logo" style="width: 100px; height: 100px;">
                <span class="ms-3 font-weight-bold text-blue">PRESS</span>
              </h1>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 ">
              <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-4 z-index-1">
                  <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                    <h4 class="d-flex justify-content-center text-white font-weight-bolder text-center mt-0 mb-0">Sign in</h4>
                  </div>
                </div>
                <div class="card-body pt-5  px-md-5">
                  <form id="loginForm" role="form" class="text-start" method="POST" action="assets/config/proses-login.php">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-check form-switch d-flex align-items-center mb-3">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Login</button>
                    </div>
                    <p class="mt-3 text-sm text-center">
                      Don't have an account?
                      <a href="../epres/register.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                    </p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Di dalam <head> pada login.php -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Core JS Files -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    fetch('assets/config/proses-login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirectUrl; // Redirect berdasarkan tipe user
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message, // Pesan 'Login gagal'
            });
        }
    })
    .catch(error => console.error('Error:', error));
});
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>