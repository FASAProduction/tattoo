<section id="team-section"> <!-- Team Section -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			<h2 class="w3-validation">For W3 Validation</h2>
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
				<div class="container-fluid">
					<div class="row">
					    <div class="team">
							<div class='team_div'>
								    <div class="col-md-4 team-grid-1 wow fadeInLeft" data-wow-delay="0.3s">
									    <a href="#" class="button-one team_btn button-type-one button-box">Gallery</a>
								    </div>
								    <?php
								    foreach($galeri as $ga):
								    ?>
									<div class="col-md-4 team-grid-3 wow fadeInRight" data-wow-delay="0.3s">
											<h3><?php echo $ga->product_name; ?></h3> <!-- Team Member One -->
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc risus eros, ultricies quis erat sit amet, elementum vulputate lorem. Sed at lacinia lectus, quis blandit libero.</p>
											<p>Quisque ac malesuada lectus. Proin gravida feugiat commodo. Phasellus fermentum sem ut felis vehicula aliquet. Donec rhoncus, mi et euismod dictum, purus lorem vehicula justo, a iaculis mi nulla et risus.</p>
											 <ul class="social">
												<li><a href=""> <i class="fb"> </i> </a></li>
												<li><a href=""><i class="tw"> </i> </a></li>
												<li><a href=""><i class="tumb"> </i> </a></li>
												<li><a href=""><i class="linked"> </i> </a></li>
												<li><a href=""><i class="pinterest"> </i> </a></li>
												<li><a href=""><i class="google"> </i> </a></li>
											</ul> 
									</div>
									<?php endforeach; ?>
						            <div class="clearfix"> </div>
						    </div>
						</div>
					</div>
				</div>
			</section>
			
			<section id="twitter-section"> <!-- Twitter Section -->
			
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			<h2 class="w3-validation">For W3 Validation</h2>
			<!-- this is dummy heading for W3-Validation approval you can remove it if you want -->
			
			        <div class="twitter-div wow bounceInUp"  data-wow-delay="0.0s" id="find">
						<div class="container">
							<div class="row">
							    <i class="tw_icon"> </i>
								<p>RT @collis: Trade growth ideas with other founders. Look for ways to cross promote. Small startups today may be big friends later. (9/10)  2 days ago</p>
							</div>
						</div>
                    </div>
			</section>