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
	
	<link rel="stylesheet" href="sss/style.css">

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
							<li class="active"><a href="about.php">HAKKIMIZDA</a></li>
							<li><a href="practice.php">HİZMETLERİMİZ</a></li>
							<li><a href="gallery.php">GALERİ</a></li>
							<li><a href="blog.php">YAYINLAR</a></li>
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
		   	<li style="background-image: url(images/hero_2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1><strong>Hakkımızda</strong></h1>
									
									<p><a class="btn btn-primary btn-lg btn-learn" href="contact.php">İletişime Geç!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div class="site-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img src="images/hero_1.jpg" alt="Image" class="img-responsive img-rounded">
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-5">
				<?php
                    $cek=$db->prepare('SELECT * FROM hakkimizda WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
					<h2><?= $row["hakkimizda_baslik"] ?></h2>
					<p><?= htmlspecialchars_decode($row["hakkimizda_aciklama"]) ?> </p>
					<p><a href="contact.php" class="btn btn-primary">İletişime Geç!</a></p>
					<?php  ?>
				</div>
			</div>
		</div>
	</div>

	<div id="ftco-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading">
				
                   <?php
                    $cek=$db->prepare('SELECT * FROM misyonumuz WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
					<h2><?= $row["baslik"] ?></h2>
					<p><?= htmlspecialchars_decode($row["aciklama"]) ?></p>
					
					<?php  ?>
					
				</div>
			</div>
			
			</div>
		</div>
	</div>



	<div id="ftco-about" style="padding-bottom: 15%; padding: 0">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading">
					<h2>Ekibimiz</h2>
					<p>Her biri alanında uzman avukatlarımızla tüm hukuki süreçlerinizde yanınızdayız.</p>
				</div>
			</div>
			<div class="row">
				
				
				 <?php
                    $cek=$db->prepare('SELECT * FROM avukatlar WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
				
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="ftco-staff">
						<img style="width: 300px; height: 400px;" src="panel/pages/<?= $row['resim'] ?>" alt="Template">
						<h3><?= $row["isim_soyisim"] ?></h3>
						<strong class="role"><?= $row["unvan"] ?></strong>
						<p><?= $row["aciklama"] ?></p>
						<ul class="ftco-social-icons">
							<li><a href="<?= $row['facebook'] ?>"><i class="icon-facebook"></i></a></li>
							<li><a href="<?= $row['twitter'] ?>"><i class="icon-twitter"></i></a></li>
							<li><a href="<?= $row['instagram'] ?>"><i class="icon-instagram"></i></a></li>
							
						</ul>
					</div>
				</div>
				
				<?php } ?>
				
			</div>
		</div>
		
		<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-lg btn-learn" href="practice.php">Daha Fazla <i class="icon-arrow-right"></i></a></p>
				</div>
		
	</div>



	<div id="ftco-testimonial" class="ftco-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div style="margin-bottom: 5em; margin-left:0; width:100%;" class="col-md-6 col-md-offset-3 text-center ftco-heading">
					<h2>Neden Biz?</h2>
					  <?php
                    $cek=$db->prepare('SELECT * FROM neden_biz WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <!---------------------------------------------------------------->
                        <div id="ndnbz" class="panel single-accordion" style="background-color: #ffffff;
    border: 0 solid transparent;
    border-top-color: transparent;
    border-top-style: solid;
    border-top-width: 0px;
    border-right-color: transparent;
    border-right-style: solid;
    border-right-width: 0px;
    border-bottom-color: transparent;
    border-bottom-style: solid;
    border-bottom-width: 0px;
    border-left-color: transparent;
    border-left-style: solid;
    border-left-width: 0px;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    border-radius: 4px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    box-shadow: 0 0 0 transparent;
    margin-bottom: 15px;">
                            <h6 style="    margin-bottom: 0;
    text-transform: uppercase; color: #242424;
    line-height: 1.3;
    font-weight: 700;"><a role="button" class="" aria-expanded="true" aria-controls="collapseFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" style="    background: linear-gradient(to right, #61ba6d, #83c331);
    background-image: linear-gradient(to right, #3f52e3, #333333);
    background-position-x: initial;
    background-position-y: initial;
    background-size: initial;
    background-repeat-x: initial;
    background-repeat-y: initial;
    background-attachment: initial;
    background-origin: initial;
    background-clip: initial;
    background-color: initial;
    color: #ffffff; display: block;
    margin: 0;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 0px;
    padding: 20px 60px 20px 20px;
    padding-top: 20px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    position: relative;
    font-size: 14px;
    text-transform: capitalize;
    font-weight: 500;     border-radius: 0;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;"><?= $row["neden_biz_baslik"] ?>
                                    <span class="accor-open" style="opacity: 1;     font-size: 10px;
    position: absolute;
    right: 20px;
    text-align: center;
    top: 23px;"><i class="fa fa-plus" aria-hidden="true" style="display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;"></i></span>
                                    <span class="accor-close" style="opacity: 0; font-size: 10px;
    position: absolute;
    right: 20px;
    text-align: center;
    top: 23px;"><i class="fa fa-minus" aria-hidden="true" style="display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-style: normal;
    font-variant-ligatures: normal;
    font-variant-caps: normal;
    font-variant-numeric: normal;
    font-variant-east-asian: normal;
    font-weight: normal;
    font-stretch: normal;
    font-size: inherit;
    line-height: 1;
    font-family: FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;"></i></span>
                                </a></h6>
                            <div id="collapseFive" class="accordion-content collapse" style="box-sizing: border-box">
                                <p style="box-sizing: border-box; background-color: #fff; padding-left: 10px; ; margin-bottom: 0">
                                   <?= $row["neden_biz_aciklama"] ?></p>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <?php } ?>
                        
				</div>
				
				
				 
				
				
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
						<!--	<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/user-1.jpg" alt="user">
									</figure>
									<span>Carl Smith</span>
									<blockquote>
										<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>                -->
						<!--	<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/user-2.jpg" alt="user">
									</figure>
									<span>John Lockwood</span>
									<blockquote>
										<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>              -->
					<!--		<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="images/user-3.jpg" alt="user">
									</figure>
									<span>Joyce Kroell</span>
									<blockquote>
										<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
									</blockquote>
								</div>
							</div>   -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--	<div id="ftco-practice">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading">
					<h2>Practice Area</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-courthouse"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Real Estate Law</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-padlock"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Insurance Law</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-folder"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Business Law</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-handcuffs"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Personal Injury</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-handcuffs"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Medical Neglegence</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-libra"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Criminal Defense</a></h3>
							<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-lg btn-learn" href="#">View More <i class="icon-arrow-right"></i></a></p>
				</div>
			</div>
		</div>
	</div>

-->

	
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

