<main id="main">
    <form method="post" action="<?=base_url('admin/insertProduct')?>" enctype="multipart/form-data">
        <input type="hidden" name="acc_id" value="<?=$active['acc_id']?>">
        <div class="row text-center">
            <div class="col-12 col-md-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2771/2771401.png" class="img-thumbnail" alt="product-img">
            </div>
            <div class="col-12 col-md-9">
                <input type="file" class="form-control" id="inputGroupFile01" style="margin-top: 50px; margin-left:0;" name="pict" required>
            </div>
        </div>  
        <div class="row mt-5">
            <div class="col-12">
                Tipe Produk
                <select name="type" class="form-select" aria-label="Default select example">
                    <option value="makanan" selected>Makanan</option>
                    <option value="minuman">Minuman</option> 
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                Nama Produk                                  
                <input type="text" class="form-control" placeholder="Nama" aria-describedby="basic-addon1" name="name" required>                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                Harga Produk
                <input type="number" class="form-control" placeholder="price" aria-describedby="basic-addon1" name="price" required>                
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                Deskripsi Produk
                <textarea name="desc" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-end">
                <a class="btn btn-danger" href="<?=base_url('admin/listProduk')?>">Batal</a>
               <button class="btn btn-primary" name="submit">Tambah</button>
            </div>
        </div>
    </form>
</main>