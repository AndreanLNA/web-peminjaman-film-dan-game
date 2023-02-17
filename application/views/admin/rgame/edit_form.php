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

						<a href="<?php echo site_url('admin/C_rgame') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/C_rgame/edit") ?>" method="post" enctype="multipart/form-data">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->

							<input type="hidden" name="id" value="<?php echo $rgame->id_game?>" />

							<div class="form-group">
								<label for="name">Name*</label>
								<input class="form-control <?php echo form_error('nama_game') ? 'is-invalid':'' ?>"
								 type="text" name="nama_game" min="0" placeholder=" Nama" value="<?php echo $rgame->nama_game ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_game') ?>
								</div>
							</div>

<!-- 							<div class="form-group">
								<label for="name">harga*</label>
								<input class="form-control <?php //echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="int" name="harga" min="0" placeholder="Harga" value="<?php echo $rgame->harga ?>" />
								<div class="invalid-feedback">
									<?php //echo form_error('harga') ?>
								</div>
							</div>
 -->
							<div class="form-group">
								<label for="name" class="col-sm-2 col-form-label">Harga*</label>
								<select class="form-control" id="harga" name="harga" <?php echo form_error('harga') ? 'is-invalid':'' ?>
								 type="text" min="0" placeholder="harga" value="<?php echo $rgame->harga ?>" />
                                <option value="Islam" selected disabled>Pilih</option>
                                <option value="Islam" <?php if ($rgame->harga == "Islam") : echo "selected";
                                                        endif; ?>>Islam</option>
                                <option value="Protestan" <?php if ($rgame->harga == "Protestan") : echo "selected";
                                                            endif; ?>>Protestan</option>
                                <option value="Katolik" <?php if ($rgame->harga == "Katolik") : echo "selected";
                                                        endif; ?>>Katolik</option>
                                <option value="Hindu" <?php if ($rgame->harga == "Hindu") : echo "selected";
                                                        endif; ?>>Hindu</option>
                                <option value="Buddha" <?php if ($rgame->harga == "Buddha") : echo "selected";
                                                        endif; ?>>Buddha</option>
                                <option value="Khonghucu" <?php if ($rgame->harga == "Khonghucu") : echo "selected";
                                                            endif; ?>>Khonghucu</option>
                            </select>
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="name">Tgl Peminjaman*</label>
								<input type="date" class="form-control <?php echo form_error('tgl_in') ? 'is-invalid':'' ?>"
								 name="tgl_in" placeholder="Tgl Peminjaman..."><?php echo $rgame->tgl_in ?>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_in') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Tgl Pengembalian*</label>
								<input type="date" class="form-control <?php echo form_error('tgl_out') ? 'is-invalid':'' ?>"
								 name="tgl_out" placeholder="Tgl Pengembalian..."><?php echo $rgame->tgl_out ?>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_out') ?>
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