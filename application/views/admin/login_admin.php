		<div class="form_admin">
			<h2>Login Admin</h2>
			<p>untuk percobaan gunakan user : "admin", pass : "admin"</p>
			<form action="<?php echo site_url('admin/admin_login/login_validation'); ?>" method="post" accept-charset="utf-8">
				<?php
				echo validation_errors();
				?>
				<input class="search" type="text" placeholder="Username" name="username"/>
				<input class="search" type="password" placeholder="Password" name="password"/>
				<input class="tombol" type="submit" value="LOGIN" />
				<a href="<?php echo site_url(); ?>" title="">Lupa password</a>

			</form>
		</div>
		