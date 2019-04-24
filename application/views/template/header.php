<!DOCTYPE html>
<html lang="en">
<head>
	<title>Travello</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Travello template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bulma.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body>
	<nav class="navbar" role="navigation" aria-label="main navigation">
		<div class="container">

			<div class="navbar-brand">
				<a class="navbar-item" href="<?php echo base_url() ?>">
					<img src="<?php echo base_url() ?>assets/img/logo.png" >
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