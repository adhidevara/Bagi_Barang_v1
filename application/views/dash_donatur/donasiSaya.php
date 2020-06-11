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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="theme-red" bgcolor="lightgrey">

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
                                Donasi Saya
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
                            <br>
                            <p style="color: black;text-align: right;">*Untuk Melacak Barang Donasi Anda dapat melihat pada menu<b style="color: #black"> Detail.</b></p><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Id Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Keterangan</th>
                                            <th style="width: 250px;">Action</th>
                                        </tr>

                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($data as $dt) { ?>
                                        
                                            <tr>
                                                <td><?php echo $dt->id_barang; ?></td>
                                                <td><?php echo $dt->kategori_barang; ?></td>
                                                <td><?php echo $dt->nama_barang; ?></td>
                                                <td><?php echo $dt->jumlah_barang; ?></td>
                                                <td><?php if($dt->resi == null){ echo "<div class='alert alert-warning'>Input No Resi</div>"; }else{ echo "<div class='alert alert-info'>Data Lengkap</div>"; } ?></td>
                                                <td>

                                                    <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/hapusDonasi">
                                                        <input type="hidden" name="id" value="<?php echo $dt->id_barang; ?>">
                                                        <button type="submit" class="btn btn-danger" style="float: left; margin-right: 5px">
                                                        <i class="fa fa-trash"></i>
                                                        </button>    
                                                    </form>
                                                    <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/tampilanEditDonasi">
                                                        <input type="hidden" name="id" value="<?php echo $dt->id_barang; ?>">
                                                        <button type="submit" class="btn btn-success" style="float: left; margin-right: 5px">
                                                        <i class="fa fa-edit"></i> <small> edit </small>
                                                        </button>    
                                                    </form>
                                                    <form method="post" action="<?php echo base_url(); ?>donatur/C_donatur/tampilanDetailDonasi">
                                                        <input type="hidden" name="id" value="<?php echo $dt->id_barang; ?>">
                                                        <button type="submit" class="btn btn-info" style="float: left; margin-right: 5px">
                                                        <i class="fa fa-bars"></i> <small> detail </small>
                                                        </button>    
                                                    </form>
                                                </td>    
                                            </tr>
                                    <?php } ?>
                                    
                                    </tbody>
                                </table><br>
                                <p style="color: black;">
                                <b> Keterangan : </b> <br>
                                <b style="color: #ff9600"> Input No Resi </b> = anda harus mengisi no resi & nama kurir pada menu edit jika anda sudah mengirim barang dan mendapat no resi. <br>
                                <b style="color: #00b0e4">Data Lengkap </b>= anda sudah melengkapi no resi & nama kurir.
                            </p>
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
        <script src="https://kit.fontawesome.com/yourcode.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/tables/jquery-datatable.js"></script>

        <!-- Demo Js -->
        <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>
</body>

</html>
