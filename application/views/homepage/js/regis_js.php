<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
$(document).ready(function(e){
	$("#btnRegis").click(function(){
		//Mengambil value dari input username & Password
		var nama = $('#orangeForm-name').val();
		var email = $('#orangeForm-email').val();
		var password = $('#orangeForm-pass').val();
		var accTypeDonatur = $('#accTypeDonatur').val();
		var accTypeVolunteer = $('#accTypeVolunteer').val();
		//Ubah alamat url berikut, sesuaikan dengan alamat script pada komputer anda
		var url_regis	 = '<?php echo base_url(); ?>/MY_Controller/regis';
		//var url_admin	 = 'http://localhost/tutorial/admin.php';
		
		//Ubah tulisan pada button saat click login
		$('#btnRegis').attr('button','disabled');
		
		if ($("input[name=radioAccType]:checked").val() == "donatur") {
			//Gunakan jquery AJAX
			$.ajax({
				url		: url_regis,
				//mengirimkan username dan password ke script controller login
				data	: 'nama='+nama+'&email='+email+'&password='+password+'&accTypeDonatur='+accTypeDonatur, 
				//Method pengiriman
				type	: 'POST',
				//Data yang akan diambil dari script pemroses
				dataType: 'html',
				//Respon jika data berhasil dikirim
				success	: 
				function(pesan){
					if(pesan=='donatur'){
						//Arahkan ke halaman admin jika script pemroses mencetak kata ok
						// window.location = '<?php echo base_url(); ?>';
						Swal.fire(
							'Selamat Anda DONATUR!',
  							'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
  							'success'
						);
					}
					else if(pesan=='volunteer'){
						//Arahkan ke halaman admin jika script pemroses mencetak kata ok
						// window.location = '<?php echo base_url(); ?>';
						Swal.fire(
							'Selamat Anda DONATUR!',
  							'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
  							'success'
						);
					}
					else{
						//Cetak peringatan untuk username & password salah
						console.log(nama+" "+email+" "+" STATUS: REGISTRASI GAGAL");
						Swal.fire({
						  icon: 'error',
						  title: 'Email Telah Terdaftar!',
						  text: pesan,
						});
					}
				},
			});
		}
		else{
			//Gunakan jquery AJAX
			$.ajax({
				url		: url_regis,
				//mengirimkan username dan password ke script controller login
				data	: 'nama='+nama+'&email='+email+'&password='+password+'&accTypeVolunteer='+accTypeVolunteer, 
				//Method pengiriman
				type	: 'POST',
				//Data yang akan diambil dari script pemroses
				dataType: 'html',
				//Respon jika data berhasil dikirim
				success	: 
				function(pesan){
					if(pesan=='donatur'){
						//Arahkan ke halaman admin jika script pemroses mencetak kata ok
						// window.location = '<?php echo base_url(); ?>';
						Swal.fire(
							'Selamat Anda VOLUNTEER!',
  							'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
  							'success'
						);
					}
					else if(pesan=='volunteer'){
						//Arahkan ke halaman admin jika script pemroses mencetak kata ok
						// window.location = '<?php echo base_url(); ?>';
						Swal.fire(
							'Selamat Anda VOLUNTEER!',
  							'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
  							'success'
						);
					}
					else{
						//Cetak peringatan untuk username & password salah
						console.log(nama+" "+email+" "+" STATUS: REGISTRASI GAGAL");
						Swal.fire({
						  icon: 'error',
						  title: 'Email Telah Terdaftar!',
						  text: pesan,
						});
					}
				},
			});
		}
		
	});
});
</script>