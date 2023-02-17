<?php 

        $koneksi = new mysqli("localhost","root","","db_uas");

        $avatar = $koneksi->query("select * from tb_sewacd where nama like '%avatar%'");
        $jml_avatar = $avatar->num_rows;

        $sk = $koneksi->query("select * from tb_sewacd where nama='siksa kubur'");
        $jml_sk = $sk->num_rows;

        $venom = $koneksi->query("select * from tb_sewacd where nama='venom'");
        $jml_venom = $venom->num_rows;

 ?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<!-- loader -->
                <div class="bg-loader">
                    <div class="loader"></div>
                </div>

                <!-- header -->
                <div class="medsos" bgcolor="red">
                    <div class="container">
                        <ul>
                        </ul>
                    </div>
                </div>

                <!-- label -->


                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


                <center>
                    <script type="text/javascript">
                        google.charts.load("current", {packages:['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ["Element", "Density", { role: "style" } ],
                                ["Avatar", <?php echo $jml_avatar ?>, "red"],
                                ["Siksa Kubur", <?php echo $jml_sk ?>, "brown"],
                                ["Venom", <?php echo $jml_venom ?>, "blue"]
                            ]);

                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                            { calc: "stringify",
                                                sourceColumn: 1,
                                                type: "string",
                                                role: "annotation" },
                                            2]);

                            var options = {
                                title: "Grafik rental VCD",
                                width: 600,
                                height: 400,
                                bar: {groupWidth: "95%"},
                                legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                            chart.draw(view, options);
                        }
                    </script>
                <div id="columnchart_values" style="width: 900px; height: 300px;"></div>

                </center>

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

    <script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>

</body>

</html>

