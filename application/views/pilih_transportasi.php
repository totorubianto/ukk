
    <section class="hero is-info">
      <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Keberangkatan
            </h1>
            
        </div>
    </div>
</section>
<div class="container padding-atas-bawah">
    <h1 class="title is-5">
        <span><i class="fas fa-plane-departure"></i></span>
        Pilih Rute
    </h1>
    <h2 class="subtitle is-6">
     <?php $rutes = $rute->row() ?>

     <?php echo $rutes->rute_awal ?>(<?php echo $rutes->bandara_rute_awal; ?>) -> <?php echo $rutes->rute_akhir ?>(<?php echo $rutes->bandara_rute_akhir; ?>) | <?php echo $tanggal_berangkat; ?>
 </h2>
</div>
<div class="section background-blue">
    <div class="container ">
        <?php if (!empty($transportasi->result())) { ?>
            <?php foreach ($transportasi->result() as $row): ?>
               <div class="card margin-bottom-20">
                <div class="row">
                    <div class="col-md-2 padding-30 center">
                        <img class="width100" src="<?php echo base_url() ?>assets/img/vendor/<?php echo $row->img ?>">
                    </div>
                    <div class="col-md-10">
                        <div class="padding-30">
                            <div class="space-bethwen">
                                <h1 class="title is-4"><?php echo $row->nama_type ?></h1>
                                <span class="tag is-medium">
                                    <?php 
                                    echo "Rp." . strrev(implode('.', str_split(strrev(strval($row->harga_transportasi)), 3)));
                                    ?>
                                </div>


                                <div class="row">
                                    <div class="col-md-2">
                                        <?php echo date('g:ia', strtotime($row->jam)); ?>
                                        <p class="title is-5"><?php echo $rutes->rute_awal ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <?php 
                                        $timestamp = strtotime($row->jam) + 60*60*5;

                                        $time = date('g:ia', $timestamp);

                                        echo $time;
                                        ?>
                                        <p class="title is-5"><?php echo $rutes->rute_akhir ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="">5 Jam</p>
                                        <p class="">Direct</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><?php echo $row->keterangan ?></p>

                                        Kursi <?php echo $row->jumlah_kursi ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2">

                                     <a class="button width100 is-info" href="<?php echo base_url() ?>pemesanan/getConsumer/<?php echo $row->id_rute ?>/<?php echo $tempat_pemesanan; ?>/<?php echo $row->hari ?>/<?php echo $jumlah_pemesanan; ?>">pesan</a>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>

         <?php endforeach; ?>
     <?php } else { ?>
        <div class="container center direction-column">
            <div>
                <img width="250px" src="<?php echo base_url() ?>assets/img/empty.svg">
            </div>
            <p class="subtitle margin-top-30">Tidak di temukan data</p>
            <div><a class="button is-primary is-outlined" href="">Cari Rute Lainnya</a></div>
        </div>

    <?php }?>

</div>
</div>
</body>
</html>