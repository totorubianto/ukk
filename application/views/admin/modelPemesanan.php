
<?php echo $reservation['kode_pemesanan'] ?>


<form method="post" action="<?php echo base_url() ?>admin/editStatusPemesanan/<?php echo $reservation['id_pemesanan'] ?>">
	<img width="100%" src="<?php echo base_url() ?>assets/img/bukti/<?php echo $reservation['bukti'] ?>">



	<br>
	<br>
	<div class="form-group">
		<label>Approve Pembayaran</label>
		<select name="status" class="form-control">
			<option value="1">Sudah Bayar</option>
			<option value="0">Belum Bayar</option>
		</select>
	</div>
	<div class="form-group">
		<input class="btn btn-info" type="submit" name="">
	</div>

</form>