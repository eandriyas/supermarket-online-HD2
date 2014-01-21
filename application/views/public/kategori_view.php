	
<div class="product info">
<h1>Barang dengan kategori <?php echo $kat['kategori']; ?>	</h1>	
	<div class="barang"><?php foreach ($barang_per_kategori as $key) { ?>
		<?php 
				//merubah spasi menjadi -
		$lower=  str_replace(" ", "-", $key['nama_barang']);
				//merubah nama file menjadi lowercase
		$lower_link = strtolower($lower);
		?>	
		<div class="item">
			<img class="item_img" src="<?php echo base_url('/themes/img/'. $key['gambar_besar']);  ?>">
			<div class="det_item">
				<a href="" title=""></a>
				<h3><a href="<?php echo site_url('public/home/single/'.$key['id_barang'].'/'.$lower_link); ?>" title=""><?php echo $key['nama_barang']; ?></a></h3>
				<span>stok brang : <?php echo $key['stok']; ?></span><br/>
				<span class="harga">harga : Rp <?php echo $key['harga']; ?>,-</span>
			</div>
		</div>
		<?php } ?>
	</div>
</div>	




