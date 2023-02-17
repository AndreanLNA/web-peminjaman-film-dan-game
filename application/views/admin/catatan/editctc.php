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
						<a href="<?php echo site_url('admin/C_catatan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php echo site_url('admin/C_catatan/edit') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group row">
								<label for="alamat" class="col-sm-2 col-form-label">Catatan</label>
								<div class="col-sm-10">
									<textarea class="form-control <?= set_value('catatan'); ?>" id="catatan" name="catatan" rows="3"><?= $ctc->catatan; ?></textarea>
									<small class="text-danger">
										<?php echo form_error('catatan') ?>
									</small>
								</div>
							</div>
							

							<div class="form-group">
								<label for="tgl">Tanggal</label>
								<input type="date" class="form-control <?php echo form_error('tgl') ? 'is-invalid':'' ?>"
								  name="tgl" min="0" value="<?= $ctc->tgl; ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl') ?>
								</div>
							</div>

                            <fieldset class="form-group">
								<div class="row">
									<legend class="col-form-label col-sm-2 pt-0">Jenis</legend>
									<div class="col-sm-10">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" id="jenis" name="jenis" value="Penting" <?php if (set_value('jenis') == "Penting") : echo "checked";
																																		endif; ?>>
											<label class="form-check-label" for="jenis">
											Penting
											</label>
										</div>
										<small class="text-danger">
											<?php echo form_error('jenis') ?>
										</small>
									</div>
								</div>
							</fieldset>

							

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

<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('catatan')
</script>

</body>


</html>