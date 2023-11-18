
<script type="text/javascript">

	var table;
	$(document).ready(function() {

		showKategori();		
		 // $('#table-pelanggan').scrollbar();

		table = $('#table-pelanggan').DataTable({
			"processing": true, 
            "serverSide": true,
            "scrollX": true,
            "fixedColumns": {
            	 "leftColumns": 1,
            	 "rightColumns": 1
            },
            // "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('admin/MasterData/get_pelanggan')?>",
                "type": "POST"
            },

            "language": {
		        "paginate": {
		            "previous": '<i class="fas fa-angle-left"></i>',
      				"next": '<i class="fas fa-angle-right"></i>'
		        },
		        "aria": {
		            "paginate": {
		                "previous": 'Previous',
		                "next":     'Next'
		            }
		        }
		    },
		});

		function reload_table() {
			table.ajax.reload(null, false);
		}

		function showKategori() {
			var kategori = $('.id_kategori');
			$.ajax({
				url: '<?= base_url("admin/MasterData/showSelectKategori") ?>',
				type: 'POST',
				dataType: 'JSON',
				success:function (data) {
					$('[data-toggle="select"]').select2({
						placeholder:'Jenis Pelanggan'
					});

					var html = '';
					var i;
						html += '<option></option>';
					for (var i = 0; i < data.length; i++) {
						html += '<option value="'+data[i].id_kategori+'">'+data[i].nama_kategori+'</option>';
					}

					kategori.html(html);
				}
			});
			
		}

		function bacaGambar(input) {
		   if (input.files && input.files[0]) {
		      var reader = new FileReader();
		 
		      reader.onload = function (e) {
		          $('.foto-preview').attr('src', e.target.result);
		      }
		 
		      reader.readAsDataURL(input.files[0]);
		   }
		}

		function bacaFile(input) {
		   if (input.files && input.files[0]) {
		      var reader = new FileReader();
		 
		      reader.onload = function (e) {
		          $('.file-preview').attr('src', e.target.result);
		      }
		 
		      reader.readAsDataURL(input.files[0]);
		   }
		}

		function actionData(formData, action) {
			$.ajax({
				url: '<?= base_url("admin/MasterData/") ?>'+action+'',
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
	                    z_index:2000,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                	},
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });

					if (response.type == 'success') {
						$('#modal-'+action).modal('hide');
	            		$('#form-'+action)[0].reset();
					}
				}
			});
		}

		$("#foto").change(function(){
		   bacaGambar(this);
		});

		$("#foto_update").change(function(){
		   bacaGambar(this);
		});

		$("#fileMOU").change(function(){
		   bacaFile(this);
		});

		$("#fileMOUUpdate").change(function(){
		   bacaFile(this);
		});
		
		$('#form-addPelanggan').submit(function() {
			
			if ($('[name="konf_password"]').val() != $('[name="password"]').val()) {
            	$('.notSamePassword').removeAttr('hidden');
            	$('[name="konf_password"]').focus();

            	return false;
            }else{
            	var formData = new FormData();
	            formData.append('username', $('[name="username"]').val()); 
	            formData.append('password', $('[name="password"]').val()); 
	            formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	            formData.append('email', $('[name="email"]').val()); 
	            formData.append('hp', $('[name="hp"]').val()); 
	            formData.append('jenis_kelamin', $('[name="jenis_kelamin"]').val()); 
	            formData.append('tempat_lahir', $('[name="tempat_lahir"]').val()); 
	            formData.append('tanggal_lahir', $('[name="tanggal_lahir"]').val()); 
	            formData.append('alamat', $('[name="alamat"]').val()); 

	            formData.append('foto', $('[name="foto"]')[0].files[0]);
            	actionData(formData, 'addPelanggan');
            	reload_table();

            	return false;
            }
		});

		$('#form-updatePelanggan').submit(function() {
			
			var formData = new FormData();
            formData.append('id', $('[name="id_update"]').val()); 
            formData.append('username', $('[name="username_update"]').val()); 
            formData.append('nama_lengkap', $('[name="nama_lengkap_update"]').val()); 
            formData.append('email', $('[name="email_update"]').val()); 
            formData.append('hp', $('[name="hp_update"]').val()); 
            formData.append('jenis_kelamin', $('[name="jenis_kelamin_update"]').val()); 
            formData.append('tempat_lahir', $('[name="tempat_lahir_update"]').val()); 
            formData.append('tanggal_lahir', $('[name="tanggal_lahir_update"]').val()); 
            formData.append('alamat', $('[name="alamat_update"]').val()); 
            formData.append('foto_lama', $('[name="foto_lama"]').val()); 

            formData.append('foto', $('[name="foto_update"]')[0].files[0]);
        	actionData(formData, 'updatePelanggan');
        	reload_table();

        	return false;
		});

		$('#form-updateFileMOU').submit(function() {
			var formData = new FormData();
	        formData.append('id', $('[name="id_mou"]').val()); 
            formData.append('username', $('[name="username_mou"]').val()); 
            formData.append('id_kategori', $('[name="id_kategori_mou"]').val()); 
            formData.append('tanggal_mou', $('[name="tanggal_mou"]').val()); 
            formData.append('file_mou_lama', $('[name="file_mou_lama"]').val()); 
            formData.append('file_mou', $('[name="file_mou"]')[0].files[0]);

            actionData(formData, 'updateFileMOU');
        	reload_table();

        	return false;
		});

		$('#form-deletePelanggan').submit(function() {
			var formData = new FormData();
            formData.append('id', $('[name="id_pelanggan_delete"]').val()); 
            formData.append('file', $('[name="foto_delete"]').val()); 
            formData.append('file_mou', $('[name="file_mou_delete"]').val()); 
			
			actionData(formData, 'deletePelanggan');
        	reload_table();

        	return false;
		});

		$('#table-data-pelanggan').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			var foto = $(this).attr('data-foto');
			var file_mou = $(this).attr('data-file_mou');
			
			$('#pelanggan-delete').html(nama);
			$('[name="id_pelanggan_delete"]').val(id);
			$('[name="foto_delete"]').val(foto);
			$('[name="file_mou_delete"]').val(file_mou);

			$('#modal-deletePelanggan').modal('show');
		});

		$('#table-data-pelanggan').on('click', '.edit-data', function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getPelangganById") ?>',
				type: 'GET',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					
					$('[name="id_update"]').val(id);
					$('[name="nama_lengkap_update"]').val(data.nama_lengkap);
					$('[name="username_update"]').val(data.username);
					$('[name="email_update"]').val(data.email);
					$('[name="hp_update"]').val(data.hp);
					$('[name="tempat_lahir_update"]').val(data.tempat_lahir);
					$('[name="tanggal_lahir_update"]').val(data.tanggal_lahir);
					$('[name="alamat_update"]').val(data.alamat);
					$('[name="foto_lama"]').val(data.foto);
					
					if(data.jenis_kelamin == 'L'){
						$('#laki-laki_update').prop('checked', true);
					}else{
						$('#perempuan_update').prop('checked', true)
					}
					
					if (data.foto == null) {
						$('.foto-preview').attr('src', '<?= base_url("assets/assets/img/users/default.png") ?>');
					}else{
						$('.foto-preview').attr('src', '<?= base_url("assets/assets/img/users/pelanggan/") ?>'+data.foto+'');
					}

					$('#modal-updatePelanggan').modal('show');
				}
			});
		});

		$('#table-data-pelanggan').on('click', '.view-data', function() {
			var id 			= $(this).attr('data-id');
			var username 	= $(this).attr('data-username');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getPelangganById") ?>',
				type: 'GET',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					
					$('[name="id_mou"]').val(id);
					$('[name="username_mou"]').val(username);
					$('[name="tanggal_mou"]').val(data.tanggal_mou);
					$('[name="id_kategori_mou"]').val(data.id_kategori).trigger('change');

					if (data.file_mou == null) {
						$('.file-preview').attr('src', '');
					}else{
						$('[name="file_mou_update"]').val(data.file_mou);
						$('.file-preview').attr('src', '<?= base_url("assets/assets/file/")?>'+data.file_mou);
					}
					
					$('#modal-updateFileMOU').modal('show');
				}
			});
		});

	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>