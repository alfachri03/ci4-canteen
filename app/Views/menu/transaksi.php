<main id="main">
    <div class="status">
        <div class="alert alert-success text-start " role="alert">
        <i class="bi bi-clipboard-check"></i>
           Pesanan Berhasil !
        </div>                
    </div>
    <i class="text-">*Harap menunggu pesanan sedang dibuat</i>
    <div class="header-transaction">
        <div class="row row-cols-auto">
            <div class="col col-12 col-md-6">
                <div class="row text-start">
                    <div class="col-6 text-start">
                        <p>Id Transaksi</p>
                        <p>Atas Nama</p>
                        <p>Nomor Telepon</p>
                    </div>
                    <div class="col-6">
                    <p>: <?=$data[0]['transaction_id']?></p>
                    <p>: <?=$data[0]['nama_user']?></p>
                    <p>: <?=$data[0]['phone']?></p>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-6">
                <div class="row text-start">
                    <div class="col-6 text-start">                        
                        <p>Waktu Pesan</p>
                        <p>Total Biaya</p>
                        <p>Cetak Pesanan</p>
                    </div>
                    <div class="col-6">                        
                        <p>: <?=$data[0]['created_at']?></p>
                        <p class="fw-bold text-danger">: <?=$data[0]['total_price']?></p>
                        <p>: <a style="width:50px; height: 25px; padding:5px; padding-top:0; border-radius:3px;" class="btn btn-primary" href="<?=base_url('pdf/').$data['0']['transaction_id']?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-transaction">
        <div class="orderList">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Nama Produk</th>                        
                        <th scope="col">Total Pesan</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $value) :  ?>        
                        <tr>
                            <td><?= $value['product_id'] ?></td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['product_qty'] ?></td>
                            <td><?= $value['price']*$value['product_qty'] ?></td>
                        </tr>            
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>