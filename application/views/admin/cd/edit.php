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

						<a href="<?php echo site_url('admin/C_cd') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/C_cd/edit") ?>" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $cd->id_cd?>" />

							<div class="form-group">
								<label for="name">Nama CD*</label>
								<input class="form-control <?php echo form_error('nama_cd') ? 'is-invalid':'' ?>"
								 type="text" name="nama_cd" min="0" placeholder=" Nama CD" value="<?php echo $cd->nama_cd ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_cd') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Genre*</label>
								<input class="form-control <?php echo form_error('genre') ? 'is-invalid':'' ?>"
								 type="text" name="genre" min="0" placeholder="Pekerjaan" value="<?php echo $cd->genre ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('genre') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="name">Harga*</label>
								<textarea class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 name="harga" placeholder="Alamat cd..."><?php echo $cd->harga ?></textarea>
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