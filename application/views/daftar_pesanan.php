


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
	


	<?php foreach ($daftarPemesanan->result() as $key) { ?>
		<div class="card margin-top-30 margin-bottom-30">
			<div class="row ">
				<div class="col-md-2 padding-30">
					<img width="100%" src="<?php echo base_url() ?>assets/img/vendor/<?php echo $key->img ?>">
				</div>
				<div class="col-md-8">
					<div class="padding-30 space-bethwen">
						<div>
							<p><?php echo $key->nama_type; ?></p>
							<p>
								<label><?php echo $key->rute_awal_kode; ?></label> -> <label><?php echo $key->rute_akhir_kode; ?></label>
							</p>
							 
							<?php if ($key->status==1) {
								echo "Paid";
							}else{
								echo "bayar woy";
							}  ?>
						</div>
						<div class="flex-end">
							<?php if ($key->status==1) { ?>
								<a class="button is-primary" href="<?php echo base_url();?>pemesanan/upload/<?php echo $key->kode_pemesanan ?>">Lihat Etiket</a><br>
							<?php  }else{ ?>
								<a class="button is-info" href="<?php echo base_url();?>pemesanan/upload/<?php echo $key->kode_pemesanan ?>">Upload Bukti</a><br>
							<?php  } ?>
						</div>

					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			
			
		</div>
	<?php }  ?>



</div>
</body>
</html>
