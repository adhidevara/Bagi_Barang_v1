	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/sticky.js"></script>

	<!-- Stellar -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="<?php echo base_url(); ?>assets/js/hoverIntent.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/superfish.js"></script>
	
	<!-- Main JS -->
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

	<!-- Load Login JS -->
	<?php $this->load->view('homepage/js/login_js'); ?>

	<!-- Load Regis JS -->
	<?php $this->load->view('homepage/js/regis_js'); ?>

	<!-- Lupa Password JS -->
	<?php $this->load->view('homepage/js/lupa_pass_js'); ?>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.pass_show').append('<span class="ptxt"><i class="glyphicon glyphicon-eye-open"></i></span>');
		});
		$(document).on('click','.pass_show .ptxt', function(){

			$(".glyphicon").toggleClass('glyphicon-eye-open glyphicon-eye-close');

			$(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });

		});
	</script>
