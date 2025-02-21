  <main id="main" class="main">
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide mb-4">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url('assets/img/banner/banner1.png') ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/banner2.png') ?>" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?= base_url('assets/img/banner/banner3.png') ?>" class="d-block w-100" alt="...">
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
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- End Carousel -->


    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <h2 class="text-center text-primary fw-bold mb-4">PROMO HARI INI!</h2>
            <!-- Cards -->
            <div class="row">
              <?php for ($i = 0; $i < count($produk); $i++) : ?>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="card  produk-img" style="width:100%;">
                    <img src="<?= base_url('assets/img/' . $produk[$i]['type'] . '/' . $produk[$i]['pict']) ?>" class="card-img-top object-fit-cover" alt="..." style="width: 100%; height: 200px">
                    <!-- kartu menu -->
                    <!-- card menu -->
                    <div class="card-body bg-white">
                      <h5 class="card-title" style="margin-bottom: -30px;"><?= $produk[$i]['name'] ?></h5>
                      <h5 class="card-title" style="font-size:small; font-style:italic; color: #EF6262;">Rp. <?= $produk[$i]['price'] ?></h5>
                      <div class="d-none d-md-block card-text mb-1"><?= $produk[$i]['desc'] ?></div>
                      <form method="post" action="<?= base_url('cart/add') ?>">
                        <div class="row">
                          <div class="col-12 col-md-6">
                            <!-- tombol tambah -->
                            <button name="product_id" value="<?= $produk[$i]['product_id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success" style="border-radius: 0; padding:5px; width:100%; height:100%">Tambah</button>
                          </div>
                          <div class="col-12 col-md-6">
                            <input name="qty" style="width:100%; height:100%" type="number" placeholder="qty">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <?php endfor; ?>
            </div>
            <!-- End Cards -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekomendasi <span>| Hari Ini </span></h5>

              <div class="activity">
                <?php for ($j = 3; $j < count($produk); $j++) : ?>
                  <div class="card mb-3 produk-img" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img style="width: 100%; height:100%;" src="<?= base_url('assets/img/') . $produk[$j]['type'] . '/' . $produk[$j]['pict'] ?>" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h1 class="card-title" style="font-size: small; margin-bottom:-10px;"><?= $produk[$j]['name'] ?></h1>
                          <div class="desc" style="width:100%;height:20px;overflow:hidden;font-size:x-small;">
                            <a href="http://">Lihat Selengkapnya</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endfor; ?>
              </div><!-- </close activity> -->

            </div>
          </div><!-- End Recent Activity -->
        </div><!-- End Right side columns -->
      </div>
    </section>

  </main><!-- End #main -->