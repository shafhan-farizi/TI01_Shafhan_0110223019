<?php 
	session_start();

	$file = explode('=', file_get_contents('data/ruangan.txt'));
	array_shift($file);
	if($file) {
		for($i=0; $i<count($file); $i++) {
			$getContent = explode('/', $file[$i]);
	
			$nama = $getContent[0];
			$lokasi = $getContent[1];
			$fasilitas = $getContent[2];
			$kategori = $getContent[3];
			$foto_ruangan = $getContent[4];
			$deskripsi = $getContent[5];
	
			$ruangan[] = [$nama, $lokasi, $fasilitas, $kategori, $foto_ruangan, $deskripsi];
		}
	} else {
		$file = false;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Fasilitas - eRuang</title>
		<!-- Google Font: Source Sans Pro -->
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
		/>
		<!-- Font Awesome -->
		<link
			rel="stylesheet"
			href="assets/plugins/fontawesome-free/css/all.min.css"
		/>
		<!-- icheck bootstrap -->
		<link
			rel="stylesheet"
			href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"
		/>
		<!-- Theme style -->
		<link rel="stylesheet" href="assets/css/adminlte.min.css" />
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
	<body>
		<div class="container-fluid">
			<h1 class="text-center mt-3">
				eRuang - Sistem Peminjaman Ruangan Nurul Fikri
			</h1>
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<nav style="--bs-breadcrumb-divider: '|'" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item"><a href="fasilitas.php" style="color: #6c757d;">Fasilitas</a></li>
							<li class="breadcrumb-item"><a href="booking.php">Booking</a></li>
							<li class="breadcrumb-item"><a href="daftar_ruang.php">Ruangan</a></li>
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
				<?php if(!isset($_SESSION['login'])) { ?>
				<div class="col-lg-1 col-md-2 col-sm-4">
					<a href="login.html" class="btn btn-block btn-success btn-lg">
						Login
					</a>
				</div>
				<?php } else { ?>
				<div class="col-lg-1 col-md-2 col-sm-4">
					<a href="php/logout.php" class="btn btn-block btn-danger btn-lg">
						Logout
					</a>
				</div>
				<?php } ?>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="order-lg-0 order-sm-1 col-lg-8 col-sm-12">
						<div class="border">
                            <div class="row">
								<div class="col-12">
									<nav
										style="--bs-breadcrumb-divider: '>'"
										aria-label="breadcrumb" class="float-right"
									>
										<ol class="breadcrumb float-sm-right">
										<li class="breadcrumb-item"><a href="index.php">Home</a></li>
										<li class="breadcrumb-item active"><a href="daftar_ruang.php">Admin</a></li>
										<li class="breadcrumb-item active">Kelola Ruangan</li>
										</ol>
									</nav>
								</div>
							</div>
                            <div class="container-fluid">
								<div class="p3">
									<?php 
									if($file) {
									for($i=0; $i<count($ruangan); $i++) { ?>
									<div class="col-12" style="border-bottom: 2px solid #dee2e6">
										<h1><?= $ruangan[$i][0] ?></h1>
										<div class="row">
											<div class="col-8">
												<p><?= $ruangan[$i][5] ?></p>
											</div>
											<div class="col-4">
												<img src="assets/img/uploads/<?= explode('|', $ruangan[$i][4])[0] ?>" class="img-thumbnail">
											</div>
										</div>
										<p><a href="detail_ruangan.php?nama_ruangan=<?= $ruangan[$i][0]; ?>" style="text-decoration: underline;">Lihat Detail</a></p>
									</div>
									<?php }
									} else { ?>
										<div class="col-12" style="border-bottom: 2px solid #dee2e6">
											<div class="row">
												<div class="col-12">
													<h1>Data Kosong</h1>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
                            </div>
						</div>
					</div>
					<div class="order-lg-1 order-sm-0 col-lg-4 col-sm-12">
						<div class="container-fluid border p-2">
							<h1>Kategori Ruangan</h1>
							<ul class="list-group list-group-flush">
								<li class="list-group-item">Aula</li>
								<li class="list-group-item">Ruang Rapat</li>
								<li class="list-group-item">Ruang Seminar</li>
								<li class="list-group-item">Lab Komputer</li>
								<li class="list-group-item">Lapangan Olahraga</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<footer>
				<hr class="border">
				<p>Developed By Mahasiswa STT-NF &copy;2023</p>
			</footer>
		</div>
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="assets/js/adminlte.min.js"></script>
	</body>
</html>
