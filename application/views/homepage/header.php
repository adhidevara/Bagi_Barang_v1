<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Bagi Barang v.1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

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

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/loc.png">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/superfish.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">


	<!-- Modernizr JS -->
	<script src="<?php echo base_url(); ?>assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style type="text/css">
		.pass_show{position: relative}
		.pass_show .ptxt {
			position: absolute;
			top: 50%;
			right: 10px;
			z-index: 1;
			color: #f36c01;
			margin-top: -10px;
			cursor: pointer;
			transition: .3s ease all;
		}
		.pass_show .ptxt:hover{color: #333333;}
	</style>

	</head>

<!------------------------------------------------------------------------------------------------------------------------------>

	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Masuk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-email">E-Mail</label>
          <input type="email" id="defaultForm-email" class="form-control validate" placeholder="example@domain.com">
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
			<div class="form-group pass_show">
				<input type="password" id="defaultForm-pass" class="form-control validate" placeholder="******">
			</div>
		</div>

        <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#modalLupaPasswordForm">Lupa Password</a>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" id="btnLogin">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- ----------------------------------------------------------------------------------------------- -->

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Daftar Akun</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
          <input type="text" id="orangeForm-name" class="form-control validate">
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
          <input type="email" id="orangeForm-email" class="form-control validate">
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
			<div class="form-group pass_show">
          		<input type="password" id="orangeForm-pass" class="form-control validate">
			</div>
        </div>

        <br>

        <div class="md-form mb-4" align="center">
          <i class="fas fa-lock prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Daftar Sebagai :</label><br>
          <input class="form-check-input" type="radio" name="radioAccType" id="accTypeDonatur" value="donatur" checked>
          <label data-error="wrong" data-success="right" for="donatur">Donatur</label> | 
          <input class="form-check-input" type="radio" name="radioAccType" id="accTypeVolunteer" value="volunteer">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Volunteer</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary btn-m" id="btnRegis">Daftar</button>
      </div>
    </div>
  </div>
</div>

<!-- ----------------------------------------------------------------------------------------------- -->

  <div class="modal fade" id="modalLupaPasswordForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Lupa Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="emailLupa">E-Mail</label>
          <input type="email" id="emailLupa" name="emailLupa" class="form-control validate" placeholder="example@domain.com">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" id="btnSubmitLupaPassword">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- ----------------------------------------------------------------------------------------------- -->

<body>
    <div id="fh5co-wrapper">
    <div id="fh5co-page">
    <div class="header-top" style="background-color: black">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 text-left fh5co-link">
            <!-- <a href="<?php echo base_url() ?>donatur/C_Bank/index">Tentang</a> -->
            <a href="#">Tanya Jawab</a>
            <a href="#">Kontak</a>
          </div>
          <div class="col-md-6 col-sm-6 text-right fh5co-social">
            <a href="#" class="grow"><i class="icon-facebook2"></i></a>
            <a href="#" class="grow"><i class="icon-twitter2"></i></a>
            <a href="#" class="grow"><i class="icon-instagram2"></i></a>
          </div>
        </div>
      </div>
    </div>
    <header id="fh5co-header-section" class="sticky-banner">
      <div class="container">
        <div class="nav-header">
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
          <h1 id="fh5co-logo"><a href="<?php echo base_url(); ?>MY_Controller/index">Bagi Barang</a></h1>
          <!-- START #fh5co-menu-wrap -->
          <nav id="fh5co-menu-wrap" role="navigation">
            <ul class="sf-menu" id="fh5co-primary-menu">
              <li>
                <a href="<?php echo base_url(); ?>MY_Controller/index">Halaman Utama</a>
              </li>
              <!-- <li>
                <a href="#" class="fh5co-sub-ddown">Get Involved</a>
                <ul class="fh5co-sub-menu">
                  <li><a href="#">Donate</a></li>
                  <li><a href="#">Fundraise</a></li>
                  <li><a href="#">Campaign</a></li>
                  <li><a href="#">Philantrophy</a></li>
                  <li><a href="#">Volunteer</a></li>
                </ul>
              </li> -->
              <!-- <li>
                <a href="#" class="fh5co-sub-ddown">Projects</a>
                 <ul class="fh5co-sub-menu">
                  <li><a href="#">Water World</a></li>
                  <li><a href="#">Cloth Giving</a></li>
                  <li><a href="#">Medical Mission</a></li>
                </ul>
              </li> -->
              <li><a href="<?php echo base_url(); ?>MY_Controller/index/about">Tentang Kami</a></li>
              <!-- <li><a href="<?php echo base_url(); ?>MY_Controller/index/blog">Blog</a></li> -->
              <li><a href="<?php echo base_url(); ?>donatur/C_donatur/donasiSaya">Donasi Saya</a></li>
              <?php if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 1) { ?>
              <li>
                <a href="#" class="fh5co-sub-ddown"><?php echo $this->session->userdata('nama'); ?></a>
                  <ul class="fh5co-sub-menu">
                    <li><b>Akun Pengelola</b></li>
                    <li><a href="<?= base_url(); ?>dashboard_pengelola">Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>MY_Controller/logout">Logout</a></li>
                  </ul>
              </li>
              <?php } else if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 2) { ?>
              <li>
                <a href="#" class="fh5co-sub-ddown"><?php echo $this->session->userdata('nama'); ?></a>
                  <ul class="fh5co-sub-menu">
                    <li><b>Akun Donatur</b></li>
                    <!-- <li><a href="#">Dashboard</a></li> -->
                    <li><a href="<?php echo base_url(); ?>donatur/C_donatur/profile">Profile</a></li>
                    <li><a href="<?php echo base_url(); ?>MY_Controller/logout">Logout</a></li>
                  </ul>
              </li>
              <?php } else if ($this->session->has_userdata('role_id') && $this->session->userdata('role_id') == 3) { ?>
              <li>
                <a href="#" class="fh5co-sub-ddown"><?php echo $this->session->userdata('nama'); ?></a>
                  <ul class="fh5co-sub-menu">
                    <li><b>Akun Volunteer</b></li>
                    <li><a href="<?php echo base_url(); ?>penerima/C_penerima">Dashboard</a></li>
                    <li><a href="<?php echo base_url(); ?>MY_Controller/logout" id="logout">Logout</a></li>
                  </ul>
              </li>
              <?php } else { ?>
              <li><a href="" class="" data-toggle="modal" data-target="#modalLoginForm">Masuk</a></li>
              <li><a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalRegisterForm">Daftar</a></li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
    </header>
