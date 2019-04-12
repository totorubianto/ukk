<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<form method="post" action="<?php echo base_url() ?>admin/addRute/">
					<table>
						<tr>
							<td>Kota Asal</td>
							<td>:</td>
							<td>
								<select name="rute_awal">
									<?php foreach ($rute_awal->result() as $city) { ?>
										<option value="<?php echo $city->id_kota; ?>"><?php echo $city->nama_kota; ?></option>
									<?php } ?>

								</select>
							</td>
						</tr>
						<tr>
							<td>Kota Akhir</td>
							<td>:</td>
							<td>
								<select name="rute_akhir">
									<?php foreach ($rute_akhir->result() as $city) { ?>
										<option value="<?php echo $city->id_kota; ?>"><?php echo $city->nama_kota; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td><b>Transportasi</b></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input name="kode" type="hidden" value="<?php echo uniqid() ?>">  
							</td>
						</tr>
						<tr>
							<td>Jumlah Kursi</td>
							<td>:</td>
							<td>
								<input type="number" name="jumlah_kursi">
							</td>
						</tr>
						<tr>
							<td><b>Type Transportasi</b></td>
						</tr>
						<tr>
							<td>Nama type</td>
							<td>:</td>
							<td>
								<input type="text" name="nama_type">
							</td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td>
								<input type="text" name="keterangan">
							</td>
						</tr>
						<tr>
							<td>harga</td>
							<td>:</td>
							<td>
								<input type="number" name="harga">
							</td>
						</tr>
						<tr>
							<td>date</td>
							<td>:</td>
							<td>
								<input type="date" name="date">
							</td>
						</tr>
						<tr>
							<td>jam</td>
							<td>:</td>
							<td>
								<input type="time" name="jam">
							</td>
						</tr>
					</table>
					<input type="submit" name="aa">
				</form>
			</div>
			<div class="col-md-4">
				<h1>Daftar Rute</h1>
				
				<?php print("<pre>".print_r($rute->result(),true)."</pre>"); ?>
				
			</div>
			<div class="col-md-4">
				<h1>Daftar Rute</h1>
				<form method="post" action="<?php echo base_url().'/admin/index/' ?>">
					<div style="margin-bottom: 20px;">
						<select name="cari_rute_awal">
							<?php foreach ($rute_awal->result() as $city) { ?>
								<option value="<?php echo $city->id_kota; ?>"><?php echo $city->nama_kota; ?></option>
							<?php } ?>
						</select>
						<select name="cari_rute_akhir">
							<?php foreach ($rute_akhir->result() as $city) { ?>
								<option value="<?php echo $city->id_kota; ?>"><?php echo $city->nama_kota; ?></option>
							<?php } ?>
						</select>
						<input type="submit" name="">
					</div>
					<table border="1">
						<tr>
							<td><b>id</b></td>
							<td><b>Rute_Awal</b></td>
							<td><b>Rute_Akhir</b></td>
							<td><b>Tanggal</b></td>
							<td><b>jam</b></td>
						</tr>
						<?php foreach ($rute->result() as $key) { ?>
							<tr>
								<td><?php echo $key->id_rute ?></td>
								<td><?php echo $key->rute_awal ?></td>
								<td><?php echo $key->rute_akhir ?></td>
								<td><?php echo $key->hari ?></td>
								<td><?php echo $key->jam ?></td>
								<td><?php echo $key->nama_type ?></td>
							</tr>
						<?php } ?>

					</table>
				</form>
				
			</div>
		</div>
	</div>
</body>
</html>