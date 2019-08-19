
<h1 class="mb-3 pt-3">Persentase Kegagalan Reaksi Transfusi</h1>
<div class="row">
	<div class="card card-body">
		<?php echo $this->session->flashdata("alert") ?>
		<div class="table-responsive">
			<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
		</div>
	</div>
</div>

<script>
	var data = {
      labels: [ <?php echo rtrim($label,",") ?> ],
      datasets: [{
        data: [ <?php echo rtrim($val,",") ?> ],
        lineTension: 0,
        backgroundColor: '#007bff',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    }
</script>