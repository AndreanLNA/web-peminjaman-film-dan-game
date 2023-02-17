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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/C_rgame') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/C_rgame/tambah') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama_game">Nama*</label>
								<input class="form-control <?php echo form_error('nama_game') ? 'is-invalid':'' ?>"
								 type="text" name="nama_game" placeholder="Nama game" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_game') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">harga*</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="text" name="harga" min="0" placeholder="harga" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="tgl_in">Tgl peminjaman*</label>
								<input type="date" class="form-control <?php echo form_error('tgl_in') ? 'is-invalid':'' ?>"
								 name="tgl_in" placeholder="Tgl peminjaman...">
								<div class="invalid-feedback">
									<?php echo form_error('tgl_in') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tgl_out">Tgl Pengembalian*</label>
								<input type="date" class="form-control <?php echo form_error('tgl_out') ? 'is-invalid':'' ?>"
								 name="tgl_out" placeholder="Tgl Pengembalian...">
								<div class="invalid-feedback">
									<?php echo form_error('tgl_out') ?>
								</div>
							</div>



							<input class="btn btn-success" type="submit" name="btn" value="simpan" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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