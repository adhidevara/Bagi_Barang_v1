<?php $this->load->view('homepage/header'); ?>
	<div class="fh5co-hero">
		<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo base_url(); ?>assets/images/banner.jpg);">
			<div class="desc animate-box">
				<h2><strong>Donate</strong> for the <strong>Poor Children</strong></h2>
				<span>Yuk <a href="http://frehtml5.co/" target="_blank" class="fh5co-site-name">Donasi Sekarang Juga</a></span>
				<span><a class="btn btn-primary btn-lg" href="#">Donasi Sekarang</a></span>
			</div>
		</div>
	</div>
		<!-- end:header-top -->
		<div id="fh5co-features">
			<div class="container">
				<div class="row">
					<div class="col-md-4">

						<div class="feature-left">
							<span class="icon">
								<i class="icon-profile-male"></i>
							</span>
							<div class="feature-copy">
								<h3>Become a volunteer</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-4">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-happy"></i>
							</span>
							<div class="feature-copy">
								<h3>Happy Giving</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>

					</div>
					<div class="col-md-4">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="feature-copy">
								<h3>Donation</h3>
								<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
								<p><a href="#">Learn More</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Recent From Blog</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">

				<form method="post" action="<?php echo base_url(); ?>MY_Controller/index">
					<input type="submit" value="Cari" name="btCari" class="btn btn-primary btn-m" style="float: right;">
					<input type="search" placeholder="Cari Kampanye" name="cari" class="form-control" style="width: 20%; float: right; margin-right: 10px">
				</form>

				<br><br><br><br>
				<div class="row row-bottom-padded-md">


					<?php $no=0; foreach ($selectAllCampaign as $dt) { 
					$data['selectAllCampaign'] = $this->M_Donatur->viewCampaign();
					$jml = $this->M_Donatur->progressCampaign($dt->id_campaign);
					// $persen = ($jml[0]->jml/$dt->target_campaign)*100;
					// echo "<pre>";
					// print_r ($dt->id_campaign);
					// echo "</pre>";
					?>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="fh5co-blog animate-box">
								<a href="<?php echo base_url(); ?>donatur/C_donatur/detailCampaign?id_campaign=<?= $dt->id_campaign ?>"><img class="img-responsive" src="<?php echo base_url().$dt->gambar; ?>" style="width: 100%; height: 250px; border-radius: 5px"></a><br><br>
								<div class="blog-text" style="height: 280px; width: 100%;">
									<div class="prod-title">
										<h3><a href="<?php echo base_url(); ?>donatur/C_donatur/detailCampaign?id_campaign=<?= $dt->id_campaign ?>"><?php echo $dt->judul_campaign; ?></a></h3>
										<span class="comment"><small>Kateogri : <?php echo $dt->kategori_campaign; ?> Hari </small></span><br>
										
										<font style="color: orange; size: 5px">Waktu campaign</font> 
											<div class="progress" style="background-color: lightgrey">

				                               <div class="progress-bar bg-orange progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
				                                    style=" width: <?=$dt->hsl?>%; background-color: orange">
				                                    <small style="color: white;margin-bottom: 5px;"><?=$dt->hsl?>%&nbsp;(Sisa&nbsp;<?php echo $dt->sisa; ?>&nbsp;Hari)</small>
				                               </div>
				                               
				                           </div>

										<p style="text-align: center;">
											<a href="<?php echo base_url(); ?>donatur/C_donatur/detailCampaign?id_campaign=<?= $dt->id_campaign ?>" class="btn btn-primary btn-sm">Donasi Sekarang</a>
										</p>
									</div>
								</div> 
							</div>
						</div>
					<?php } ?>					


					<div class="clearfix visible-md-block"></div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center animate-box">
						<!-- <a href="#" class="btn btn-primary btn-lg">Lebih Banyak</a> -->
					</div>
				</div>

			</div>
		</div>

		<div id="fh5co-feature-product" class="fh5co-section-gray">
			<div class="container">
				<!-- <div class="row">
					<div class="col-md-12 text-center heading-section">
						<h3>Giving is Virtue.</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
 -->
				<!-- <div class="row row-bottom-padded-md">
					<div class="col-md-12 text-center animate-box">
						<p><img src="<?php echo base_url().$data2[0]->gambar; ?>" alt="Free HTML5 Bootstrap Template" class="img-responsive" style="width: 100%; height: 450px"></p>
					</div>
					<div class="col-md-6 text-center animate-box">
						<p><img src="<?php echo base_url().$view1[0]->gambar; ?>" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
					</div>
					<div class="col-md-6 text-center animate-box">
						<p><img src="<?php echo base_url().$view3[0]->gambar; ?>	" alt="Free HTML5 Bootstrap Template" class="img-responsive"></p>
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Love</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Compassion</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Charity</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
				</div>

				
			</div>
		</div>

		
		<div id="fh5co-portfolio">
			<div class="container">

				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center heading-section animate-box">
						<!-- <h3>Berdasarkan Kategori</h3> -->
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p> -->
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center animate-box">
						<!-- <a href="#" class="btn btn-primary btn-lg">Kategori</a> -->
					</div>
				</div>

				
			</div>
		</div>
		

		
		<div id="fh5co-content-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Our Philantrophist</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/person_1.jpg" alt="user">
							</figure>
							<blockquote>
								<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
							</blockquote>
							<span>Jean Doe, XYZ Co.</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/person_2.jpg" alt="user">
							</figure>
							<blockquote>
								<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
							</blockquote>
							<span>John Doe, XYZ Co.</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/person_3.jpg" alt="user">
							</figure>
							<blockquote>
								<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
							</blockquote>
							<span>John Doe, XYZ Co.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- fh5co-content-section -->

		<div id="fh5co-services-section">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Our Projects. Support Us</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row text-center">
					<div class="col-md-4 col-sm-4">
						<div class="services animate-box">
							<span><i class="icon-heart"></i></span>
							<h3>Water Project In Kenya</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="services animate-box">
							<span><i class="icon-heart"></i></span>
							<h3>Shelter Giving</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="services animate-box">
							<span><i class="icon-heart"></i></span>
							<h3>Shelter Giving</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="services animate-box">
							<span><i class="icon-heart"></i></span>
							<h3>Water Project In Kenya</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="services animate-box">
							<span><i class="icon-heart"></i></span>
							<h3>Water Project In Kenya</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="services animate-box">
							<span><i class="icon-heart"></i></span>
							<h3>Midical Mission</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- END What we do -->


		
		<!-- fh5co-blog-section -->
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2016 Free Html5 <a href="#">Charity</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->

	<?php $this->load->view('homepage/footer'); ?>

	</body>
</html>

