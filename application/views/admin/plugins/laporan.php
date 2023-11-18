
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		selectPelanggan();
		selectPetugas();
		function selectPelanggan() {
			var selectPelanggan = $('[name="pelanggan"]')
			$.ajax({
				url: '<?= base_url("Laporan/getPelanggan") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					var status = '';
					for (var i = 0; i < data.length; i++) {
						selectPelanggan.append('<option class="font-weight-bold" value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>');
					}
				}
			});
		}

		function selectPetugas() {
			var selectPetugas = $('[name="petugas"]')
			$.ajax({
				url: '<?= base_url("Laporan/getPetugas") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					var status = '';
					for (var i = 0; i < data.length; i++) {
						selectPetugas.append('<option class="font-weight-bold" value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>');
					}
				}
			});
		}

		$('[name="pelanggan"]').select2({
			placeholder: "Pilih Gerai",
		})

		$('[name="petugas"]').select2({
			placeholder: "Pilih Petugas",
		})
		
		table = $('#table-laporan').DataTable({
			"processing": true, 
            "serverSide": true,
            "dom": 'Bfrt',
            "buttons" : ["copy", "print", "excel"],
            "lengthChange": false,
            // "scrollX": true,
            // "fixedColumns": {
            // 	 "leftColumns": 1,
            // 	 "rightColumns": 1
            // },
            // "responsive": true,
            // "lengthChange": false,
            // "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('Laporan/getLaporan')?>",
                "type": "POST",
                "data": function ( data ) {
	                data.pelanggan = $('[name="pelanggan"]').val();
	                data.petugas = $('[name="petugas"]').val();
	                data.startDate = $('[name="startDate"]').val();
	                data.endDate = $('[name="endDate"]').val();
	            }
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

		$('#btnFilter').click(function() {
			reload_table();
		});

	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>

<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>

<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>