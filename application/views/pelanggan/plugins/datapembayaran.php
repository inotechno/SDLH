
<script type="text/javascript">

	var element = $("#cetak-invoice");  
           
    // Global variable 
    var getCanvas; 
	var table;
	$(document).ready(function() {
		
		 // $('#table-petugas').scrollbar();

		table = $('#table-pembayaran').DataTable({
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
                "url": "<?= base_url('pelanggan/Pembayaran/get_pembayaran')?>",
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
				url: '<?= base_url("pelanggan/MasterData/") ?>'+action+'',
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

		$('#table-data-pembayaran').on('click', '.btn-cetak', function() {
			var no_invoice = $(this).attr('data-no');
			var nama_pelanggan = $(this).attr('data-nama');
			var tanggal_bayar = $(this).attr('data-tanggal');
			var nama_petugas = $(this).attr('data-nama-petugas');
			var kategori = $(this).attr('data-nama-kategori');

			$('.no_invoice').html(no_invoice);
			$('.nama_pelanggan').html(nama_pelanggan);
			$('.tanggal').html(tanggal_bayar);
			$('.nama_petugas').html(nama_petugas);
			$('.kategori_pelanggan').html(kategori);
			
			$('#modal-Invoice').modal('show');
		});

		$('#btn-cetak').click(function() {

			var invoice = $('.no_invoice').html();
			html2canvas(element).then(function (canvas) {                   
               	var anchorTag = document.createElement("a");
                document.body.append(anchorTag);

                anchorTag.download = invoice+".jpg";
                anchorTag.href = canvas.toDataURL();
                anchorTag.target = '_blank';
                anchorTag.click();
            });
			
			// var imgageData =  
   //              getCanvas.toDataURL("image/png",1); 
           
   //          // Now browser starts downloading  
   //          // it instead of just showing it 
   //          var newData = imgageData.replace( 
   //          /^data:image\/png/, "data:application/octet-stream"); 
           
   //          $("#btn-cetak").attr( 
   //          "download", invoice+".png").attr( 
   //          "href", newData); 
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
<script src="<?= site_url('assets/assets/js/html2canvas.js') ?>"></script>
</body>
</html>