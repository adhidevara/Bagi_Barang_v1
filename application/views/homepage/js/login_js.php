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
		$('#btnLogin').attr('value','Silahkan tunggu ...');
		
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
					// window.location = url_admin;
					Swal.fire(
						'Selamat!',
  						'Anda berhasil Masuk - PENGELOLA',
  						'success'
					);
				}
				else if(pesan=='donatur'){
					//Arahkan ke halaman admin jika script pemroses mencetak kata DONATUR
					// window.location = url_admin;
					Swal.fire(
						'Selamat!',
  						'Anda berhasil Masuk - DONATUR',
  						'success'
					);
				}
				else if(pesan=='volunteer'){
					//Arahkan ke halaman admin jika script pemroses mencetak kata VOLUNTEER
					// window.location = url_admin;
					Swal.fire(
						'Selamat!',
  						'Anda berhasil Masuk - VOLUNTEER',
  						'success'
					);
				}
				else{
					//Cetak peringatan untuk username & password salah
					Swal.fire({
						icon: 'error',
						title: 'Oopss...',
						text: pesan,
						footer: '<a href=<?php echo base_url(); ?>>Ingin mendaftar?</a>'
					});
				}
			},
		});
	});
});
</script>