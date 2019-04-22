<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bulma.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
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

					<a href="<?php echo base_url('pemesanan/daftarpemesanan'); ?>" class="navbar-item">
						Pemesanan
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
	<section class="hero is-info">
		<div class="hero-body">
			<div class="container">
				<h1 class="title">
					Daftar Pemesanan
				</h1>
				<h2 class="subtitle">
					Primary subtitle
				</h2>
			</div>
		</div>
	</section>
	<div class="container margin-top-60">
		 <?php print("<pre>".print_r($this->session->userdata('form_customer'),true)."</pre>"); ?> 
		
		
		<?php foreach ($daftarPemesanan->result() as $key) { ?>
			<div class="card space-bethwen padding-30 margin-top-30">
				<div>
					<?php echo $key->tanggal_berangkat; ?>
					<?php if ($key->status==1) {
						echo "Paid";
					}else{
						echo "bayar woy";
					}  ?>
				</div>
				<div>
					<?php if ($key->status==1) { ?>
						<a class="button is-primary" href="">Lihat Etiket</a><br>
					<?php  }else{ ?>
						<a class="button is-primary" href="<?php echo base_url();?>pemesanan/upload/<?php echo $key->kode_pemesanan ?>">Upload Bukti</a><br>
					<?php  } ?>
				</div>
			</div>
		<?php }  ?>


		
	</div>
</body>
</html>
