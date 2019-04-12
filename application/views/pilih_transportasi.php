<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
	<form method="post" action="<?php echo base_url() ?>pemesanan/getPesawat">
			<input name="kode_pemesanan" type="hidden" value="<?php echo $kode_pemesanan; ?>">  
			<input name="tempat_pemesanan" type="text" value="<?php echo $tempat_pemesanan; ?>" placeholder="tempat pemesanan">  
			<select name="rute_awal" disabled>                      
					<option value="<?php echo $rute_awal; ?>"><?php echo $rute_awal; ?></option>
			</select>

			<select name="rute_akhir" disabled>                      <!---------------------------------------------------------- rute akhir -->
				<option value="<?php echo $rute_akhir; ?>"><?php echo $rute_akhir; ?></option>
			</select>



			<input disabled type="date" value="<?php echo $tanggal_berangkat; ?>" name="tanggal_berangkat">
		

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
    				<a href="<?php echo base_url() ?>pemesanan/getKursi/<?php echo $row->id_rute ?>/<?php echo $kode_pemesanan; ?>/<?php echo $tempat_pemesanan; ?>/<?php echo $row->hari ?>">pesan</a>
    			</div>

    		<?php endforeach; ?>

    	</form>
    </body>
    </html>