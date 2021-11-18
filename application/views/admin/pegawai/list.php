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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/C_pegawai/tambah') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Pekerjaan</th>
										<th>Alamat</th>
										<th>Foto</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($pegawai as $pegawai): ?>
									<tr>
										<td width="150">
											<?php echo $pegawai->nama_pegawai ?>
										</td>
										<td>
											<?php echo $pegawai->pekerjaan_pegawai ?>
										</td>
										
										<td class="small" width="250">
											<?php echo substr($pegawai->alamat_pegawai, 0, 120) ?>...
										</td>
                                        <td>
											<img src="<?php echo base_url('upload/pegawai/'.$pegawai->foto) ?>" width="64" />
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/C_pegawai/edit/'.$pegawai->id_pegawai) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/C_pegawai/hapus/'.$pegawai->id_pegawai) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>

</body>

</html>