

	<section class="hero is-fullheight is-background">
		<div class="hero-body">
			<div class="container">
				<div class="background-white padding-30 border-radius">
					<form method="post" action="<?php echo base_url() ?>pemesanan/getPesawat/">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<?php echo validation_errors(); ?>
						</div>
						<div class="col-md-1"></div>
					</div>
					<div class="row">
						<div class="col-md-2">
								<p class="title is-5 is-black">Passanger</p>
							<input class="input" type="number" name="jumlah_pemesanan" value="1">
						</div>
						<div class="col-md-2">
							<p class="title is-5 is-black">Depature</p>
							<div class="select width100">
								<select class="width100" name="rute_awal">                      
									<?php 
									foreach ($rute_awal->result() as $rute_awal) { ?>
										<option value="<?php echo $rute_awal->id_kota ?>"><?php echo $rute_awal->nama_kota ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<p class="title is-5 is-black">Arival</p>
							<div class="select width100">
								<select class="width100" name="rute_akhir">                      
									<?php 
									foreach ($rute_akhir->result() as $rute_akhir) { ?>
										<option value="<?php echo $rute_akhir->id_kota ?>"><?php echo $rute_akhir->nama_kota ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<p class="title is-5 is-black">Class</p>
							<div class="select width100">
								<select class="width100" name="tempat_pemesanan">
									<option>Ekonomi</option>
									<option>Eksekutif</option>
								</select>
							</div>

						</div>
						<div class="col-md-2">
							<p class="title is-5 is-black">Date</p>
							<input class="input" type="date" id="tanggal_berangkat" name="tanggal_berangkat">
						</div>
						<div class="col-md-2">
							<input class="button width100 height100 is-info" value="Cari" type="submit" name="">
						</div>
						
					</div>


					

				</form>
				</div>


			</div>
		</div>
	</section>
	

	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>styles/bootstrap4/popper.js"></script>
	<script src="<?php echo base_url() ?>styles/bootstrap4/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="<?php echo base_url() ?>plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="<?php echo base_url() ?>plugins/scrollTo/jquery.scrollTo.min.js"></script>
	<script src="<?php echo base_url() ?>plugins/easing/easing.js"></script>
	<script src="<?php echo base_url() ?>plugins/parallax-js-master/parallax.min.js"></script>
	<script src="<?php echo base_url() ?>js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

  // Check for click events on the navbar burger icon
  	$(".navbar-burger").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");

  });
});
	</script>
</body>
</html>