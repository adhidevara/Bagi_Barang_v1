<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/loc.png">

	<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/superfish.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">


	<!-- Modernizr JS -->
	<script src="<?php echo base_url(); ?>assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<div class="" id="modalUbahPassForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <H2 style="padding: 30px; size: 30px; color: #ff5722 ;background-color: lightyellow">BERBAGI BARANG</H2>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: orange;">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white;">UBAH PASSWORD</h4>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body mx-3" style="background-color: ;">
      	<input type="hidden" name="id" id="id" value="<?=$this->input->get('id')?>">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-newPass" style="color: ;">Password Baru</label>
          <input type="password" id="orangeForm-newPass" class="form-control validate" style="background-color: #ededed">
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-reTypeNewPass" style="color: ;">Ulangi Password</label>
          <input type="password" id="orangeForm-reTypeNewPass" class="form-control validate" style="background-color: #ededed">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center" style="background-color: ;">
        <button class="btn btn-primary" id="btnUbah">Ubah Password</button>
      </div>
    </div>
  </div>
</div>

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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script type="text/javascript">
		$(document).ready(function(e) {
			$("#btnUbah").click(function(){
				$("#btnUbah").html("please wait..").attr("disabled", "disabled");

				var id = $("#id").val();
				var newPass = $("#orangeForm-newPass").val();
				var reNewPass = $("#orangeForm-reTypeNewPass").val();

				$.ajax({
					url     : '<?=base_url()?>MY_Controller/proUbahPass',
					type    : 'POST',
					dataType: 'html',
					data    : 'id='+id+'&newPass='+newPass+'&reNewPass='+reNewPass,
					success :
					function(pesan){
						// console.log(pesan);
						Swal.fire(
							'BERHASIL',
	  						'Password Anda Berhasil Di Ubah',
	  						'success'
						);
					}
				})
				.done(function() {
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				
			});
		});
	</script>