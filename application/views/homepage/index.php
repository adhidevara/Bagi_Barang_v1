<?php $this->load->view('homepage/header'); ?>
	<div class="fh5co-hero">
		<div class="fh5co-cover text-center" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo base_url(); ?>assets/images/banner.jpg);">
			<div class="desc animate-box">
				<h2><strong>DONASI  </strong> UNTUK <strong>PENDIDIKAN ANAK INDONESIA</strong></h2>
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
								<h3>Menjadi volunteer</h3>
								<p>Menjadi Sukarelawan untuk membantu sesama.</p>
								<p><a href="#">Pelajari lebih lanjut</a></p>
							</div>
						</div>

					</div>

					<div class="col-md-4">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-happy"></i>
							</span>
							<div class="feature-copy">
								<h3>Senang Memberi</h3>
								<p>Dengan memberi anda membuat beban mereka menjadi ringan.</p>
								<p><a href="#">Pelajari lebih lanjut</a></p>
							</div>
						</div>

					</div>
					<div class="col-md-4">
						<div class="feature-left">
							<span class="icon">
								<i class="icon-wallet"></i>
							</span>
							<div class="feature-copy">
								<h3>Donasi</h3>
								<p>Berdonasi barang-barang yang sudah tidak terpakai tapi masih layak digunakan.</p>
								<p><a href="#">Pelajari lebih lanjut</a></p>
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
						<h3>Pilihan Kampanye Bagi Barang</h3>
						<p>pilih kampanye yang direkomendasikan oleh kita.</p>
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
					$date1=date_create($dt->tanggal_campaign);
					$date2=date_create(date("Y-m-d H:i:s"));
					$diff=date_diff($date1,$date2);
					$selisih2 = (int) $diff->format("%a");
					$persen = (int) (($selisih2 / $dt->selisih) * 100);
					// echo "<pre>";
					// print_r ($persen);
					// echo "</pre>";

					// if ($dt->hsl > 0) { //memunculkan campaign yang aktif
					?>
						<div class="col-lg-4 col-md-4 col-sm-6">
							<div class="fh5co-blog animate-box">
								<a href="<?php echo base_url(); ?>donatur/C_donatur/detailCampaign?id_campaign=<?= $dt->id_campaign ?>"><img class="img-responsive" src="<?php echo base_url().$dt->gambar; ?>" style="width: 100%; height: 250px; border-radius: 10px"></a><br><br>
								<div class="blog-text" style="height: 280px; width: 100%;">
									<div class="prod-title">
										<h3><a href="<?php echo base_url(); ?>donatur/C_donatur/detailCampaign?id_campaign=<?= $dt->id_campaign ?>"><?php echo $dt->judul_campaign; ?></a></h3>
										<span class="comment"><small>Kategori : <?php echo $dt->nama_kategori_campaign; ?></small></span><br>
										
										<font style="color: orange; size: 5px">Waktu campaign</font> 
											<div class="progress" style="background-color: lightgrey">

				                               <div class="progress-bar bg-orange progress-bar-striped active" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
				                                    style=" width: <?=$persen?>%; background-color: orange">
				                                    <small style="color: white;margin-bottom: 5px;"><?=$persen?>%&nbsp;(Sisa&nbsp;<?php echo $dt->sisa; ?>&nbsp;Hari)</small>
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
						<a href="#" class="btn btn-primary btn-lg">Lebih Banyak</a>
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
							<h3>Cinta</h3>
							<p>Cinta juga dapat diartikan sebagai suatu perasaan dalam diri seseorang akibat faktor pembentuknya. Dalam konteks filosofi cinta merupakan sifat baik yang mewarisi semua kebaikan, perasaan belas kasih dan kasih sayang.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Berbelas Kasih</h3>
							<p> kepedulian adalah emosi manusia yang muncul akibat penderitaan orang lain. Lebih kuat daripada empati, perasaan ini biasanya memunculkan usaha mengurangi penderitaan orang lain.</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="feature-text">
							<h3>Memberi</h3>
							<p>Memberi itu adalah melepaskan sama sekali kendali tentang sesuatu hal kepada orang lain, sehingga mereka bisa melakukan apa pun yang mereka suka kepada barang yang diberikan.</p>
						</div>
					</div>
				</div>

				
			</div>
		</div>

		
		<div id="fh5co-portfolio">
			<div class="container">

				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center heading-section animate-box">
						<h3>Pilih Kategori Favoritmu</h3>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p> -->
					</div>
				</div>

				
				<div class="row row-bottom-padded-md">
					<div class="col-md-12">
						<ul id="fh5co-portfolio-list">

							<li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo base_url().$campaignByBencanaAlam[0]->gambar; ?>); ">
								<a href="<?php echo base_url(); ?>donatur/C_donatur/viewCampaignByKategori?id=KTGR-CMPG-0001" class="color-3">
									<div class="case-studies-summary">
										<span>Beri Cinta</span>
										<h2><?php echo $campaignByBencanaAlam[0]->nama_kategori_campaign; ?></h2>
									</div>
								</a>
							</li>
						
							<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo base_url().$campaignByPendidikan[0]->gambar; ?>); ">
								<a href="<?php echo base_url(); ?>donatur/C_donatur/viewCampaignByKategori?id=KTGR-CMPG-0002" class="color-4">
									<div class="case-studies-summary">
										<span>Beri Cinta</span>
										<h2><?php echo $campaignByPendidikan[0]->nama_kategori_campaign; ?></h2>
									</div>
								</a>
							</li>

							<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo base_url().$campaignByPantiAsuhan[0]->gambar; ?>); "> 
								<a href="<?php echo base_url(); ?>donatur/C_donatur/viewCampaignByKategori?id=KTGR-CMPG-0003" class="color-5">
									<div class="case-studies-summary">
										<span>Beri Cinta</span>
										<h2><?php echo $campaignByPantiAsuhan[0]->nama_kategori_campaign; ?></h2>
									</div>
								</a>
							</li>
							<li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(<?php echo base_url().$campaignByDifabel[0]->gambar; ?>); ">
								<a href="<?php echo base_url(); ?>donatur/C_donatur/viewCampaignByKategori?id=KTGR-CMPG-0004" class="color-6">
									<div class="case-studies-summary">
										<span>Beri Cinta</span>
										<h2><?php echo $campaignByDifabel[0]->nama_kategori_campaign; ?></h2>
									</div>
								</a>
							</li>
						</ul>		
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center animate-box">
						<a href="#" class="btn btn-primary btn-lg">Kategori</a>
					</div>
				</div>

				
			</div>
		</div>
		

		
		<div id="fh5co-content-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Para Filantropi</h3>
						<p> Filantropi adalah konseptualisasi dari praktek memberi (giving), pelayanan (services) dan asosiasi (association) secara sukarela untuk membantu pihak lain yang membutuhkan sebagai ekspresi rasa cinta.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/profile.png" alt="user">
							</figure>
							<blockquote>
								<p>&ldquo;dan berilah kabar yang menykakan kepada orang yang sabar;(Yaitu) orang-orang yang apabila menimpa kepada mereka suatu musibah, mereka berkata : sesungguhnya kita ini dari Allah dan sesungguhnya kepadaNyalah kita semua akan kembali(Qs. Al-baqarah 155-156).&rdquo;</p>
							</blockquote>
							<span>Rina S.</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/profile.png" alt="user">
							</figure>
							<blockquote>
								<p>&ldquo;Sudahkan anda menabung untuk akhirat kelak nanti ? Bersedekahlah sebelum terlambat.&rdquo;</p><br><br><br><br>
							</blockquote>
							<span>Amanda S.</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="fh5co-testimonial text-center animate-box">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/profile.png" alt="user">
							</figure>
							<blockquote>
								<p>&ldquo;Dan apa yang kamu infakkan allah akan menggantinya dan Dialah pemberi rezeki yang sebaik-baiknya(Qs. Saba : 39).&rdquo;</p><br><br><br>
							</blockquote>
							<span>Supri S.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- fh5co-content-section -->

		<!-- <div id="fh5co-services-section">
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
		</div> -->

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
							<p><b>@ 2020 Bagi Barang</b><br><small>BagiBarang adalah merek dagang dari PT Bagi Barang yang sudah terdaftar di Republik Indonesia.</small></p>
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

