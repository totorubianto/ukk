
	<section class="hero background3 is-medium  absolute">
		<div class="hero-body">
			<div class="container"></div>
		</div>
	</section>
	<?php $rute=$data3->row() ?>
	<div class="container relative">
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
								<p class="subtitle is-6">Harga <?php echo "Rp." . strrev(implode('.', str_split(strrev(strval($rute->harga_transportasi)), 3))) . ',-'?></p>
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
								<td>
									<?php echo "Rp." . strrev(implode('.', str_split(strrev(strval($rute->harga_transportasi)), 3)))  . ',-'?>

									
								</tr>
								<tr>
									<td>Jumlah Penumpang</td>
									<td>:</td>
									<td><?php echo count($data2->result()) . ' Penumpang' ?></td>
								</tr>
								<tr class="">
									<td class="color-orange">Total Harga</td>
									<td class="color-orange">:</td>
									<td class="color-orange">
										<?php
										$kalimat =  $this->uri->segment(3);
										$kode = substr($kalimat,4);

// 456789
										?>
										<?php echo "Rp." . strrev(implode('.', str_split(strrev(strval($rute->harga_transportasi * count($data2->result())+ $kode)), 3))) . ',-' ?>
									</td>
								</tr>
							</table>
						</div>
						<?php $result=$data->row() ?>
<?php if ($result->status==1) { ?>
	<div class="card padding-30 margin-top-30">
		<h1 class="title color-orange">
			Terbayar
		</h1>
	</div>

<?php } else { ?>
	<div class="card padding-30 margin-top-30">
							<?php echo form_open_multipart(base_url().'pemesanan/uploadBukti/'.$this->uri->segment(3));?>
							
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

<?php }?>
						
					</div>
				</div>
			</div>

		</body>
		</html>