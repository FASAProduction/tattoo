<!DOCTYPE HTML>
<html>
		<head>
		
		    <meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
			
			<!-- Title -->
			<title><?php echo $judul; ?></title>
			
			<!-- Bootstrap & Font-Awesome CSS -->
			<link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/bootstrap.min.css" type="text/css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/font-awesome.min.css" type="text/css">
			
			<!-- Custom CSS -->
			<link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/style.css" type="text/css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/prettyPhoto.css" type='text/css'>
			<link rel="stylesheet" href="<?php echo base_url(); ?>komponen/css/responsive.css" type='text/css'>
			
			<!-- Animation CSS -->
			<link href="<?php echo base_url(); ?>komponen/css/animate.css" rel="stylesheet" type="text/css" media="all">
			
			<!-- Google Webfont -->
			<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,700' rel="stylesheet" type='text/css'>

			<!-- Latest compiled and minified CSS -->
			
			<!-- js files & script -->
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/jquery-1.11.1.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/hover_pack.js"></script>
			<script type="text/javascript">
								jQuery(document).ready(function($) {
									$(".scroll").click(function(event){		
										event.preventDefault();
										$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
									});
								});
			</script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/move-top.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/easing.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/modernizr.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/retina.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/jquery.prettyPhoto.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>komponen/js/wow.min.js"></script>
			<script>
				 new WOW().init();
			</script>

			<style>
				.dropdown-menu{
					color: #000;
				}
				.dropdown:hover .dropdown-menu{
					display: block;
					color: #000;
				}

				.sepan{
					color: #fff;
				}

				.sepan_alt{
					background-color: #fff;
					padding: 4px 10px 10px 28px;
					border-radius: 15px 15px 15px 15px;
					display: none;
					margin: 7px 4px -7px -7px;
					color: #000;
				}

				.sepan:hover .sepan_alt{
					display: block;
				}

				.ruang{
					padding: 0px 0px 126px 65px;
					background: url("<?php echo base_url(); ?>komponen/images/about_bg.png");
					background-repeat: no-repeat;
					background-position: center;
					background-size: 206px;
				}

				.putiha{
					color: #fff;
				}
			</style>
			
		</head>
		<body>
		
            <header id="header"> <!-- Header Part -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
					<div class="header">
						<div class="container">
								<!-- start-top-nav -->
								<div class="top-nav">
									<div class="top-header">
										<div class="responsive-logo">
										   <a href="index.html"><img src="<?php echo base_url(); ?>komponen/images/tr_logo_black.png" alt=""/></a>
										</div>
									</div>
									<nav class="nav"  role="navigation">
										<a id="menu-toggle" class="anchor-link" href="#"><img src="<?php echo base_url(); ?>komponen/images/nav.png" alt="" /></a>
										<ul class="nav-list" id="menu">
											<li><a href="#">Home</a></li>
											<li><a href="#about" class="scroll">About</a></li>
											<li class="dropdown">
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery <span class="caret"></span></a>
											    <ul class="dropdown-menu" role="menu">
											    	<?php
											    	foreach($galeri as $gg):
											    	?>
											       <li><a href="#" style="color:#000;"><?php echo $gg->product_name; ?></a></li>
											       <?php endforeach; ?>
											    </ul>
											</li>
											<!-- logo -->
											 <li class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>komponen/images/ori_tattoo.png" alt="" style="width: 71%; margin: 0px 0px 0px 15%;"/></a></li>
											<!-- logo -->
											<li><a href="#faq" class="scroll">Faq</a></li>
											<li><a href="#find" class="scroll">Find Us</a></li>
											<li><a href="#contact" class="scroll">Contact</a></li>
										</ul>
									</nav>
									<script type="text/javascript">
										  $(document).ready(function() {
										
											$('#menu-toggle').click(function () {
											  $('#menu').toggleClass('open');
											  e.preventDefault();
											});
											
										});
									</script>
								</div>
							<!-- End-top-nav -->
						</div>
					</div>
			</header>