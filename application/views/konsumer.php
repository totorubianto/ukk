
    
    <section class="hero is-info">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Isi Data Anda
        </h1>
        <h2 class="subtitle">
            untuk pengecekan dibutuhkan data yang valid
             <?php echo validation_errors(); ?>
        </h2>
    </div>
</div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <form method="post" action="<?php echo base_url() ?>pemesanan/getKursi/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php   echo $this->uri->segment(5); ?>/<?php echo $this->uri->segment(6); ?>">
                <input name="kode_pemesanan" type="hidden" value="<?php echo 'ULUM' . mt_rand(100, 300) ?>">  


                <?php for ($i=0; $i < $this->uri->segment(6); ) { ?>
                    <div class="card padding-30 margin-top-30 margin-bottom-30">
                        <p>Penumpang <?php echo $i++ +1 ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="field">
                                  <label class="label">Nama</label>
                                  <div class="control">
                                     <input class="input" type="text" name="nama_pelanggan[]" placeholder="nama">
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                            <div class="field">
                              <label class="label">Alamat</label>
                              <div class="control">
                                  <input class="input" type="text" name="alamat[]" placeholder="alamat"> 
                              </div>
                          </div>
                      </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6">
                        <div class="field">
                          <label class="label">Phone</label>
                          <div class="control">
                           <input class="input" type="text" name="phone[]" placeholder="phone">
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                <div class="field">
                  <label class="label">Email</label>
                  <div class="control">
                      <input class="input" type="text" name="email[]" placeholder="email">
                  </div>
              </div>
          </div>
      </div>


      <div class="field">
          <label class="label">Gender</label>
          <div class="control">
            <select name="gender[]" class="input">
              <option value="1">Laki - Laki</option>
              <option value="0">Perempuan</option>
              
            </select>
          </div>
      </div>
  </div>
<?php } ?>
<input class="button is-info is-fullwidth margin-bottom-30" type="submit" name="">
</form>

</div>
<div class="col-md-5">
    <div class="card padding-30 margin-top-30">

        <?php $data=$pemesanan->row_array() ?>
        <p class="title is-4">Pesawat <?php echo $data['nama_type'] ?></p>
        <p class="subtitle is-6"><?php echo $data['bandara_rute_awal'] ?> -> <?php echo $data['bandara_rute_akhir'] ?></p>
        <table>
            <tr>
                <td>Harga</td>
                <td>=</td>
                <td>
                    <?php echo "Rp." . strrev(implode('.', str_split(strrev(strval($data['harga_transportasi'])), 3))) ?>
                    
            </tr>
            <tr>
                <td>Total Penumpang</td>
                <td>=</td>
                <td><?php echo $this->uri->segment(6) ?> Orang</td>
            </tr>
            <tr>
                <td>Jumlah Harga</td>
                <td>=</td>
                <td>
                    <?php echo "Rp." . strrev(implode('.', str_split(strrev(strval($data['harga_transportasi'] * $this->uri->segment(6) +mt_rand(100, 300))), 3))) ?>
            </tr>
        </table>
        <p></p>
    </div>
</div>
</div>
</div>







</body>
</html>