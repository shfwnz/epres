<?php
session_start();
include '../assets/config/connect.php';

if (!isset($_SESSION['username'])) {
  header("Location: ../login.php"); 
  exit();
}

$query = "SELECT start_time, end_time FROM presensi_settings ORDER BY id DESC LIMIT 1";
$result = $is_connect->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $startTime = $row['start_time'];
    $endTime = $row['end_time'];
} else {
    // ga di set waktu bakal ke 00
    $startTime = '00:00';
    $endTime = '00:00';
}
$is_connect->close();
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
          <a class="nav-link text-white active bg-gradient-info" href="../pages/dashboard-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Presensi</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../assets/config/logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">login</i>
            </div>
            <span class="nav-link-text ms-1"><?php echo $_SESSION['username']; ?></span>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard Siswa</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end align-items-center">
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
      <div class="content">
        <div class="container-fluid">
          <div class="row mx-auto">
            <div class="col-lg-12 col-xl-4">
              <div class="card mt-6">
                <div class="card-header p-0 position-relative mt-n3 mx-3 z-index-2">
                  <div class="d-flex align-items-center pt-2 p-2 pb-2 bg-gradient-info shadow-primary border-radius-lg">
                    <div class="icon icon-shape icon-lg text-center border-radius-lg">
                      <i class="material-icons opacity-10">more_vert</i>
                    </div>
                    <span class="text-white text-capitalize text-bold">Pilih Ekstrakulikuler</span>
                  </div>
                </div>
                <form method="post" action="../assets/config/presensi.php">
                  <div class="p-3">
                  <select class="form-select ps-2" name="id_ekstra">
                    <option value="<?php echo $_SESSION['ekstraa']; ?>"><?php echo $_SESSION['ekstraa']; ?></option>
                  </select>
                  </div>
              </div>
            </div>
            <div class="col-lg-6 col-xl-8">
              <div class="card mt-6">
                <div class="card-header p-0 position-relative mt-n3 mx-3 z-index-2">
                  <div class="d-flex align-items-center pt-2 p-2 pb-2 bg-gradient-info shadow-primary border-radius-lg">
                    <div class="icon icon-shape icon-lg text-center border-radius-lg">
                      <i class="material-icons opacity-10">today</i>
                    </div>
                    <span class="text-white text-uppercase text-bold">presensi</span>
                  </div>
                </div>
                <!-- Di dalam elemen <div class="card-body my-auto px-5 align-items-center"> -->
                <div class="card-body my-auto px-5 align-items-center">
                  <!-- Ubah teks di bawah berdasarkan waktu -->
                  <h4 class="d-inline text-capitalize" id="presensiStatus">Presensi ditutup</h4>
                  <br>
                  <!-- Tambahkan elemen untuk menampilkan jam -->
                  <span class="d-inline text-capitalize" id="time-left"></span>
                  <br>
                  <!-- Tampilkan tombol presensi dengan waktu tersisa -->
                    <div class="text-center py-5 pb-0">
                      <button type="submit" id="presensiButton" class="btn btn-primary btn-lg btn-block">
                        <i class="fas fa-user-check"></i> Presensi
                      </button>
                    </div>
                  </form>
                  <br>
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
  <script src="../assets/js/plugins/chartjs.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Script Presensi -->
  <script>
document.addEventListener('DOMContentLoaded', function() {
  const startTime = '<?php echo $startTime; ?>';
  const endTime = '<?php echo $endTime; ?>';
  const jamBukaPresensi = new Date();
  const [startHours, startMinutes] = startTime.split(':');
  jamBukaPresensi.setHours(startHours, startMinutes, 0, 0);

  const jamTutupPresensi = new Date();
  const [endHours, endMinutes] = endTime.split(':');
  jamTutupPresensi.setHours(endHours, endMinutes, 0, 0);

  function updatePresensiStatus() {
    const sekarang = new Date();
    if (sekarang < jamBukaPresensi) {
      document.getElementById('presensiStatus').innerText = "Presensi belum dibuka";
      document.getElementById('presensiButton').disabled = true;
    } else if (sekarang > jamTutupPresensi) {
      document.getElementById('presensiStatus').innerText = "Presensi ditutup";
      document.getElementById('presensiButton').disabled = true;
    } else {
      document.getElementById('presensiStatus').innerText = "Presensi telah dibuka";
      document.getElementById('presensiButton').disabled = false;
      const sisaWaktu = Math.floor((jamTutupPresensi - sekarang) / 1000);
      const menit = Math.floor(sisaWaktu / 60);
      const detik = sisaWaktu % 60;
      document.getElementById('time-left').innerText = `(${menit} menit ${detik} detik tersisa)`;
    }
  }

  setInterval(updatePresensiStatus, 1000);
  updatePresensiStatus();

  // Menangani klik tombol presensi
  document.getElementById('presensiButton').addEventListener('click', function(event) {
    const lastPresencedTime = localStorage.getItem('lastPresencedTime');
    const now = new Date();
    if (lastPresencedTime) {
      const lastTime = new Date(lastPresencedTime);
      const diff = now - lastTime;
      const hoursPassed = diff / 1000 / 60 / 60;
      if (hoursPassed < 12) {
        event.preventDefault(); // Menghentikan form dari pengiriman
        Swal.fire({
          title: 'Peringatan!',
          text: 'Anda sudah melakukan presensi dalam 12 jam terakhir.',
          icon: 'warning',
          confirmButtonText: 'OK'
        });
        return;
      }
    }
    localStorage.setItem('lastPresencedTime', now.toISOString()); // Simpan waktu presensi terkini
  });
});
</script>

<!-- Script Waktu -->
<!-- Di bagian bawah sebelum tag </body> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status === 'success') {
      Swal.fire({
        title: 'Sukses!',
        text: 'Presensi berhasil disimpan',
        icon: 'success',
        confirmButtonText: 'OK'
      });
    } else if (status === 'error') {
      Swal.fire({
        title: 'Error!',
        text: 'Gagal menyimpan presensi',
        icon: 'error',
        confirmButtonText: 'OK'
      });
    }
  });
</script>


  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>