<div class="panel_admin tengah">
	<h2>Selamat datang di panel admin</h2>
	<div class="bar_menu">
		<?php $this->load->view('admin/welcome_admin'); ?>
		<div class="clear">
			
		</div>
		<h1>list barang</h1>
		<?php foreach ($view as $key) {  ?>
		<div class="item">
			<a href="<?php echo site_url('admin/admin/edit_barang/'.$key['id_barang']); ?>"><input class="tomb" type="submit" value="Edit"></a>
			<form action="<?php echo site_url('admin/admin/delete_barang/'.$key['id_barang']); ?>">
				<input class="tomb" type="submit" value="Delete" onclick="return confirm('Yakin hapus barang <?php echo $key['nama_barang']; ?>?')" />
			</form>
			
			<img class="item_img" src="<?php echo base_url('/themes/img/'. $key['gambar_besar']);  ?>">
			<div class="det_item">
				<a href="" title=""></a>
				<h3><a href="<?php echo site_url('public/home/single/'.$key['id_barang'].'/'.$key['nama_barang']); ?>" title=""><?php echo $key['nama_barang']; ?></a></h3>
				<span>stok brang : <?php echo $key['stok']; ?></span><br/>
				<span class="harga">harga : Rp <?php echo $key['harga']; ?>,-</span>
				
			</div>
		</div>
		<?php } ?>

	</div>
