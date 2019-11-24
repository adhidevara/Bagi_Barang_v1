<!-- Bootstrap Core Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="<?=base_url()?>assets/dashAssets/plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?=base_url()?>assets/dashAssets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=base_url()?>assets/dashAssets/css/themes/all-themes.css" rel="stylesheet" />

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Bagi Barang</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Form Tambah Barang
                            </h2>
                        </div>
                        <div class="body">
                            <form>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="id_pengelola">ID Pengelola</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input disabled type="text" id="id_pengelola" class="form-control" value="<?=$this->session->userdata('id_pengelola')?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="nama_barang">Nama Barang</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="nama_barang" class="form-control" placeholder="Nama Barang">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="vendor">Vendor</label>
                                    <select class="form-control show-tick">
                                        <option>-- Pilih Vendor --</option>
                                        <option>Unilever</option>
                                        <option>Bulog</option>
                                        <option>Kimia Farma</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="kategori_barang">Kategori Barang</label>
                                    <select class="form-control show-tick">
                                        <option>-- Pilih Kategori --</option>
                                        <option>Sembako</option>
                                        <option>Obat-Obatan</option>
                                        <option>Pakaian</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <label for="jumlah_barang">Jumlah Barang</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="jumlah_barang" class="form-control" placeholder="Jumlah Stok" min="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="satuan_barang">Satuan Barang</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="satuan_barang" class="form-control" placeholder="Satuan (Kg/Pieces/Liter/Tablet/Box)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <b>Harga Satuan</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i>Rp.</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control money-dollar" placeholder="Ex: Rp.100.000,-">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url()?>assets/dashAssets/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?=base_url()?>assets/dashAssets/js/admin.js"></script>
    <script src="<?=base_url()?>assets/dashAssets/js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?=base_url()?>assets/dashAssets/js/demo.js"></script>