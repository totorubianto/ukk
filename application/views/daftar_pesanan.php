<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>
		<?php foreach ($daftarPemesanan->result() as $key) { ?>
			<?php echo $key->tanggal_berangkat; ?>
			<?php if ($key->status==1) {
				echo "Paid";
			}else{
				echo "bayar woy";
			}  ?>
			<?php if ($key->status==1) { ?>
				<a class="button is-primary" href="">Lihat Etiket</a><br>
			<?php  }else{ ?>
				<a class="button is-primary" href="<?php echo base_url();?>pemesanan/upload/<?php echo $key->kode_pemesanan ?>">Upload Bukti</a><br>
			<?php }  ?>
			
		<?php  } ?>
	</h1>
</body>
</html>
