<?php $this->load->view('dash_pengelola/head_foot/header'); ?>
<!-- Bootstrap Material Datetime Picker Css -->
<link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

<!-- Bootstrap DatePicker Css -->
<link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

<!-- Wait Me Css -->
<link href="<?php echo base_url(); ?>assets/dashAssets/plugins/waitme/waitMe.css" rel="stylesheet" />

<!-- Bootstrap Select Css -->
<link href="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>FORM PENGIRIMAN PAKET - <b><?=$this->input->get('id_paket')?></b></h2>
			<small>Taken from <a href="#">BagiBarang.com</a></small>
		</div>
		<!-- Select -->
		<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="card">
					<div class="header">
						<h2>
							KIRIM PAKET
						</h2>
					</div>
					<div class="body">
						<form action="<?=base_url()?>pengelola/C_paket/kirimPaket" method="POST">
							<input type="hidden" name="id_paket" value="<?=$this->input->get('id_paket')?>">
							<div class="row clearfix">
								<div class="col-sm-4">
									<select class="form-control show-tick" name="nama_kurir">
										<option value="">-- Pilih Kurir --</option>
										<option value="JNE Express">JNE Express</option>
										<option value="J&T Express">J&T Express</option>
										<option value="TIKI">TIKI</option>
										<option value="POS Indonesia">POS Indonesia</option>
										<option value="SiCepat">SiCepat</option>
										<option value="Wahana">Wahana</option>
										<option value="DHL">DHL</option>
										<option value="FedEx">FedEx</option>
									</select>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
								    	<div class="form-line">
								        	<input type="text" name="no_resi" class="form-control" placeholder="No Resi" />
								        </div>
								    </div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<div class="input-group date">
											<span class="input-group-addon">
                                            	<i class="material-icons">date_range</i>
                                        	</span>
											<div class="form-line">
												<input type="text" name="tgl_kirim" class="datetimepicker form-control" placeholder="Tanggal Kirim" data-date-format="dd-mm-yyyy hh:ii">
											</div>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- #END# Select -->
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

<!-- Autosize Plugin Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Bootstrap Datepicker Plugin Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/js/admin.js"></script>
<script src="<?php echo base_url(); ?>assets/dashAssets/js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<script src="<?php echo base_url(); ?>assets/dashAssets/js/demo.js"></script>

</body>
</html>
