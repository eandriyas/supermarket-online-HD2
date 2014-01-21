<div class="login info">
	<?php echo validation_errors();	?>
	<div class="masuk">
		<h3>Masuk</h3> <br />
		<p>untuk percobaan gunakan user : "admin@gmail.com", pass : "admin"</p>
		<div class="clear"></div>
		<form action="<?php echo site_url('pelanggan/login/login_validation'); ?>" method="post" accept-charset="utf-8">
			<ul class="masuk_list">
				<li><h4>Email</h4>
					<input class="data" type="text" placeholder="Email" name="email"/>
				</li>
				<li><h4>Password</h4>
					<input class="data" type="password" placeholder="Pasword" name="password"/>
				</li>
				<li><h4> </h4>
					<input class="tombol" type="submit" value="Masuk" />
					<a href="<?php echo site_url(); ?>pelanggan/login">Lupa Password ?</a>
				</li>
			</ul>
		</form>
	</div>
	<div class="daftar">
		<h3 style="float:none;">Daftar</h3>
		<div class="clear"></div>
		<form action="<?php echo site_url('pelanggan/login/register_validation'); ?>" method="post" accept-charset="utf-8">
			<ul class="masuk_list">

				<li><h4>Nama</h4>
					<input class="data" type="text" placeholder="Nama Lengkap Sesuai KTP" name="name"/>
				</li>
				<li><h4>Alamat</h4>
					<input class="data" type="text" placeholder="Alamat Lengkap Sesuai KTP" name="alamat"/>
				</li>
				<li><h4>TTL</h4>
					<input class="data" type="text" placeholder="Tanggal lahir : 2013-12-11" name="ttl"/>
				</li>
				<li><h4>E-Mail</h4>
					<input class="data" type="text" placeholder="Alamat E-Mail" name="email"/>
				</li>
				<li><h4>Password</h4>
					<input class="data" type="password" placeholder="Pasword" name="password"/>
				</li>
				<li><h4>Ulangi Password</h4>
					<input class="data" type="password" placeholder="Ulangi Pasword" name="cpassword"/>
				</li>
				<li><h4> </h4>
					<input class="tombol" type="submit" value="Daftar" />
				</li>
			</ul>
		</form>	
	</div>
</div>