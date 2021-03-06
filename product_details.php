<?php 
    if(isset($_POST["submit"])) {
        
        if($_POST['warna'] != null) {

            // var_dump("1",$_POST['warna'], $_POST['qty']); exit;
            session_start();
            
            $_SESSION['order'] = [
                'warna' => $_POST['warna'],   
                'qty' => $_POST['qty']
            ];

            header("Location: checkout.php");
            // exit;
        } else {
            
            $_SESSION['pilihWarna'] = 1 ;
            
        }
        // var_dump("2",$_SESSION['order']); exit;
        // session_destroy();
    }
?>
<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gesits</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Group 9 (1).ico">

    <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">

</head>
    

<body>
    
<header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.php"><img src="assets/img/Logo-dark-gesits.png" alt="" style="max-width: 140px;"></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="#">PRODUK</a></li>
                                    <li><a href="contact.php">LOKASI KAMI</a></li>
                                    <li><a href="">TENTANG KAMI</a>
                                        <ul class="submenu">
                                            <li><a href="about.php"> Profil Perusahaan</a></li>
                                            <li><a href="#"> Hubungi Kami</a></li>
                                        </ul>
                                    </li>
                                   
                                    <li><a href="#">MEDIA CENTER</a>
                                        <ul class="submenu">
                                            <li><a href="#">Berita</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="faq.php">Faq</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="product_details.php">PESAN SEKARANG</a>
                                        <!-- <ul class="submenu">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="elements.html">Element</a></li>
                                            <li><a href="confirmation.html">Confirmation</a></li>
                                            <li><a href="checkout.html">Product Checkout</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
            <?php if(isset($_SESSION["pilihWarna"]) == 1) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Silahkan Pilih Warna
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; unset($_SESSION['pilihWarna']); ?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Order</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <form action="" enctype="multipart/form-data" method="post">
            <div class="product_image_area">
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        <div class="single_product_img">
                            <img src="assets/img/merah.jpg" alt="#" class="img-fluid" style="width:800px;margin: auto">
                        </div>
                        <div class="single_product_img">
                            <img src="assets/img/hitam.jpg" alt="#" class="img-fluid"style="width:800px;margin: auto">
                        </div>
                        <div class="single_product_img">
                            <img src="assets/img/Putih.jpg" alt="#" class="img-fluid"style="width:800px;margin: auto">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3>GESITS – G1</h3>
                        <span>Rp 27.500.000</span><br/>
                        <span class="bintang">* Harga ON THE ROAD Jabodetabek</span>
                        <p>
                        Motor listrik Gesits menggunakan tenaga listrik dengan daya motor 5KW. Sekali pengisian daya, motor listrik Gesits bisa digunakan untuk berkendara sejauh sekitar 50 kilomter untuk baterai tunggal dan 100 kilometer untuk baterai ganda. Untuk performanya sendiri bisa mencapai kecepatan maksimal kurang lebih 70 km/jam.
                        </p><br/>
                        <p>
                        Untuk pengisian daya baterainya sendiri, ternyata terbilang sangat mudah dan cepat. Pengisian daya baterai motor listrik Gesits hanya membutuhkan waktu 3-4 jam saja sampai baterai terisi penuh. Pengguna motor listrik Gesits juga bisa melakukan swap baterai di sejumlah SPBU jaringan Pertamina.
                        </p>
                        <div class="card_area">
                            <div class="product_count_area">
                                <p>Quantity</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" name="qty" type="text" value="1" min="0" max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <!-- <p>$5</p> -->
                            </div>
                            <div class="pilihan-warna">
                                <div class="text-pilih-warna">Pilih warna</div>
                                <div class="form-group">
                                    <select class="form-control select-warna" id="warna" name="warna">
                                    <option value="">Pilih Opsi</option>
                                    <option value="hitam">Hitam</option>
                                    <option value="merah">Merah</option>
                                    <option value="putih">Putih</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="pilihan-bayar">
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                Bayar Booking Fee
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                Bayar Total Harga
                                </label>
                                </div>
                            </div> -->
                        <div class="add_to_cart">
                            <!-- <a href="#" class="btn_3" type="submit" name="submit">Checkout</a> -->
                            <button class="btn btn-submit" type="submit" name="submit">Checkout</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
        <!--================End Single Product Area =================-->
       
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-1 col-lg-1 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo" style="border: 1px solid white; border-radius: 5%; background-color: ivory; width: auto; text-align: center;">
                                    <a href="index.php"><img src="assets/img/Logo-dark-gesits.png" alt="" width="50"></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">       
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>BERITA TERBARU</h4>
                                <ul>
                                    <li> 
                                        <div class="main-li-post">
                                            <div class="img-post" style="padding: 0 10px;">
                                                <a class="recent-post-thumbnail" href="#">
                                                    <img class="recent-img-thumbnail" src="assets/img/The Future.png" alt="" width="75" height="60"></a>
                                            </div>
                                                <div class="recent-post-info">
                                                    <div class="post-label">
                                                        <h5 class="recent-title" style="color: white;font-size: 10pt;">Pemprov Babel – PT Wika kembangkan kendaraan listrik di SMK</h5>
                                                    </div>
                                                </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="main-li-post">
                                            <div class="img-post" style="padding: 0 10px;">
                                                <a class="recent-post-thumbnail" href="#">
                                                    <img class="recent-img-thumbnail" src="assets/img/The Future.png" alt="" width="75" height="60"></a>
                                            </div>
                                                <div class="recent-post-info">
                                                    <div class="post-label">
                                                        <h5 class="recent-title" style="color: white;font-size: 10pt;">Pemprov Babel – PT Wika kembangkan kendaraan listrik di SMK</h5>
                                                    </div>
                                                </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>MAIN MENU</h4>
                                <ul>
                                    <li><a href="#">Motor listrik</a></li>
                                    <li><a href="#">Lokasi kami</a></li>
                                    <li><a href="about.php"> Tentang Kami</a></li>
                                    <li><a href="#"> Media Center</a></li>
                                    <li><a href="#"> Test Drive</a></li>
                                    <li><a href="#"> Pesan Sekarang</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>MEDIA CENTER</h4>
                                <ul>
                                    <li><a href="#">Berita</a></li>
                                    <li><a href="#">Event</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Press Release</a></li>
                                    <li><a href="#"> Hubungi kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>SOCIAL MEDIA</h4>
                                <ul>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Instagram</a></li>
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Youtube</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
   &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <a href="#" target="_blank" style="color: black;">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                  
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Scroll up, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
        <!-- Jquery Plugins, main Jquery -->    
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

        <!-- swiper js -->
        <script src="./assets/js/swiper.min.js"></script>
            <!-- swiper js -->
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>

</body>

</html>