<?php $this->load->view('dash_pengelola/head_foot/header'); ?>
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>
				List Donasi
				<small>Taken from <a href="#" target="_blank">Bagi Barang.com</a></small>
			</h2>
		</div>
		<!-- Tabs With Icon Title -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>
							List Transaksi Donasi <?=$_GET['id_campaign']?>
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<!--									<li><a href="--><?//=base_url()?><!--pengelola/C_pengelola/formPaket">Buat Paket</a></li>-->
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#home_with_icon_title" data-toggle="tab">
									<i class="material-icons">reorder</i> Transaction
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
												<th>ID Donasi</th>
												<th>Tanggal Donasi</th>
												<th>Donatur</th>
												<th>Nama Barang</th>
												<th>Quantity</th>
												<th>Satuan</th>
												<th>Aksi</th>
											</tr>
											</thead>
											<tfoot>
											<tr>
												<th>ID Donasi</th>
												<th>Tanggal Donasi</th>
												<th>Donatur</th>
												<th>Nama Barang</th>
												<th>Quantity</th>
												<th>Satuan</th>
												<th>Aksi</th>
											</tr>
											</tfoot>
											<tbody id="show_data">
											<?php
											foreach ($txDonasi as $vol){
												?>
												<tr>
													<td><?=$vol->id_donasi?></td>
													<td><?=$vol->tanggal_donasi?></td>
													<td><?=$vol->nama_donatur?></td>
													<td><?=$vol->message?></td>
													<td><?=$vol->quantity?></td>
													<td><?=$vol->satuan_barang?></td>
													<td>
														<div class="row clearfix js-sweetalert">
															<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
																<button class="btn btn-primary waves-effect" data-type="html-message<?=$vol->id_donasi?>">Detail Tx</button>
															</div>
														</div>
													</td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								</p>
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

<!-- Bootstrap Notify Plugin Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- SweetAlert Plugin Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
<script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/tables/jquery-datatable.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--assets/dashAssets/js/pages/ui/dialogs.js"></script>-->

<!-- Demo Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>

<?php
foreach($txDonasi as $vol){
?>
<script type="text/javascript">
	$(function () {
		$('.js-sweetalert button').on('click', function () {
			var type = $(this).data('type');
			if (type === 'html-message<?=$vol->id_donasi?>') {
				swal({
					title: "DETAIL TRANSAKSI DONASI",
					text:
						"<table border='1' align='center'>" +
						"<tr>" +
								"<th>ID Donasi</th>" +
								"<td><?=$vol->id_donasi?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Timestamp</th>" +
								"<td><?=$vol->timeStamp?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Tanggal Donasi</th>" +
								"<td><?=$vol->tanggal_donasi?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Message</th>" +
								"<td><?=$vol->message?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Sender</th>" +
								"<td><a target='_blank' href='https://testnet-explorer.nemtool.com/#/s_account?account=<?=$vol->sender?>'><?=substr($vol->sender, 0, 15)?>...</a></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Recipient</th>" +
								"<td><a target='_blank' href='https://testnet-explorer.nemtool.com/#/s_account?account=<?=$vol->recipient?>'><?=substr($vol->recipient, 0, 15)?>...</a></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Namespace</th>" +
								"<td><?=$vol->namespaceId?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Mosaic</th>" +
								"<td><?=$vol->mosaicName?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>Quantity</th>" +
								"<td><?=$vol->quantity?></td>" +
						"</tr>"+
						"<tr>" +
								"<th>TxHash</th>" +
								"<td><a target='_blank' href='https://testnet-explorer.nemtool.com/#/s_tx?hash=<?=$vol->txHash?>'><?=substr($vol->txHash, 0, 15)?>...</a></td>" +
						"</tr>" +
						"</table>",
					html: true
				});
			}
		});
	});
</script>
<?php } ?>
</body>

</html>
