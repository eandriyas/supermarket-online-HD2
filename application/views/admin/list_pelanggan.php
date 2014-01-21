
<div class="panel_admin tengah">
	<h2>Input Data Barang</h2>
	<div class="bar_menu">
		<?php $this->load->view('admin/welcome_admin'); ?>
		<div class="clear"></div>
		<div class="brg">
			<fieldset id="personal">
				<legend>PELANGGAN</legend>
				<table class="table">
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>TTL</th>
						<th>email</th>
						<th>action</th>
					</tr>
					<?php $i = 1; ?>
					<?php foreach ($pelanggan as $key){ ?>
					<tr>
						<td><?php echo $i; ?></td>	
						<td><?php echo $key['nama_pelanggan']; ?></td>
						<td><?php echo $key['alamat']; ?></td>
						<td><?php echo $key['ttl']; ?></td>
						<td><?php echo $key['email']; ?></td>
						<td>
							<form action="<?php echo site_url('admin/admin/del_pelanggan/'.$key['ttl']); ?>">
								<input class="tomb" type="submit" action= "" value="Delete" onclick="return confirm('Yakin hapus pelanggan <?php echo $key['nama_pelanggan']; ?>?')" />
							</form>
						</td>
					</tr>
					
					<?php $i++; ?>
					<?php } ?>			
				</table>
			</fieldset>

		</div>
	</div>
