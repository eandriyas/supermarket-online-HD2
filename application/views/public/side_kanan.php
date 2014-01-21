<div class="side_kanan">
	<h3>Kategori : </h3>
	<ul class="cat">
		<?php foreach ($kategori as $ktg) {?>
		<li><a href="<?php echo site_url('public/home/kategori/'.$ktg['id_kategori'].'/'.$ktg['kategori']); ?>" title=""><?php echo $ktg['kategori']; ?></a></li>
		<?php } ?>				
	</ul>
</div>
<div class="side_kanan">
	<h3>Chart : </h3>
	<ul class="cat">
		<li>Jumlah Barang : <?php echo $this->cart->format_number($this->cart->total_items()); ?></li>
		<li style="height:50px;">Harga : Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></li>
		<li style="height:50px;">
			<form>
				<a class="tombol" href="<?php echo site_url(); ?>public/home/pelanggan" title="">Bayar</a>
				<a class="tombol" href="<?php echo site_url(); ?>public/home/destroy" title="">Reset</a>
			</form>
		</li>
	</ul>
</div>