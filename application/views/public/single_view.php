<div class="single info">
	<div class="single_kiri">
		<div class="produk">
			<h1><?php echo $view['nama_barang']; ?></h1>
			<div class="clear"></div>
			<div class="gambar">
				<img src="<?php echo base_url('/themes/img/'. $view['gambar_besar']);  ?>">
			</div>
			<div class="detail">
				<?php echo form_open('public/home/add_to_cart'); ?>
				<h2>Detail Produk :</h2>
				<ul class="detail_barang">
					<li>ID : <?php echo $view['id_barang']; ?></li>
					<li>Harga : Rp. <?php echo $view['harga']; ?></li>
					<li>Stok : <?php echo $view['stok']; ?></li>
					<li>Jumlah pesan : <input class="jum" type="text" name="jumlah" value="" /> </li><br />
					<li class="deskripsi">Deskripsi : </li>
					<p class="descript"><?php echo $view['deskripsi_barang']; ?></p>
				</ul>
				<input type="hidden" name="id_barang" value="<?php echo $view['id_barang']; ?>"/>
				<input class="tombol" type="submit" value="Keranjang" name="cart" action="public/home/add_to_cart" />
				<input class="tombol" type="submit" value="Beli" />
				<?php echo form_close(); ?>
			</div>
		</div>
		<?php $this->load->view('public/side_kanan'); ?>
		<div class="clear"></div>
		<div class="product info">
			<h2>Produk </h2>
			<div class="barang">
				<?php foreach ($list as $key) {  ?>
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
						<h3><a href="<?php echo site_url('public/home/single/'.$key['id_barang'].'/'.$lower_link);  ?>" title=""><?php echo $key['nama_barang']; ?></a></h3>
						<span>stok brang : <?php echo $key['stok']; ?></span><br/>
						<span class="harga">harga : Rp <?php echo $key['harga']; ?>,-</span>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>