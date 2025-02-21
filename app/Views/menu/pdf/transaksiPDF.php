    <style>
        td{
            padding: 10px;    
        }
    </style>
    <i style="color:red;">*Harap menunggu pesanan sedang dibuat</i>   
<table style="padding: 20px;">
    <tr>
        <td>
            <tr>
                <td>
                    <p>Id Transaksi</p>                
                    <p>Atas Nama</p>
                    <p>Nomor Telepon</p>
                </td>
                <td>
                    <p>: <?=$data[0]['transaction_id']?></p>
                    <p>: <?=$data[0]['nama_user']?></p>
                    <p>: <?=$data[0]['phone']?></p>
                </td>
            </tr>            
        </td>
        <td>
            <tr>
                <td>
                    <p>Waktu Pesan</p>
                    <p>Total Biaya</p>                    
                </td>
                <td>
                    <p>: <?=$data[0]['created_at']?></p>
                    <p style="font-weight: bold; color:red;">: <?=$data[0]['total_price']?></p>                    
                </td>
            </tr>
        </td>        
    </tr>
</table>


<div class="body-transaction">
        <div class="orderList">
            <table class="table" border="1" >
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