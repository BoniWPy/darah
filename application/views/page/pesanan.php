<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
 
        window.onload=function(){
            $('#datepicker').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#umur').val(age);
            });
        }
 
    </script>
<div class="text-center">
<img src="https://bankdarah.delvionita.me/assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<h1 class="pt-3">Pesan Baru</h1>

<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="card card-body">
			<?php echo $this->session->flashdata("alert") ?>
			<form action="" method="post">
				<div class="row">
				    <div class="col">
				    	<!-- <label>Bagian</label>
				      	<input type="text" class="form-control" name="bagian" required> -->
						  	<select class="form-control" name="bagian" required>
				      		<option>Pilih Bagian</option>
							  <option>Y5</option>
								<option>C5</option>
								<option>Uph</option>
								<option>Odc</option>
								<option>M2</option>
				      		</select>
				    </div>
					
				    <div class="col">
				    	<label>Kamar</label>
				      	<input type="text" class="form-control" name="kamar" required>
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				    	<label>Dokter yang meminta</label>
				      	<input type="text" class="form-control" name="dokter" required>
				    </div>
				    <div class="col">
				    	
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				    	<label>Diagnosa</label>
				      	<input type="text" class="form-control" name="diagnosa" required>
				    </div>
				    <div class="col">
				    	<label>Hb</label>
				      	<input type="text" class="form-control" name="hb" required>
				    </div>
				</div>
				<hr/>
				<div class="row">
				    <div class="col">
				    	<label>Nama Pasien</label>
				      	<input type="text" class="form-control" name="nama_pasien" required>
				    </div>
				    <div class="col">
				    	<label>Nomor Register</label>
				      	<input type="text" class="form-control" name="nomor_register" required>
				    </div>
				</div>
				<br>
				<div class="row">
				    <div class="col">
				    	<label>Tingkat Emergency  :</label>
				      	<select class="form-control" name="tingkat_emergency" required>
				      		<option value="Biasa">Biasa</option>
				      		<option value="Cito">Cito</option>
				      	</select>
				    </div>
				</div>
				<br>
				    <div class="row">
					<div class="col">
				    	<!-- <label>Umur</label> -->
						<label>Tanggal Lahir &nbsp :</label>
						 <input type="text" class="form-control" placeholder="  tgl/bln/thn" id="datepicker" required> &nbsp
						</div>
						<div class="col">
						<label>Umur  :</label>
					    <input type="text" class="form-control" id="umur">
				      	<!-- <input type="text" class="form-control" name="umur" required> -->
						  </div>
				    </div>
				</div>
				<br>
				<div class="row">
				    <div class="col">
				    	<label>Alamat</label>
				      	<textarea class="form-control" name="alamat"></textarea>
				    </div>
				</div>
				<hr/>
				<h4>Pesanan Darah</h4>
				<div class="row">
				    <div class="col">
				    	<label>Darah Tersedia</label>
				      	<select class="form-control darah" name="darah" required>
				      		<option>Pilih Darah</option>
				      		<?php foreach($list as $data){ ?>
				      		<option value="<?php echo $data['id_darah'] ?>"><?php echo $data['golongan'] ?></option>
				      		<?php } ?>
				      	</select>
				    </div>
				</div>
				<br/>
				<div class="row">
				    <div class="col detail">
				    	
				    </div>
				</div>
				<div class="row">
				    <div class="col">
				    	<label>Jumlah diminta</label>
				      	<input type="text" class="form-control" name="jumlah" required>
				    </div>
				</div>
				<br/><br/>
				<div class="text-center">
					<button class="btn btn-md btn-success">Pesan</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>

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
</script>