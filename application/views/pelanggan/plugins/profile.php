

<script type="text/javascript">
	$(document).ready(function() {

		get_profile();
		function get_profile() {
			var status = '';
			var foto = '<?= site_url("assets/assets/img/users/default.png") ?>';
			$.ajax({
				url: '<?= base_url('Pelanggan/Profile/get_profile') ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					if (data.status == 1) {
						status = 'Aktif';
					}else{
						status = 'Tidak Aktif';
					}

					if (data.foto != null) {
						foto = '<?= site_url("assets/assets/img/users/pelanggan/") ?>'+data.foto;
					}

					$('#link-foto').attr('href', foto);
					$('#foto-card').attr('src', foto);
					$('#level-card').html(data.level);
					$('#status-card').html(status);
					$('#nama-lengkap-card').html(data.nama_lengkap);
					$('#umur-card').html(data.umur);
					$('#tempat-tanggal-lahir-card').html(data.tempat_lahir+', '+data.tanggal_lahir);
					$('#nama-group-card').html(data.nama_group);

					$('[name="nama_lengkap"]').val(data.nama_lengkap);
					$('[name="username"]').val(data.username);
					$('[name="foto_lama"]').val(data.foto);
					$('[name="email"]').val(data.email);
					$('[name="tempat_lahir"]').val(data.tempat_lahir);
					$('[name="tanggal_lahir"]').val(data.tanggal_lahir1);
					$('[name="hp"]').val(data.hp);
					$('[name="jenis_kelamin"]').val(data.jenis_kelamin);
					$('[name="alamat"]').val(data.alamat);
				}
			});

			return false;
		}

		function actionData(formData, action) {
			$.ajax({
				url: '<?= base_url("Pelanggan/Profile/") ?>'+action+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false,
		        contentType: false,
				success:function (response) {
					$.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                },
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });
	            		
	            	setTimeout(function(){ 
		              window.location.reload();
		            }, 1000);
				}
			});
		}

		$('#updateProfile').submit(function() {

			if ($('#update-konfir-password').val() != $('#update-password').val()) {
				$('.invalid-feedback').html('Password Tidak Sama !!')
				$('#update-konfir-password').addClass('is-invalid');
				$('#update-password').addClass('is-invalid');

				$('#update-konfir-password').focus();

				return false;
			}
			var formData = new FormData();
	            formData.append('username', $('[name="username"]').val()); 
	            formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	            formData.append('email', $('[name="email"]').val()); 
	            formData.append('password', $('[name="password"]').val()); 
	            formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
	            formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
	            formData.append('hp', $('[name="hp"]').val()); 
	            formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
	            formData.append('alamat', $('[name="alamat"]').val()); 
	        	
	        	actionData(formData, 'updateProfile');			
		});

		$('#foto').change(function() {
			var formData = new FormData();
	            formData.append('foto_lama', $('[name="foto_lama"]').val()); 
	            formData.append('foto', $('[name="foto"]')[0].files[0]);

	            actionData(formData, 'updateFoto');
		});
	});
</script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>