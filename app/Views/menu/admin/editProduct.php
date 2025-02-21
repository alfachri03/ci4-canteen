
<main id="main">
<section class="section dashboard">
<div class="data-report bg-white p-3">
  <div class="title text-center bg-white">
    <h5 class="card-title mb-3">Edit <span>| Product</span></h5>
  </div>
<table class="mt-2 table table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
          <th scope="col">Id Produk</th>
          <th scope="col">Tipe Produk</th>   
          <th scope="col">Nama Produk</th>                    
          <th scope="col">Harga Produk</th>             
          <th scope="col">Foto Produk</th>      
          <th>Aksi</th>
      </tr>
    </thead>
    <form action="<?=base_url('admin/productEdit/submit')?>" method="post" enctype="multipart/form-data">
    <tbody>           
      <tr>   
        <td>        
            <input value="<?=$data['product_id']?>" type="text" class="form-control" placeholder="product name" aria-describedby="basic-addon1" disabled>                               
            <input value="<?=$data['product_id']?>" type="hidden" class="form-control" placeholder="product name" aria-describedby="basic-addon1" name="id">                               
        </td>  
        <td>
          <select name="type" class="form-select" aria-label="Default select example">
            <option value="<?=$data['type']?>" selected><?=$data['type']?></option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>            
          </select>
        </td>                         
        <td>
          <input value="<?=$data['name']?>" type="text" class="form-control" placeholder="product name" aria-describedby="basic-addon1" name="name" >                
        </td>        
        <td>
            <input value="<?=$data['price']?>" type="number" class="form-control" placeholder="price" aria-describedby="basic-addon1" name="price" >                
        </td>    
        <td>
            <input value="<?=$data['pict']?>" type="file" class="form-control" placeholder="price" aria-describedby="basic-addon1" name="pict" disabled>                
        </td>                                                                          
        <td>
            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </td>                                                      
      </tr>           
    </form>                                                               
    </tbody>
  </table>

</div>

  </section>
</main>