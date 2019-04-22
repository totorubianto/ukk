<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">

</head>
<body>

	
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">

            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
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
    <section class="hero is-primary">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Isi Data Anda
        </h1>
        <h2 class="subtitle">
            Isi!!!!!!!!!!!!!!!!
        </h2>
    </div>
</div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <form method="post" action="<?php echo base_url() ?>pemesanan/getKursi/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php   echo $this->uri->segment(5); ?>/<?php echo $this->uri->segment(6); ?>">
                <input name="kode_pemesanan" type="hidden" value="<?php echo uniqid() ?>">  
                <?php for ($i=0; $i < $this->uri->segment(6); ) { ?>
                    Penumpang <?php echo $i++ ?><br>
                    <input type="text" name="nama_pelanggan[]" placeholder="nama"> <br>
                    <input type="text" name="alamat[]" placeholder="alamat"> <br>
                    <input type="text" name="phone[]" placeholder="phone"> <br>
                    <input type="text" name="email[]" placeholder="email"> <br>
                    <input type="text" name="gender[]" placeholder="gender"> <br>
                <?php } ?>
                <input type="submit" name="">
            </form>
          
        </div>
        <div class="col-md-5">
            <div class="card padding-30 margin-top-30">
                asda    
            </div>
        </div>
    </div>
</div>







</body>
</html>