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



// Query untuk mendapatkan ekstra yang tersedia
$queryEkstra = "SELECT nama_ekstra FROM ekstra";
$ekstraResult = $is_connect->query($queryEkstra);

// Mendapatkan ekstra yang dipilih dari parameter GET
$selectedEkstra = isset($_GET['ekstra']) ? $_GET['ekstra'] : '';
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 7;
$offset = ($currentPage - 1) * $perPage;

// Query total data dengan mempertimbangkan ekstra yang dipilih
$totalQuery = "SELECT COUNT(*) as total FROM presensi" . (!empty($selectedEkstra) ? " WHERE ekstra = '$selectedEkstra'" : "");
$totalResult = $is_connect->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalPages = ceil($totalRow['total'] / $perPage);

// Query ambil data dengan mempertimbangkan ekstra yang dipilih
$sql = "SELECT user, ekstra, keterangan, waktu FROM presensi";
if (!empty($selectedEkstra)) {
  $sql .= " WHERE ekstra = ?";
}
$sql .= " LIMIT $offset, $perPage";

$stmt = $is_connect->prepare($sql);
if (!empty($selectedEkstra)) {
  $stmt->bind_param("s", $selectedEkstra);
}
$stmt->execute();
$result = $stmt->get_result();
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
          <a class="nav-link text-white" href="../dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/dashboard-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">legend_toggle </i>
            </div>
            <span class="nav-link-text ms-1">Monitoring</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="../pages/data-absensi-siswa.php">
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
          <a class="nav-link text-white" href="../pages/atur-presensi.php">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Absensi Siswa</li>
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
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
      <div class="row">
        <div class="col-lg-9">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="d-flex align-items-center pt-2 p-2 pb-2 bg-gradient-info shadow-primary border-radius-lg">
                <div class="icon icon-shape icon-lg text-center border-radius-lg me-2">
                  <i class="material-icons opacity-10">checklist</i>
                </div>
                <span class="text-white text-uppercase fw-bold">Absensi Siswa</span>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-left">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">NIS</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama Siswa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Ekstrakulikuler</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Keterangan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Waktu</th>
                    </tr>
                  </thead>
                  <tbody id="table-body" class="text-uppercase text-secondary text-xxs font-weight-bolder">
                  <?php
                  $no = ($currentPage - 1) * $perPage + 1;
//  loop output data
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //  NIS berdasarkan fullname
        $nisQuery = "SELECT nis FROM user WHERE fullname = ?";
        $nisStmt = $is_connect->prepare($nisQuery);
        $nisStmt->bind_param("s", $row["user"]);
        $nisStmt->execute();
        $nisResult = $nisStmt->get_result();
        $nisRow = $nisResult->fetch_assoc();
        $nis = $nisRow['nis'];

        echo "<tr>";
        echo "<td class='ps-4'>" . $no++ . "</td>";
        echo "<td class='ps-4'>" . htmlspecialchars($nis) . "</td>";
        echo "<td class='ps-4'>" . $row["user"] . "</td>";
        echo "<td class='ps-4'>" . $row["ekstra"] . "</td>";
        echo "<td class='ps-4'>" . $row["keterangan"] . "</td>";
        echo "<td class='ps-4'>" . $row["waktu"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>0 results</td></tr>";
}
$is_connect->close();
?>
                  </tbody>
                </table>
              </div>
              <nav>
              <nav>
              <ul class="pagination justify-content-center my-4">
                <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                  <a class="page-link text-primary" href="?page=1&ekstra=<?php echo urlencode($selectedEkstra); ?>" aria-label="First">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                  </a>
                </li>
                
                <li class="page-item <?php echo $currentPage == 1 ? 'disabled' : ''; ?>">
                  <a class="page-link text-primary" href="?page=<?php echo $currentPage - 1; ?>&ekstra=<?php echo urlencode($selectedEkstra); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>

                <!-- <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                  <li class="page-item <?php echo $i == $currentPage ? 'active' : ''; ?>">
                    <a class="page-link <?php echo $i == $currentPage ? 'bg-primary text-white' : 'text-primary'; ?>" href="?page=<?php echo $i; ?>&ekstra=<?php echo urlencode($selectedEkstra); ?>">
                      <?php echo $i; ?>
                    </a>
                  </li>
                <?php endfor; ?> -->

                <li class="page-item <?php echo $currentPage == $totalPages ? 'disabled' : ''; ?>">
                  <a class="page-link text-primary" href="?page=<?php echo $currentPage + 1; ?>&ekstra=<?php echo urlencode($selectedEkstra); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>

                <li class="page-item <?php echo $currentPage == $totalPages ? 'disabled' : ''; ?>">
                  <a class="page-link text-primary" href="?page=<?php echo $totalPages; ?>&ekstra=<?php echo urlencode($selectedEkstra); ?>" aria-label="Last">
                    <span aria-hidden="true">&raquo;&raquo;</span>
                  </a>
                </li>
              </ul>

              </nav>
            </div>
          </div>
        </div>
      <div class="col-lg-3">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="d-flex align-items-center pt-2 px-3 pb-2 bg-gradient-info shadow-primary border-radius-lg">
              <div class="icon icon-shape icon-lg text-center border-radius-lg me-2">
                <i class="material-icons opacity-10">topic</i>
              </div>
              <span class="text-white text-uppercase fw-bold">Data</span>
            </div>
          </div>
          <div class="card-body px-3 pb-3">
            <form>
              <div class="mb-3">
                <label for="ekstraah" class="form-label">Pilih Ekstrakurikuler</label>
                <select id="ekstraah" class="form-select form-select-sm" name="ekstraah" onchange="updateEkstra(this.value)">
                  <option value="">...</option>
                  <option value="">Keseluruhan</option>
                  <?php
                  if ($ekstraResult->num_rows > 0) {
                      while($row = $ekstraResult->fetch_assoc()) {
                          $isSelected = ($selectedEkstra == $row['nama_ekstra']) ? 'selected' : '';
                          echo '<option value="' . htmlspecialchars($row['nama_ekstra']) . '" ' . $isSelected . '>' . htmlspecialchars($row['nama_ekstra']) . '</option>';
                      }
                  }
                  ?>
                </select
              </div>
            </form>
          </div>
        </div>
      </div>

      </div>


      <!-- <footer class="footer py-4">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>,
                Designed by
                <a href="https://github.com/OyShan1/epres" class="font-weight-bold" target="_blank">Group 6</a>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://github.com/OyShan1/epres" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://github.com/OyShan1/epres" class="nav-link text-muted" target="_blank">About
                    Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://github.com/OyShan1/epres" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
    </div>
  </main>
  <div class="fixed-plugin">
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
          <a class="github-button" href="https://github.com/OyShan1/epres"
            data-icon="octicon-star" data-size="large" data-show-count="true"
            aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you!</h6>
          <a href=""
            class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href=""
            class="btn btn-dark mb-0 me-2" target="_blank">
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
  <script>
    document.getElementById('ekstraah').addEventListener('change', function() {
    var ekstra = this.value;
    var currentPage = <?php echo json_encode($currentPage); ?>;
    var newUrl = 'data-absensi-siswa.php?page=' + currentPage + '&ekstra=' + encodeURIComponent(ekstra);
    history.pushState({ekstra: ekstra}, '', newUrl);
    window.location.reload();
});
    </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
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