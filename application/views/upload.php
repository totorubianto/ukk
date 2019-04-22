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
	<section class="hero background3 is-medium  absolute">
		<div class="hero-body">
			<div class="container"></div>
		</div>
	</section>
	<?php $rute=$data3->row() ?>
	<div class="container    relative">
		<div class="padding-30 background-white card">
			<div class="row">
				<div class="col-md-2 background-white">

					<img class="width100" src=" <?php echo base_url() ?>assets/img/vendor/<?php echo $rute->img ?> ">
				</div>
				<div class="col-md-10">

					<p class="title is-5 "><?php echo $rute->nama_type ?></p>
					<p class="subtitle is-6"><?php echo $rute->rute_awal ?> (<?php echo $rute->bandara_rute_awal ?>) -> 
						<?php echo $rute->rute_akhir ?> (<?php echo $rute->bandara_rute_akhir ?>)</p>

						<div class="row">
							<div class="col-md-4">
								<p class="subtitle is-6">Type <?php echo $rute->keterangan ?></p>
							</div>
							<div class="col-md-4">
								<p class="subtitle is-6"><?php echo $rute->jam ?></p>
							</div>
							<div class="col-md-4">
								<p class="subtitle is-6">Harga Rp.<?php echo $rute->harga_transportasi ?></p>
							</div>
						</div>


					</div>
				</div>
			</div>



		</div>

		<div class="container">
			<div class="row padding-top-30 ">
				<div class="col-md-7 margin-top-30">
					<div class="card padding-30">
						<div class="badge padding-10 ">Kode Booking : <?php echo $this->uri->segment(3) ?></div>
						<?php $i=1; ?>
						<?php foreach ($data2->result() as $key ) { ?>
							<div class="margin-bottom-30">
								<p class="title ">Penumpang Ke <?php echo $i++?></p>
								<p class=" is-6">Nama : <?php echo $key->nama_penumpang; ?></p>
								<p class=" is-6">Alamat : <?php echo $key->alamat; ?></p>
								<p class=" is-6">Phone : <?php echo $key->phone; ?></p>
								<p class=" is-6">Email : <?php echo $key->email; ?></p>
								<p class=" is-6">Jenis Kelamin : 
									<?php if ($key->gender==1) {
										echo "laki-laki";
									} else {
										echo "Perempuan";
									}
									?>
								</p>
							</div>

						<?php } ?>

					</div>
				</div>

				<div class="col-md-5">
					<div class="margin-top-30 card padding-30">
						<p class="title is-5">Summary</p>
						<table>
							<tr>
								<td>Harga Tiket</td>
								<td>:</td>
								<td>4.000.000</td>
							</tr>
							<tr>
								<td>Jumlah Penumpang</td>
								<td>:</td>
								<td>2</td>
							</tr>
							<tr class="">
								<td class="color-orange">Total Harga</td>
								<td class="color-orange">:</td>
								<td class="color-orange">5.000.000</td>
							</tr>
						</table>
					</div>

					<div class="card padding-30 margin-top-30">
						<?php echo form_open_multipart(base_url().'pemesanan/uploadBukti/'.$this->uri->segment(3));?>
						<?php $result=$data->row() ?>
						<p class="title is-5">Kirim Bukti</p>
						<p class="title is-6">
							Your Booking successfull, to finish your payment, please transfer your money to :
						</p>
						<table>
							<tr>
								<td>Mandiri</td>
								<td>:</td>
								<td>9000 0267 1828</td>
							</tr>
							<tr>
								<td>BCA</td>
								<td>:</td>
								<td>9872 1231 1231</td>
							</tr>
							<tr>
								<td>BRI</td>
								<td>:</td>
								<td>5671 1282 9271</td>
							</tr>
						</table>
						<p class="title is-6 margin-top-30">Upload your proof of payment</p>


						<?php if (!empty($result->bukti)) {?>
							<img class="width100" src="<?php echo base_url() ?>assets/img/bukti/<?php echo $result->bukti ?>">
							<p>Menunggu Konfirmasi</p>

						<?php } else { ?>
							<div class="file has-name is-boxed width100">
								<label class="file-label width100">
									<input class="file-input width100" type="file" name="bukti">
									<span class="file-cta width100">
										<span class="file-icon width100">
											<i class="fas fa-upload width100"></i>
										</span>
										<span class="file-label ">
											Choose a file…
										</span>
									</span>
									<span class="file-name max-size width100">
										Kirimkan bukti dan tunggu confirmasi
									</span>
								</label>
							</div>
							
							<input class="margin-top-30 button is-universal width100 is-primary" type="submit" name="submit">
						<?php }?>


						<?php echo form_close(); ?> 
					</div>
				</div>
			</div>
		</div>

	</body>
	</html>