<?php $this->load->view('homepage/header'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/dashAssets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body> <br>
    <section class="">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?php echo base_url().$data[0]->foto; ?>" alt="AdminBSB - Profile Image" style="width: 150px; height: 150px" />
                            </div>
                            <div class="content-area">
                                <h4><?php echo $data[0]->nama; ?></h4>
                                <!-- <p>Web Software Developer</p> -->
                                <p> <font size="2"><?php echo $data[0]->email; ?></font></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Jenis Kelamin</span>
                                    <span><font size="2"><?php echo $data[0]->jenis_kelamin; ?></font></span>
                                </li>
                                <li>
                                    <span>No Tlp</span>
                                    <span><font size="2"><?php echo $data[0]->no_tlp; ?></font></span>
                                </li>
                                <li>
                                    <span>Alamat</span>
                                    <span><font size="2"><?php echo $data[0]->alamat; ?></font></span>
                                </li>
                            </ul>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <!-- <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Formulir Donasi</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="#">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <center>
                                                            <h3>
                                                                <?php echo $data[0]->judul_campaign; ?>
                                                            </h3>
                                                        </center>
                                                        <?php echo substr($data[0]->tanggal_campaign,0,10); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p>Cerita</p> <br>
                                                    </div>
                                                    <div class="post-content">
                                                        <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->deskripsi_campaign; ?></p>
                                                        <br>
                                                        <center>
                                                            <img src="<?php echo base_url().$data[0]->gambar; ?>" class="img-responsive" style="width: 80%; height: auto; border-radius: 50px" />
                                                        </center>
                                                        <br>
                                                        <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->ajakan_campaign; ?></p>
                                                        <br><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="nama" value="<?php echo $data[0]->d_nama; ?>" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="Email"  value="<?php echo $data[0]->d_email; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Isi Nominal Donasi</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="number" class="form-control" id="InputSkills" name="nominal" placeholder="Rp. ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="select" class="col-sm-2 control-label">Pilih Metode Pembayaran</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group">
                                                        <select class="form-control">
                                                            <option name="vacc">Virtual Account</option>
                                                            <option name="tfbank">Transfer Bank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2><?php echo $data[0]->judul_campaign; ?></h2>
                                            <ul class="header-dropdown m-r--5">
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li><a href="javascript:void(0);">Action</a></li>
                                                        <li><a href="javascript:void(0);">Another action</a></li>
                                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body">


                                            <form id="wizard_with_validation" method="POST" action="<?php echo base_url(); ?>">
                                                <h3>DETAIL CAMPAIGN</h3>
                                                <fieldset>
                                                    <div class="panel-body">
                                                        <div class="post">
                                                            <div class="post-heading">
                                                                <p>Cerita</p> <br>
                                                            </div>
                                                            <div class="post-content">
                                                                <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->deskripsi_campaign; ?></p>
                                                                <br>
                                                                <center>
                                                                <img src="<?php echo base_url().$data[0]->gambar; ?>" class="img-responsive" style="width: 80%; height: auto; border-radius: 50px" />
                                                                        </center>
                                                                        <br>
                                                                <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->ajakan_campaign; ?></p>
                                                                <br><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </fieldset>

                                                <h3>FORMULIR DONASI</h3>
                                                <fieldset>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata('nama'); ?>" disabled>
                                                            <label class="form-label">Nama Lengkap</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" name="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" disabled>
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" class="form-control" required >
                                                            <label class="form-label">Nominal Donasi ( Rp. )</label>
                                                        </div>
                                                    </div>
                                                    
                                                    <label class="form-label">METODE PEMBAYARAN</label>
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                        <label class="form-check-label" for="materialGroupExample1">VIRTUAL ACCOUNT</label>
                                                    </div>

                                                    <!-- Group of material radios - option 2 -->
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="materialGroupExample2" name="groupOfMaterialRadios">
                                                        <label class="form-check-label" for="materialGroupExample2">TRANSFER BANK</label>
                                                    </div>

                                                </fieldset>

                                                <h3>LAKUKANPEMBAYARAN</h3>
                                                <fieldset>
                                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                                </fieldset>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>
                    FORM WIZARD
                    <small>Taken from <a href="https://github.com/rstaib/jquery-steps" target="_blank">github.com/rstaib/jquery-steps</a> & <a href="https://jqueryvalidation.org/" target="_blank">jqueryvalidation.org</a></small>
                </h2> -->
            </div>
            <!-- Advanced Form Example With Validation -->
             <!-- <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ADVANCED FORM EXAMPLE WITH VALIDATION</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST">
                                <h3>DETAIL CAMPAIGN</h3>
                                <fieldset>
                                    <div class="panel-body">
                                        <div class="post">
                                            <div class="post-heading">
                                                <p>Cerita</p> <br>
                                            </div>
                                            <div class="post-content">
                                                <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->deskripsi_campaign; ?></p>
                                                <br>
                                                <center>
                                                <img src="<?php echo base_url().$data[0]->gambar; ?>" class="img-responsive" style="width: 80%; height: auto; border-radius: 50px" />
                                                        </center>
                                                        <br>
                                                <p style=";padding-left: 50px;padding-right: 50px"><?php echo $data[0]->ajakan_campaign; ?></p>
                                                <br><br><br>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </fieldset>

                                <h3>FORMULIR DONASI</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" value="<?php echo $data[0]->d_nama; ?>" disabled>
                                            <label class="form-label">Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control" value="<?php echo $data[0]->d_email; ?>" disabled>
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="number" class="form-control" required >
                                            <label class="form-label">Nominal Donasi ( Rp. )</label>
                                        </div>
                                    </div>
                                    
                                    <label class="form-label">METODE PEMBAYARAN</label>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                        <label class="form-check-label" for="materialGroupExample1">VIRTUAL ACCOUNT</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="materialGroupExample2" name="groupOfMaterialRadios">
                                        <label class="form-check-label" for="materialGroupExample2">TRANSFER BANK</label>
                                    </div>

                                </fieldset>

                                <h3>LAKUKANPEMBAYARAN</h3>
                                <fieldset>
                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/examples/profile.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>
</body>
</html>
<!-- <?php $this->load->view('homepage/footer'); ?> -->