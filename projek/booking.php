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
	
		$ruangan[] = [$nama, $lokasi, $fasilitas, $kategori];
		}
	} else {
		$file = true;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Booking - eRuang</title>

		<!-- Google Font: Source Sans Pro -->
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
		/>
		<!-- Font Awesome Icons -->
		<link
			rel="stylesheet"
			href="assets/plugins/fontawesome-free/css/all.min.css"
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
	<body class="hold-transition layout-top-nav">
		<div class="container-fluid">
			<h1 class="text-center mt-3">
				eRuang - Sistem Peminjaman Ruangan Nurul Fikri
			</h1>
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<nav style="--bs-breadcrumb-divider: '|'" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item"><a href="fasilitas.php">Fasilitas</a></li>
							<li class="breadcrumb-item"><a href="booking.php" style="color: #6c757d;">Booking</a></li>
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
			<div class="card">
				<div class="row">
					<div class="col-12">
						<nav
							style="--bs-breadcrumb-divider: '>'"
							aria-label="breadcrumb" class="float-right"
						>
							<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item active">Isi Loker</li>
							</ol>
						</nav>
					</div>
				</div>
				<h3 class="text-center mt-5">Booking Ruangan</h3>
				<div class="card w-75 mx-auto">
					<form action="php/booking.php" method="post">
						<table class="table table-borderless mx-auto">
							<tr>
								<td align="right" style="vertical-align: middle">Nama Peminjam :</td>
								<td>
									<input
										type="text"
										class="form-control"
										aria-label="Username"
										aria-describedby="basic-addon1" name="peminjam"
									/>
								</td>
								<td></td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">Nama Ruangan :</td>
								<td>
									<div class="input-group mb-3">
										<select class="form-select form-control" id="inputGroupSelect01" name="nama_ruangan">
											<option selected>Pilih...</option>
										<?php if($file) { 
											for($i=0; $i<count($ruangan); $i++) {  
										?>
											<option value="<?= $ruangan[$i][0] ?>"><?= $ruangan[$i][0] ?></option>
										<?php }
											} ?>
										</select>
									</div>
								</td>
								<td></td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">
									Deskripsi Kegiatan :
								</td>
								<td>
									<textarea
										class="form-control"
										aria-label="With textarea" name="deskripsi_kegiatan"
									></textarea>
								</td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">
									Fasilitas Tambahan :
								</td>
								<td>
									<div class="row">
										<div class="col">
											<input type="checkbox" name="fasilitas[]" value="Sound System"/> Sound System
										</div>
										<div class="col">
											<input type="checkbox" name="fasilitas[]" value="Wifi" /> Wifi
										</div>
										<div class="col">
											<input type="checkbox" name="fasilitas[]" value="Layar Besar" /> Layar Besar
										</div>
										<div class="col">
											<input type="checkbox" name="fasilitas[]" value="Katering" /> Katering
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">Tanggal Pinjam :</td>
								<td>
									<input type="date" name="tanggal" id="" />
								</td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">Kontak Person :</td>
								<td>
									<input
										type="text"
										class="form-control w-50"
										aria-label="Username"
										aria-describedby="basic-addon1" name="kontak"
									/>
								</td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">Telepon/HP :</td>
								<td>
									<input
										type="text"
										class="form-control w-50"
										aria-label="Username"
										aria-describedby="basic-addon1" name="hp"
									/>
								</td>
							</tr>
							<tr>
								<td align="right" style="vertical-align: middle">Email :</td>
								<td>
									<input
										type="text"
										class="form-control w-50"
										aria-label="Username"
										aria-describedby="basic-addon1" name="email"
									/>
								</td>
							</tr>
							<tr>
								<td>
									<button type="submit" class="btn btn-primary float-right">Submit</button>
								</td>
								<td>
									<button type="reset" class="btn btn-danger float-left">Reset</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<footer>
				<hr class="border" />
				<p>Developed By Mahasiswa STT-NF &copy;2023</p>
			</footer>
		</div>
		<!-- ./wrapper -->

		<!-- REQUIRED SCRIPTS -->

		<!-- jQuery -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="assets/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="assets/js/demo.js"></script>
	</body>
</html>
