<section id="about-section"> <!-- About Section -->
			
					<div class="container-fluid">  
						<div class="row" id="about">
							<?php
							if($this->agent->is_mobile){
							?>
							<div class="col-md-12 wow fadeInUp ruang" data-wow-delay="0.0s">
							     <div class="row">
								     	<div class="col-md-12">
								     		<a class="button-one nengah about_btn button-type-one button-box"><?php echo $galeria['product_name']; ?></a>
								     	</div>
								     	<br/><br/><br/>
								     	<div class="col-md-12">
								     		<div class="about_text kiri">
								     			<!--
												<img src="<?php echo base_url(); ?>komponen/images/tatto.png" class="img-responsive" alt=""/>
											-->
												<?php
												if($galeria['descripti']==null){
												?>
													<center><p class="putiha"><i>No Description.</i></p></center>
												<?php }else{ ?>
													<p class="putiha"><?php echo $galeria['descripti']; ?></p>
												<?php } ?>
									  		</div>
							    		</div>
									</div>
								</div>
							</div>
							<?php }else{ ?>
								<div class="col-md-2"></div>
								<div class="col-md-8 wow fadeInUp ruang" data-wow-delay="0.0s">
									<center>
									<a class="button-one about_btn button-type-one button-box"><?php echo $galeria['product_name']; ?></a>
									</center>
									<br/><br/><br/><br/>
									<div class="about_text">
								     			<!--
												<img src="<?php echo base_url(); ?>komponen/images/tatto.png" class="img-responsive" alt=""/>
											-->
												<?php
												if($galeria['descripti']==null){
												?>
													<center><p class="putiha"><i>No Description.</i></p></center>
												<?php }else{ ?>
													<p class="putiha"><?php echo $galeria['descripti']; ?></p>
												<?php } ?>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<?php } ?> 
					 	</div>
					</div>  
            </section>

            <section id="gallery-one-image-section"> <!-- About Gallery Part -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			<h2 class="w3-validation">For W3 Validation</h2>
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
					<div class="container-fluid">
					    <div class="row">
						    <div class="gallery-one-top wow fadeInLeft" data-wow-delay="0.0s">
						    	<?php
						    	$master = $galeria['product_id'];
						    	$get = $this->db->query("SELECT * FROM gallery WHERE product_id='$master'")->result();
						    	$getto = $this->db->query("SELECT * FROM gallery WHERE product_id='$master'")->num_rows();
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
							<center><i><font color="white">No Gallery.</font></i></center>
						<?php } ?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>	
				</div>
            </section>