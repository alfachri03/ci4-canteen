<?php $hitungMakanan = ['total'=>0,'pcs'=>0]; $hitungMinuman = ['total'=>0,'pcs'=>0];  
  if (!is_array($vocerActive)) {
    $vocerActive['persentase'] = 0;
    $vocerActive['voucher_key'] = '';
    $vocerActive['diskon'] = 0;
  }
?>
<main id="main" class="main">
<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">            
            <!-- Customers Card -->
            <div class="col-xxl-12 col-xl-12 text-center">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Rincian <span>| Pesanan</span></h5>
                  <div class="d-flex align-items-center" style="overflow: auto;"> 
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Tipe</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Harga </th>
                          <th scope="col">Qty</th>                          
                          <th scope="col">Total </th>  
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $totalPrice = 0; ?>
                        <?php foreach($data as $value) :?>                  
                          <tr>
                          <th scope="row"><?= $value['type'] ?></th>
                          <td><?= $value['name'] ?></td>
                          <td><?= $value['price'] ?></td>
                          <td><?= $value['product_qty'] ?></td>   
                          <?php $price = 0; $price = $value['price']*$value['product_qty']; $totalPrice += $price; ?>     
                          <td><?= $price ?></td>                  
                          <td>                            
                            <a class="w-100 btn btn-danger" href="<?=base_url('cart/delete/').$value['order_id']?>">Hapus</a>
                          </td>
                        </tr>     
                        <!-- Hitung total makanan&minuman -->
                        <?php ($value['type'] == 'makanan') ? $hitungMakanan['pcs']++ :$hitungMinuman['pcs']++ ?>                        
                        <?php ($value['type'] == 'makanan') ? $hitungMakanan['total']+=$value['product_qty'] : $hitungMinuman['total']+=$value['product_qty'] ?>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="3">
                            <!-- Sales Card -->            
              <div class="card info-card sales-card bg-white">
                <div class="mx-auto card-body bg-white">
                  <h5 class="card-title ">Total Makanan <span>| Hari ini</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <svg style="fill: #e95616;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z"/></svg>
                    </div>
                    <div class="ps-3">
                      <h6><?= $hitungMakanan['total'] ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total pcs:</span> <span class="text-muted small pt-2 ps-1"><?=$hitungMakanan['pcs'] ?>  </span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->           
                          </td>
                          <td colspan="3">
                             <!-- Revenue Card -->            
              <div class="card info-card revenue-card">
                <div class="mx-auto card-body">
                  <h5 class="card-title">Total Minuman <span>| Hari ini</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <svg style="fill: #32cd50;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:#3d66ae}</style><path d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32V416c0 53 43 96 96 96H288c53 0 96-43 96-96h16c61.9 0 112-50.1 112-112s-50.1-112-112-112H352 32zm352 64h16c26.5 0 48 21.5 48 48s-21.5 48-48 48H384V256zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z"/></svg>
                    </div>
                    <div class="ps-3">
                      <h6><?= $hitungMinuman['total'] ?></h6>
                      <span class="text-success small pt-1 fw-bold">Total pcs:</span> <span class="text-muted small pt-2 ps-1"><?= $hitungMinuman['pcs'] ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
                          </td>
                        </tr>
                        <tr>
                          <td class="text-center fw-bold" colspan="2">TOTAL HARGA</td>                                                    
                          <td class="text-center fw-bold" colspan="2">:</td>
                          <td class="fw-bold" colspan="2"><?= $totalPrice ?></td>                          
                        </tr>
                        <tr>
                          <td class="text-center fw-bold" colspan="2">VOUCHER</td>                                                      
                          <td colspan="2">:</td>
                          <td class="text-center" colspan="1">
                            <div class="dropup-center dropup">
                              <a class="btn btn-success  btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  use <?= (!$vocerActive['voucher_key'] == '') ? $vocerActive['voucher_key'] : 'voucher' ?>
                              </a>
                              <ul class="dropdown-menu">                                
                                <?php foreach($vocer as $vocerValue) : ?>
                                  <li><a class="dropdown-item" href="<?=base_url('cart/addVoucher/').$vocerValue['voucher_key']?>"><?=$vocerValue['voucher_key'] ?></a></li>                                  
                                <?php endforeach; ?>
                              </ul>
                            </div>
                          </td>                               
                          <td colspan="2" class="fw-bold text-start"><?= $vocerActive['persentase'] ?>%</td>                          
                        </tr>
                        <tr>
                          <td class="fw-bold" colspan="2">
                            TOTAL PESANAN
                          </td>
                          <td colspan="2">
                            :
                          </td>
                          <form method="post" action="<?=base_url('order/submit')?>">
                          <td colspan="2">
                            <?= $totalPrice-=$totalPrice*$vocerActive['diskon'] ?>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6">
                            <button name="submit" class="fw-bold w-100 btn btn-danger">PESAN</button>
                          </td>
                          <input type="hidden" name="totalPrice" value="<?=$totalPrice?>">
                          <input type="hidden" name="id" value="<?= session()->id ?>">
                          </form>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>
</main>