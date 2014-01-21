<!DOCTYPE html>
<html>
<head>
	<title>Supermarket Online</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/themes/style.css'); ?>">
</head>
<body>
	<header>
		<div class="header">
			<div class="head">
				<div class="info">
					<ul class="info_link">
						<li>
							<span class="link">Layanan Pelanggan: 021 29490200</span>
							<span class="pisah">|</span>
						</li>
						<li>
							<span class="link">Konfirmasi Pembayaran</span>
							<span class="pisah">|</span>
						</li>
						<li>
							<span class="link">Status Order</span>
							<span class="pisah">|</span>
						</li>
						<li>
							<span class="link">Bantuan</span>
							<span class="pisah">|</span>
						</li>
						<li>
							<span class="link"><a href="<?php echo site_url('admin/admin_login'); ?>">Admin</a></span>
							<span class="pisah">|</span>
						</li>
						<li>
							<span class="link"><a href="<?php echo site_url('pelanggan/login'); ?>">Login</a></span>
						</li>
					</ul>
				</div>
			</div>
			<div class="kepala">
				<div class="info">
					<div class="logo">
						<a href="<?php echo site_url(); ?>" title=""><h1>Market Line</h1></a>
					</div>
					<div class="cari">
						<form>
							<input class="search" type="text" placeholder="Cari Produk"/>
							<input class="tombol" type="submit" value="Cari" />
						</form>
					</div>
					<div class="diskon">
						<h2>Dapatkan Diskon Hingga 50%</h2>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="clear"></div>
	<?php $this->load->view($template_anak); ?>
	<div class="clear"></div>
	<footer>
		<div class="footer">
			<div class="isi_footer info">
				<div class="des">
					<h3>Lorem ipsum dolor sit amet, vim vidit ubique constituto id. Timeam diceret vel an.</h3>
					<p>
						Est in persius nominavi. Vidit definiebas conclusionemque ei duo, est ipsum utroque singulis ad, elit dicit ridens sed eu. Delectus percipitur disputationi duo in. Bonorum signiferumque et nec, an sit mundi possim. An alii natum cetero usu, eos id aeque labitur, alienum omittantur vel te. Ne sed ipsum nullam dignissim.<br/>

						Quo id agam sale eleifend, his justo discere ex, alii noster inermis pri at. Duo delicatissimi conclusionemque ne, te ius regione lucilius, decore vocibus ex has. Eu nec omnes pericula, nobis virtute prodesset ad pri. Sit te deserunt definiebas reprehendunt, tibique gloriatur honestatis ea eam. Ne his justo expetenda. Quaeque accumsan ad his, et his ferri eligendi. <br/><br/>
						His decore vivendum efficiendi ei, vel ea electram consequuntur. Duo ceteros scribentur accommodare no. Ut solum putant virtute eos, in mel nonumy integre, an adhuc nemore ullamcorper vix. Sit in eripuit meliore, alii causae eos in, ut dicam referrentur vel. Vix in clita equidem sapientem, vix ei atqui dolorem corpora. Vix et tantas verterem. Cu pri probo blandit voluptaria, ea nec fugit dissentiet.

					</p>
				</div>
				<div class="clear"></div>
				<div class="footer_bawah">
					<h3>Informasi Perusahaan</h3>
					<ul class="list_bawah">
						<li><a href="">Tentang Supermarket</a></li>
						<li><a href="">Karir di Supermarket</a></li>
						<li><a href="">Hubungi Kami</a></li>
						<li><a href="">Kebijakan Privasi</a></li>
						<li><a href="">Lokasi Gerai/Cabang</a></li>
						<li><a href="">Press Release</a></li>
					</ul>
				</div>

				<div class="footer_bawah">
					<h3>Layanan Perusahaan</h3>
					<ul class="list_bawah">
						<li><a href="">Berita Supermarket</a></li>
						<li><a href="">Layanan Kami</a></li>
						<li><a href="">Member Card</a></li>
						<li><a href="">Produk/item</a></li>
						<li><a href="">Pertanyaan & saran</a></li>
					</ul>
				</div>

				<div class="footer_bawah">
					<h3>Metode Pembayaran</h3>
					<img class="footer_img" src="<?php echo base_url('/themes/img/visa.png'); ?>">   <img class="footer_img" src="<?php echo base_url('/themes/img/mastercard.png'); ?>">
					<img class="footer_img" src="<?php echo base_url('/themes/img/smarticon.gif'); ?>">
				</div>

				<div class="footer_bawah">	
					<h3>Online Marketing Supermarket</h3>
					<div class="des">
						<p align="justify">Est in persius nominavi. Vidit definiebas conclusionemque ei duo, est ipsum utroque singulis ad, elit dicit ridens sed eu. Delectus percipitur disputationi duo in. Bonorum signiferumque et nec, an sit mundi possim. An alii natum cetero usu, eos id aeque labitur, alienum omittantur vel te. Ne sed ipsum nullam dignissim.
							His decore vivendum efficiendi ei, vel ea electram consequuntur. Duo ceteros scribentur accommodare no. Ut solum putant virtute eos, in mel nonumy integre, an adhuc nemore ullamcorper vix. Sit in eripuit meliore, alii causae eos in, ut dicam referrentur vel. Vix in clita equidem sapientem, vix ei atqui dolorem corpora. 
						</p>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="kaki">
				Supermarket Online
			</div>
		</footer>
	</body>
	</html>
</body>
</html>