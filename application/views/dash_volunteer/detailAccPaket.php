<?php $this->load->view('dash_volunteer/head_foot/header'); ?>
 <!-- JQuery DataTable Css -->
    


    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST PAKET
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID PAKET</th>
                                            <th>JENIS BARANG</th>
                                            <th>NO RESI</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID PAKET</th>
                                            <th>JENIS BARANG</th>
                                            <th>NO RESI</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($data2 as $dat) { ?>
                                        <tr>
                                            <td><?=$dat->id_paket?></td>
                                            <td><?=$dat->jenis_barang?></td>
                                            <td><?=$dat->no_resi?></td>
                                            <td>
                                                <?php if ($dat->status != 'Telah diterima oleh Penerima Donasi') {  ?>
                                                <a href="<?=base_url()?>penerima/C_penerima/proAccPaket?id_paket=<?=$dat->id_paket?>&id_campaign=<?php echo $id_campaign; ?>" class="btn btn-primary btn-sm">Terima Paket</a>
                                                &nbsp; &nbsp; &nbsp;
                                                <a href="<?=base_url()?>penerima/C_penerima/VdetailPaket?id_paket=<?=$dat->id_paket?>" class="btn btn-primary btn-sm">Detail</a>
                                            <?php }else{ ?>
                                                <a href="<?=base_url()?>penerima/C_penerima/VdetailPaket?id_paket=<?=$dat->id_paket?>" class="btn btn-primary btn-sm">Detail</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
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