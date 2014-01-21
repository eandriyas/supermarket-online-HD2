<div class="login info">
	<h1>Selamat Datang <?php echo $pelanggan['nama_pelanggan']; ?></h1>	
	<div class="daftkiri">
		<h3>Data belanjaan anda</h3>
		<div class="clear">
			
		</div>
		<table class="tabel">
			<tr>
				<th>No.</th>	
				<th>ID</th>	
				<th>Banyak</th>
				<th>Nama barang</th>
				<th style="text-align:right">Harga</th>
				<th style="text-align:right">Sub-Total</th>
				<th style="text-align:righr">Status</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach ($this->cart->contents() as $items): ?>
			<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
			
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $items['id']; ?></td>	
				<td><?php echo $items['qty']; ?></td>	
				<td><?php echo $items['name']; ?></td>
				<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
				<td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
				<td style="text-align:right"><a href="<?php echo site_url('public/home/remove/'.$items['rowid']); ?>" title="">Cancel</a></td>
			</tr>
			<?php $i++; ?>
		<?php endforeach; ?>
		<tr>
			<td colspan="2"></td>
			<td class="right"><strong>Total</strong></td>
			<td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
		</tr>
	</table>
	<div class="clear">
		
	</div>
	<p>
		<form action="<?php echo site_url('public/home/save_order'); ?>" method="post" accept-charset="utf-8">
			<a href="<?php echo site_url('public/home'); ?>" title="">
				<input class="tombol" type="button" name="" value="Pilih barang">
			</a>
			<a href="<?php echo site_url('public/home/save_order'); ?>" title="">
				
				<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">
				<input class="tombol" type="submit" name="" value="Selesai memilih barang">
			</a>
		</form>
	</div>
	<div class="daft">
		<h3>Edit data anda</h3>
		<form action="<?php echo site_url('public/home/edit_pelanggan'); ?>" method="post" accept-charset="utf-8">
			<ul class="masuk_list">
				<li><h4>Nama</h4>
					<input class="data" type="hidden" value="<?php echo $pelanggan['id_pelanggan']; ?>" name="id_pelanggan"/>
					<input class="data" type="text" value="<?php echo $pelanggan['nama_pelanggan']; ?>" name="nama_pelanggan"/>
				</li>
				<li><h4>Alamat</h4>
					<input class="data" type="text" value="<?php echo $pelanggan['alamat']; ?>" name="alamat"/>
				</li>
				<li><h4>TTL</h4>
					<input class="data" type="text" value="<?php echo $pelanggan['ttl']; ?>" name="ttl"/>
				</li>
				<li><h4>E-Mail</h4>
					<input class="data" type="text" value="<?php echo $pelanggan['email']; ?>" name="email"/>
				</li>
				<li><h4>Password</h4>
					<input class="data" type="password" value="<?php echo $pelanggan['password']; ?>" name="password"/>
				</li>
				<li><h4>Ulangi Password</h4>
					<input class="data" type="password" value="<?php echo $pelanggan['password']; ?>" name="cpassword"/>
				</li>
				<li><h4> </h4>
					<input class="tombol" type="submit" value="Update" />
					<a href="<?php echo site_url(); ?>pelanggan/login/logout" title=""><input class="tombol" type="button" value="Logout" /></a>
				</li>
			</ul>
		</form>
	</div>
</div>