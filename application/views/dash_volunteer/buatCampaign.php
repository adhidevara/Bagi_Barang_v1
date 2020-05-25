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
                            <form id="wizard_with_validation" method="post" enctype="multipart/form-data">
                                <h3>DATA CAMPAIGN</h3>
                                <fieldset>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Judul Campaign</label>
                                            <input type="text" class="form-control" name="judulCampaign" id="judulCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Alamat Tujuan Campaign</label>
                                            <input type="text" class="form-control" name="alamatCampaign" id="alamatCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <label class="form-control">Kategori Campaign</label>
                                        <select class="form-control show-tick" name="kategoriCampaign" id="kategoriCampaign" >
                                           <option value="0">-- Pilih Kategori --</option>
                                           <?php foreach ($katCamp as $kat) { ?>
                                           <option value="<?=$kat->id_kategori_campaign?>"><?=$kat->nama_kategori_campaign?></option>
                                           <?php } ?>
                                    </select>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Batas Waktu Campaign</label>
                                            <input type="date" class="form-control" name="batasCampaign" id="batasCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Ajakan Campaign</label>
                                            <input type="text" class="form-control" name="ajakanCampaign" id="ajakanCampaign" >
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-control">Deskripsi Campaign</label>
                                            <textarea name="deskripsiCampaign" cols="30" rows="3" class="form-control no-resize" id="deskripsiCampaign" ></textarea>
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
                                                    <table class="table" id="tabelBarang">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Barang Dibutuhkan</th>
                                                                <th>ID Campaign</th>
                                                                <th>Kategori Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>Quantity</th>
                                                                <th>Satuan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="show_data">
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
                                        <div class="demo-radio-button" required>
                                            <input name="group1" type="radio" id="radio_1" value="Saya sendiri" checked />
                                            <label class="form-control" style="height: 35px;" for="radio_1">Saya sendiri</label><br>
                                            <input name="group1" type="radio" id="radio_2" value="Keluarga atau Kerabat"/>
                                            <label class="form-control" style="height: 35px;" for="radio_2">Keluarga atau Kerabat</label><br>
                                            <input name="group1" type="radio" id="radio_3" value="Organisasi"/>
                                            <label class="form-control" style="height: 35px;" for="radio_3">Organisasi atau Lembaga</label><br>
                                            <input name="group1" type="radio" id="radio_4" value="Lainnya"/>
                                            <label class="form-control" style="height: 35px;" for="radio_4">Lainnya</label><br>
                                        </div>

                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" style="background-color:#FFF" required>
                                    <!-- <label for="acceptTerms">Saya setuju dengan Syarat & Ketentuan Donasi di berbagibarang.com, termasuk biaya administrasi platform sebesar 2,5% dari target donasi online yang terkumpul</label> -->
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
                                                    <form method="POST" action="<?=base_url();?>penerima/C_penerima/proTambahBarang">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <label class="form-control">Nama Barang</label>
                                                                <!-- <select class="form-control show-tick" data-live-search="true" name="barang" id="namaBarang">
                                                                    <option value="0">-- Pilih Barang --</option>
                                                                    <?php foreach ($barang as $brg) { ?>
                                                                    <option value="<?=$brg->id_barang?>"><?=$brg->nama_barang?></option>
                                                                    <?php } ?>
                                                                </select> -->
                                                                <input type="text" name="barang" id="namaBarang" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <label class="form-control">Kategori Barang</label>
                                                                <select class="form-control show-tick" data-live-search="true" name="kategoriBarang" id="kategoriBarang">
                                                                    <option value="0">-- Pilih Kategori --</option>
                                                                    <?php foreach ($katBrg as $kat) { ?>
                                                                    <option value="<?=$kat->id_kategori_barang?>"><?=$kat->nama_kategori_barang?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <label class="form-control">Quantity</label>
                                                                <input min="0" type="number" name="jumlahBarang" class="form-control" id="quantity" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <label class="form-control">Satuan Barang</label>
                                                                <input type="text" name="satuanBarang" class="form-control" id="satuan" required>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link waves-effect" id="simpanTambahBarang">Simpan</button>
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

    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/forms/form-wizard.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/ui/modals.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>

    <!-- NEM-SDK -->
    <script src="<?=base_url()?>assets/nem-sdk/dist/nem-sdk.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            tampil_data_barang();

            $("a[href='#finish']").click(function(e) {
                console.log("terpencet");
                e.preventDefault();

                var nem = require("nem-sdk").default;

                var judulCampaign = $("#judulCampaign").val();
                var alamatCampaign = $("#alamatCampaign").val();
                var kategoriCampaign = $("#kategoriCampaign").val();
                var batasCampaign = $("#batasCampaign").val();
                var ajakanCampaign = $("#ajakanCampaign").val();
                var deskripsiCampaign = $("#deskripsiCampaign").val();
                var keteranganCampaign = $("input[name='group1']:checked").val();

                 //Create Address/Wallet
                //Password - Private Key
                var privateKey = nem.crypto.helpers.derivePassSha('<?php echo $this->session->userdata('password') ?>'+event.timeStamp+'<?php echo $this->session->userdata('email') ?>', 6000).priv;
                // Create a key pair
                var keyPair = nem.crypto.keyPair.create(privateKey);
                //Signature
                var data = "NEM is awesome !";
                var signature = keyPair.sign(data);
                // Verify Signature
                var result = nem.crypto.verifySignature(keyPair.publicKey.toString(), data, signature.toString());
                //Public Key
                var publicKey = keyPair.publicKey.toString();
                //Convert public key to an address
                var address = nem.model.address.toAddress(publicKey, nem.model.network.data.testnet.id);
                //Verify address validity
                var isValid = nem.model.address.isValid(address);
                var isFromNetwork = nem.model.address.isFromNetwork(address, nem.model.network.data.testnet.id);

                //DEBUG
                console.log(event.timeStamp);
                console.log("PASS: "+'<?php echo $this->session->userdata('password') ?> '+'<?php echo $this->session->userdata('email') ?>');
                console.log("PRIVATE KEY: "+privateKey);
                console.log("KEYPAIR: "+keyPair);
                console.log("Verify Signature: "+result);
                console.log("PUBLIC KEY: "+publicKey);
                console.log("Address: "+address);
                console.log("Verify address: "+isValid);
                console.log("Verify address TEST_NET: "+isFromNetwork);
                
                $.ajax({
                    url: '<?php echo base_url(); ?>penerima/C_penerima/proBuatCampaign',
                    type: 'POST',
                    dataType: 'HTML',
                    data: '&judulCampaign='+ judulCampaign +
                          '&alamatCampaign='+ alamatCampaign +
                          '&kategoriCampaign=' + kategoriCampaign + 
                          '&batasCampaign=' + batasCampaign + 
                          '&ajakanCampaign=' + ajakanCampaign + 
                          '&deskripsiCampaign=' + deskripsiCampaign + 
                          '&keteranganCampaign=' + keteranganCampaign +
                          '&privateKey=' + privateKey +
                          '&publicKey=' + publicKey +
                          '&address=' + address,
                    success :
                    function(pesan) {
                        console.log(pesan);  
                    }
                })
                .done(function() {
                    console.log("success");
                    window.location.href = "<?php echo base_url(); ?>penerima/C_penerima/VuploadGambarCampaign";
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
            });

            $("#simpanTambahBarang").click(function(e) {
                console.log("ditampilkan");
                var namaBarang = $("#namaBarang").val();
                var quantity = $("#quantity").val();
                var kategoriBarang = $("#kategoriBarang").val();
                var satuan = $("#satuan").val();

                $("#simpanTambahBarang").html("please wait..").attr("disabled", "disabled");

                $.ajax({
                    url: '<?php echo base_url(); ?>penerima/C_penerima/proTambahBarang',
                    type: 'POST',
                    dataType: 'HTML',
                    data: 'namaBarang='+ namaBarang + '&quantity=' + quantity + '&kategoriBarang=' + kategoriBarang + '&satuan=' + satuan,
                    success:
                    function(pesan){
                        console.log(pesan);
                    }
                })
                .done(function() {
                    console.log("success");
                    $('#mdModal').modal('toggle');
                    Swal.fire(
                      'Berhasil Tambah Barang',
                      'Barang berhasil ditambahkan pada list',
                      'success'
                    );
                    $("#namaBarang").val(" ");
                    $("#quantity").val(" ");
                    $("#kategoriBarang").val("0");
                    $("#satuan").val("");
                    $("#simpanTambahBarang").html("Simpan").removeAttr("disabled", "disabled");

                    tampil_data_barang();
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            });            
        });

        $('#tabelBarang').dataTable();
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>penerima/C_penerima/barangDibutuhkanJson',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].id_barang_butuh+'</td>'+
                                '<td>'+data[i].id_campaign+'</td>'+
                                '<td>'+data[i].kategori_barang+'</td>'+
                                '<td>'+data[i].nama_barang+'</td>'+
                                '<td>'+data[i].jumlah+'</td>'+
                                '<td>'+data[i].satuan_barang+'</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

    </script>
