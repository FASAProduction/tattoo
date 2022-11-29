<section id="about-section"> <!-- About Section -->
			
					<div class="container-fluid">  
						<div class="row" id="about">
							<?php
							if($this->agent->is_mobile()){
							?>
							<div class="col-md-12 wow fadeInUp ruang" data-wow-delay="0.0s">
							     <div class="row">
								     	<div class="col-md-12">
								     		<a href="#" class="button-one about_btn button-type-one button-box" style="word-wrap: break-word; text-align: center;">About Us</a>
								     	</div>
								     	<div class="col-md-12">
								     		<div class="about_text kiri">
								     			<!--
												<img src="<?php echo base_url(); ?>komponen/images/tatto.png" class="img-responsive" alt=""/>
											-->
												<h3>We are a unique studio which demands the absolute 
												highest level in tattoo art standards from the very 
												best tattoo artists.</h3>
												<p class="putiha">We consider our level of art to be
												exceptional, where good art is not good enough. We are 
												not a bulk tattoo franchise! </p>
												<p class="putiha">We are has established a great reputation, not only 
												because of the incredible art we produce but also due 
												to the sterile environment of the studio and customer 
												service which ensures complete customer satisfaction. 
												Our artists are international award-winners and are 
												gifted in tattoos of all styles. We have a specialists 
												in each tattoo style. We design 100% original tattoos 
												based on your ideas.
												<br/> <br/>
												You think it, we can ink it!
												<br/> <br/>
												We are happy to assess and fix existing tattoos, restore 
												faded tattoos and do complete cover ups.
												<br/><br/><br/><br/>
												In Bali you have to be extremely cautious where you get 
												tattooed as many studio.</p>
									  		</div>
							    		</div>
									</div>
								</div>
							</div>
							<?php }else{ ?>
								<div class="col-md-12 wow fadeInUp ruang" data-wow-delay="0.0s">
							     <div class="row">
								     	<div class="col-md-7">
								     		<a href="#" class="button-one about_btn button-type-one button-box">About Us</a>
								     	</div>
								     	<div class="col-md-5">
								     		<div class="about_text">
								     			<!--
												<img src="<?php echo base_url(); ?>komponen/images/tatto.png" class="img-responsive" alt=""/>
											-->
												<h3>We are a unique studio which demands the absolute 
												highest level in tattoo art standards from the very 
												best tattoo artists.</h3>
												<p class="putiha">We consider our level of art to be
												exceptional, where good art is not good enough. We are 
												not a bulk tattoo franchise! </p>
												<p class="putiha">We are has established a great reputation, not only 
												because of the incredible art we produce but also due 
												to the sterile environment of the studio and customer 
												service which ensures complete customer satisfaction. 
												Our artists are international award-winners and are 
												gifted in tattoos of all styles. We have a specialists 
												in each tattoo style. We design 100% original tattoos 
												based on your ideas.
												<br/> <br/>
												You think it, we can ink it!
												<br/> <br/>
												We are happy to assess and fix existing tattoos, restore 
												faded tattoos and do complete cover ups.
												<br/><br/><br/><br/>
												In Bali you have to be extremely cautious where you get 
												tattooed as many studio.</p>
									  		</div>
							    		</div>
									</div>
								</div>
							</div>
							<?php } ?> 
					 	</div>
					</div>  
            </section>

            <section id="gallery-one-image-section"> <!-- About Gallery Part -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			<h2 class="w3-validation"></h2>
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
					<div class="container-fluid">
					    <div class="row">
						    <div class="gallery-one-top wow fadeInLeft" data-wow-delay="0.0s">
						    	<?php
						    	$get = $this->db->query("SELECT * FROM gallery WHERE showed='Y'")->result();
						    	$getto = $this->db->query("SELECT * FROM gallery WHERE showed='Y'")->num_rows();
						    	if($getto > 0){
						    	foreach($get as $gee):
						    	?>
								<div class="col-md-3 about-gallery">
									<div class="b-link-stripe b-animate-go thickbox"> <!-- Gallery one image no : 1 -->
												<img src="<?php echo base_url(); ?>komponen/images/gallery/<?php echo $gee->contents; ?>" class="gallery-one-image img-responsive" alt=""/> 
												<div class="b-wrapper">
														<div class="b-animate b-from-left b-delay03 ">
															<a href="<?php echo base_url(); ?>komponen/images/gallery/<?php echo $gee->contents; ?>" rel="prettyPhoto[pp_gal]">
																<button class="zooming about-zooming md-trigger">
																		<img src="<?php echo base_url(); ?>komponen/images/zoom.png" alt=""/>
																</button>
															</a>
														</div>
												</div>
										</div>
								</div>
							<?php endforeach; 
						}else{
							?>
							<center><i><font color="white"><h2>No gallery to display.</h2></font></i></center>
							<br/><br/><br/>
						<?php } ?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>	
				</div>
            </section>
			
			<!--
			
			
					 <div class="testimonial wow bounceIn" data-wow-delay="0.0s" id="faq">
							<div class="container">
									<div class="row">
									    <div class="test_wrap">
											<p><span class="quotes"></span>Aliquam ac justo interdum, elementum ligula et, condimentum orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit.<span class="quotes-down"></span></p>
											<h4>- John Doe -</h4>
											<div class="clearfix"> </div>
									    </div>
									</div>
							</div>
                     </div>
			</section>
			-->