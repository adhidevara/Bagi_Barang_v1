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

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />
</head>

<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <h1>Laporan Penerimaan Barang Donasi</h1>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Campaign</th>
                                            <th>Judul Campaign</th>
                                            <th>Kategori Campaign</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Campaign</th>
                                            <th>Judul Campaign</th>
                                            <th>Kategori Campaign</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data2 as $campaign) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $i++; ?></th>
                                                <td><?php echo $campaign->id_campaign; ?></td>
                                                <td><?php echo $campaign->judul_campaign; ?></td>
                                                <td><?php echo $campaign->kategori_campaign; ?></td>
                                                <td>
                                                    <form method= "POST" action="<?php echo base_url(); ?>penerima/C_penerima/VtambahBukti"><input type="hidden" name="id_campaign" value="<?php echo $campaign->id_campaign ?>">
                                                        <button type="submit" class="btn bg-deep-orange waves-effect" value="<?php echo $campaign->id_campaign ?>">Buat Laporan</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
   
<!--     <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Barang Yang Dibutuhkan</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="form-group form-float">
                            <label class="form-control">Kategori Barang</label>
                            <select class="form-control show-tick">
                                <option value="">PILIH KATEGORI CAMPAIGN</option>
                                <option value="Sembako">Sembako</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Obat-obatan">Obat-obatan</option>
                            </select>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-control">Nama Barang</label>
                                <input type="namaBarang" class="form-control" name="username" >
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-control">Quantity</label>
                                <input min="0" type="number" name="jumlahBarang" class="form-control" required>
                            </div>
                            <div class="help-info">Barang Berikut merupakan satuan (kilogram, liter dan pax)</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect">Simpan</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>  -->

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