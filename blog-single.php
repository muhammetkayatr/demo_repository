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
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
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
                                       
                                       <?php
@$id=intval($_GET["id"]);


$cek=$db->prepare('SELECT * FROM anasayfa_yayinlar WHERE id=:id LIMIT 1');
$cek->bindValue("id", $id, PDO::PARAM_INT);
$cek->execute();
$row=$cek->fetch(PDO::FETCH_ASSOC);

?>
                <h2><?= $row["yayin_baslik"] ?></h2>
                
                <?php  ?>
                                                                  <?php
@$id=intval($_GET["id"]);


$cek=$db->prepare('SELECT * FROM yayinlar WHERE id=:id LIMIT 1');
$cek->bindValue("id", $id, PDO::PARAM_INT);
$cek->execute();
$row=$cek->fetch(PDO::FETCH_ASSOC);

?>
                                        <h1><strong><?= $row["yayin_baslik"] ?></strong></h1>
                                        <h2><?= $row["yayin_gun"] ?> <?= $row["yayin_ay"] ?> <?= $row["yayin_yil"] ?></h2>
                                    
                                    <?php  ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <div id="ftco-blog">

            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 blog-content">
                           
                           <?php
@$id=intval($_GET["id"]);


$cek=$db->prepare('SELECT * FROM yayinlar WHERE id=:id LIMIT 1');
$cek->bindValue("id", $id, PDO::PARAM_INT);
$cek->execute();
$row=$cek->fetch(PDO::FETCH_ASSOC);

?>
               
             
                           
                            <p> <?= htmlspecialchars_decode($row["yayin_aciklama"]) ?></p>

                           <?php  ?>

                            <!--
                            <div class="pt-5">
                                <p>Categories: <a href="#">Design</a>, <a href="#">Events</a> Tags: <a href="#">#html</a>, <a href="#">#trends</a></p>
                            </div>


                            <div class="pt-5">
                                <h3 class="mb-5">6 Comments</h3>
                                <ul class="comment-list">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_2.jpg" alt="Image">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jacob Smith</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>
                                    </li>

                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_3.jpg" alt="Image">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Chris Meyer</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>

                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="images/person_5.jpg" alt="Image">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Chintan Patel</h3>
                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>


                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="images/person_1.jpg" alt="Image">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Jean Doe</h3>
                                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>

                                                        <ul class="children">
                                                            <li class="comment">
                                                                <div class="vcard bio">
                                                                    <img src="images/person_4.jpg" alt="Image">
                                                                </div>
                                                                <div class="comment-body">
                                                                    <h3>Ben Afflick</h3>
                                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                                    <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                                                    <p><a href="#" class="reply">Reply</a></p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_1.jpg" alt="Image">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jean Doe</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>
                                    </li>
                                </ul>          -->
                                
                                
                                <!-- END comment-list -->
                            <!--
                                <div class="comment-form-wrap pt-5">
                                    <h3 class="mb-5">Leave a comment</h3>
                                    <form action="#" class="">
                                        <div class="form-group">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="url" class="form-control" id="website">
                                        </div>

                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Post Comment" class="btn btn-primary btn-md text-white">
                                        </div>

                                    </form>
                                </div>
                            </div>
-->
                        </div>   
                        
                        
                  <!--       <div class="col-md-4 sidebar">
                            <div class="sidebar-box">
                                <form action="#" class="search-form">
                                    <div class="form-group">
                                        <span class="icon fa fa-search"></span>
                                        <input type="text" class="form-control" placeholder="Arama">
                                    </div>
                                </form>
                            </div>
                            <div class="sidebar-box">
                                <div class="categories">
                                    <h3>Kategoriler</h3>
                                    <li><a href="#">İş Hukuku </a></li>
                                    <li><a href="#">Tazminat Hukuku </a></li>
                                    <li><a href="#">Ticaret Hukuku </a></li>
                                    <li><a href="#">Medeni Hukuk </a></li>
                                    <li><a href="#">Sağlık Hukuku </a></li>
                                </div>
                            </div>
                    <!--        <div class="sidebar-box">
                                <p><img src="images/user-1.jpg" alt="Image" class="img-responsive"></p>
                                <h3 class="text-black">About The Author</h3>
                                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                                <p><a href="#" class="btn btn-primary btn-md text-white">Read More</a></p>
                            </div>

                            <div class="sidebar-box">
                                <h3 class="text-black">Paragraph</h3>
                                <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                            </div>   -->
                        </div>
                    </div>
                </div>
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

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');

        </script>

</body>

</html>
