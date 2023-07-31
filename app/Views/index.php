<?= $this->extend("project/layout") ?>
<?= $this->section("content") ?>
<body>
  <!--====== SLIDER ONE PART START ======-->
  <section class="slider-area slider-one">
    <div class="bd-example">
      <div id="carouselOne" class="carousel slide-mt-5" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselOne" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselOne" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselOne" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item bg_cover active" style="
               background-image: url(../assets/carousel/slider_1.jpg);

               ">
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-xl-6 col-lg-7 col-sm-10">
                    <h2 class="carousel-title">
                      Toko Buah Rizal
                    </h2>
                    <ul class="carousel-btn rounded-buttons">
                      
                    </ul>
                  </div>
                </div>
                <!-- row -->
              </div>
              <!-- container -->
            </div>
            <!-- carousel caption -->
          </div>
          <!-- carousel-item -->
          <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_1.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Toko Buah</b> Rizal</h1>
                                <h3 class="h2">Menyediakan Buah Segar</h3>
                                <p>
                                Kami adalah penjual buah dengan kualitas dan manfaat yang sangat terjamin untuk di konsumsi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_2.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">100% Buah Segar</h1>
                                <h3 class="h2">Buah dari kebun langsung</h3>
                                <p>
                                    Kami menjual buah segar dari kebun petani lokal secara langsung, dengan demikian toko kami membantu memasarkan hasil panen petani lokal.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_3.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Buah Terbaik</h1>
                                <h3 class="h2">Kami hanya menjual buah terbaik</h3>
                                <p>
                                    Kami tidak menjual buah cacat atau busuk, 100% uang kembali jika mendapatkan buah cacat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Produk Terbaru</h1>
                <p>
                   Produk terbaru dari toko kami 
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/anggur_home.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Anggur</h5>
                <p class="text-center"><a class="btn btn-success">Beli</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/mangga_home.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Mangga</h2>
                <p class="text-center"><a class="btn btn-success">Beli</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/apel_home.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Apel</h2>
                <p class="text-center"><a class="btn btn-success">Beli</a></p>
            </div>
        </div>
    </section>
  <!--====== SLIDER ONE PART ENDS ======-->
  <!--====== ABOUT ONE PART START ======-->
  
    <!-- container -->
  </section>
  <!--====== ABOUT ONE PART ENDS ======-->
  <!--====== CARD PART START ======-->

  <!--====== CARD PART ENDS ======-->
</body>