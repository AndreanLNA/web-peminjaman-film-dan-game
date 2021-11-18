<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				
        <br><br>
        <div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-bordered table-hover">
						<tr class="success">
							<th>Rowid</th>
							<th>Name</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Subtotal</th>
							<th>Options</th>
						</tr>
						<?php foreach ($content as $item){ ?>
							<tr>
								<td><?php echo $item['rowid'] ?></td>
								<td><?php echo $item['name'] ?></td>
								<td><?php echo number_format($item['price'], 0, '','.'); ?></td>
								<td><?php echo $item['qty'] ?></td>
								<td><?php echo number_format($item['subtotal'], 0, '','.') ?></td>
                                <td width="250">
									<a
									href="<?php echo base_url('admin/C_produk/hapus_cart' . $item['rowid']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
									</td>
							</tr>
						<?php } ?>
					</table>
					<?php
						$total =  $this->cart->total();
						echo "<h4> Rp. " . number_format($total, 0, '','.') . "</h4>";
					 ?>
				</div>
			</div>
		</div>
				
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
<script>
    $(document).ready(function() {
        $(".add_cart").click(function() {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_price = $(this).data("price");
            var quantity = $('#' + product_id).val(); // ambil value inputan dari id yg dipilih

            //cek jika quantity = 0
            if (quantity != '' && quantity > 0) {
                //jika quantity lebih dari 0, request dengan ajax
                $.ajax({
                    url: "<?= base_url(); ?>keranjang_belanja/add",
                    method: "POST",
                    //kirim data ke server
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        quantity: quantity
                    },
                    //jika berhasil
                    success: function(data) {
                        alert("Produk telah ditambahkan ke keranjang!");
                        $("#cart_detail").html(data);
                        $("#" + product_id).val('');
                    }
                });
            } else {
                alert("Silahkan masukkan quantity!");
            }
        });
        // load data
        $("#cart_detail").load("<?= base_url(); ?>keranjang_belanja/load");

        //request remove product dari keranjang
        $(document).on('click', '.remove_inventory', function() {
            var row_id = $(this).attr("id");
            if (confirm("apakah kamu mau hapus item ini?")) {
                $.ajax({
                    url: "<?= base_url(); ?>/keranjang_belanja/remove",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        alert("product dihapus dari keranjang belanja");
                        $("#cart_detail").html(data);
                    }
                });
            } else {
                return false;
            }
        });

        // request kosongkan keranjang
        $(document).on("click", "#clear_cart", function() {
            if (confirm("Anda mau mengosongkan keranjang?")) {
                $.ajax({
                    url: "<?= base_url(); ?>/keranjang_belanja/clear_cart",
                    success: function(data) {
                        alert("keranjang telah kosong!");
                        $("#cart_detail").html(data);
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>