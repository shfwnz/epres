<?php
include 'assets/config/connect.php'; // Sesuaikan path sesuai lokasi file konfigurasi koneksi Anda

// Query untuk ambil nama ekstra
$query = "SELECT nama_ekstra FROM ekstra";
$result = $is_connect->query($query);
?>

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
    /* Custom styles */
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

    /* Additional styles */
    .container-full {
      padding: 0;
      margin: 0;
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .row-full {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .tampilan {
      height: 350px;
      padding: 20px;
      max-height: calc(100% - 100px);
      overflow-y: auto;
    }

    .form-label {
      font-size: 16px;
    }

    .form-control {
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .progress-bar {
      width: 0%;
    }

    .progress {
      height: 10px;
    }

    @media (max-width: 992px) {
      .content {
        padding: 20px;
      }

      .col-lg-6 {
        flex: 0 0 100%;
      }

      .form-container {
        display: block;
      }

      .tampilan {
        height: auto;
      }
    }

    @media (max-width: 576px) {
      .col-lg-6 {
        flex: 0 0 100%;
      }

      .tampilan {
        height: 350px;
        padding: 10px;
      }

      .form-control {
        margin-bottom: 10px;
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
              <h1 class="my-5 display-3 px-4 fw-bold ls-tight d-flex align-items-center">
                <img src="./assets/img/logos/logo-1.png" class="navbar-brand-img" alt="main_logo" style="width: 100px; height: 100px;">
                <span class="ms-3 font-weight-bold text-blue">PRESS</span>
              </h1>
            </div>
            <div class="col-lg-6 mb-0 mb-lg-0 justify-content-end">
              <div class="card">
                <div class="card-header p-0 position-relative mt-n3 mx-4 z-index-1">
                  <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                    <h4 class="d-flex justify-content-center text-white font-weight-bolder text-center mt-0 mb-0">Sign Up</h4>
                  </div>
                </div>
                <div class="card-body py-3 px-md-4">
                  <div class="progress mb-3">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" id="progressBar"></div>
                  </div>
                  <form action="assets/config/proses-register.php" method="post" name="register" id="register">
                    <!-- Step 1 -->
                    <div id="step1" class="tampilan text-start">
                      <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                      </div>
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                      </div>
                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                    </div>
                    <!-- Step 2 -->
                    <div id="step2" class="tampilan text-start" style="display: none;">
                      <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan Nama Lengkap" required>
                      </div>
                      <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
                      </div>
                      <div class="mb-3">
                          <label for="kelas" class="form-label">Kelas/Jurusan</label>
                          <input type="text" class="form-control" list="kelasList" id="kelas" placeholder="Example : 11 SIJA B" name="kelas" required>
                      </div>
                      <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select px-2" id="gender" name="gender" required>
                          <option value="" disabled selected>Pilih Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                      <button type="button" class="btn btn-warning" onclick="previousStep(1)">Back</button>
                    </div>
                    <!-- Step 3 -->
                    <div id="step3" class="tampilan text-start" style="display: none;">
                      <div class="mb-3">
                        <label for="ekstraa" class="form-label">Ekstrakulikuler yang diikuti</label>
                        <select class="form-select px-2" id="ekstraa" name="ekstraa" required>
                          <option value="" disabled selected>Pilih Ekstrakulikuler</option>
                          <?php
                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  echo '<option value="' . htmlspecialchars($row['nama_ekstra']) . '">' . htmlspecialchars($row['nama_ekstra']) . '</option>';
                              }
                          }
                          ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-success">Register</button>
                      <button type="button" class="btn btn-warning" onclick="previousStep(2)">Back</button>
                    </div>
                    <p class="mt-3 text-sm text-center">
                      Already have an account?
                      <a href="../epres/login.php" class="text-primary text-gradient font-weight-bold">Sign in</a>
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
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    function validateStep(step) {
      var inputs = document.querySelectorAll('#step' + step + ' .form-control, #step' + step + ' .form-select');
      for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value || inputs[i].value === '...') {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill out all fields before proceeding!',
          });
          return false;
        }
      }
      return true;
    }

    function nextStep(step) {
      if (validateStep(step - 1)) {
        document.getElementById('step' + (step - 1)).style.display = 'none';
        document.getElementById('step' + step).style.display = 'block';
        document.getElementById('progressBar').style.width = (step - 1) * 50 + '%';
      }
    }

    function previousStep(step) {
      document.getElementById('step' + (step + 1)).style.display = 'none';
      document.getElementById('step' + step).style.display = 'block';
      document.getElementById('progressBar').style.width = (step - 1) * 50 + '%';
    }

    document.getElementById('register').addEventListener('submit', function(event) {
      event.preventDefault();

      var formData = new FormData(this);

      fetch('assets/config/proses-register.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          Swal.fire({
            icon: 'success',
            title: 'Your registration has been successful',
            showConfirmButton: false,
            timer: 1500
          }).then(() => {
            window.location = 'dashboard.php';
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong: ' + data.error,
          });
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
    });
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>
</html>
