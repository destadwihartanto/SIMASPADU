<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image">
							<div class="p-5">
								<br>
								<!-- <div class="judul">
									<center>
										<img width="250px" src="<?= base_url() ?>assets/image/mushola.png" alt="">
									</center>
								</div> -->
								<div class="spinner">
									<div class="double-bounce1"></div>
									<div class="double-bounce2"></div>
								</div>
								<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>

								<div class="judul">
									<hr class="bg-black">
									<div class="text-center">
										<!-- <h1 class="h2 text-black mb-4"><b>APLIKASI</b></h1> -->
									</div>
									<div class="text-center">
									<h1 class="h2 text-black mb-4"><b>SIMASPADU</b></h1>
										<!-- <h1 class="h3 text-black mb-4">SIMASPADU</h1> -->
										<p>Sistem Informasi Masjid-Mushola Terpadu Serang</p>
									</div>
									<hr class="bg-black">
								</div>


							</div>
						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<br>
								<br>
								<br>
								<br>
								<div class="text-center">
									<!-- <img width="200px" src="<?= base_url() ?>assets/image/mushola.png" alt=""> -->
									<h1 class="h4 text-gray-900 mb-4"><img width="230px" src="<?= base_url() ?>assets/image/mushola.png" alt=""></h1>
								</div>
								<form class="user">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="user" name="user" aria-describedby="usernameHelp" placeholder="Username" autocomplete="off">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="pwd" name="pwd" placeholder="Password">
									</div>
									<div class="form-group">
										<hr>
									</div>
									<a href="#" onclick="proses_login()" id="login" class="btn btn-primary btn-user btn-block shadow">
										Login
									</a>
									<a href="<?= base_url('frontend')?>" class="btn btn-danger btn-user btn-block shadow">
										Beranda
									</a>
									<br>
									<br>
									<br>
									<br>
									<br>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<!-- <script src="<?= base_url(); ?>assets/js/login.js"></script> -->

<script type="text/javascript">
	function proses_login() {

		var usr = $("[name='user']").val();
		var pwd = $("[name='pwd']").val();

		if (usr == "") {
			validasi('Username masih kosong!', 'warning');
			return false;
		} else if (pwd == '') {
			validasi('Password masih kosong!', 'warning');
			return false;
		} else {
			cek_user(usr, pwd);
		}

	}

	function cek_user(usr, pwd) {
		var link = $('#baseurl').val();
		var base_url = link + 'login/proses_login';
		$("#login").text("Memuat...");

		$.ajax({
			type: 'POST',
			data: {
				user: usr,
				pwd: pwd
			},
			url: base_url,
			dataType: 'json',
			success: function(hasil) {
				if (hasil.respon == 'success') {
					pesan('Berhasil Login!', 'success', 'true');
					$("#login").text("Login");
				} else {
					pesan('User & Password salah!', 'error', 'false');
					$("#login").text("Login");

				}
			}
		});

	}

	function logout() {

		var base_url = $('#baseurl').val();

		swal.fire({
			title: "Anda ingin logout?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: 'Iya',
			confirmButtonColor: '#4e73df',
		}).then((result) => {
			if (result.value) {
				Swal.fire({
					title: 'Memuat...',
					onBeforeOpen: () => {
						Swal.showLoading()
					},
				});
				window.location.href = base_url + "login/logout/";
			}
		});

	}

	function pesan(judul, status, boolean) {
		swal.fire({
			title: judul,
			icon: status,
			confirmButtonColor: '#4e73df',
			showConfirmButton: true,
		}).then((result) => {
			if (boolean == 'true') {
				Swal.fire({
					title: 'Memuat...',
					onBeforeOpen: () => {
						Swal.showLoading()
					},
				});
				location.reload(true);
			}
		});
	}

	function validasi(judul, status) {
		swal.fire({
			title: judul,
			icon: status,
			confirmButtonColor: '#4e73df',
		}).then((result) => {

		});
	}
</script>
<?php if ($this->session->flashdata('Pesan')) : ?>
	<?= $this->session->flashdata('Pesan'); ?>
<?php else : ?>
	<script>
		$(document).ready(function() {

			let timerInterval
			Swal.fire({
				title: 'Memuat...',
				timer: 1000,
				onBeforeOpen: () => {
					Swal.showLoading()
				},
				onClose: () => {
					clearInterval(timerInterval)
				}
			}).then((result) => {

			})
		});
	</script>
<?php endif; ?>
