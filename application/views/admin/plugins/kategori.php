
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		
		 // $('#table-petugas').scrollbar();

		table = $('#table-kategori').DataTable({
			"processing": true, 
            "serverSide": true,
            // "scrollX": true,
            // "fixedColumns": {
            // 	 "leftColumns": 1,
            // 	 "rightColumns": 1
            // },
            // "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('admin/MasterData/get_kategori')?>",
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

		// $("#foto").change(function(){
		//    bacaGambar(this);
		// });

		// $("#foto_update").change(function(){
		//    bacaGambar(this);
		// });
		
		$('#form-addKategori').submit(function() {
			
        	var formData = new FormData();
            formData.append('nama_kategori', $('[name="nama_kategori"]').val()); 
            formData.append('nominal', $('[name="nominal"]').val()); 
            formData.append('jenis_kategori', $('[name="jenis_kategori"]').val()); 

        	actionData(formData, 'addKategori');
        	reload_table();

        	return false;
		});

		$('#form-updateKategori').submit(function() {
			
			var formData = new FormData();
	            formData.append('id_kategori', $('[name="id_kategori_update"]').val()); 
	            formData.append('nama_kategori', $('[name="nama_kategori_update"]').val()); 
	            formData.append('nominal', $('[name="nominal_update"]').val()); 
	            formData.append('jenis_kategori', $('[name="jenis_kategori_update"]').val()); 

            	actionData(formData, 'updateKategori');
            	reload_table();

            	return false;
		});

		$('#table-data-kategori').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			
			$('#kategori-delete').html(nama);
			$('[name="id_kategori_delete"]').val(id);

			$('#modal-deleteKategori').modal('show');
		});

		$('#form-deleteKategori').submit(function() {
			var formData = new FormData();
            formData.append('id_kategori', $('[name="id_kategori_delete"]').val()); 

			actionData(formData, 'deleteKategori');
        	reload_table();

        	return false;
		});

		$('#table-data-kategori').on('click', '.edit-data', function() {
			var id_kategori = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getKategoriById") ?>',
				type: 'GET',
				dataType: 'JSON',
				data:{id_kategori:id_kategori},
				success:function (data) {
					$('[name="id_kategori_update"]').val(id_kategori);
					$('[name="nama_kategori_update"]').val(data.nama_kategori);
					$('[name="nominal_update"]').val(data.nominal);
					$('[name="jenis_kategori_update"]').val(data.jenis_kategori);
					
					$('#modal-updateKategori').modal('show');
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