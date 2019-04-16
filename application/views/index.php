<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travello</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Travello template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bulma.css">

</head>
<body>
	<nav class="navbar" role="navigation" aria-label="main navigation">
		<div class="container">
			
			<div class="navbar-brand">
				<a class="navbar-item" href="https://bulma.io">
					<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
				</a>

				<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</a>
			</div>

			<div id="navbarBasicExample" class="navbar-menu">
				<div class="navbar-start">
					<a class="navbar-item">
						Home
					</a>

					<a class="navbar-item">
						Documentation
					</a>

					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
							More
						</a>

						<div class="navbar-dropdown">
							<a class="navbar-item">
								About
							</a>
							<a class="navbar-item">
								Jobs
							</a>
							<a class="navbar-item">
								Contact
							</a>
							<hr class="navbar-divider">
							<a class="navbar-item">
								Report an issue
							</a>
						</div>
					</div>
				</div>

				<div class="navbar-end">
					<div class="navbar-item">
						<?php
						if (!empty($this->session->userdata('nama'))) {?>
							<div class="buttons">
								<a href="<?php echo base_url('auth/logout'); ?>" class="button is-light">
									<?php echo $this->session->userdata('nama'); ?>
								</a>
							</div>
						<?php } else {?>
							<a class="button is-primary">
								<strong>Sign up</strong>
							</a>
							<a href="<?php echo base_url('auth/login'); ?>" class="button is-light">
								Log in
							</a>
						<?php }?>

					</div>
				</div>
			</div>
		</div>
	</nav>


	<div class="section is-medium">
		
		 <?php echo validation_errors(); ?>
		<form method="post" action="<?php echo base_url() ?>pemesanan/getPesawat/">
			<input name="kode_pemesanan" type="hidden" value="<?php echo uniqid() ?>">  
			<input name="tempat_pemesanan" type="text" placeholder="tempat pemesanan">  
			<select name="rute_awal">                      
				<?php 
				foreach ($rute_awal->result() as $rute_awal) { ?>
					<option value="<?php echo $rute_awal->id_kota ?>"><?php echo $rute_awal->nama_kota ?></option>
				<?php }?>
			</select>
			<select name="rute_akhir">                      
				<?php 
				foreach ($rute_akhir->result() as $rute_akhir) { ?>
					<option value="<?php echo $rute_akhir->id_kota ?>"><?php echo $rute_akhir->nama_kota ?></option>
				<?php }?>
			</select>
			<input type="date" id="tanggal_berangkat" name="tanggal_berangkat">

		</form>

	</div>

	

	<script src="<?php echo base_url() ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url() ?>styles/bootstrap4/popper.js"></script>
	<script src="<?php echo base_url() ?>styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?php echo base_url() ?>plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url() ?>plugins/scrollTo/jquery.scrollTo.min.js"></script>
	<script src="<?php echo base_url() ?>plugins/easing/easing.js"></script>
	<script src="<?php echo base_url() ?>plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?php echo base_url() ?>js/custom.js"></script>
</body>
</html>