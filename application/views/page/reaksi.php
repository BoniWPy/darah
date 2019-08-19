<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<h1 class="pt-3">Laporan Reaksi Transfusi</h1>
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="card card-body">
			<?php echo $this->session->flashdata("alert") ?>
			<form action="" method="post">
			
				<div class="form-group">
				<label for="sel1">REAKSI</label>
				<select class="form-control" id="reaksi" name="reaksi">
					<option value="1">BAGUS</option>
					<option value="0">TIDAK BAGUS</option>
				</select>
				</div>
				<div class="row">
				    <div class="col">
				    	<label>Catatan Reaksi</label>
				      	<textarea class="form-control" name="reaksi_darah"></textarea>
				    </div>
				</div>
				<hr/>
				<h4>Laporan Reaksi Transfusi</h4>
				<div class="row">
				    <div class="col">
				    	<label>Report Nomor Register</label>
						<select class="form-control darah" name="id_pesanan" required>
				      		<option>ID Pesanan</option>
				      		<?php foreach($list as $data){ ?>
				      		<option value="<?php echo $data['id_pesanan'] ?>"><?php echo $data['id_pesanan'] ?></option>
				      		<?php } ?>
				      	</select>

				    </div>
				</div>
				<br/>
				<div class="row">
				    <div class="col detail">
				    	
				    </div>
				</div>
				
				<br/><br/>
				<div class="text-center">
					<button class="btn btn-md btn-success">Report</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

	var base_url = '<?php echo base_url("/") ?>'

	$(document).ready(function(){
		$('.pesanan').change(function(){
			var id_pesanan = $(this).val();

			var ajax_link = base_url + 'reaksi' + id_pesanan

			$.get(ajax_link).fail(function(xhr,code,err){
				alert(err)
			}).done(function(res){
				$('.reaksi').html(res)
			});
		});
	});
</script>