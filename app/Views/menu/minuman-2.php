<main id="main" class="main">
    <!-- Carousel-makanan -->
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url('assets/img/banner/banner2.png')?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=base_url('assets/img/banner/banner3.png')?>" class="d-block w-100" alt="...">
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

<!-- Wave -->
<div class="text-center fw-bold fs-2 p-5" style="height: 50px; background-color: #0099ff">
    <p class="" style="color: white;">MAKANAN</p>
</div>
<div class="wave">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,224L26.7,202.7C53.3,181,107,139,160,133.3C213.3,128,267,160,320,170.7C373.3,181,427,171,480,176C533.3,181,587,203,640,229.3C693.3,256,747,288,800,261.3C853.3,235,907,149,960,117.3C1013.3,85,1067,107,1120,149.3C1173.3,192,1227,256,1280,272C1333.3,288,1387,256,1413,240L1440,224L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path></svg>
</div>
<!-- EndWave -->


    <section class="section dashboard">
            <!-- Content -->
        <div class="myCard p-5 " style="margin-top: -350px;">
        <div class="row row-cols-1 row-cols-md-4  g-4">
        <?php foreach($data as $value) : ?>    
            <div class="col">
            <div class="card produk-img shadow">
            <img src="<?=base_url('assets/img/').$value['type'].'/'.$value['pict']?>" class="card-img-top" alt="food-img" style="width: 100%; height:200px;">
            <div class="card-body bg-white">        
            <h5 class="card-title" style="margin-bottom: -30px;"><?= $value['name'] ?></h5>
            <h5 class="card-title" style="font-size:small; font-style:italic; color: #EF6262;">Rp. <?= $value['price']?></h5>
                <p class="card-text"><?= $value['desc'] ?></p>      
                <form method="post" action="<?=base_url('cart/add')?>">
                <div class="row">          
                <div class="col-md-6 col-12">
                    <!-- tombol tambah -->
                <button name="product_id" value="<?=$value['product_id']?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success" style="border-radius: 0; padding:5px; width:100%; height:100%">Tambah</button>                                          
                </div>
                <div class="col-md-6 col-12">
                    <input name="qty" style="width:100%; height:100%" type="number" placeholder="qty">        
                </div>
                </div>
                </form>         
            </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- Modal -->
        </div>
        </div>
        <!-- EndContent -->
    </section>

  </main><!-- End #main -->
