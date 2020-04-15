<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h1>Laporan Penerimaan Barang Donasi</h1>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table">
                                <div class="body">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Campaign</th>
                                        <th>Judul Campaign</th>
                                        <th>Kategori Campaign</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data2 as $campaign) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $i++ ?></th>
                                        <td><?php echo $campaign->id_campaign; ?></td>
                                        <td><?php echo $campaign->judul_campaign; ?></td>
                                        <td><?php echo $campaign->kategori_campaign; ?></td>
                                        <td><form method= "POST" action="<?php echo base_url(); ?>penerima/C_penerima/VtambahBukti"><input type="hidden" name="id_campaign" value="<?php $campaign->id_campaign ?>"><button type="submit" class="btn bg-deep-orange waves-effect" value="<?php $campaign->id_campaign ?>">Buat Laporan</button></form></td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                            </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Table -->
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