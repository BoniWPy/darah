<div class="pt-3 pb-2 mb-3 border-bottom">
<div class="text-center">
<img src="assets/images/logo.png" class="img-fluid" alt="RS BORROMEUS"> 
</div>
<!-- <h2>Bank Darah</h2> -->
</div>
<div class="row">
  <div class="col-sm-12 col-lg-6 offset-lg-3">
    <div class="card">
      <div class="card-header">
        Bank Darah RS.Borromeus
      </div>
      <div class="card-body">
        <form action="" method="post">
          <?php echo $this->session->flashdata("error") ?>
          <div class="form-group">
              <label for="exampleInputEmail1">NIK</label>
              <input type="text" class="form-control" name="nik">
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>