<div class="panel_admin tengah">
	<h2>Input Data Barang</h2>
	<div class="bar_menu">
		<?php $this->load->view('admin/welcome_admin'); ?>
		<div class="clear"></div>
		<div class="brg">
			<form action="<?php echo site_url('admin/admin/'.'edit_barang_by_id'); ?>" id='form' enctype="multipart/form-data" method="post" accept-charset="utf-8">	  
				<fieldset id="personal">	
					<legend> EDIT DATA BARANG</legend>
					<label>Kode&nbsp;Kategori</label> 
					<select name="id_kategori" class="required">
						<?php foreach ($kat as $key) {
							?>

							<option value='<?php echo $key['id_kategori']; ?>'><?php echo $key['kategori']; ?></option>


							<?php } ?>
						</select>		<br />
						<input name="id_barang" type="hidden" class="required" value="<?php echo $view['id_barang']; ?>"/>
						<label>Nama Barang</label>
						<input name="nama_barang" type="text" class="required" size="50" value="<?php echo $view['nama_barang']; ?>"/>		<br />
						<label>Harga</label>
						<input name="harga" type="text" size="10" value="<?php echo $view['harga']; ?>"/>,00 		<br />
						<label>Stok</label>
						<input name="stok" type="text" size="1" value="<?php echo $view['stok']; ?>"/> pcs 		<br />
						<label>Foto</label>
						<input name="gambar_besar" type="file" value="<?php echo $view['gambar_besar'];  ?>"/>
						<br />
						<label>Keterangan</label>
						<textarea name="deskripsi" value=""><?php echo $view['deskripsi_barang']; ?></textarea>
						<img class="imgedit" src="<?php echo base_url('themes/img/' . $view['gambar_besar']); ?>" alt="" style="width: 200px;" />
					</fieldset>
					
					<div align="center">
						<input class="pencet" type="submit" value="Edit" action="" />
						<input class="pencet" type="button" value="Batal" />
					</div>
				</form>
			</div>
		</div>