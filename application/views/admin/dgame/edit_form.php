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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/C_dgame') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/C_dgame/edit") ?>" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $dgame->id_game?>" />

							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('nama_game') ? 'is-invalid':'' ?>"
								 type="text" name="nama_game" min="0" placeholder=" Nama" value="<?php echo $dgame->nama_game ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_game') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">genre*</label>
								<input class="form-control <?php echo form_error('genre') ? 'is-invalid':'' ?>"
								 type="text" name="genre" min="0" placeholder="genre" value="<?php echo $dgame->genre ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('genre') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="name">Harga*</label>
								<textarea class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 name="harga" placeholder="harga..."><?php echo $dgame->harga ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>



							<input class="btn btn-success" type="submit" name="btn" value="Save" />
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