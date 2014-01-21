<div class="login info">
	<h3 align="center">Anda belum login, Silahkan Login</h3>
	<div class="masuk teng">
		<form action="<?php echo site_url('pelanggan/login/login_validation'); ?>" method="post" accept-charset="utf-8">
			<?php
			echo validation_errors();
			?>
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
</div>