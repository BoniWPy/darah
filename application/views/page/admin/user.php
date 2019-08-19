<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>

<h1 class="mb-3 pt-3">List User</h1>
<div class="row">
	<div class="card card-body">
		<?php echo $this->session->flashdata("alert") ?>
		<div class="table-responsive">
			<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah User</button> <br/><br/>
			<table class="table table-bordered">
				<thead>
					<th>NIK</th>
					<th>Nama</th>
					<th>Role</th>
					<th>No HP</th>
					<th>Dibuat</th>
					<th>Terakhir Update</th>
				</thead>
				<tbody>
				<?php foreach($list as $data){ ?>
					<tr>
						<td><?php echo $data['nik'] ?></td>
						<td><?php echo $data['nama_user'] ?></td>
						<td><?php echo $data['role'] ?></td>
						<td><?php echo $data['no_hp'] ?></td>
						<td><?php echo $data['created_at'] ?></td>
						<td><?php echo $data['updated_at'] ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

        <form action="<?php echo base_url('/admin/user') ?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah user baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		    <div class="form-group">
		        <label for="exampleFormControlInput1">NIK</label>
		        <input type="text" class="form-control" name="nik" required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">Nama User</label>
		        <input type="text" class="form-control" name="nama" required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">No hp</label>
		        <input type="text" class="form-control" name="no_hp" required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect2">Role</label>
		        <select class="form-control" name="role">
		            <option value="admin">Admin</option>
		            <option value="user">User</option>
		        </select>
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">Password</label>
		        <input type="text" class="form-control" name="password" required="">
		    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
</form>