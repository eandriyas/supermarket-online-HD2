
<div class="panel_admin tengah">
	<h2>Input Data Barang</h2>
	<div class="bar_menu">
		<?php $this->load->view('admin/welcome_admin'); ?>
		<div class="clear">
		</div>
		<div class="brg">
			<form action="<?php echo site_url('/admin/admin/add_barang');?>" id='form' enctype="multipart/form-data" method="post" accept-charset="utf-8">	  <fieldset id="personal">
				
				<legend> TAMBAH DATA BARANG</legend>
				<label>Kode&nbsp;Kategori</label> 
				<select name="kategori" class="required">
					<?php foreach ($kat as $key) {
						?>
						
						<option value='<?php echo $key['id_kategori']; ?>'><?php echo $key['kategori']; ?></option>
						
						
						<?php } ?>	</select>	<br />
						<label>Nama Barang</label>
						<input name="nama_barang" type="text" class="required" size="50"/>		<br />
						<label>Harga</label>
						<input name="harga" type="text" size="10"/>,00 		<br />
						<label>Stok</label>
						<input name="stok" type="text" size="1"/> pcs 		<br />
						<label>Foto</label>
						<input name="gambar_besar" type="file"/>
						<br />
						<label>Keterangan</label>
						<textarea name="deskripsi"></textarea>
					</fieldset>
					<div align="center">
						<input class="pencet" type="submit" value="Simpan" action="" />
						<input class="pencet" type="submit" value="Batal" />
					</div>
				</form>
			</div>
		</div>