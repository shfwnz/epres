<?php
include 'assets/config/connect.php';
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

if ($_SESSION['user_tipe'] !== 'admin') {
  header("Location: pages/dashboard-siswa.php");
  exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Query umum untuk mengambil data berdasarkan hari
$query = "SELECT h.nama_hari, e.nama_ekstra
FROM jadwal j
JOIN hari h ON j.hari_id = h.id
JOIN ekstra e ON j.ekstra_id = e.id";

// Eksekusi query
$result = $is_connect->query($query);
if (!$result) {
    die("Query failed: " . $is_connect->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["nama_hari"] == "senin") {
            $seninData[] = $row;
        } elseif ($row["nama_hari"] == "selasa") {
            $selasaData[] = $row;
        } elseif ($row["nama_hari"] == "rabu") {
            $rabuData[] = $row;
        } elseif ($row["nama_hari"] == "kamis") {
            $kamisData[] = $row;
        } elseif ($row["nama_hari"] == "jumat") {
            $jumatData[] = $row;
        }
    }
} else {
    echo "No data found";
}


// Tutup koneksi
$is_connect->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/logos/logo-1.png">
  <title>
    PRESS
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 pb-0" href="../epres/dashboard.php">
        <img src="./assets/img/logos/logo-2.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">PRESS</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-info" href="../epres/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../epres/pages/dashboard-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">legend_toggle </i>
            </div>
            <span class="nav-link-text ms-1">Monitoring</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../epres/pages/data-absensi-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Absensi Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../epres/pages/data-siswa.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Data Siswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../epres/pages/tambah-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Tambah Ekstra</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../epres/pages/hapus-ekstra.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">delete</i>
            </div>
            <span class="nav-link-text ms-1">Hapus Ekstra</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../epres/pages/atur-presensi.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">rule</i>
            </div>
            <span class="nav-link-text ms-1">Atur Presensi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../epres/pages/generate-laporan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">print</i>
            </div>
            <span class="nav-link-text ms-1">Generate Laporan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../epres/pages/dashboard-siswa.php">
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
          <a class="nav-link text-white " href="../epres/pages/profile-admin.php">
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Epres</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 " id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item dropdown pe-0 d-flex align-items-center">
              <span class="d-inline text-capitalize px-3 d-none d-lg-block" id="current-time"></span>
              <a href="javascript:;" class="nav-link text-body p-0" id="UserdropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-0"></i>
                <span class="d-sm-inline d-none"></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="UserdropdownMenuButton">
                <li>
                  <a class="dropdown-item border-radius-md" href="../epres/assets/config/logout.php">
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
        <div class="mt-4 mb-5 col-lg-9 grid-margin">
          <div class="card">
            <div class="p-2 pt-2">
              <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2 bg-transparent">
                <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1 pt-4 p-0">
                  <div class="text-white text-capitalize">
                    <p class="text-center fw-bold" style="font-size: 25px;">JADWAL</p>
                  </div>
                </div>
              </div>
              </br>
              <div class="mx-3 position-relative p-0">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="card bg-light shadow-sm">
                        <div
                          class="card-header bg-light text-dark text-uppercase text-bold d-flex justify-content-center align-items-center"
                          style="font-size: 20px;">
                          Senin
                        </div>
                        <ul class="list-group list-group-flush">
                        <?php if (!empty($seninData)) : ?>
                          <?php foreach ($seninData as $dataSenin) : ?>
                          <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                              <span><?php echo $dataSenin["nama_ekstra"]; ?></span>
                            </div>
                          </li>
                          <?php endforeach; ?>
                        <?php else : ?>
                          <li class="list-group-item">Tidak ada data</li>
                        <?php endif; ?>
                        </ul>
                      </div>
                    </div>
                    <div class="carousel-item">
                    <div class="card bg-light shadow-sm">
                      <div class="card-header bg-light text-dark text-uppercase text-bold d-flex justify-content-center align-items-center" style="font-size: 20px;">
                        Selasa
                      </div>
                      <ul class="list-group list-group-flush">
                        <?php if (!empty($selasaData)) : ?>
                          <?php foreach ($selasaData as $dataSelasa) : ?>
                            <li class="list-group-item">
                              <div class="d-flex justify-content-between align-items-center">
                                <span><?php echo $dataSelasa["nama_ekstra"]; ?></span>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php else : ?>
                          <li class="list-group-item">Tidak ada data</li>
                        <?php endif; ?>
                      </ul>
                    </div>
                  </div>
                    <div class="carousel-item">
                      <div class="card bg-light shadow-sm">
                        <div
                          class="card-header bg-light text-dark text-uppercase text-bold d-flex justify-content-center align-items-center"
                          style="font-size: 20px;">
                          Rabu
                        </div>
                        <ul class="list-group list-group-flush">
                        <ul class="list-group list-group-flush">
                        <?php if (!empty($rabuData)) : ?>
                          <?php foreach ($rabuData as $dataRabu) : ?>
                            <li class="list-group-item">
                              <div class="d-flex justify-content-between align-items-center">
                                <span><?php echo $dataRabu["nama_ekstra"]; ?></span>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php else : ?>
                          <li class="list-group-item">Tidak ada data</li>
                        <?php endif; ?>
                      </ul>
                        </ul>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card bg-light shadow-sm">
                        <div
                          class="card-header bg-light text-dark text-uppercase text-bold d-flex justify-content-center align-items-center"
                          style="font-size: 20px;">
                          Kamis
                        </div>
                        <ul class="list-group list-group-flush">
                        <ul class="list-group list-group-flush">
                        <?php if (!empty($kamisData)) : ?>
                          <?php foreach ($kamisData as $dataKamis) : ?>
                            <li class="list-group-item">
                              <div class="d-flex justify-content-between align-items-center">
                                <span><?php echo $dataKamis["nama_ekstra"]; ?></span>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php else : ?>
                          <li class="list-group-item">Tidak ada data</li>
                        <?php endif; ?>
                      </ul>
                        </ul>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="card bg-light shadow-sm">
                        <div
                          class="card-header bg-light text-dark text-uppercase text-bold d-flex justify-content-center align-items-center"
                          style="font-size: 20px;">
                          Jumat
                        </div>
                        <ul class="list-group list-group-flush">
                        <ul class="list-group list-group-flush">
                        <?php if (!empty($jumatData)) : ?>
                          <?php foreach ($jumatData as $dataJumat) : ?>
                            <li class="list-group-item">
                              <div class="d-flex justify-content-between align-items-center">
                                <span><?php echo $dataJumat["nama_ekstra"]; ?></span>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php else : ?>
                          <li class="list-group-item">Tidak ada data</li>
                        <?php endif; ?>
                      </ul>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="d-flex justify-content-between align-items-center ">
                  <div class="" style="padding-left: 15px;">
                    <a class="btn carousel-control-prev bg-secondary mt-auto" href="#carouselExampleControls"
                    role="button" data-bs-slide="prev" style="width: 55px; height: 30px;">
                    <span class="carousel-control-prev-icon" style="height: 20px;" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  </div>
                  <div class="" style="padding-right: 20px;">
                    <a class="btn carousel-control-next bg-secondary mt-auto " href="#carouselExampleControls"
                      role="button" data-bs-slide="next" style="width: 55px; height: 30px;">
                      <span class="carousel-control-next-icon" style="height: 20px;" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- <footer class="footer py-4  ">
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
          <!-- <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
            onclick="sidebarType(this)">Transparent</button> -->
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
        
        
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        },],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
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
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>