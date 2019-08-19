<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<h1 class="pt-3">PENERIMAAN DARAH</h1>

<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="card card-body">
			<?php echo $this->session->flashdata("alert") ?>
			<form action="" method="post">
				<div class="row">
				    <div class="col">
				    	<label>NOMOR PENERIMAAN</label>
				      	<input type="text" class="form-control" name="no_penerimaan" required>
				    </div>
				    <div class="col">
				    	<label>JUMLAH</label>
				      	<input type="text" class="form-control" name="jumlah" required>
				    </div>
				</div>
				
				<hr/>
				
				
				<div class="text-center">
					<button class="btn btn-md btn-success">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- <script>

	var base_url = '<?php echo base_url("/") ?>'

	$(document).ready(function(){
		$('.darah').change(function(){
			var id_darah = $(this).val();

			var ajax_link = base_url + 'pesanan/detail/' + id_darah

			$.get(ajax_link).fail(function(xhr,code,err){
				alert(err)
			}).done(function(res){
				$('.detail').html(res)
			});
		});
	});
</script> -->