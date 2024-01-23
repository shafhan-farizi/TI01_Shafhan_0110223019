<?php
  session_start();

  if(!isset($_SESSION['admin'])) {
    if(isset($_SERVER['HTTP_REFERER'])) {
      $http_referer = explode('/',$_SERVER['HTTP_REFERER']);
      header('Location: ' . $http_referer[count($http_referer)-1]);
    } else {
      header('Location: index.php');
    }
  }

  $file = explode('=', file_get_contents('data/jadwal.txt'));
  array_shift($file);
  if($file) {
    for($i=0; $i<count($file); $i++) {
      $getContent = explode('/', $file[$i]);
  
      $nama = $getContent[0];
      $nama_ruangan = $getContent[1];
      $deskripsi_kegiatan = $getContent[2];
      $fasilitas = $getContent[3];
      $tanggal = $getContent[4];
      $kontak = $getContent[5];
      $hp = $getContent[6];
      $email = $getContent[7];

      $jadwal[] = [$nama, $nama_ruangan, $deskripsi_kegiatan, $fasilitas, $tanggal, $kontak, $hp, $email];
    }
  } else {
    $file = false;
  }

  $file_ruangan = explode('=', file_get_contents('data/ruangan.txt'));
  array_shift($file_ruangan);
  if($file_ruangan) {
    for($i=0; $i<count($file_ruangan); $i++) {
      $getContent = explode('/', $file_ruangan[$i]);
  
      $nama = $getContent[0];
  
      $ruangan_peminjam[] = [$nama];
    }
  } else {
    $file_ruangan = false;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jadwal - eRuang</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon">
  <style>
    @media screen and (max-width: 1199px) {
      .col-xl-4.col-md-12 {
        margin-top: 18px;
      }
      .col-lg-3.col-md-4.ml-auto {
        margin-bottom: 15px;
      }
    }
    @media screen and (max-width: 575px) {
      .col-lg-1.col-md-2.col-sm-4 {
        margin-bottom: 15px;
      }
    }
    @media screen and (max-width: 991px) {
      .order-lg-1.order-sm-0.col-lg-4.col-sm-12 {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <div class="row w-100">
        <div class="col-lg-1 col-md-1">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a
                class="nav-link"
                data-widget="pushmenu"
                href="#"
                role="button"
                ><i class="fas fa-bars"></i
              ></a>
            </li>
          </ul>
        </div>
        <div class="col-lg-7 col-md-11">
          <nav style="--bs-breadcrumb-divider: '|'" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="fasilitas.php">Fasilitas</a></li>
              <li class="breadcrumb-item"><a href="booking.php">Booking</a></li>
              <li class="breadcrumb-item"><a href="daftar_ruang.php" style="color: #6c757d;">Ruangan</a></li>
              <li class="breadcrumb-item"><a href="about.php">Tentang Kami</a></li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-8 ml-auto">
          <div class="input-group input-group-lg">
            <input
              type="search"
              class="form-control form-control-lg"
              placeholder="Type your keywords here"
            />
            <div class="input-group-append">
              <button type="submit" class="btn btn-lg btn-default">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index.php" class="brand-link">
        <img src="assets/img/logo.png" alt="eRuang Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light ml-1">eRuang</span>
      </a>
      <div class="sidebar mt-4">
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input
              class="form-control form-control-sidebar"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <li class="nav-item">
              <a href="daftar_ruang.php" class="nav-link">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>
                  Daftar Ruangan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <?php if($file_ruangan) { 
                      for($i=0; $i<count($ruangan_peminjam); $i++) {  
                ?>
                <li class="nav-item">
                  <a href="detail_ruangan.php?nama_ruangan=<?= $ruangan_peminjam[$i][0] ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p><?= $ruangan_peminjam[$i][0] ?></p>
                  </a>
                </li>
                <?php }
                    } ?>
              </ul>
            </li>
            <li class="nav-item">
              <a href="daftar_ruang.php" class="nav-link">
                <i class="nav-icon fa fa-solid fa-home"></i>
                <p>Ruangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="daftar_peminjaman.php" class="nav-link">
                <i class="nav-icon far fa-id-card"></i>
                <p>Peminjam</p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="jadwal.php" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>Jadwal</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="php/logout.php" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="text-center">Admin eRuang - Sistem Peminjaman Ruangan Nurul Fikri</h1>
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="col-mr-6">
                    <nav
                    style="--bs-breadcrumb-divider: '>'"
                    aria-label="breadcrumb" class="float-right"
                >
                        <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><a href="daftar_ruang.php">Admin</a></li>
                        <li class="breadcrumb-item active">Jadwal</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-header">
                  <h3 class="text-center">Jadwal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama</th>
                        <th>Nama Ruangan</th>
                        <th>Deskripsi Kegiatan</th>
                        <th>Fasilitas Tambahan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Kontak Person</th>
                        <th>Telepon</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if($file) {
                      for($i=0; $i<count($jadwal); $i++) { ?>
                      <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $jadwal[$i][0] ?></td>
                        <td><?= $jadwal[$i][1] ?></td>
                        <td><?= $jadwal[$i][2] ?></td>
                        <td>
                          <ul>
                            <?php
                            $fasilitas = explode('-', $jadwal[$i][3]); 
                            for($x=0; $x<count($fasilitas); $x++) { ?>
                            <li><?= $fasilitas[$x] ?></li>
                            <?php } ?>
                          </ul>
                        </td>
                        <td><?= $jadwal[$i][4] ?></td>
                        <td><?= $jadwal[$i][5] ?></td>
                        <td><?= $jadwal[$i][6] ?></td>
                        <td><?= $jadwal[$i][7] ?></td>
                      </tr>
                      <?php }
                      } else { ?>
                      <tr>
                        <td class="text-center" colspan="10">Data Kosong</td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
      </div>
      <strong>Developed by Mahasiswa STT Nurul Fikri &copy; 2024</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/plugins/jszip/jszip.min.js"></script>
  <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="assets/dist/js/adminlte.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>