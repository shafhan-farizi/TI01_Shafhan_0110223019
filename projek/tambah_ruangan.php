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
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Tambah Ruangan - eRuang</title>
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
		/>
		<link
			rel="stylesheet"
			href="assets/plugins/fontawesome-free/css/all.min.css"
		/>
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
	<body class="hold-transition sidebar-mini">
		<div class="teks1">
			<h1 class="text-center">eRuang-Sistem Peminjaman Ruangan</h1>
		</div>
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
						  <li class="nav-item">
							<a href="detail_ruangan/aula_cendrawasih.php" class="nav-link">
							  <i class="far fa-circle nav-icon"></i>
							  <p>Aula Cendrawasih</p>
							</a>
						  </li>
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
		  
					  <li class="nav-item">
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

			<div class="content-wrapper">
				<section class="content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<nav
									style="--bs-breadcrumb-divider: '>'"
									aria-label="breadcrumb" class="float-right"
								>
									<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item"><a href="daftar_ruang.php">Admin</a></li>
									<li class="breadcrumb-item active">Tambah Ruangan</li>
									</ol>
								</nav>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-sm-12">
								<h1 class="text-center">Tambah Ruangan</h1>
							</div>
						</div>
					</div>
				</section>

				<section class="content">
						<div class="card w-75 mx-auto">
							<form action="php/tambah_ruangan.php" method="post" enctype="multipart/form-data">
								<table class="table table-borderless">
									<tr>
										<td align="right" style="vertical-align: top">
											Nama Ruangan :
										</td>
										<td>
											<input
												type="text"
												class="form-control"
												aria-label="Username"
												aria-describedby="basic-addon1"
												name="nama_ruangan"
											/>
										</td>
									</tr>
									<tr>
										<td align="right" style="vertical-align: top">
											Kategori :
										</td>
										<td>
											<div class="input-group mb-3">
												<select
													class="form-select form-control"
													id="inputGroupSelect01" name="kategori"
												>
													<option selected disabled>Pilih...</option>
													<option value="Aula">Aula</option>
													<option value="Ruang Rapat">Ruang Rapat</option>
													<option value="Ruang Seminar">Ruang Seminar</option>
													<option value="Lab Komputer">Lab Komputer</option>
													<option value="Lapangan Olahraga">Lapangan Olahraga</option>
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<td align="right" style="vertical-align: top">
											Deskripsi Ruangan :
										</td>
										<td>
											<textarea
												class="form-control"
												aria-label="With textarea" name="deskripsi"
											></textarea>
										</td>
									</tr>
									<tr>
										<td align="right" style="vertical-align: top">
											Fasilitas Ruangan :
										</td>
										<td>
											<div class="row">
												<div class="col">
													<input type="checkbox" name="fasilitas[]" value="Sound System" /> Sound System
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
										<td align="right" style="vertical-align: top">
											Lokasi Ruangan :
										</td>
										<td>
											<input
												type="text"
												class="form-control w-50"
												aria-label="Username"
												aria-describedby="basic-addon1"
												name="lokasi"
											/>
										</td>
									</tr>
									<tr class="foto-ruangan">
										<td align="right" style="vertical-align: top;">
											Foto Ruangan [1] :
										</td>
										<td>
											<div class="input-group mb-3">
												<input type="file" class="form-control h-100" name="foto_ruangan[]">
											</div>
										</td>
									</tr>
									<tr class="button-plus">
										<td></td>
										<td>
											<div class="fa fa-plus text-center" style="background-color: #6c757d;border-radius:50%;width:50px;height:50px;line-height:48px;color:#fff;border:2px solid #000;" onclick="tambahFile()"></div>
											Tambah File
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
				</section>
			</div>

			<footer class="main-footer">
				<div class="float-right d-none d-sm-block">
					<b></b>
				</div>
				<strong>Develop By Mahasiswa STT-NF &copy; 2023</strong>
			</footer>

			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
		</div>

		<script src="assets/plugins/jquery/jquery.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/adminlte.min.js"></script>
		<script>
			function tambahFile() {
				let foto_ruangan = document.getElementsByClassName('foto-ruangan')
				let button_plus = document.getElementsByClassName('button-plus')[0]
				console.log(button_plus);
				let tr = document.createElement('tr')
				tr.classList.add('foto-ruangan')
				let td_nama = document.createElement('td')
				td_nama.align = 'right'
				td_nama.style.verticalAlign = 'top'
				td_nama.textContent = 'Foto Ruangan[' + (foto_ruangan.length + 1) + '] :' 
				tr.appendChild(td_nama)
				
				let td_input = document.createElement('td')

				let div = document.createElement('div')
				div.classList.add('input-group', 'mb-3')

				let input = document.createElement('input')
				input.type = 'file'
				input.classList.add('form-control', 'h-100')
				input.name = 'foto_ruangan[]'
				div.appendChild(input)
				td_input.appendChild(div)

				tr.appendChild(td_input)
				foto_ruangan[0].parentElement.insertBefore(tr, button_plus)
			}
		</script>
	</body>
</html>
