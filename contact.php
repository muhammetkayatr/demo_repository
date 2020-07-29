<?php
require_once 'panel/pages/inc-function.php';

if(@$_POST["submit"]) {
    $isim_soyisim = htmlspecialchars($_POST["isim_soyisim"], ENT_QUOTES, 'UTF-8');
    $mail = htmlspecialchars($_POST["mail"], ENT_QUOTES, 'UTF-8');
    $telefon = htmlspecialchars($_POST["telefon"], ENT_QUOTES, 'UTF-8');
    $mesaj = htmlspecialchars($_POST["mesaj"], ENT_QUOTES, 'UTF-8');
    $ekle = $db->prepare('INSERT INTO iletisim (isim_soyisim, mail, telefon, mesaj) VALUES
    (:isim_soyisim, :mail, :telefon, :mesaj) ');
    $ekle->bindValue(":isim_soyisim", $isim_soyisim, PDO::PARAM_STR);
    $ekle->bindValue(":mail", $mail, PDO::PARAM_STR);
    $ekle->bindValue(":telefon", $telefon, PDO::PARAM_STR);
    $ekle->bindValue(":mesaj", $mesaj, PDO::PARAM_STR);
   
    if($ekle->execute()) {
        header("Location: contact.php?i=ok");
    } else {
       // header("Location: contact.php?i=hata");
        print_r($ekle->errorInfo());
        
    }
}

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
							<li><a href="blog.php">YAYINLAR</a></li>
							<li class="active"><a href="contact.php">İLETİŞİM</a></li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>

	<aside id="ftco-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/hero_1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1><strong>İletişim</strong></h1>
									
									<p><a class="btn btn-primary btn-lg btn-learn" href="contact.php" >İletişime Geç!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="ftco-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="colorlib-contact-info">
						<h3>İletişim</h3>
						<ul>
						 <?php
                    $cek=$db->prepare('SELECT * FROM genel WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
							<li class="address"><?= $row["adres"] ?></li>
							<li class="phone"><a href="tel://1234567920"><?= $row["telefon"] ?></a></li>
							<li class="email"><a href="mailto:info@yoursite.com"><?= $row["mail"] ?></a></li>
						<!--	<li class="url"><a href="#">www.ornek.av.tr</a></li>  -->
							
							 <?php  ?>
							
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3>Bize Yazın</h3>
					<form method="POST" >
						<div class="row form-group">
							
							<div class="col-md-6">
								<!-- <label for="lname">Last Name</label> -->
								<input type="text" name="isim_soyisim"  class="form-control" placeholder="İsim Soyisim">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input type="text" name="telefon"  class="form-control" placeholder="telefon">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input type="text" name="mail"  class="form-control" placeholder="Email">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea name="mesaj"  cols="30" rows="10" class="form-control" placeholder="Mesaj"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Gönder" class="btn btn-primary">
						</div>
						 <?php 
                    if(@$_GET["i"]=="ok") {
                        echo '<p class="text-center alert alert-success">Mesaj başarı ile gönderildi!</p>';
                    } elseif(@$_GET["i"]=="hata") {
                         echo '<p class="text-center alert alert-danger">Mesaj gönderilirken hata oluştu!</p>';
                    }
                            ?>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
	<div >
	    
	     <?php
                    $cek=$db->prepare('SELECT * FROM genel WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
           
            
            <iframe src="<?=$row["google_maps"]?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            
            <?php  ?>
	    
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
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

