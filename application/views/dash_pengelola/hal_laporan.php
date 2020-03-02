<?php $this->load->view('dash_pengelola/head_foot/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Kelola Laporan
                    <small>Taken from <a href="#" target="_blank">Bagi Barang.com</a></small>
                </h2>
            </div>
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Laporan Donasi
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
<!--                                     <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>pengelola/C_pengelola/formPaket">Buat Paket</a></li>
                                    </ul> -->
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">reorder</i> Verifikasi Laporan
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">receipt</i> List Laporan
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <p>
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>ID Laporan</th>
                                                        <th>ID Campaign</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Link Video</th>
                                                        <th>Foto</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID Laporan</th>
                                                        <th>ID Campaign</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Link Video</th>
                                                        <th>Foto</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="show_data">
                                                    <?php foreach ($lap_unacc as $vol) { ?>
                                                    <tr>
                                                        <td><?= $vol->id_laporan ?></td>
                                                        <td><?= $vol->id_campaign ?></td>
                                                        <td><?= $vol->tanggal_dibuat ?></td>
                                                        <td><center>
                                                            <iframe width="200" height="130" src="<?= $vol->link_video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url().$vol->foto ?>" width="200" height="130">
                                                        </td>
                                                        <th style="background-color: lightpink"><?= $vol->status ?></th>
                                                        <td>
                                                            <a href="<?=base_url()?>pengelola/C_laporan/acc_laporan?id_laporan=<?=$vol->id_laporan?>&id_campaign=<?=$vol->id_campaign?>" class="btn btn-danger btn-danger item_acc" data="<?= $vol->id_laporan ?>">Approve Laporan</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </p>    
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <div class="body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>ID Laporan</th>
                                                        <th>ID Campaign</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Tanggal Approve</th>
                                                        <th>Link Video</th>
                                                        <th>Foto</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID Laporan</th>
                                                        <th>ID Campaign</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Tanggal Approve</th>
                                                        <th>Link Video</th>
                                                        <th>Foto</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="show_data">
                                                    <?php foreach ($lap_acc as $vol) { ?>
                                                    <tr>
                                                        <td><?= $vol->id_laporan ?></td>
                                                        <td><?= $vol->id_campaign ?></td>
                                                        <td><?= $vol->tanggal_dibuat ?></td>
                                                        <td><?= $vol->tanggal_diacc ?></td>
                                                        <td><center>
                                                            <iframe width="200" height="130" src="<?= $vol->link_video ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
                                                        </td>
                                                        <td>
                                                            <img src="<?= base_url().$vol->foto ?>" width="200" height="130">
                                                        </td>
                                                        <th style="background-color: lightgreen;"><?= $vol->status ?></th>
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