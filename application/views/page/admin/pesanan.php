<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<h1 class="mb-3 pt-3">Pesanan</h1>
<!-- <div><span class="mb-3 pt-3 font-weight-bold">Pesanan</span><span class="float-right font-weight-bold">test</span></div> -->
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
					<th>Tingkat Emergency</th>
					<th>Kondisi HB</th>
					<th>Keterangan</th>
					<th>Status</th>
					<th>Tanggal</th>
					<th class="text-center" style="width: 200px;">Aksi</th>
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
						<td><?php 
						$encodeValue = json_decode ($data['data'],true); 
						if($encodeValue['tingkat_emergency'] == 'Biasa'){
							
							echo '<span class="badge badge-secondary">Biasa</span>';
						}else{
							echo '<span class="badge badge-danger">CITO</span>';
						}
						?></td>
						<td><?php $encodeValue = json_decode ($data['data'],true); echo $encodeValue['hb'];?></td>
						<td><?php echo $data['note'] ?></td>

						<td><?php
						if( $data['status'] == 'waiting' ){
							echo '<span class="badge badge-secondary">Menunggu Konfirmasi</span>';
						}else if( $data['status'] == 'confirm' ){
							echo '<span class="badge badge-success">Pesanan Berhasil, Sudah dikonfirmasi</span>';
						}else if( $data['status'] == 'cancel_perawat' ){
							echo '<span class="badge badge-secondary">Perawat Minta Dibatalkan</span>';
						}else{
							echo '<span class="badge badge-danger">Dibatalkan</span>';
						}
						?></td>
						<td><?php echo $data['created_at'] ?></td>
						<td class="text-center">
							<button class="btn btn-sm btn-success" onclick="update_data(<?php echo $data['id_pesanan'] ?>)">Update Data</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<button type="button" class="btn btn-sm btn-primary" style="display: none;" id="buttonModal" data-toggle="modal" data-target="#exampleModal"> Tambah User</button> <br/><br/>
<form action="<?php echo base_url('/admin/pesanan') ?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="id_darah" id="id_darah" value="">
		    <div class="form-group">
		        <label for="exampleFormControlInput1">ID Pesanan</label>
		        <input type="text" class="form-control" name="id_pesanan" id="id_pesanan" required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">Status</label>
		        <select class="form-control" name="status" required="">
		        	<option value="waiting">waiting</option>
		        	<option value="cancel">batalkan</option>
		        	<option value="confirm">konfirmasi</option>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">Keterangan</label>
		        <textarea class="form-control" name="note"></textarea>
		    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>

	var url = '<?php echo base_url("/") ?>'

	function update_data(id){

		$('#buttonModal').click();
		$('#id_pesanan').val(id)

	}
</script>