<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?=base_url()?>assets/nem-sdk/dist/nem-sdk.js"></script>
<script type="text/javascript">
$(document).ready(function(e){
	$("#btnRegis").click(function(){
		//NEM
		var nem = require("nem-sdk").default;

		//Mengambil value dari input username & Password
		var nama = $('#orangeForm-name').val();
		var email = $('#orangeForm-email').val();
		var password = $('#orangeForm-pass').val();
		var accTypeDonatur = $('#accTypeDonatur').val();
		var accTypeVolunteer = $('#accTypeVolunteer').val();
		//Ubah alamat url berikut, sesuaikan dengan alamat script pada komputer anda
		var url_regis	 = '<?php echo base_url(); ?>/MY_Controller/regis';
		//var url_admin	 = 'http://localhost/tutorial/admin.php';
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if (nama != '' && email != '' && password != '') {
			if (regex.test(email) == true) {
				//Create Address/Wallet
				//Password - Private Key
				var privateKey = nem.crypto.helpers.derivePassSha(password + event.timeStamp + email, 6000).priv;
				// Create a key pair
				var keyPair = nem.crypto.keyPair.create(privateKey);
				//Signature
				var data = "NEM is awesome !";
				var signature = keyPair.sign(data);
				// Verify Signature
				var result = nem.crypto.verifySignature(keyPair.publicKey.toString(), data, signature.toString());
				//Public Key
				var publicKey = keyPair.publicKey.toString();
				//Convert public key to an address
				var address = nem.model.address.toAddress(publicKey, nem.model.network.data.testnet.id);
				//Verify address validity
				var isValid = nem.model.address.isValid(address);
				var isFromNetwork = nem.model.address.isFromNetwork(address, nem.model.network.data.testnet.id);

				//DEBUG
				// console.log(event.timeStamp);
				// console.log("PASS: "+password);
				// console.log("PRIVATE KEY: "+privateKey);
				// console.log("KEYPAIR: "+keyPair);
				// console.log("Verify Signature: "+result);
				// console.log("PUBLIC KEY: "+publicKey);
				// console.log("Address: "+address);
				// console.log("Verify address: "+isValid);
				// console.log("Verify address TEST_NET: "+isFromNetwork);

				//Ubah tulisan pada button saat click login
				$("#btnRegis").html("please wait..").attr("disabled", "disabled");

				if ($("input[name=radioAccType]:checked").val() == "donatur") {
					//Gunakan jquery AJAX
					$.ajax({
						url: url_regis,
						//mengirimkan username dan password ke script controller login
						data: 'nama=' + nama +
							'&email=' + email +
							'&password=' + password +
							'&accTypeDonatur=' + accTypeDonatur +
							'&privateKey=' + privateKey +
							'&publicKey=' + publicKey +
							'&address=' + address,
						//Method pengiriman
						type: 'POST',
						//Data yang akan diambil dari script pemroses
						dataType: 'html',
						//Respon jika data berhasil dikirim
						success:
							function (pesan) {
								if (pesan == 'donatur') {
									//Arahkan ke halaman admin jika script pemroses mencetak kata ok
									// window.location = '<?php echo base_url(); ?>';
									Swal.fire(
										'Selamat Anda DONATUR!',
										'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
										'success'
									);
								} else if (pesan == 'volunteer') {
									//Arahkan ke halaman admin jika script pemroses mencetak kata ok
									// window.location = '<?php echo base_url(); ?>';
									Swal.fire(
										'Selamat Anda DONATUR!',
										'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
										'success'
									);
								} else {
									//Cetak peringatan untuk username & password salah
									console.log(nama + " " + email + " " + " STATUS: REGISTRASI GAGAL");
									Swal.fire({
										icon: 'error',
										title: 'Email Telah Terdaftar!',
										text: pesan,
									});
								}
								$("#btnRegis").html("DAFTAR").removeAttr("disabled");
							},
					});
				} else {
					//Gunakan jquery AJAX
					$.ajax({
						url: url_regis,
						//mengirimkan username dan password ke script controller login
						data: 'nama=' + nama + '&email=' + email + '&password=' + password + '&accTypeVolunteer=' + accTypeVolunteer,
						//Method pengiriman
						type: 'POST',
						//Data yang akan diambil dari script pemroses
						dataType: 'html',
						//Respon jika data berhasil dikirim
						success:
							function (pesan) {
								if (pesan == 'donatur') {
									//Arahkan ke halaman admin jika script pemroses mencetak kata ok
									// window.location = '<?php echo base_url(); ?>';
									Swal.fire(
										'Selamat Anda VOLUNTEER!',
										'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
										'success'
									);
								} else if (pesan == 'volunteer') {
									//Arahkan ke halaman admin jika script pemroses mencetak kata ok
									// window.location = '<?php echo base_url(); ?>';
									Swal.fire(
										'Selamat Anda VOLUNTEER!',
										'Akun Anda Berhasil Dibuat - Cek Email Anda Untuk Melakukan Verifikasi Akun',
										'success'
									);
								} else {
									//Cetak peringatan untuk username & password salah
									console.log(nama + " " + email + " " + " STATUS: REGISTRASI GAGAL");
									Swal.fire({
										icon: 'error',
										title: 'Email Telah Terdaftar!',
										text: pesan,
									});
								}
								$("#btnRegis").html("DAFTAR").removeAttr("disabled");
							},
					});
				}
			}
			else {
				Swal.fire({
					icon: 'error',
					title: 'Email Tidak Sesuai',
					text: 'Email tidak sesuai dengan format',
				});
			}
		}
		else {
			Swal.fire({
				icon: 'error',
				title: 'Form Harus Diisi',
				text: 'Form tidak boleh kosong',
			});
		}
		
	});
});
</script>
