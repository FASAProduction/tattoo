<section id="team-section"> <!-- Team Section -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
				<div class="container-fluid">
					<div class="row">
					    <div class="team">
							<div class='team_div'>
								    <div class="col-md-4 team-grid-1 wow fadeInLeft" data-wow-delay="0.3s">
									    <a href="#" class="button-one team_btn button-type-one button-box">Products</a>
								    </div>
								    <?php
								    foreach($galeri as $ga):
								    	$alias = $ga->alias;
								    ?>
									<div class="col-md-4 team-grid-3 wow fadeInRight" data-wow-delay="0.3s">
											<h3><?php echo $ga->product_name; ?></h3> <!-- Team Member One -->
											<?php
											if($ga->descripti==null){
											?>
											<center><p><i>No Description.</i></p></center>
										<?php }else{ ?>
											<p><?php echo $ga->descripti; ?></p>
										<?php } ?>
										<br/>
										<br/>
										<a href="<?php echo base_url('products/details/'); ?><?php echo $alias; ?>" class="btn gal">See Galleries</a>
									</div>
									<?php endforeach; ?>
						            <div class="clearfix"> </div>
						    </div>
						</div>
					</div>
				</div>
			</section>