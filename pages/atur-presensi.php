<?php
include '../assets/config/connect.php';
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: ../login.php');
}

if ($_SESSION['user_tipe'] !== 'admin') {
  header("Location: ../pages/dashboard-siswa.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $startTime = $_POST['startTime'];
  $endTime = $_POST['endTime'];

  // Query untuk menyimpan data
  $query = "INSERT INTO presensi_settings (start_time, end_time) VALUES (?, ?)";
  $stmt = $is_connect->prepare($query);
  $stmt->bind_param("ss", $startTime, $endTime);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
      echo json_encode(array("success" => true));
  } else {
      echo json_encode(array("error" => "Failed to save time settings."));
  }
  $stmt->close();
  $is_connect->close();
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logos/logo-1.png">
  <title>
    PRESS
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <style>
    .custom-border {
      border: 2px solid #ced4da;
      border-radius: .25rem;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 pb-0" href="../dashboard.php">
        <img src="../assets/img/logos/logo-2.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">PRESS</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="../dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">legend_toggle </i>
            </div>
            <span class="nav-link-text ms-1">Monitoring</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/data-absensi-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Absensi Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/data-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Data Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/tambah-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Tambah Ekstra</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/hapus-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">delete</i>
            </div>
            <span class="nav-link-text ms-1">Hapus Ekstra</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="../pages/atur-presensi.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">rule</i>
            </div>
            <span class="nav-link-text ms-1">Atur Presensi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/generate-laporan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">print</i>
            </div>
            <span class="nav-link-text ms-1">Generate Laporan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/dashboard-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">task_alt</i>
            </div>
            <span class="nav-link-text ms-1">Presensi</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile-admin.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../login.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Atur Presensi</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item dropdown pe-0 d-flex align-items-center">
              <span class="d-inline text-capitalize px-3 d-none d-lg-block" id="current-time"></span>
              <a href="javascript:;" class="nav-link text-body p-0" id="UserdropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-0"></i>
                <span class="d-sm-inline d-none"><?php echo htmlspecialchars($_SESSION['name']); ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="UserdropdownMenuButton">
                <li>
                  <a class="dropdown-item border-radius-md" href="../assets/config/logout.php">
                    <i class="fa fa-sign-out me-sm-1"></i>
                    <span>Logout</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div id="notif">
                      <span class="text-center">Notifkasi muncul disini</span>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="row">
            <div class="col-col-12">
              <div class="row">
                <div class="col-md-12 mb-lg-0 mb-4">
                  <div class="card mt-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div
                        class="d-flex align-items-center pt-2 p-2 pb-2 bg-gradient-info shadow-primary border-radius-lg">
                        <div class="icon icon-shape icon-lg text-center border-radius-lg">
                          <i class="material-icons opacity-10">rule</i>
                        </div>
                        <span class="text-white text-uppercase text-bold">Atur Presensi</span>
                      </div>
                    </div>
                    </br>
                    <div class="card-body pt-0 p-3 text-center">
                      <li
                        class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg justify-content-center pt-5 p-3">
                        <div class="d-flex flex-column ">
                          <div class="col-lg-12 col-md-12">
                            <button class="btn btn-warning btn-lg ml-3 pl-3 py-3 px-2 d-inline" data-bs-toggle="modal"
                              data-bs-target="#exampleModal" href="#">
                              <i class="material-icons px-1">update</i> Buka Sekarang
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mengatur Waktu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="container-fluid">
                                      <div class="row mb-3">
                                        <div class="col-12">
                                          <label for="startTime" class="form-label">Waktu Mulai</label>
                                          <div class="input-group">
                                            <input type="time" id="startTime" class="form-control custom-border px-3" placeholder="Masukkan Waktu">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <div class="col-12">
                                          <label for="endTime" class="form-label">Waktu Akhir</label>
                                          <div class="input-group">
                                            <input type="time" id="endTime" class="form-control custom-border px-3" placeholder="Masukkan Waktu">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Keluar</button>
                                    <button type="button" class="btn btn-success" id="saveButton">SIMPAN</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
            onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
            onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
            onclick="sidebarType(this)">White</button>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn btn-outline-dark w-100" href="https://github.com/OyShan1/epres">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/OyShan1/epres" data-icon="octicon-star" data-size="large"
            data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you!</h6>
          <a href="" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
document.getElementById('saveButton').addEventListener('click', function() {
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;

    if (!startTime || !endTime) {
        Swal.fire({
            title: 'Error',
            text: 'Harap masukkan waktu mulai dan waktu akhir.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    fetch('atur-presensi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `startTime=${startTime}&endTime=${endTime}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Waktu Telah di Update',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                const modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
                modal.hide();
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: 'Gagal menyimpan pengaturan waktu.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
});
</script>

  <!-- Script Waktu -->
  <!-- Di bagian bawah sebelum tag </body> -->
<script>
  // Fungsi untuk menampilkan jam saat ini
  function displayCurrentTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    document.getElementById('current-time').innerText = `${hours}:${minutes}:${seconds}`;
  }

  // Panggil fungsi untuk menampilkan jam pertama kali
  displayCurrentTime();

  // Atur agar fungsi displayCurrentTime dipanggil setiap detik
  setInterval(displayCurrentTime, 1000);
</script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>