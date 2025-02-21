
<main id="main">
<section class="section dashboard">
<div class="data-report bg-white p-3">
  <div class="title text-center bg-white">
    <h5 class="card-title mb-3">Account <span>| Setting</span></h5>
  </div>
  <form action="<?=base_url('admin/accSetting/submit')?>" method="post">
    <div class="row">
        <?php if (session()->getFlashdata('alert')): ?>
            <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('alert') ?>
            </div>
        <?php elseif(session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <label class="mb-2" for="">Password Lama</label>
        <div class="col-12 mb-3">            
            <input type="text" class="form-control" placeholder="old password" aria-describedby="basic-addon1" name="oldpassword" required>                
        </div>
    </div>
    
    <div class="row mb-5">        
        <label class="mb-2" for="">Password Baru</label>
        <div class="col-12 col-md-6">
            <input type="text" class="form-control" placeholder="new password" aria-describedby="basic-addon1" name="newpassword" required>                
        </div>
        <div class="col-12 col-md-6">
            <input type="text" class="form-control" placeholder="retype new password" aria-describedby="basic-addon1" name="retype" required>                
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <button class="btn btn-primary w-100">SIMPAN</button>
        </div>
    </div>
  </form>
</div>

  </section>
</main>