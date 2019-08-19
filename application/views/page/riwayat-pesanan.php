<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<h1 class="mb-3 pt-3">Riwayat Pesanan</h1>
<div class="row">
	<div class="card card-body">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>Id pesanan</th>
					<th>Tanggal</th>
					<th>Nama Pasien</th>
					<th>Jenis Darah</th>
					<th>Status</th>
					<th>Keterangan</th>
				</thead>
				<tbody>
				<?php foreach($list as $data){ ?>
					<tr>
						<td><?php echo $data['id_pesanan'] ?></td>
						<td><?php echo $data['created_at'] ?></td>
						<td><?php echo $data['pasien'] ?></td>
						<td><?php echo $data['golongan'] ?></td>
						<td><?php
						if( $data['status'] == 'waiting' ){
							echo '<span class="badge badge-secondary">Menunggu Konfirmasi</span>';
						}else if( $data['status'] == 'confirm' ){
							echo '<span class="badge badge-success">Sudah dikonfirmasi Pesanan Sudah Siap</span>';
						}else{
							echo '<span class="badge badge-danger">Dibatalkan</span>';
						}
						?></td>
						<td><?php echo $data['note'] ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>