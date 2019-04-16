<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo form_open_multipart(base_url().'pemesanan/uploadBukti/'.$this->uri->segment(3));?>

		<input type="file" name="bukti">
		<input type="submit" name="submit">

	          <?php
    echo form_close();
    ?> 
</body>
</html>