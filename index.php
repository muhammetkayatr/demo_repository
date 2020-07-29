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
        header("Location: index.php?i=ok");
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
							<li class="active"><a href="index.php">ANASAYFA</a></li>
							<li><a href="about.php">HAKKIMIZDA</a></li>
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
		   
		     <?php
                    $cek=$db->prepare('SELECT * FROM slider WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
		   	
		   	<li style="background-image: url(panel/pages/<?= $row['resim'] ?>);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   				<h2><?= $row['slider_baslik'] ?></h2>
			   					<h1><strong><?= $row['slider_alt_baslik'] ?></strong></h1>
									<p><a class="btn btn-primary btn-lg btn-learn" href="contact.php">İletişime Geç!</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	
		   			<?php } ?>   	
		   			   			   			   	
		  	</ul>
	  	</div>
	</aside>

	<div class="site-section">
		<div class="container">
			<div class="row">
			
                    <?php
                   $cek=$db->prepare('SELECT * FROM anasayfa_hakkimizda WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC); 
                      ?>
				<div class="col-md-6">
					<img src="panel/pages/<?= $row['resim'] ?>" alt="Image" class="img-responsive img-rounded">
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-5">
					<h2><?= $row["baslik"] ?></h2>
					<p><?= htmlspecialchars_decode($row["aciklama"]) ?></p>
					<p><a href="#" class="btn btn-primary">İletişime Geç!</a></p>
				</div>
			</div>
			<?php  ?>
		</div>
	</div>

<!--	<div class="ftco-practice">
		<div class="container">
			
			<div class="row">
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-courthouse"></i>
						</span>
						<div class="desc">
							<h3><a href="#">İş Hukuku</a></h3>
							<p>İş Hukuku Avukatı, İşçi Avukatı, İşveren Avukatı hayatınızda karşılaşabileceğiniz yasal sorunları iş hukuku avukatı uzmanlığı ile çözüyoruz.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-padlock"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Ticaret Hukuku</a></h3>
							<p>Ticaret Hukuku Avukatı olarak birlikte süreç boyunca haklarınızı koruyalım. Ticaret hukukuyla ilgili çıkan ya da çıkacak uyuşmazlıklar için büromuza ulaşabilirsiniz.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<i class="flaticon-folder"></i>
						</span>
						<div class="desc">
							<h3><a href="#">Aile Hukuku</a></h3>
							<p>Örnek Hukuk Bürosu, toplumun temel birimi olan aile kavramına oldukça değer vermekte ve bu alanda da hukuki hizmet vermektedir.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
                       -->

	

	<div id="ftco-counter" class="ftco-counters" style="background-image: url(images/img_bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			
			<?php
                    $cek=$db->prepare('SELECT * FROM sayilarla_biz2 WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC) 
                        ?>
                        
			<div class="row">
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-lawyer-1"></i></span>
					<span class="ftco-counter js-counter" data-from="0" data-to="<?= $row["sayi1"] ?>" data-speed="<?= $row["sayi1"] ?>" data-refresh-interval="50"></span>
					<span class="ftco-counter-label"><?= $row["baslik1"] ?></span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-courthouse"></i></span>
					<span class="ftco-counter js-counter" data-from="0" data-to="<?= $row["sayi2"] ?>" data-speed="<?= $row["sayi2"] ?>" data-refresh-interval="50"></span>
					<span class="ftco-counter-label"><?= $row["baslik2"] ?></span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-libra"></i></span>
					<span class="ftco-counter js-counter" data-from="0" data-to="<?= $row["sayi3"] ?>" data-speed="<?= $row["sayi3"] ?>" data-refresh-interval="50"></span>
					<span class="ftco-counter-label"><?= $row["baslik3"] ?></span>
				</div>
				<div class="col-md-3 text-center animate-box">
					<span class="icon"><i class="flaticon-police-badge"></i></span>
					<span class="ftco-counter js-counter" data-from="0" data-to="<?= $row["sayi4"] ?>" data-speed="<?= $row["sayi4"] ?>" data-refresh-interval="50"></span>
					<span class="ftco-counter-label"><?= $row["baslik4"] ?></span>
				</div>
			</div>
			
			<?php  ?>
			
		</div>
	</div>

	<div id="ftco-content">
	<?php
                    $cek=$db->prepare('SELECT * FROM video WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC);
                        ?>
		<div class="video ftco-video" style="background-image: url(panel/pages/<?= $row['resim'] ?>);">
		
		
			<a href="<?= $row['link'] ?>"><i class="icon-play"></i></a>
			
			<?php  ?>
			
			<div class="overlay"></div>
		</div>
		<div class="choose animate-box">
			<div class="ftco-heading">
			
			 <?php
                   $cek=$db->prepare('SELECT * FROM kurumsal_kimlik WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC)
                        ?> 
			
				<h2><?= $row["baslik"] ?></h2>
				<p><?= htmlspecialchars_decode($row["aciklama"]) ?></p>
				<p><a href="#" class="btn btn-primary">İletişime Geç!</a></p>
				
				<?php  ?>
				
			</div>
			
		</div>
	</div>

	<div class="ftco-practice">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading">
					<h2>Hizmetlerimiz</h2>
					<p>Örnek Hukuk Bürosu; 360 derece hizmet prensibiyle çalışan, alanlarında akademik ve mesleki deneyime sahip uzman ekibi ile müvekkillerine özgün hukuk hizmeti sağlamaktadır.</p>
				</div>
			</div>
			<div class="row">
				
				
				<?php
                    $cek=$db->prepare('SELECT * FROM anasayfa_hizmetler WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
				
				
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
					<!--		<i class="flaticon-folder"></i>   -->
					<img src="panel/pages/<?= $row['resim'] ?>" alt="">
						</span>
						<div class="desc">
							<h3><a href="#"><?= $row["hizmet_adi"] ?></a></h3>
							<p><?= $row["hizmet_aciklama"] ?></p>
						</div>
					</div>
				</div>
				
				<?php } ?>
				
				
				<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-lg btn-learn" href="practice.php">Daha Fazla <i class="icon-arrow-right"></i></a></p>
				</div>
			</div>
		</div>
	</div>

	<div id="ftco-started" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading ftco-heading2">
				
				 <?php
                   $cek=$db->prepare('SELECT * FROM misyonumuz WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    $row=$cek->fetch(PDO::FETCH_ASSOC)
                        ?> 
				
					<h2><?= $row["baslik"] ?></h2>
					<p><?= htmlspecialchars_decode($row["aciklama"]) ?></p>
					<p><a href="#" class="btn btn-primary btn-lg">İletişime Geç!</a></p>
					
									<?php  ?>
					
				</div>
			</div>
		</div>
	</div>
	

	<div id="ftco-testimonial" class="ftco-bg-section">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center ftco-heading">
					<h2>Müvekkillerimizin Yorumları</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row animate-box">
						<div class="owl-carousel owl-carousel-fullwidth">
							
							 
              <?php
                    $cek=$db->prepare('SELECT * FROM yorumlar WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
							
							<div class="item">
								<div class="testimony-slide active text-center">
									<figure>
										<img src="panel/pages/<?= $row['resim'] ?>" alt="user">
									</figure>
									<span><?= $row["yorum_adi"] ?> <?= $row["yorum_unvani"] ?></span>
									<blockquote>
										<p>&ldquo;<?= $row["yorum_aciklama"] ?>&rdquo;</p>
									</blockquote>
								</div>
							</div>
							
							<?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="ftco-consult">
		<div class="video ftco-video" style="background-image: url(images/hero_3.jpg);" data-stellar-background-ratio="0.5">
		</div>
		<div class="choose choose-form animate-box">
			<div class="ftco-heading">
				<h2>Bize Yazın!</h2>
			</div>
			<form method="POST">
				<div class="row form-group">
					<div class="col-md-12">
						<label for="fname">İsim Soyisim</label>
						<input type="text" name="isim_soyisim"  class="form-control">
					</div>
			<!--		<div class="col-md-6">
						<label for="lname">Soyisim</label>
						<input type="text"   class="form-control">
					</div> -->
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label for="email">Email</label>
						<input type="text" name="mail"  class="form-control">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label for="subject">Telefon</label>
						<input type="text" name="telefon"  class="form-control">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-12">
						<label for="message">Mesaj</label>
						<textarea name="mesaj"  cols="30" rows="10" class="form-control"></textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Gönder" class="btn btn-primary">
				</div>
                 
                  <?php 
                    if(@$_GET["i"]=="ok_abonelik") {
                        echo '<p class="text-center alert alert-success">Başarı ile gönderildi!</p>';
                    } elseif(@$_GET["i"]=="hata_abonelik") {
                         echo '<p class="text-center alert alert-danger">Hata oluştu!</p>';
                    }
                            ?>
        
			</form>	
		</div>
	</div>

	<div id="ftco-blog">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading">
					<h2>Yayınlar</h2>
				<!--	<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however</p>    -->
				</div>
			</div>
			<div class="row">
				

             <?php
                    $cek=$db->prepare('SELECT * FROM anasayfa_yayinlar WHERE aktif=:aktif ORDER BY id DESC');
                    $cek->bindValue(":aktif", 1, PDO::PARAM_INT);
                    $cek->execute();
                    while($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                        ?>
            
				<div class="col-md-6 col-lg-4">
					<div class="blog-featured animate-box">
						<a href="blog-single.php"><img class="img-responsive img-rounded" src="panel/pages/<?= $row['resim'] ?>" alt=""></a>
						<h2><a href="blog-single.php"><?= $row["yayin_baslik"] ?></a></h2>
						<p class="meta"><span><?= $row["yayin_gun"] ?><?= $row["yayin_ay"] ?><?= $row["yayin_yil"] ?></span></p>
						<p><?= $row["yayin_alt_baslik"] ?></p>
					</div>
				</div>
				
				<?php } ?>
				
			</div>
		</div>
		<div class="col-md-12 text-center animate-box">
					<p><a class="btn btn-primary btn-lg btn-learn" href="practice.php">Daha Fazla <i class="icon-arrow-right"></i></a></p>
				</div>
	</div>





	<div id="ftco-about" style="padding-bottom: 15%;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center ftco-heading">
					<h2>Ekibimiz</h2>
					<p>Her biri alanında uzman avukatlarımızla tüm hukuki süreçlerinizde yanınızdayız.</p>
				</div>
			</div>
			<div class="row">
				
				
				 <?php
                    $cek=$db->prepare('SELECT * FROM anasayfa_avukatlar WHERE aktif=:aktif ORDER BY id DESC');
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

