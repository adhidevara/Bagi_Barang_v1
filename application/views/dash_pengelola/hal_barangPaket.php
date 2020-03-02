<!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<?php $this->load->view('dash_pengelola/head_foot/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Barang Paket
                    <small>Taken from <a href="#" target="_blank">Bagi Barang.com</a></small>
                </h2>
            </div>
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Detail Paket
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">reorder</i> Sortir Barang
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">receipt</i> Isi Paket
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <h2 class="card-inside-title">Input Barang Paket</h2>
                                    <form action="<?=base_url()?>pengelola/C_paket/barangPaket" method="POST">
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <input type="hidden" name="id_paket" value="<?=$id_paket?>">
                                            <input type="hidden" name="id_campaign" value="<?=$id_campaign?>">
                                            <input type="hidden" name="jenis_barang" value="<?=$jenis_barang?>">
                                            <select class="form-control show-tick" name="id_barang" required>
                                                <option value="">-- Pilih Barang --</option>
                                                <?php foreach ($data as $da) { ?>
                                                <option value="<?=$da->id_barang?>"><?=$da->nama_barang?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-1">
                                            Jumlah Sortir :
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="input-group spinner" data-trigger="spinner">
                                                <div class="form-line">
                                                    <input type="text" class="form-control text-center" value="1" data-rule="quantity" name="qty" required>
                                                </div>
                                                <span class="input-group-addon">
                                                    <a href="javascript:;" class="spin-up" data-spin="up"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                                    <a href="javascript:;" class="spin-down" data-spin="down"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT">
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>ID Barang</th>
                                                        <th>ID Donatur</th>
                                                        <th>ID Campaign</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID Barang</th>
                                                        <th>ID Donatur</th>
                                                        <th>ID Campaign</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="show_data">
                                                    <?php foreach ($isi as $vol) { ?>
                                                    <tr>
                                                        <td><?= $vol->id_barang ?></td>
                                                        <td><?= $vol->id_donatur ?></td>
                                                        <td><?= $vol->id_campaign ?></td>
                                                        <td><?= $vol->kategori_barang ?></td>
                                                        <td><?= $vol->nama_barang ?></td>
                                                        <td><?= $vol->jumlah_barang ?></td>
                                                        <td><?= $vol->satuan_barang ?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
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

    <!-- Jquery Spinner Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-spinner/js/jquery.spinner.js"></script>

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

    <script type="text/javascript">
        //some js here
    </script>
</body>

</html>