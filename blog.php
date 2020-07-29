<?php
require_once 'panel/pages/inc-function.php'
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Örnek Hukuk Bürosu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->



	</head>
	<body>
		
	<div class="ftco-loader"></div>
	
	<div id="page">
	<nav class="ftco-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
					<?php
                    $cek=$db->prepare('SELECT * FROM genel WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
						<div id="ftco-logo" style="width: 300px"><a href="index.php" style="padding: 0px"><?= $row["firma_adi"] ?> <br><?= $row["firma_unvani"] ?></a></div>
						<?php  ?>
					</div>
					<div class="col-md-10 text-right menu-1">
						<ul>
							<li><a href="index.php">ANASAYFA</a></li>
							<li><a href="about.php">HAKKIMIZDA</a></li>
							<li><a href="practice.php">HİZMETLERİMİZ</a></li>
							<li><a href="gallery.php">GALERİ</a></li>
							<li class="active"><a href="blog.php">YAYINLAR</a></li>
							<li><a href="contact.php">İLETİŞİM</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<aside id="ftco-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/hero_3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1><strong>Yayınlar</strong></h1>
									
									<p><a class="btn btn-primary btn-lg btn-learn" href="contact.php">İletişime Geç!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="ftco-blog">
		<div class="container">
			<div class="row">
			
			<?php
                    $cek=$db->prepare('SELECT * FROM yayinlar WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                     while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
			
				<div class="col-md-6 col-lg-4">
					<div class="blog-featured animate-box">
						<a href="blog-single.php?id=<?= $row["id"] ?>"><img style="width:400px; height:300px" class="img-responsive img-rounded" src="panel/pages/<?= $row['resim'] ?>" alt=""></a>
						<h2><a href="blog-single.php?id=<?= $row["id"] ?>"><?= $row["yayin_baslik"] ?></a></h2>
						<p class="meta"><span><?= $row["yayin_gun"] ?> <?= $row["yayin_ay"] ?> <?= $row["yayin_yil"] ?></span></p>
						<p><?= $row["yayin_alt_baslik"] ?></p>
					</div>
				</div>

				 <?php } ?>
				 
			</div>
		<!--	<div class="row">
				<div class="col-md-12 pagination">
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#" class="caption">Next</a>
				</div>
			</div>  -->
		</div>
	</div>



	
<div id="intro-bg" >
		<div class="container">
			<div id="ftco-intro" style="position: relative; margin-bottom: -150px!important;">
			
			<?php
                    $cek=$db->prepare('SELECT * FROM genel WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
			
				<div class="third-col">
				
					<h2 class="h3"><?= $row["firma_adi"] ?> <?= $row["firma_unvani"] ?></h2>
					<p><?= $row["aciklama"] ?></p>
				</div>
				<div class="third-col third-col-color">
				    <h3>Hemen Avukata Danışın!</h3>
					<h2 class="h3">Telefon | <?= $row["telefon"] ?></h2>
					<h2 class="h3">Email | <?= $row["mail"] ?></h2>
					
				</div>
			<?php  ?>
			</div>
		</div>
	</div>

	<footer id="ftco-footer" role="contentinfo">
	<?php
                    $cek=$db->prepare('SELECT * FROM genel WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
						
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 ftco-widget">
					<h4><?= $row["firma_adi"] ?> <?= $row["firma_unvani"] ?></h4>
					<p><?= $row["aciklama"] ?></p>
				</div>
				<div class="col-md-3 col-md-push-1">
					<h4>LİNKLER</h4>
					<ul class="ftco-footer-links">
						    <li><a href="index.php">Anasayfa</a></li>
							<li><a href="about.php">Hakkımızda</a></li>
							<li><a href="practice.php">Hizmetlerimiz</a></li>
							<li><a href="gallery.php">Galeri</a></li>
							<li><a href="blog.php">Yayınler</a></li>
							<li><a href="contact.php">İletişim</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>İLETİŞİM</h4>
					<ul class="ftco-footer-links">
						<li><?= $row["adres"] ?></li>
						<li><a href="tel://<?= $row["telefon"] ?>"><?= $row["telefon"] ?></a></li>
						<li><a href="mailto:<?= $row["mail"] ?>"><?= $row["mail"] ?></a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>ÇALIŞMA SAATLERi</h4>
					<ul class="ftco-footer-links">
						<li>Hafta İçi Hergün</li>
						<li>09:00 - 17 00</li>
						
					</ul>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
					<p>
						<ul class="ftco-social-icons">
							<li><a href="<?= $row["twitter_adresi"] ?>"><i class="icon-twitter"></i></a></li>
							<li><a href="<?= $row["facebook"] ?>"><i class="icon-facebook"></i></a></li>
							<li><a href="<?= $row["instagram_adresi"] ?>"><i class="icon-instagram"></i></a></li>
							
						</ul>
					</p>
				</div>
			</div>
        
		</div>
		<?php  ?>
	</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

	</body>
</html>

