<?php $this->load->view('dash_pengelola/head_foot/header'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Kelola Paket
                    <small>Taken from <a href="#" target="_blank">Bagi Barang.com</a></small>
                </h2>
            </div>
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Sortir dan Pengiriman Paket Barang
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?=base_url()?>pengelola/C_pengelola/formPaket">Buat Paket</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">reorder</i> Data Paket (Belum Dikirim)
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">receipt</i> Data Paket (Siap Dikirim)
										<span style="color: red;font-size: 20px;"><?=count($resultStatus)?></span>
                                    </a>
                                </li>
								<li role="presentation">
									<a href="#profile_with_icon_title1" data-toggle="tab">
										<i class="material-icons">local_shipping</i> Data Paket (Sedang Dikirim)
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
                                                        <th>ID Paket</th>
                                                        <th>ID Campaign</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID Paket</th>
                                                        <th>ID Campaign</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="show_data">
													<?php
														foreach ($resultStatus as $vol){
															if ($vol->res < 0 || $vol->jml == ""){
													?>
                                                    <tr>
                                                        <td><?= $vol->id_paket ?></td>
                                                        <td><?= $vol->id_campaign ?></td>
                                                        <td><?= $vol->jenis_barang ?></td>
                                                        <td><?= $vol->tanggal_sortir ?></td>
                                                        <td><?= $vol->keterangan ?></td>
                                                        <td>
                                                            <a href="<?=base_url()?>pengelola/C_pengelola/barangPaket?id_paket=<?=$vol->id_paket?>&id_campaign=<?=$vol->id_campaign?>&jenis_barang=<?=$vol->jenis_barang?>" class="btn btn-danger item_acc" data="<?= $vol->id_paket ?>">
																Sortir Barang
															</a>
                                                        </td>
                                                    </tr>
                                                <?php }} ?>
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
                                                        <th>ID Paket</th>
                                                        <th>ID Campaign</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Nama Kurir</th>
                                                        <th>No Resi</th>
                                                        <th>Tanggal Kirim</th>
                                                        <th>Tanggal Terima</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID Paket</th>
                                                        <th>ID Campaign</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Nama Kurir</th>
                                                        <th>No Resi</th>
                                                        <th>Tanggal Kirim</th>
                                                        <th>Tanggal Terima</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody id="show_data">
												<?php
													foreach ($resultStatus as $vol){
														if ($vol->res == 0 && $vol->jml > 0 && $vol->status == "Proses Penyortiran"){
												?>
                                                    <tr>
                                                        <td><?= $vol->id_paket ?></td>
                                                        <td><?= $vol->id_campaign ?></td>
                                                        <td><?= $vol->jenis_barang ?></td>
                                                        <td><?= $vol->nama_kurir ?></td>
                                                        <td><?= $vol->no_resi ?></td>
                                                        <td><?= $vol->tanggal_pengiriman ?></td>
                                                        <td><?= $vol->tanggal_diterima ?></td>
                                                        <td><?= $vol->tanggal_sortir ?></td>
                                                        <td><?= $vol->keterangan ?></td>
                                                        <td>
                                                            <a href="<?=base_url()?>pengelola/C_pengelola/kirimPaket?id_paket=<?=$vol->id_paket?>" class="btn btn-info btn-success item_acc" data="<?= $vol->id_paket ?>">
																Siap Kirim
															</a>
                                                        </td>
                                                    </tr>
                                                <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
								<div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title1">
									<div class="body">
										<div class="table-responsive">
											<table class="table table-bordered table-striped table-hover dataTable js-exportable">
												<thead>
												<tr>
													<th>ID Paket</th>
													<th>ID Campaign</th>
													<th>Jenis Barang</th>
													<th>Nama Kurir</th>
													<th>No Resi</th>
													<th>Tanggal Kirim</th>
													<th>Tanggal Terima</th>
													<th>Tanggal Dibuat</th>
													<th>Keterangan</th>
													<th>Aksi</th>
												</tr>
												</thead>
												<tfoot>
												<tr>
													<th>ID Paket</th>
													<th>ID Campaign</th>
													<th>Jenis Barang</th>
													<th>Nama Kurir</th>
													<th>No Resi</th>
													<th>Tanggal Kirim</th>
													<th>Tanggal Terima</th>
													<th>Tanggal Dibuat</th>
													<th>Keterangan</th>
													<th>Aksi</th>
												</tr>
												</tfoot>
												<tbody id="show_data">
												<?php
												foreach ($resultStatus as $vol){
													if ($vol->status == "Paket Sedang Dikirim"){
														?>
														<tr>
															<td><?= $vol->id_paket ?></td>
															<td><?= $vol->id_campaign ?></td>
															<td><?= $vol->jenis_barang ?></td>
															<td><?= $vol->nama_kurir ?></td>
															<td><?= $vol->no_resi ?></td>
															<td><?= $vol->tanggal_pengiriman ?></td>
															<td><?= $vol->tanggal_diterima ?></td>
															<td><?= $vol->tanggal_sortir ?></td>
															<td><?= $vol->keterangan ?></td>
															<td>
																<a href="#" class="btn btn-info btn-info item_acc" data="<?= $vol->id_paket ?>">
																	Detail Paket
																</a>
															</td>
														</tr>
													<?php }} ?>
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
