<?php $this->load->view('dash_pengelola/head_foot/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Data Volunteer
                    <small>Taken from <a href="#" target="_blank">Bagi Barang.com</a></small>
                </h2>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Unverified Volunteer
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID Volunteer</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No KTP</th>
                                            <th>Gender</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Volunteer</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No KTP</th>
                                            <th>Gender</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="show_data">
                                        <?php foreach ($volunteer1 as $vol) { ?>
                                        <tr>
                                            <td><?= $vol->id_volunteer ?></td>
                                            <td><?= $vol->nama ?></td>
                                            <td><?= $vol->email ?></td>
                                            <td><?= $vol->no_ktp ?></td>
                                            <td><?= $vol->jenis_kelamin ?></td>
                                            <td><?= $vol->alamat ?></td>
                                            <td><?= $vol->no_tlp ?></td>
                                            <td align="center">
                                                <div class="demo-google-material-icon">
                                                    <i class="material-icons">warning</i> 
                                                </div>
                                            </td>
                                            <td><img src="<?= base_url().$vol->foto ?>" style="width: 60px; height: 80px;"></td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-info btn-success item_acc" data="<?= $vol->id_volunteer ?>">Verify</a>
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
            <!-- #END# Exportable Table -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <div class="demo-google-material-icon">
                                    <i class="material-icons">verified_user</i>
                                    Verified Volunteer
                                </div>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID Volunteer</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No KTP</th>
                                            <th>Gender</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Volunteer</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No KTP</th>
                                            <th>Gender</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="show_data_unverified">
                                        <?php foreach ($volunteer11 as $vol) { ?>
                                        <tr>
                                            <td><?= $vol->id_volunteer ?></td>
                                            <td><?= $vol->nama ?></td>
                                            <td><?= $vol->email ?></td>
                                            <td><?= $vol->no_ktp ?></td>
                                            <td><?= $vol->jenis_kelamin ?></td>
                                            <td><?= $vol->alamat ?></td>
                                            <td><?= $vol->no_tlp ?></td>
                                            <td align="center">
                                                <div class="demo-google-material-icon">
                                                    <i class="material-icons">verified_user</i> 
                                                </div>
                                            </td>
                                            <td><img src="<?= base_url().$vol->foto ?>" style="width: 60px; height: 80px;"></td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-danger btn-danger item_unverif" data="<?= $vol->id_volunteer ?>">Unverify</a>
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
            <!-- #END# Exportable Table -->
        </div>
        <!-- MODAL ACC -->
        <div class="modal fade" id="ModalACC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">ACC Volunteer</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin akan Acc Volunteer ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_acc btn btn-success" id="btn_acc">Verify</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# MODAL ACC -->
        <!-- MODAL UNACC -->
        <div class="modal fade" id="ModalUNACC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">ACC Volunteer</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin akan Un-Verifikasi Volunteer ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_unacc btn btn-danger" id="btn_unacc">Unverify</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# MODAL UNACC -->
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
        $(document).ready(function(){
            //GET ACC
            $('#show_data').on('click','.item_acc',function(){
                var id=$(this).attr('data');
                $('#ModalACC').modal('show');
                $('[name="kode"]').val(id);
            });

            //PROSES ACC
            $('#btn_acc').on('click',function(){
                $("#btn_acc").html("processing..").attr("disabled", "disabled");
                var kode=$('#textkode').val();
                $.ajax({
                type : "POST",
                url  : "<?= base_url() ?>pengelola/C_kelola_user/accVol",
                dataType : "JSON",
                        data : {kode: kode},
                        success: function(data){
                                $('#ModalACC').modal('hide');
                                location.reload();
                        }
                    });
                    return false;
                });

            //GET UNACC
            $('#show_data_unverified').on('click','.item_unverif',function(){
                var id=$(this).attr('data');
                $('#ModalUNACC').modal('show');
                $('[name="kode"]').val(id);
            });

            //PROSES ACC
            $('#btn_unacc').on('click',function(){
                $("#btn_unacc").html("processing..").attr("disabled", "disabled");
                var kode=$('#textkode').val();
                $.ajax({
                type : "POST",
                url  : "<?= base_url() ?>pengelola/C_kelola_user/unaccVol",
                dataType : "JSON",
                        data : {kode: kode},
                        success: function(data){
                                $('#ModalUNACC').modal('hide');
                                location.reload();
                        }
                    });
                    return false;
                });
        });
    </script>
</body>

</html>
