<?php $this->load->view('homepage/header'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Donasi Saya</title>
    <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>assets/dashAssets/favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="styl
        esheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

        <!-- Custom Css -->
        <link href="<?php echo base_url(); ?>assets/dashAssets/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo base_url(); ?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red" bgcolor="lightgrey">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->

<br><br>        
        <div class="container-fluid">
          
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Id Donasi</th>
                                            <th>Id Campaign</th>
                                            <th>Id Donatur</th>
                                            <th>Total Donasi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Donasi</th>
                                            <th>Id Campaign</th>
                                            <th>Id Donatur</th>
                                            <th>Total Donasi</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>

                                    <?php foreach ($data as $dt) { ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $dt->id_donasi; ?></td>
                                                <td><?php echo $dt->id_campaign; ?></td>
                                                <td><?php echo $dt->id_donatur; ?></td>
                                                <td><?php echo $dt->nominal_donasi; ?></td>
                                                <td><input type="submit" value="Detail" class="btn btn-primary"></td>
                                                
                                            </tr>
                                    <?php } ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
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

        <!-- Jquery DataTable Plugin Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/tables/jquery-datatable.js"></script>

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>
</body>

</html>
