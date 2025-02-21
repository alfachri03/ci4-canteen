
<main id="main">
<section class="section dashboard">
<div class="data-report bg-white p-3">
  <div class="title text-center bg-white">
    <h5 class="card-title mb-3">Riwayat <span>| Pembelian</span></h5>
  </div>
<table id="tabel-data" class="mt-2 table table-bordered" width="100%" cellspacing="0">
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <thead>
      <tr>
          <th scope="col">No Transaksi</th>
          <th scope="col">Id Pembeli</th>
          <?php if(isset($detail)) : ?>
            <th scope="col">Nama Pembeli</th>
            <th scope="col">Id Produk</th>
            <th scope="col">Jumlah Produk</th>
          <?php endif; ?>
          <th scope="col">Total Harga</th>
          <th scope="col">Tanggal Transaksi</th>
          <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php  $totalPenjualan = 0; ?>
      <?php foreach($data as $value) :?>                  
      <tr>                            
        <td><?= $value['transaction_id'] ?></td>
        <td><?= $value['acc_id'] ?></td>
        <?php if(isset($detail)) : ?>
          <td><?= $value['name']?></td>
          <td><?= $value['product_id'] ?></td>
          <td><?= $value['product_qty'] ?></td>
        <?php endif; ?>
          <td><?= $value['total_price'] ?></td>
          <td><?= $value['created_at'] ?></td>                               
          <?php $totalPenjualan += $value['total_price']; ?>                                                                            
          <td>
            <a class="btn btn-warning" href="<?=base_url('admin/detailReport/').$value['transaction_id']?>">Detail</a>
            <a class="btn btn-primary" href="<?=base_url('admin/detailReport/').$value['transaction_id']?>">Cetak</a>
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