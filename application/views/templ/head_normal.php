<!DOCTYPE HTML>
<html lang="id">
		<head>
		
		    <meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
			<meta name="author" content="Three False Tattoo Studio">
			<meta name="description" content="Sebuah studio tattoo yang berlokasikan di Bali, Indonesia">
			<meta name="keywords" content="threefalse, tf, studio tattoo bali, studio tato, tato bali, bali tattoo, tato studio">
			
			<!-- Title -->
			<title><?php echo $judul; ?></title>
			<link rel="icon" type="image/png" href="<?php echo base_url(); ?>komponen/images/ori_tattoo.png">
			
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
			<link href='https://fonts.googleapis.com/css?family=Noticia+Text:400,700' rel="stylesheet" type='text/css'>

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
			
			
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-GX88QNSNM9"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'G-GX88QNSNM9');
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
				}

				.putiha{
					color: #fff;
				}

				.kiri{
					margin: 0px 0px 0px 0px;
					text-align: justify;
				}

				.nengah{
					margin: 85px 0px 0px 0px;
					text-align: justify;
					padding: 15px 68px 20px 61px;
					width: 75%;
				}

				.menengah{
					margin: 0px 0px 0px 0px;
				}

				.jarak{
					margin: 0px 0px 0px 21px;
				}

				.gal{
					background-color: #000;
					color: #fff;
					border-radius: 20px 20px;
					box-shadow: 0px 0px 13px 2px #999;
					width: 100%;
					margin: 219px 0px 0px 0px;
				}

				.gal:hover{
					background-color: #4f2100;
					color: #fff;
					animation-name: fadeInLeft;
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
										   <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>komponen/images/ori_tattoo.png" alt=""/></a>
										</div>
									</div>
									<?php
									if($this->agent->is_mobile){
									?>
									<nav class="nav" role="navigation">
										<a id="menu-toggle" class="anchor-link" href="#"><img src="<?php echo base_url(); ?>komponen/images/nav.png" alt="" /></a>
										<ul class="nav-list" id="menu">
											<li><a href="<?php echo base_url(); ?>">Home</a></li>
											<li><a href="<?php echo base_url(); ?>#about" class="scroll">About</a></li>
											<li class="dropdown">
											   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menu" aria-expanded="true">Gallery <span class="caret"></span></a>
											    <ul class="dropdown-menu" role="menu">
											    	<?php
											    	foreach($galeri as $gg):
											    		$alias = $gg->alias;
											    	?>
											       <li><a href="<?php echo base_url('products/details/'); ?><?php echo $alias; ?>" style="color:#000;"><?php echo $gg->product_name; ?></a></li>
											       <?php endforeach; ?>
											    </ul>
											</li>
											<!-- logo -->
											 <li class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>komponen/images/ori_tattoo.png" alt="" style="width: 71%; margin: 0px 0px 0px 15%;"/></a></li>
											<!-- logo -->
											<li><a href="<?php echo base_url(); ?>#faq" class="scroll">Faq</a></li>
											<li><a href="<?php echo base_url(); ?>#find" class="scroll">Find Us</a></li>
											<li><a href="<?php echo base_url(); ?>#contact" class="scroll">Contact</a></li>
										</ul>
									</nav>
								<?php }else{ ?>
									<nav class="nav" role="navigation">
										<a id="menu-toggle" class="anchor-link" href="#"><img src="<?php echo base_url(); ?>komponen/images/nav.png" alt="" /></a>
										<ul class="nav-list" id="menu">
											<li><a href="<?php echo base_url(); ?>">Home</a></li>
											<li><a href="<?php echo base_url(); ?>#about" class="scroll">About</a></li>
											<li class="dropdown">
											   <a href="<?php echo base_url('products'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="menu" aria-expanded="true">Gallery <span class="caret"></span></a>
											    <ul class="dropdown-menu" role="menu">
											    	<?php
											    	foreach($galeri as $gg):
											    		$alias = $gg->alias;
											    	?>
											       <li><a href="<?php echo base_url('products/details/'); ?><?php echo $alias; ?>" style="color:#000;"><?php echo $gg->product_name; ?></a></li>
											       <?php endforeach; ?>
											    </ul>
											</li>
											<!-- logo -->
											 <li class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>komponen/images/ori_tattoo.png" alt="" style="width: 71%; margin: 0px 0px 0px 15%;"/></a></li>
											<!-- logo -->
											<li><a href="<?php echo base_url(); ?>#faq" class="scroll">Faq</a></li>
											<li><a href="<?php echo base_url(); ?>#find" class="scroll">Find Us</a></li>
											<li><a href="<?php echo base_url(); ?>#contact" class="scroll">Contact</a></li>
										</ul>
									</nav>
								<?php } ?>
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