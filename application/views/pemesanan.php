<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
    


    <?php foreach ($rutes->result() as $row): ?>
        <?php echo $row->tujuan ?>

    <?php endforeach; ?>
    <form method="post" action="<?php echo base_url() ?>pemesanan/getPesawat/">
        <!-- <form method="post" action="<?php echo base_url() ?>pemesan an/addPemesanan"> -->
            <input name="kode_pemesanan" type="hidden" value="<?php echo uniqid() ?>">   <!-- Kode pemesanan -->
            <input name="tempat_pemesanan" type="text" placeholder="tempat pemesanan">   <!-- Tempat Pemesanan -->


            <!-- data penumpang-->

            <!-- -->

            <select name="rute_awal">                      <!----------------------------------------------------------- rute awal -->
                <?php 
                foreach ($rute_awal->result() as $rute_awal) { ?>
                    <option value="<?php echo $rute_awal->id_kota ?>"><?php echo $rute_awal->nama_kota ?></option>
                <?php }?>

            </select>

            <select name="rute_akhir">                      <!---------------------------------------------------------- rute akhir -->
               <?php 
                foreach ($rute_akhir->result() as $rute_akhir) { ?>
                    <option value="<?php echo $rute_akhir->id_kota ?>"><?php echo $rute_akhir->nama_kota ?></option>
                <?php }?>

            </select>



            <input type="date" name="tanggal_berangkat">
            <input type="time" name="jam_cekin">
            <input type="time" name="jam_berangkat">













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