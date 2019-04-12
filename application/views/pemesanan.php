<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
    <form method="post" action="<?php echo base_url() ?>pemesanan/getPesawat/">
        <input name="kode_pemesanan" type="hidden" value="<?php echo uniqid() ?>">  
        <input name="tempat_pemesanan" type="text" placeholder="tempat pemesanan">  
        <select name="rute_awal">                      
            <?php 
            foreach ($rute_awal->result() as $rute_awal) { ?>
                <option value="<?php echo $rute_awal->id_kota ?>"><?php echo $rute_awal->nama_kota ?></option>
            <?php }?>
        </select>
        <select name="rute_akhir">                      
            <?php 
            foreach ($rute_akhir->result() as $rute_akhir) { ?>
                <option value="<?php echo $rute_akhir->id_kota ?>"><?php echo $rute_akhir->nama_kota ?></option>
            <?php }?>
        </select>
        <input type="date" id="tanggal_berangkat" name="tanggal_berangkat">
        
    </form>
    
</body>
</html>