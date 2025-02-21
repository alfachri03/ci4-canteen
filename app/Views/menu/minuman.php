<main class="mt-5">
  <!-- Carousel-makanan -->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="<?=base_url('assets/img/banner/banner3.png')?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?=base_url('assets/img/banner/banner2.png')?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?=base_url('assets/img/banner/banner1.png')?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class=  "visually-hidden">Next</span>
  </button> 
</div>
<!-- EndCarousel -->
<div class="text-center fw-bold fs-2 p-5" style="height: 50px; background-color: #EF6262">
    <p class="" style="color: white;">MINUMAN</p>
</div>
<div class="wave">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#EF6262" fill-opacity="1" d="M0,256L1440,192L1440,0L0,0Z"></path></svg>
</div>

<!-- EndHeader -->

<!-- Content -->
<div class="myCard p-5" style="margin-top: -250px;">
<div class="row row-cols-1 row-cols-md-4 g-4">
  <?php foreach($data as $value) : ?>
    <div class="col">
    <div class="card produk-img">
      <img src="<?=base_url('assets/img/').$value['type'].'/'.$value['pict']?>" class="card-img-top" alt="food-img" style="width: 100%; height:200px;">
      <div class="card-body bg-white">
      <h5 class="card-title" style="margin-bottom: -30px;"><?= $value['name'] ?></h5>
      <h5 class="card-title" style="font-size:small; font-style:italic; color: #EF6262;">Rp. <?= $value['price']?></h5>
        <p class="card-text"><?= $value['desc'] ?></p>  
        <form method="post" action="<?=base_url('cart/add')?>">
        <div class="row">          
          <div class="col-12 col-md-6">
           <button name="product_id" value="<?=$value['product_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success" style="border-radius: 0; padding:5px; width:100%; height:100%">Tambah</button>                                          
          </div>
          <div class="col-12 col-md-6">
            <input name="qty" style="width:100%; height:100%" type="number" placeholder="qty">        
          </div>
        </div>
        </form>         
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
</div>
<!-- EndContent -->

</main>