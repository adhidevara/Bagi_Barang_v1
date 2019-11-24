<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
$(document).ready(function(e){
	$("#btnLogin").click(function(){
		//Mengambil value dari input username & Password
		var email = $('#defaultForm-email').val();
		var password = $('#defaultForm-pass').val();
		//Ubah alamat url berikut, sesuaikan dengan alamat script pada komputer anda
		var url_login	 = '<?php echo base_url(); ?>/MY_Controller/login';
		//var url_admin	 = 'http://localhost/tutorial/admin.php';
		
		//Ubah tulisan pada button saat click login
		$("#btnLogin").html("please wait..").attr("disabled", "disabled");
		
		//Gunakan jquery AJAX
		$.ajax({
			url		: url_login,
			//mengirimkan username dan password ke script controller login
			data	: 'email='+email+'&password='+password, 
			//Method pengiriman
			type	: 'POST',
			//Data yang akan diambil dari script pemroses
			dataType: 'html',
			//Respon jika data berhasil dikirim
			success	: 
			function(pesan){
				if(pesan=='pengelola'){
					//Arahkan ke halaman admin jika script pemroses mencetak kata PENGELOLA
					window.location = '<?php echo base_url(); ?>';
				}
				else if(pesan=='donatur'){
					//Arahkan ke halaman admin jika script pemroses mencetak kata DONATUR
					window.location = '<?php echo base_url(); ?>';
				}
				else if(pesan=='volunteer'){
					//Arahkan ke halaman admin jika script pemroses mencetak kata VOLUNTEER
					window.location = '<?php echo base_url(); ?>';
				}
				else if(pesan=='CEK EMAIL'){
					//Arahkan ke halaman admin jika script pemroses mencetak kata VOLUNTEER
					Swal.fire({
						icon: 'error',
						title: 'AKUN ANDA BELUM AKTIF',
						text: pesan,
						footer: '<a href=<?php echo base_url(); ?>MY_Controller/reSendEmailVerif?email='+email+'>Kirim Ulang Email Verifikasi!</a>'
					});
					$("#btnLogin").html("LOGIN").removeAttr("disabled");
				}
				else{
					//Cetak peringatan untuk username & password salah
					Swal.fire({
						icon: 'error',
						title: 'Oopss...',
						text: pesan,
						footer: '<a href=<?php echo base_url(); ?>>Ingin mendaftar?</a>'
					});
					$("#btnLogin").html("LOGIN").removeAttr("disabled");
				}
			},
		});
	});
});
</script>