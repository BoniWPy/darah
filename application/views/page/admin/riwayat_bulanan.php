<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<div class="col-md-12" style='float:right; margin-top:20px !important;' > 
	<button class='btn btn-alt btn-hover btn-info' style='float:right;margin-right:50px;' id='buttonChanger' onclick=cetakPDF();>CETAK</button> 
</div>
<h1 class="mb-3 pt-3">Riwayat Bulanan</h1>

<div class="row">
	<div class="card card-body">
		<?php echo $this->session->flashdata("alert") ?>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>ID</th>
					<th>Nama Perawat</th>
					<th>Golongan</th>
					<th>Jumlah</th>
					<th>Bagian</th>
					<th>Nama Pasien</th>
					<th>Nama Dokter</th>
					<th>Tanggal</th>
					
				</thead>
				<tbody>
				<?php foreach($list as $data){ ?>
					<tr>
						<td><?php echo $data['id_pesanan'] ?></td>
						<td><?php echo $data['nama_user'] ?></td>
						<td><?php echo $data['golongan'] ?></td>
						<td><?php echo $data['jumlah'] ?></td>
						<td><?php $encodeValue = json_decode ($data['data'],true); echo $encodeValue['bagian'];?></td>
						<td><?php $encodeValue = json_decode ($data['data'],true); echo $encodeValue['nama_pasien'];?></td>
						<td><?php $encodeValue = json_decode ($data['data'],true); echo $encodeValue['dokter'];?></td>
						
						<td><?php echo $data['updated_at'] ?></td>
						</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<button type="button" class="btn btn-sm btn-primary" style="display: none;" id="buttonModal" data-toggle="modal" data-target="#exampleModal"> Tambah User</button> <br/><br/>
<form action="<?php echo base_url('/admin/riwayat_bulanan') ?>" method="post">
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
		window.location.href = "riwayat_bulanan/laporan_pdf";
	}
</script>