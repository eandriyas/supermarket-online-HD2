
<div class="panel_admin tengah">
	<h2>Input Data Barang</h2>
	<div class="bar_menu">
		<?php $this->load->view('admin/welcome_admin'); ?>
		<div class="clear"></div>
		<div class="brg">
			<form action="<?php echo site_url('admin/admin/'.'edit_kategori'); ?>" id='form' enctype="multipart/form-data" method="post" accept-charset="utf-8">	  
				<fieldset id="personal">
					<legend> Edit KATEGORI BARANG</legend>
					<label>Kategori</label>
					<input name="id_kategori" type="hidden" value="<?php echo $kategori_dat['id_kategori']; ?>"/>		<br />
					<input name="kategori" type="text" class="required" size="50" value="<?php echo $kategori_dat['kategori']; ?>"/>		<br />
				</fieldset>
				<div align="center">
					<input class="pencet" type="submit" value="Edit" action="<?php echo site_url('admin/admin/'.'edit_kategori'); ?>"/>
					<input class="pencet" type="button" value="Batal" onClick="window.location='<?php echo site_url('admin/admin/tambah_kategori'); ?>'"/>
				</div>
				
			</form>
		</div>
	</div>
