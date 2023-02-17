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
				<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Home Page
			</div>
			<div class="card-body">
				<center><h1>Selamat Datang <?php echo $this->session->userdata('nama'); ?></h1></center>
				<hr/>
				<a href="<?php echo base_url(); ?>index.php/login/logout" class="btn btn-primary btn-lg btn-block">Logout</a>
				<center><h>.</h></center>
				<center><h>.</h></center>
				<h>Ini adalah <?php echo "Panduan :  ". format_data(). "................................................[Dibawah adalah jadwal kerja]";?></h>
				<br><h>Hari senin 09.00-16.00</h></br>
				<br><h>Hari selasa 09.00-16.00</h></br>
				<br><h>Hari rabu 09.00-16.00</h></br>
				<br><h>Hari kamis 09.00-16.00</h></br>
				<br><h>Hari jumat 09.00-16.00</h></br>
				<br><h>Hari sabtu 09.00-12.00</h></br>
				<br><h>Hari minggu 09.00-12.00</h></br>
				<br><h>.</h></br>
				<br><h>.</h></br>
				<br><h>.</h></br>
				<br><h>.</h></br>
				<br><h>.</h></br>
				<br><h>[Kontak BOS]</h></br>
				<br><h>Hub : 0881 141 9800</h></br>
				<br><h>[Kontak Sekertaris]</h></br>
				<br><h>Hub : 0881 141 9800</h></br>
			</div>
		</div>
	</div>		
	</body>
				
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
