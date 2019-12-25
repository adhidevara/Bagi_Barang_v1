<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Laporan Pembelian Barang <?php echo $data3[0]->judul_campaign; ?></h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table">
                                <div class="body">
                        </div>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Quantity</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                <?php foreach ($data4 as $brgBth) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $brgBth->kategori_barang; ?></td>
                                        <td><?php echo $brgBth->nama_barang; ?></td>
                                        <td><?php echo $brgBth->jumlah_dibeli; ?></td>
                                        <td><input type="file" name="foto"></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <form method= "POST" action="VtambahBukti/?id_campaign="><input type="hidden" name="id_campaign" value=""><button style="float: right" type="submit" class="btn bg-deep-orange waves-effect">Upload Laporan</button></form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
        </div>
    </section>


     <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?php echo base_url() ?>assets/dashAssets/plugins/dropzone/dropzone.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url() ?>assets/dashAssets/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url() ?>assets/dashAssets/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?php echo base_url() ?>assets/dashAssets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url() ?>assets/dashAssets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo base_url() ?>assets/dashAssets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/forms/form-wizard.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>


    <script type="text/javascript">
        $(document).ready(function(e){
            $("#simpan").click(function(e){
                var kategoriBarang = $("#kategoriBarang").val();
                var namaBarang = $("#namaBarang").val();
                var quantity = $("#quantity").val();

                console.log(kategoriBarang+ namaBarang+ quantity);
            });
        });
        
    </script>
