<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<h1 class="pt-3">Pembatalan Pemesanan</h1>
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="card card-body">
			<?php echo $this->session->flashdata("alert") ?>
			<form action="" method="post">
				<div class="row">
				    <div class="col">
				    	<label>Alasan</label>
				      	<textarea class="form-control" name="alasan"></textarea>
				    </div>
				</div>
				<hr/>
				<h4>Pembatalan Pesanan</h4>
				<div class="row">
				    <div class="col">
				    	<label>Batalkan Pesanan Dengan NO ID</label>
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

			var ajax_link = base_url + 'batal' + id_pesanan

			$.get(ajax_link).fail(function(xhr,code,err){
				alert(err)
			}).done(function(res){
				$('.batal').html(res)
			});
		});
	});
</script>