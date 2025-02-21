
<main id="main">
<section class="section dashboard">
<div class="data-report bg-white p-3">
  <div class="title text-center bg-white">
    <h5 class="card-title mb-3">Daftar <span>| Produk</span></h5>
  </div>
  <div class="laporan">
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="card mb-3 text-center" style="max-width: 540px;">
          <div class="row g-0">
            <div class="col-md-12">
              <div class="card-body">
                <h5 class="card-title">Total Makanan</h5>
                <p class="card-text fw-bold text-danger" style="font-style:italic;"><?= $totalMakanan['type'] ?></p>                
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="card mb-3 text-center" style="max-width: 540px;">
          <div class="row g-0">   
            <div class="col-md-12">
              <div class="card-body">
                <h5 class="card-title">Total Minuman</h5>
                <p class="card-text fw-bold text-danger" style="font-style:italic;"><?= $totalMinuman['type'] ?></p>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="add mb-3">
    <a class="btn btn-primary" href="<?=base_url('admin/tambahProduk')?>">Tambah Produk</a>
  </div>
<table id="tabel-data" class="mt-2 table table-bordered" width="100%" cellspacing="0">
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <thead>
      <tr>
          <th scope="col">Tipe Produk</th>
          <th scope="col">Id Produk</th>
          <th scope="col">Nama Produk </th>
          <th scope="col">Harga</th>      
          <th scope="col">Gambar</th>      
          <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php  $totalPenjualan = 0; ?>
      <?php foreach($data as $value) :?>                  
      <tr>                            
        <td><?= $value['type'] ?></td>
        <td><?= $value['product_id'] ?></td>
          <td><?= $value['name'] ?></td>
          <td><?= $value['price'] ?></td>                                         
          <td><?= $value['pict'] ?></td>   
          <td>
            <a class="btn btn-warning" href="<?=base_url('admin/editProduct/').$value['product_id']?>">Edit</a>
            <a class="btn btn-danger" href="<?=base_url('admin/removeProduct/').$value['product_id']?>">Hapus</a>
          </td>   
      </tr>                            
      <?php endforeach; ?>                                               
    </tbody>
  </table>

</div>
  <script>
      $(document).ready(function(){
          $('#tabel-data').DataTable();
      });
  </script>
  </section>
</main>