<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
<script src="<?php echo base_url('js/scripts.js') ?>"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> 
<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script> 
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script> 
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> 
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> 
<script src="<?php echo base_url('assets/demo/datatables-demo.js') ?>"></script>

<script> $(document).ready(function() 
{ 
$('table.display').DataTable(); 
}); 
</script>

<script> 
	function startCalc() { interval = setInterval("calc()", 1); } 
	function calc() { 
		one = document.autoSumForm.Uang_Pembayaran.value; 
		document.autoSumForm.Kembalian.value = one - <?= $this->cart->total(); ?>; 
	} 
	function stopCalc() { clearInterval(interval); } 
</script>

<!-- Penjualan -->
<script type="text/javascript">
	$(document).ready(function() {
		$('.add_cart').click(function() {
			var product_id = $(this).data("productid");
			var product_name = $(this).data("productname");
			var product_price = $(this).data("productprice");
			var product_discount = $(this).data("productdiscount");
			var quantity = $('#' + product_id).val();
			$.ajax({
				url: "<?php echo site_url('admin/penjualan/add_to_cart'); ?>",
				method: "POST",
				data: {
					product_id: product_id,
					product_name: product_name,
					product_price: product_price,
					product_discount: product_discount,
					quantity: quantity
				},
				success: function(data) {
					$('#detail_cart').html(data);
				}
			});
		});

		$('#detail_cart').load("<?php echo site_url('admin/penjualan/load_cart'); ?>");

		$(document).on('click', '.remove_cart', function() {
			var row_id = $(this).attr("id");
			$.ajax({
				url: "<?php echo site_url('admin/penjualan/delete_cart'); ?>",
				method: "POST",
				data: {
					row_id: row_id
				},
				success: function(data) {
					$('#detail_cart').html(data);
				}
			});
		});
	});
</script>

<script>
	var table = document.getElementById('table');
	for (var i = 0; i < table.rows.length; i++) {
		table.rows[i].onclick = function() {
			rIndex = this.rowIndex;
			document.getElementById('no_customer').value = this.cells[0].innerHTML;
			document.getElementById('id_customer').value = this.cells[1].innerHTML;
			$('#showCustomer').modal('hide');
		};
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.process_payment').click(function() {
			var kode_jual = $(this).data("kode_jual");
			var customer = document.getElementById('id_customer').value;
			$.ajax({
				url: "<?php echo site_url('admin/penjualan/add_penjualan'); ?>",
				method: "POST",
				data: {
					kode_jual: kode_jual,
					customer: customer
				},
				success: function(data) {
					$('#no_customer').html(data);
				}
			});
		});
	});
</script>

<!-- End of Penjualan -->