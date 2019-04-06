<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="<?php echo base_url() ?>admin/addRute/">
		<table>
			<tr>
				<td>Kota Asal</td>
				<td>:</td>
				<td>
					<select name="rute_awal">
						<?php foreach ($kota->result() as $city) { ?>
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
						<?php foreach ($kota->result() as $city) { ?>
							<option value="<?php echo $city->id_kota; ?>"><?php echo $city->nama_kota; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><b>Transportasi</b></td>
			</tr>
			<tr>
				<td>Kode</td>
				<td>:</td>
				<td>
					<input type="text" name="kode">
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
		</table>
			<input type="submit" name="aa">
	</form>
</body>
</html>