<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<!-- <div class="col-md-12" style='float:left; margin-top:20px !important;' > 
	<button class='btn btn-alt btn-hover btn-info' style='float:left;margin-right:50px;' id='buttonChanger' onclick=cetakPDF();>INPUT</button> 
</div> -->
<div class="row">
<div class="col-md-6 text-left" style='' > 
	<button class='btn btn-alt btn-hover btn-info' style='' id='buttonChanger' onclick=tambahData();>TAMBAH</button> 
</div>
<div class="col-md-6 text-right" style='' > 
	<button class='btn btn-alt btn-hover btn-info' style='' id='buttonChanger' onclick=cetakPDF();>CETAK</button> 
</div>
</div>
<br>
<h1 class="mb-3 pt-3">PENERIMAAN BULANAN</h1>

<div class="row">
	<div class="card card-body">
		<?php echo $this->session->flashdata("alert") ?>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>NO</th>
					<th>NO PENERIMAAN</th>
					<th>JUMLAH LABU</th>
					<th>TANGGAL</th>
				</thead>
				<tbody>
				<?php foreach($list as $data){ ?>
					<tr>
						<td><?php echo $data['id_penerimaan'] ?></td>
						<td><?php echo $data['no_penerimaan'] ?></td>
						<td><?php echo $data['jumlah'] ?></td>
						<td><?php echo $data['created_at'] ?></td>
						</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<button type="button" class="btn btn-sm btn-primary" style="display: none;" id="buttonModal" data-toggle="modal" data-target="#exampleModal"> Tambah User</button> <br/><br/>
<form action="<?php echo base_url('/admin/penerimaan_darah') ?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
</div>
</form>

<script>

	var url = '<?php echo base_url("/") ?>'

	function update_data(id){
		$('#buttonModal').click();
		$('#id_pesanan').val(id)
	}
	function cetakPDF(){
		window.location.href = "penerimaan_darah/laporan_pdf";
	}
	function tambahData(){
		window.location.href = "penerimaan_darah/tambah";
	}
</script>