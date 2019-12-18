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
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="body">   
                                               <center><h2>Detail Campaign</h2></center> 
                                                <section>
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
                                                </section>
                                        </div>
                                    </div>
                                    <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/formDonasi/<?php echo $data[0]->id_campaign; ?>">
                                        <input type="hidden" name="id_campaign" value="<?php echo $data[0]->id_campaign; ?>">
                                        <input type="submit" name="submit" value="Selanjutnya" class="btn btn-primary" style="float: right;">
                                    </form>
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

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>

    <!-- Sweetalert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>
<!-- <?php $this->load->view('homepage/footer'); ?> -->