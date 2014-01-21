
<div class="login info">
	<h1>Terima kasih sudah melakukan pembelian di sistem kami</h1>
	<h2>Silahkan melakukan pembayaran ke rekening dibawah ini :</h2>
	<p>Id order anda adalah : <strong><?php echo $bayar['id_order']; ?></strong></p>	
	<p>Total pembayaran senilai <strong>Rp. <?php echo number_format($bayar['bayar'], 2);  ?></strong></p>	
	<div class="daftkiri">
	<a href="<?php echo site_url(); ?>pelanggan/login/logout" title=""><input class="tombol" type="button" value="Logout" /></a>
	
	</div>
	
</div>