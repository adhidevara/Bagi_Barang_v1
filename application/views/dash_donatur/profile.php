<?php $this->load->view('homepage/header'); ?>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Profile | Bootstrap Based Admin Template - Material Design</title>
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

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<br>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <?php if ($this->session->userdata('foto') !== "") { ?>
                                    <img src="<?php echo base_url().$this->session->userdata('foto'); ?>" style="width: 150px; height: 150px">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>assets/images/profile.png" style="width: 150px; height: 150px">
                                <?php } ?>
                                
                            </div>
                            <div class="content-area">
                                <h3><?php echo $this->session->userdata('nama'); ?></h3>
                                <p><?php echo $this->session->userdata('id_donatur'); ?></p>
                                <p><?php echo $this->session->userdata('email'); ?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Jenis Kelamin</span>
                                    <span><?php echo $this->session->userdata('jenis_kelamin'); ?></span>
                                </li>
                                <li>
                                    <span>No Telepon</span>
                                    <span><?php echo $this->session->userdata('no_tlp'); ?></span>
                                </li>
                                <li>
                                    <span>Alamat</span>
                                    <span><?php echo $this->session->userdata('alamat'); ?></span>
                                </li>
                            </ul>
                            <!-- <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button> -->
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Education
                                    </div>
                                    <div class="content">
                                        B.S. in Computer Science from the University of Tennessee at Knoxville
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Location
                                    </div>
                                    <div class="content">
                                        Malibu, California
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
                                        Skills
                                    </div>
                                    <div class="content">
                                        <span class="label bg-red">UI Design</span>
                                        <span class="label bg-teal">JavaScript</span>
                                        <span class="label bg-blue">PHP</span>
                                        <span class="label bg-amber">Node.js</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Description
                                    </div>
                                    <div class="content">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Edit Profile</a></li>
                                    <!-- <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li> -->
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <form class="form-horizontal" action="<?php echo base_url(); ?>donatur/C_donatur/editProfile" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama Lengkap</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NameSurname" name="nama" value="<?php echo $this->session->userdata('nama'); ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="<?php echo $this->session->userdata('email'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">No Tlp</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="no_tlp" value="<?php echo $this->session->userdata('no_tlp'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-10">
                                                    <!-- Group of material radios - option 2 -->
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="materialGroupExample1" name="jekel" value="laki-laki">
                                                        <label class="form-check-label" for="materialGroupExample1" >Laki-laki</label>
                                                    </div>

                                                    <!-- Group of material radios - option 2 -->
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="materialGroupExample2" name="jekel" value="perempuan">
                                                        <label class="form-check-label" for="materialGroupExample2" >Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">No KTP</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="no_ktp" value="<?php echo $this->session->userdata('no_ktp'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Alamat</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="alamat" rows="3"><?php echo $this->session->userdata('alamat'); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Upload Foto</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" id="InputSkills" name="foto" >
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/examples/profile.js"></script> 

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>


</html>