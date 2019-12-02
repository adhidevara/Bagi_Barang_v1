<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	$(document).ready(function(e) {

		$("#btnSubmitLupaPassword").click(function(){
			$("#btnSubmitLupaPassword").html("please wait..").attr("disabled", "disabled");

			var email = $("#emailLupa").val();

			$.ajax({
				url: '<?=base_url()?>MY_Controller/lupaPass',
				type: 'POST',
				dataType: 'html',
				data: 'email='+email,
				success :
				function(pesan){
					Swal.fire(
						'Cek Email',
  						'Cek Email Anda Untuk Reset Password Anda',
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
				$("#btnSubmitLupaPassword").html("LOGIN").removeAttr("disabled");
			});
				
		});

	});
	</script>