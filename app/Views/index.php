<?= $this->extend("project/layout") ?>
<?= $this->section("content") ?>
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
                                        <li>
                                            <a class="btn primary-btn rounded-full" href="javascript:void(0)">
                                                GET STARTED
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn primary-btn-outline rounded-full" href="javascript:void(0)">
                                                EXPLORE
                                            </a>
                                        </li>
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
                <div class="carousel-item bg_cover" style="
               background-image: url(../assets/carousel/slider_2.jpg);
               ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-7 col-sm-10">
                                    <h2 class="carousel-title">
                                        Untuk Anda yang lebih sehat
                                    </h2>

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
                <div class="carousel-item bg_cover" style="
               background-image: url(../assets/carousel/slider_2.jpg);
               ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-7 col-sm-10">
                                    <h2 class="carousel-title">
                                        Panjang umur, makan buah
                                    </h2>
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
            </div>
            <!-- carousel-inner -->
            <a class="carousel-control-prev" href="#carouselOne" role="button" data-bs-slide="prev">
                <i class="lni lni-chevron-left"></i>
            </a>
            <a class="carousel-control-next" href="#carouselOne" role="button" data-bs-slide="next">
                <i class="lni lni-chevron-right"></i>
            </a>
        </div>
        <!-- carousel -->
    </div>
    <!-- bd-example -->
</section>
<!--====== SLIDER ONE PART ENDS ======-->
<!--====== ABOUT ONE PART START ======-->
<section id="home-component" class="about-area about-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-title text-center">
                    <h2 class="title fw-bold">Kenapa Memilih Kami</h2>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-8">
                <div class="single-about-items">
                    <div class="items-icon">
                        <i class="lni lni-bullhorn"></i>
                    </div>
                    <div class="items-content">
                        <h4 class="items-title">Selalu Segar</h4>
                        <p class="text">
                            Dipetik langsung dari kebun
                        </p>
                    </div>
                </div>
                <!-- single about items -->
            </div>
            <div class="col-md-4 col-sm-8">
                <div class="single-about-items">
                    <div class="items-icon">
                        <i class="lni lni-investment"></i>
                    </div>
                    <div class="items-content">
                        <h4 class="items-title">Kualitas Terbaik</h4>
                        <p class="text">
                            Kualitas dari pertanian terbaik
                    </div>
                </div>
                <!-- single about items -->
            </div>
            <div class="col-md-4 col-sm-8">
                <div class="single-about-items">
                    <div class="items-icon">
                        <i class="lni lni-handshake"></i>
                    </div>
                    <div class="items-content">
                        <h4 class="items-title">Bantuan</h4>
                        <p class="text">
                            Bantuan 24/7 selalu online
                        </p>
                    </div>
                </div>
                <!-- single about items -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!--====== ABOUT ONE PART ENDS ======-->
<!--====== CARD PART START ======-->
<section id="home-component" class="card-area pb-5 overflow-x-hidden overflow-hidden">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="about-title text-center">
                <h2 class="title fw-bold">Produk Terbaru</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-card card-style-one">
                    <div class="card-image">
                        <img alt="Image" src="/assets/img/mangga.jpg">
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            <a href="/product">Mangga</a>
                        </h4>
                        <p class="text">
                            Rp. 20.000,00
                        </p>
                    </div>
                </div>
                <!-- single-card -->
            </div>
            <!-- col -->
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-card card-style-one">
                    <div class="card-image">
                        <img src="/assets/img/anggur.jpg" alt="Image" />
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            <a href="javascript:void(0)">Anggur</a>
                        </h4>
                        <p class="text">
                            Rp. 38.000,00
                        </p>
                    </div>
                </div>
                <!-- single-card -->
            </div>
            <!-- col -->
            <div class="col-lg-4 col-md-7 col-sm-9">
                <div class="single-card card-style-one">
                    <div class="card-image">
                        <img src="/assets/img/melon.jpg" alt="Image" />
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            <a href="javascript:void(0)">Melon</a>
                        </h4>
                        <p class="text">
                            Rp. 31.000,00
                        </p>
                    </div>
                </div>
                <!-- single-card -->
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!--====== CARD PART ENDS ======-->
<?= $this->endsection("content") ?>

<script>
    //===== close navbar-collapse when a  clicked
    let navbarTogglerOne = document.querySelector(
        ".navbar-one .navbar-toggler"
    );
    navbarTogglerOne.addEventListener("click", function() {
        navbarTogglerOne.classList.toggle("active");
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>