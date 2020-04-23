<?php $this->load->view('dash_volunteer/head_foot/header'); ?>

<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h1>Laporan Penerimaan Barang <?php echo $data2[0]->judul_campaign; ?></h1>
		</div>
		<!-- Vertical Layout -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="body">
						<?php error_reporting(0); echo $error; ?>
						<form method="POST" enctype="multipart/form-data" action="<?php echo base_url() ?>penerima/C_penerima/proBuatLaporan">
							<input type="hidden" value="<?php echo $id_campaign ?>" name="id_campaign">
							<label for="Link Video">Nama Penerima</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="namaPenerima" name="namaPenerima" class="form-control" placeholder="Enter your name">
								</div>
							</div>
							<label for="Link Video">No KTP</label>
							<div class="form-group">
								<div class="form-line">
									<input type="number" id="noKTP" name="noKTP" class="form-control" placeholder="Enter your identity number">
								</div>
							</div>
							<label for="Link Video">Alamat Penerima</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Enter your address">
								</div>
							</div>
							<label for="Link Video">Link Video</label>
							<div class="form-group">
								<div class="form-line">
									<input type="text" id="link" name="link" class="form-control" placeholder="Enter your link video">
								</div>
							</div>
							<label for="foto">Foto</label>
							<div class="form-group">
								<div class="form-line">
									<input type="file" id="foto" name="foto" class="form-control" placeholder="Enter your password">
								</div>
							</div>
							<label for="Data Penerima">Data Penerima Donasi</label>
							<div class="form-group">
								<div class="form-line">
									<input type="file" id="dokumen" name="dokumen" class="form-control" placeholder="Enter your password">
								</div>
							</div>
							<br>
							<div class="button-demo js-modal-buttons" style="float: right">
								<button type="submit" data-color="deep-orange" class="btn bg-deep-orange waves-effect">Upload</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Vertical Layout -->
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

