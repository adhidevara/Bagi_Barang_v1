<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php   echo base_url(); ?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

    <section class="content">
        <div class="container-fluid">
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPLOAD GAMBAR CAMPAIGN ANDA
                            </h2>
                        </div>
                        <div class="body">
                            <form action="<?=base_url()?>penerima/C_penerima/uploadGambarCampaign" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                    <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            <br>
                            <div class="button-demo">
                                <a href="<?=base_url()?>penerima/C_penerima" class="btn bg-red waves-effect" style="float: right; margin-top: 5px">Upload</a>
                            </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
            
            
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
    <script src="<?php   echo base_url(); ?>assets/dashAssets/js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?php   echo base_url(); ?>assets/dashAssets/js/demo.js"></script>
</body>

</html>
