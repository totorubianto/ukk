<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">

            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    <img src="<?php echo base_url() ?>assets/img/logo.png" >
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        Home
                    </a>

                    <a href="<?php echo base_url('pemesanan/daftarpemesanan'); ?>" class="navbar-item">
                        Pemesanan
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                About
                            </a>
                            <a class="navbar-item">
                                Jobs
                            </a>
                            <a class="navbar-item">
                                Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <?php
                        if (!empty($this->session->userdata('nama'))) {?>
                            <div class="buttons">
                                <a href="<?php echo base_url('auth/logout'); ?>" class="button is-light">
                                    <?php echo $this->session->userdata('nama'); ?>
                                </a>
                            </div>
                        <?php } else {?>
                            <a class="button is-primary">
                                <strong>Sign up</strong>
                            </a>
                            <a href="<?php echo base_url('auth/login'); ?>" class="button is-light">
                                Log in
                            </a>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <form class="margin-top-30" method="post" action="<?php echo base_url() ?>pemesanan/addDataPesan/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5); ?>/<?php   echo $this->uri->segment(6); ?>/<?php echo $this->uri->segment(7); ?>"  >  

        <section class="hero is-primary">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Pilih Kursi
            </h1>
            <h2 class="subtitle">
                
                <?php $i = 0; ?>

                <table>
                    <?php foreach ($data_form as $value) : ?>
                        <?php $i++; ?>
                        <tr>
                            <td>
                                <div onclick="pget(this.id)" id="p<?php echo $i ?>" class="customer-color id-p"></div>
                            </td>
                            <td><?php echo $value ?></td>
                            <td>
                                <input name="seat[]" class="form-control" id="i<?php echo $i ?>" type="text">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </h2>
        </div>
    </div>
</section>


<!-- <?php print("<pre>".print_r($transportasi->result(),true)."</pre>"); ?> -->

<div class="container">


    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <?php 
            $toto=$transportasi->row();
            $totos=$pemesanan->result_array();
            $jumlah_seat = $toto->jumlah_kursi;
            ?>
            <ol class="seats">

                <?php
                for ($i=1; $i <= $jumlah_seat; $i++) { 
                    if (empty($totos)) { ?>
                       <li class="seat">
                         <div onclick="sget(this.id)" id="<?php echo $i ?>" class="seat-id">
                            <p><?php echo $i ?></p>
                        </div>
                    </li>
                <?php  } else {
                    foreach ($pemesanan->result() as $key => $value) {
                        if(array_search($i, array_column($totos, 'kode_kursi')) !== false) { ?>
                            <li class="seat">
                             <div id="<?php echo $i ?>" class="seat-id seat-notavailabe">
                             </li>
                             <?php
                             break;  
                         }else { ?>
                            <li class="seat">
                              <div onclick="sget(this.id)" id="<?php echo $i ?>" class="seat-id">
                                <p><?php echo $i ?></p>
                            </div>
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

<input type="hidden" name="harga" value="<?php echo $toto->harga_transportasi ?>">
<input type="hidden" name="tanggal" value="<?php echo $toto->hari ?>">
<input type="hidden" name="jam" value="<?php echo $toto->jam ?>">
<input type="submit" name="submit">
</form>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
<script>
    function pget(id) {
        seat.p = id;
        $('.customer-color').removeClass("customer-selected");
        $('#' + id).addClass("customer-selected");
    }

    function sget(id) {
        seat.selectSeat(id);
    }

    var seat = {
        p: '',
        pn: function (id) {
            pn = id.replace('p', '');
            return pn;
        },
        selectSeat: function (id) {
            if ($('#' + id).attr('class') == 'seat-id') {

                if ($('#i' + this.pn(this.p)).val() == '') {
                    $('#' + id).addClass("seat-selected");
                    console.log(this.pn(this.p));
                    $('#i' + this.pn(this.p)).val(id);
                    $('#' + id).addClass('seat-for-' + this.p);
                }


            } else {
                cSeat = $('#' + id).attr('class');
                cSeatoc = cSeat.replace('seat-id seat-selected seat-for-p', '');
                $('#' + id).removeClass("seat-selected");
                $('#' + id).removeClass(cSeat.replace('seat-id ', ''));
                $('#i' + cSeatoc).val('');


            }
                    //    console.log($('#'+id).attr('class'));
                }
            }

        </script>

    </body>
    </html>