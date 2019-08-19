<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>

<h1 class="mb-3 pt-3">Stok Darah</h1>
<div class="row">
	<div class="card card-body">
		<?php echo $this->session->flashdata("alert") ?>
		<div class="table-responsive">
			<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah Stok</button> <br/><br/>
			<table class="table table-bordered">
				<thead>
					<th>Golongan</th>
					<th>Ukuran</th>
					<th>Stok</th>
					<th>Jenis</th>
					<th class="text-center" style="width: 200px;">Aksi</th>
				</thead>
				<tbody>
				<?php foreach($list as $data){ ?>
					<tr>
						<td><?php echo $data['golongan'] ?></td>
						<td><?php echo $data['ukuran'] ?></td>
						<td><?php echo $data['stok'] ?></td>
						<td><?php echo $data['jenis'] ?></td>
						<td class="text-center">
							<button class="btn btn-sm btn-success" onclick="update_stok(<?php echo $data['id_darah'] ?>)">Tambah</button>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<button type="button" class="btn btn-sm btn-primary" style="display: none;" id="buttonModal" data-toggle="modal" data-target="#exampleModal"> Tambah User</button> <br/><br/>
<form action="<?php echo base_url('/admin/stok') ?>" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<input type="hidden" name="id_darah" id="id_darah" value="">
		    <div class="form-group">
		        <label for="exampleFormControlInput1">Golongan</label>
		        <input type="text" class="form-control golongan"required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">Ukuran</label>
		        <input type="text" class="form-control ukuran" required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">Jenis</label>
		        <input type="text" class="form-control jenis" required="">
		    </div>
		    <div class="form-group">
		        <label for="exampleFormControlSelect1">stok</label>
		        <input type="text" class="form-control stok" name="stok" required="">
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

<script>

	var url = '<?php echo base_url("/") ?>'

	function update_stok(id){

		$.get(url+"/admin/stok/detail/"+id).fail(function(xhr,code,error){
			alert(error)
		}).done(function(res){
			$('#buttonModal').click()
			var res = JSON.parse(res)
			$('#id_darah').val(id)
			$('.golongan').val(res.golongan)
			$('.ukuran').val(res.ukuran)
			$('.stok').val(res.stok)
			$('.jenis').val(res.jenis)

		});

	}
</script>