<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

 <section class="content">
        <div class="container-fluid">
            <!-- Advanced Form Example With Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>FORM BUAT CAMPAIGN</h2>
                        </div>
                        <div class="body">
                            <form id="wizard_with_validation" method="POST">
                                <h3>DATA CAMPAIGN</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Judul Campaign</label>
                                            <input type="text" class="form-control" name="judulCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <label class="form-control">Kategori Campaign</label>
                                        <select class="form-control show-tick">
                                           <option value="">PILIH KATEGORI CAMPAIGN</option>
                                            <option value="Bencana Alam">Bencana Alam</option>
                                            <option value="Pendidikan">Pendidikan</option>
                                            <option value="Panti Asuhan">Panti Asuhan</option>
                                            <option value="Difabel">Difabel</option>
                                            <option value="Keluarga">Keluarga</option>
                                            <option value="Kreatif">Kreatif</option>
                                    </select>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Batas Tenggang Waktu Campaign</label>
                                            <input type="date" class="form-control" name="batasCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Ajakan Campaign</label>
                                            <input type="text" class="form-control" name="ajakanCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Deskripsi Campaign</label>
                                            <textarea name="deskripsiCampaign" cols="30" rows="3" class="form-control no-resize" ></textarea>
                                        </div>
                                    </div> 
                                    <div class="form-group form-float">
                                        <div class="form-group">
                                            <label class="form-control">Foto</label>
                                            <input type="file" class="form-control" name="foto" >
                                        </div>
                                    </div> 
                                </fieldset>

                                <h3>LIST BARANG YANG DIBUTUHKAN</h3>
                                <fieldset>
                                    <div class="button-demo js-modal-buttons" style="float: right">
                                        <button type="button" data-color="deep-orange" class="btn bg-deep-orange waves-effect">Tambah Barang</button>
                                    </div>
                                    <!-- Basic Table -->
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="body table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kategori Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>Quantity</th>
                                                                <th>Harga Satuan</th>
                                                                <th>Total Harga Satuan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Mark</td>
                                                                <td>Otto</td>
                                                                <td>... / ...</td>
                                                                <td>@mdo</td>
                                                                <td>@mdo</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- #END# Basic Table -->
                                </fieldset>

                                <h3>KONFIRMASI</h3>
                                <fieldset>
                                    <h2 class="card-inside-title">Galang dana ini ditujukan untuk keperluan ?</h2>
                                        <div class="demo-radio-button">
                                            <input name="group1" type="radio" id="radio_1" checked />
                                            <label class="form-control" style="height: 35px;" for="radio_1">Saya sendiri</label><br>
                                            <input name="group1" type="radio" id="radio_2" />
                                            <label class="form-control" style="height: 35px;" for="radio_2">Keluarga atau Kerabat</label><br>
                                            <input name="group1" type="radio" id="radio_1"/>
                                            <label class="form-control" style="height: 35px;" for="radio_1">Organisasi atau Lembaga</label><br>
                                            <input name="group1" type="radio" id="radio_2" />
                                            <label class="form-control" style="height: 35px;" for="radio_2">Lainnya</label><br>
                                        </div>

                                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                    <label for="acceptTerms-2">Saya setuju dengan Syarat & Ketentuan Donasi di berbagibarang.com, termasuk biaya administrasi platform sebesar 2,5% dari target donasi online yang terkumpul</label>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Form Example With Validation -->
        </div>
    </section>

                                    <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Tambah Barang Yang Dibutuhkan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
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
                                    </div>

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

    <!-- Select Plugin Js -->
    <!-- <script src="<?php echo base_url() ?>assets/dashAssets/plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

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