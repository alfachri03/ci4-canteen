<main id="main">
    <?php if(session()->getFlashdata('alert')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('alert') ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?=base_url('EditProfile/submit')?>" enctype="multipart/form-data">
        <input type="hidden" name="acc_id" value="<?=$active['acc_id']?>">
        <div class="row text-center">
            <div class="col-12 col-md-3">
                <img src="<?=base_url('assets/img/profile-pict/profile-img.jpg')?>" class="img-thumbnail" alt="profile-img">
            </div>
            <div class="col-12 col-md-9">
                <input value="<?=$active['pict']?>" type="file" class="form-control" id="inputGroupFile01" style="margin-top: 50px; margin-left:0;" name="pict" required>
            </div>
        </div>  
        <div class="row mt-5">
            <div class="col-12">
                Nama Pengguna                                  
                <input value="<?=$active['name']?>" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="name" required>                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                Email Pengguna
                <input value="<?=$active['email']?>" type="email" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="email">                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                Telepon Pengguna
                <input value="<?=$active['phone']?>" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="phone" required>                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                Alamat Pengguna                
                <textarea name="address" class="form-control"><?=$active['address']?></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-end">
                <a class="btn btn-danger" href="<?=base_url('Home')?>">Batal Edit</a>
               <button class="btn btn-primary" name="submit">Edit Profile</button>
            </div>
        </div>
    </form>
</main>