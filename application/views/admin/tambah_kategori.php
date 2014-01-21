
<div class="panel_admin tengah">
	<h2>Input Data Barang</h2>
	<div class="bar_menu">
		<?php $this->load->view('admin/welcome_admin'); ?>
		<div class="clear"></div>
		<div class="brg">
			<form action="add_kategori" id='form' enctype="multipart/form-data" method="post" accept-charset="utf-8">	  
				<fieldset id="personal">
					<legend> TAMBAH KATEGORI BARANG</legend>
					<label>Kategori</label>
					<input name="kategori" type="text" class="required" size="50" value=""/>		<br />
				</fieldset>
				<div align="center">
					<input class="pencet" type="submit" value="Simpan" action="" />
					<input class="pencet" type="button" value="Batal" />
				</div>	
			</form>
			<fieldset id="personal">
				<legend>KATEGORI BARANG</legend>
				<table class="tabel" style="text-align:left;">
					<tr>
						<th>No.</th>
						<th>kategori</th>
						<th width="200px">properti</th>
					</tr>
					<?php $i = 1; ?>
					<?php foreach ($kat as $key) { ?>
					<tr>
						<td><?php echo $i; ?></td>	
						<td><?php echo $key['kategori']; ?></</tr>
							<td>
								<a href="<?php echo site_url('admin/admin/up_kategori'.'/'.$key['id_kategori']); ?>" title=""><input class="tomb" type="submit" value="Edit" /></a>
								<form action="<?php echo site_url('admin/admin/del_kategori'.'/'.$key['id_kategori']); ?>">
									<input class="tomb" type="submit" value="Delete" onclick="return confirm('Yakin hapus kategori <?php echo $key['kategori']; ?>?')" />
								</form>
							</tr>
							<?php $i++; ?>
							<?php } ?>			
						</table>
					</fieldset>
					
				</div>
			</div>