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
						<a href="<?php echo site_url('admin/C_pegawai') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/C_pegawai/tambah') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama_pegawai">Nama*</label>
								<input class="form-control <?php echo form_error('nama_pegawai') ? 'is-invalid':'' ?>"
								 type="text" name="nama_pegawai" placeholder="Nama Pegawai" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_pegawai') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pekerjaan_pegawai">Pekerjaan_pegawai*</label>
								<input class="form-control <?php echo form_error('Pekerjaan_pegawai') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan_pegawai" min="0" placeholder="Pekerjaan Pegawai" />
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan_pegawai') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="almat_pegawai">Alamat Pegawai*</label>
								<textarea class="form-control <?php echo form_error('alamat_pegawai') ? 'is-invalid':'' ?>"
								 name="alamat_pegawai" placeholder="Alamat Pegawai..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('almat_pegawai') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="foto">Photo</label>
								<input class="form-control-file <?php echo form_error('foto') ? 'is-invalid':'' ?>"
								 type="file" name="foto" />
								<div class="invalid-feedback">
									<?php echo form_error('foto') ?>
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