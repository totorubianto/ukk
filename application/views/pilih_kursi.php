<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css">
 

    <form method="post" action="<?php echo base_url() ?>pemesanan/addDataPesan/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php   echo $this->uri->segment(5); ?>/<?php   echo $this->uri->segment(6); ?>/<?php echo $this->uri->segment(7); ?>"  >  
        <?php print("<pre>".print_r($pemesanan->result(),true)."</pre>"); ?>

        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <ol class="seats">

                        <?php
                        $toto=$transportasi->row();
                        $totos=$pemesanan->result_array();


                        
                        $numbers = array(6, 9, 2, 22, 11,25,69,47);
                        $jumlah_seat = $toto->jumlah_kursi;


                        for ($i=1; $i <= $jumlah_seat; $i++) { 
                            if (empty($totos)) { ?>
                             <li class="seat">
                                <input role="input-passenger-seat" name="kode_kursi" id="<?php echo $i; ?>" value="<?php echo $i; ?>"
                                required="" type="radio">
                                <label for="<?php echo $i; ?>">
                                    <?php echo $i; ?> </label>
                                </li>
                            <?php  } else {
                                foreach ($pemesanan->result() as $key => $value) {
                                    if(array_search($i, array_column($totos, 'kode_kursi')) !== false) { ?>
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
                                                <input role="input-passenger-seat" name="kode_kursi" id="<?php echo $i; ?>" value="<?php echo $i; ?>" required="" type="radio">
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
                        <input type="text" name="aaa">
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </form>






    </body>
    </html>