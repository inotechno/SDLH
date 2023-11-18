
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		
		 // $('#table-petugas').scrollbar();

		table = $('#table-petugas').DataTable({
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
                "url": "<?= base_url('admin/MasterData/get_petugas')?>",
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
			table.ajax.reload();
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
		
		$('#form-addPetugas').submit(function() {
			
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
            	actionData(formData, 'addPetugas');
            	reload_table();

            	return false;
            }
		});

		$('#form-updatePetugas').submit(function() {
			
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
            	actionData(formData, 'updatePetugas');
            	reload_table();

            	return false;
		});

		$('#table-data-petugas').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			var foto = $(this).attr('data-foto');
			
			$('#petugas-delete').html(nama);
			$('[name="id_petugas_delete"]').val(id);
			$('[name="foto_delete"]').val(foto);

			$('#modal-deletePetugas').modal('show');
		});

		$('#form-deletePetugas').submit(function() {
			var formData = new FormData();
            formData.append('id', $('[name="id_petugas_delete"]').val()); 
            formData.append('foto', $('[name="foto_delete"]').val()); 
			actionData(formData, 'deletePetugas');
        	reload_table();

        	return false;
		});

		$('#table-data-petugas').on('click', '.edit-data', function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getPetugasById") ?>',
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
						$('.foto-preview').attr('src', '<?= base_url("assets/assets/img/users/petugas/default.png") ?>');
					}else{
						$('.foto-preview').attr('src', '<?= base_url("assets/assets/img/users/petugas/") ?>'+data.foto+'');
					}
					
					$('#modal-updatePetugas').modal('show');
				}
			});
		});

	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>