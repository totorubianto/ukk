
    <form class="margin-top-30" method="post" action="<?php echo base_url() ?>pemesanan/addDataPesan/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5); ?>/<?php   echo $this->uri->segment(6); ?>/<?php echo $this->uri->segment(7); ?>"  >  
        <section class="hero is-info">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Pilih Kursi
            </h1>
            <h2 class="subtitle">Pilih kursi sesuka hati anda :)</h2>
        </div>
    </div>
</section>
<div class="background-white">
    <div class="container padding-top-20 padding-bottom-20 display-flex">
        <?php $i = 0; ?>
        <?php foreach ($data_form as $value) : ?>
            <?php $i++; ?>      
            <div class="display-flex center padding-right-20">
                <div onclick="pget(this.id)" id="p<?php echo $i ?>" class="customer-color id-p"></div>
                <span class="padding-left-10"><?php echo $value ?></span>
            </div>
            
            <input name="seat[]" class="form-control" id="i<?php echo $i ?>" type="hidden" >
        <?php endforeach; ?>
        
    </div>
</div>


<!-- <?php print("<pre>".print_r($transportasi->result(),true)."</pre>"); ?> -->

<div class="container">


    <div class="row padding-top-30">
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

</div>
<div class="col-md-4"></div>
</div>
</div>

<input type="hidden" name="harga" value="<?php echo $toto->harga_transportasi ?>">
<input type="hidden" name="tanggal" value="<?php echo $toto->hari ?>">
<input type="hidden" name="jam" value="<?php echo $toto->jam ?>">
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <input class="button is-fullwidth margin-top-30 is-info is-universal margin-bottom-20" type="submit" name="submit">
        </div>
        <div class="col-md-4"></div>
    </div>
    
</div>

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