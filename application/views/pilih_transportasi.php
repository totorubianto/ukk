<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">

<?php if (empty($kode_pemesanan)) {
	 	redirect('pemesanan/','refresh'); 	
} else {
	echo "error";
}
 ?>

	<form method="post" action="<?php echo base_url() ?>pemesanan/getPesawat">
		<!-- <form method="post" action="<?php echo base_url() ?>pemesan an/addPemesanan"> -->
			<input name="kode_pemesanan" type="hidden" value="<?php echo $kode_pemesanan; ?>">   <!-- Kode pemesanan -->
			<input name="tempat_pemesanan" type="text" value="<?php echo $tempat_pemesanan; ?>" placeholder="tempat pemesanan">   <!-- Tempat Pemesanan -->


			<!-- data penumpang-->

			<!-- -->

		
			<select name="rute_awal" disabled>                      <!----------------------------------------------------------- rute awal -->
				
					<option value="<?php echo $rute_awal; ?>"><?php echo $rute_awal; ?></option>
			
			</select>

			<select name="rute_akhir" disabled>                      <!---------------------------------------------------------- rute akhir -->
				<option value="<?php echo $rute_akhir; ?>"><?php echo $rute_akhir; ?></option>
			</select>



			<input disabled type="date" value="<?php echo $tanggal_berangkat; ?>" name="tanggal_berangkat">
			<input disabled type="time" value="<?php echo $jam_cekin; ?>" name="jam_cekin">
			<input disabled type="time" value="<?php echo $jam_berangkat; ?>" name="jam_berangkat">



				
           <!--  <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <ol class="seats">
                        <?php
                        $toto=$transportasi->row();
                        $numbers = array(6, 9, 2, 22, 11,25,69,47);
                        $jumlah_seat = $toto->jumlah_kursi;


                        for ($i=1; $i <= $jumlah_seat; $i++) { 
                            if (empty($numbers)) {
                                echo "toto";
                            } else {
                                foreach ($numbers as $key) {
                                    if(in_array($i,$numbers)){?>
                                        <li class="seat">
                                            <input role="input-passenger-seat" name="kode_kursi" id="<?php echo $i; ?>" value="<?php echo $i; ?>"
                                            required="" type="radio" disabled>
                                            <label for="<?php echo $i; ?>">
                                                <?php echo $i; ?> </label>
                                            </li>
                                            <?php
                                            break;  
                                        }else { ?>
                                            <li class="seat">
                                                <input role="input-passenger-seat" name="kode_kursi" id="<?php echo $i; ?>" value="<?php echo $i; ?>"
                                                required="" type="radio">
                                                <label for="<?php echo $i; ?>"><?php echo $i; ?></label>
                                            </li>
                                            <?php
                                            break;
                                        }
                                    }
                                }
                            }
                            ?>
                        </ol>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div> -->

        </form>

    </body>
    </html>




    <!DOCTYPE html>
    <html>
    <head>
    	<title></title>
    </head>
    <body>
    	<form>


    		<h1>Pilih Pesawat</h1>
    		<?php print("<pre>".print_r($transportasi->result(),true)."</pre>"); ?>

    		<?php foreach ($transportasi->result() as $row): ?>
    			<div>
    				<?php echo $row->id_transportasi ?>
    				<?php echo $row->kode ?>
    				<?php echo $row->jumlah_kursi ?>
    				<?php echo $row->nama_type ?>
    				<?php echo $row->keterangan ?>
    				<?php echo $row->harga_transportasi ?>
    				<a href="<?php echo base_url() ?>pemesanan/getKursi/<?php echo $row->id_transportasi ?>/<?php echo $kode_pemesanan; ?>/<?php echo $tempat_pemesanan; ?>/<?php echo $rute_awal; ?>/<?php echo $rute_akhir; ?>
    					

    					">pesan</a>
    			</div>

    		<?php endforeach; ?>

    	</form>
    </body>
    </html>