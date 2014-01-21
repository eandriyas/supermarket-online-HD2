<html>
<head>
	<title>Panel Admin</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/themes/admin.css'); ?>">
</head>
<body>
	<div class="admin">
		<div class="header_admin">
			<h2>Welcome Admin</h2>
		</div>
		
		<?php $this->load->view($template_admin); ?>
	</div>
</body>
</html>