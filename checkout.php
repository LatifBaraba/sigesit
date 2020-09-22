<?php
  session_start();
  // Import PHPMailer classes into the global namespace
  // These must be at the top of your script, not inside a function
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  // Load Composer's autoloader
  //require 'vendor/autoload.php';
  // require 'PHPMailer/src/Exception.php';
  // require 'PHPMailer/src/PHPMailer.php';
  // require 'PHPMailer/src/SMTP.php';
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php';
  require 'phpmailer/src/SMTP.php';

  function mailSend() {
    // var_dump($_SESSION['checkout']['name']); exit;
    //global $mail;
    $mail = new PHPMailer(true);
    // $email = htmlspecialchars($post["email"]);

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)       
    // ) {

    //     $_SESSION['emailisinvalid']=1;
    //     return false;
    // }

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'pradanagesits@gmail.com';                     // SMTP username
        $mail->Password   = 'GesitsPradana2020&*';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;   
        $mail->SMTPOptions = array (
            'ssl' => array (
              'verify_peer' => false,
              'verify_peer_name' => false,
              'allow_self_signed' => true
            )
          );
                                    // TCP port to connect to
        //Recipients
        $mail->setFrom('info@gesitspradana.id', 'Admin');
        $mail->addAddress('info@gesitspradana.id');               // Name is optional
        //$mail->addReplyTo('latifbaraba88@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        
        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Pemesanan Gesits';
        $mail->Body    = ' 
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Pemesanan Gesits</title>
        </head>
        <body>
            <table style="width: auto; font-family: Arial, Helvetica, sans-serif; border-collapse: separate; border: 2px solid gray; margin: auto; color: white">
                <thead>
                    <td colspan="3" style="padding: 20px 10px; text-align: center; font-size: 20px; background-color: #1397BF;">Pemesanan Gesits</td>
                </thead>
                <tbody style="border: 2px solid black;">
                    <tr style="background-color: #2AB0B0; text-align: center;">
                        <td style="padding: 5px; width: 40%;">Index</td>
                        <td style="padding: 5px; width: 60%;">Keterangan</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Nama Depan</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['checkout']['name'].'</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Nama Belakang</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['checkout']['lastname'].'</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Nomor Telepon</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['checkout']['number'].'</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Email</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['checkout']['email'].'</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Alamat</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['checkout']['add1'].'</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Kota</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['checkout']['city'].'</td>
                    </tr>
                    <tr style="background-color: #2AB0B0; text-align: center;">
                        <td colspan="3" style="padding: 5px; width: 100%;">Deskripsi Barang</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Warna</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['order']['warna'].'</td>
                    </tr>
                    <tr style="color: black;">
                        <td style="padding: 5px; width: 40%;">Quantity</td>
                        <td style="padding: 5px; width: 60%; text-align: right;">'. $_SESSION['order']['qty'].'</td>
                    </tr>
                </tbody>
            </table>
        </body>
        </html> ';
        // $mail->Body    = ' <a href="coba.cocreative.id/gantipass.php?email='.$email.'">Click Here</a> to change ur Password ';
       
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

            // $_SESSION['emailberhasil']=1;
            // echo 'Message has been sent';
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // $_SESSION['emailgagal']=1;
    }
  }
 
  if(isset($_POST["submit"])) {
    // var_dump($_POST['name'], $_POST['lastname']); exit;

    if($_POST['name'] != null OR $_POST['lastname'] != null OR $_POST['number'] != null OR $_POST['email'] != null OR $_POST['add1'] != null OR $_POST['city'] != null) {
      
      $_SESSION['checkout'] = [
        'name' => $_POST['name'],   
        'lastname' => $_POST['lastname'],
        'number' => $_POST['number'],
        'email' => $_POST['email'],
        'add1' => $_POST['add1'],
        'city' => $_POST['city']
      ];

      mailSend();

      $_SESSION['pemesananSukses'] = 1 ;

      header( "refresh:7; url=index.php" );
    } else {

      $_SESSION['pemesananDataLengkapi'] = 1 ;

    }
    // var_dump($_SESSION['checkout']); exit;
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
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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
                                <li><a href="about.php">TENTANG KAMI</a>
                                    <ul class="submenu">
                                        <li><a href="#"> Profil Perusahaan</a></li>
                                        <li><a href="#"> Hubungi Kami</a></li>
                                    </ul>
                                </li>
                               
                                <li><a href="#">MEDIA CENTER</a>
                                    <ul class="submenu">
                                        <li><a href="#">Berita</a></li>
                                        <li><a href="#">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">PESAN SEKARANG</a>
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
            <?php if(isset($_SESSION["pemesananSukses"]) == 1) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <b>Pemesanan Berhasil</b> Tunggu admin kami untuk menghubungi anda, <b>Terima Kasih!</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; unset($_SESSION['pemesananSukses']); ?>

            <?php if(isset($_SESSION["pemesananDataLengkapi"]) == 1) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Mohon lengkapi data anda, <b>Terima Kasih!</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; unset($_SESSION['pemesananDataLengkapi']); ?>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Checkout Area =================-->
        <section class="checkout_area section_padding">
          <div class="container">
            <!-- <div class="returning_customer">
              <div class="check_title">
                <h2>
                  Returning Customer?
                  <a href="#">Click here to login</a>
                </h2>
              </div>
              <p>
                If you have shopped with us before, please enter your details in the
                boxes below. If you are a new customer, please proceed to the
                Billing & Shipping section.
              </p>
              <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                <div class="col-md-6 form-group p_star">
                  <input type="text" class="form-control" id="name" name="name" value=" " />
                  <span class="placeholder" data-placeholder="Username or Email"></span>
                </div>
                <div class="col-md-6 form-group p_star">
                  <input type="password" class="form-control" id="password" name="password" value="" />
                  <span class="placeholder" data-placeholder="Password"></span>
                </div>
                <div class="col-md-12 form-group">
                  <button type="submit" value="submit" class="btn_3">
                    log in
                  </button>
                  <div class="creat_account">
                    <input type="checkbox" id="f-option" name="selector" />
                    <label for="f-option">Remember me</label>
                  </div>
                  <a class="lost_pass" href="#">Lost your password?</a>
                </div>
              </form>
            </div>
            <div class="cupon_area">
              <div class="check_title">
                <h2>
                  Have a coupon?
                  <a href="#">Click here to enter your code</a>
                </h2>
              </div>
              <input type="text" placeholder="Enter coupon code" />
              <a class="tp_btn" href="#">Apply Coupon</a>
            </div> -->
            <div class="billing_details">
              <div class="row">
                <div class="col-lg-8">
                  <h3>Billing Details</h3>
                  <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="first" name="name" placeholder="Nama Depan"/>
                      <!-- <span class="placeholder" data-placeholder="First name"></span> -->
                    </div>
                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="last" name="lastname" placeholder="Nama Belakang"/>
                      <!-- <span class="placeholder" data-placeholder="Last name"></span> -->
                    </div>
                    <!-- <div class="col-md-12 form-group">
                      <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
                    </div> -->
                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="number" name="number" placeholder="Nomor Hp"/>
                      <!-- <span class="placeholder" data-placeholder="Phone number"></span> -->
                    </div>
                    <div class="col-md-6 form-group p_star">
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
                      <!-- <span class="placeholder" data-placeholder="Email Address"></span> -->
                    </div>
                    <!-- <div class="col-md-12 form-group p_star">
                      <select class="country_select">
                        <option value="1">Country</option>
                        <option value="2">Country</option>
                        <option value="4">Country</option>
                      </select>
                    </div> -->
                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="add1" name="add1" placeholder="Alamat"/>
                      <!-- <span class="placeholder" data-placeholder="Address line 01"></span> -->
                    </div>
                    <!-- <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="add2" name="add2" />
                      <span class="placeholder" data-placeholder="Address line 02"></span>
                    </div> -->
                    <div class="col-md-12 form-group p_star">
                      <input type="text" class="form-control" id="city" name="city" placeholder="Kota"/>
                      <!-- <span class="placeholder" data-placeholder="Town/City"></span> -->
                    </div>
                    <!-- <div class="col-md-12 form-group p_star">
                      <select class="country_select">
                        <option value="1">District</option>
                        <option value="2">District</option>
                        <option value="4">District</option>
                      </select>
                    </div>
                    <div class="col-md-12 form-group">
                      <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
                    </div> -->
                    <!-- <div class="col-md-12 form-group">
                      <div class="creat_account">
                        <input type="checkbox" id="f-option2" name="selector" />
                        <label for="f-option2">Create an account?</label>
                      </div>
                    </div> -->
                    <!-- <div class="col-md-12 form-group">
                      <div class="creat_account">
                        <h3>Shipping Details</h3>
                        <input type="checkbox" id="f-option3" name="selector" />
                        <label for="f-option3">Ship to a different address?</label>
                      </div>
                      <textarea class="form-control" name="message" id="message" rows="1"
                        placeholder="Order Notes"></textarea>
                    </div> -->
                    <button class="btn btn-submit" type="submit" name="submit">Submit</button>

                    <a type="button" href="https://api.whatsapp.com/send?phone=+628562235309" target="_blank" class="btn" style="background-color: #1DBEA5; margin-left: 20px;">
                    Pesan Melalui Whatsapp
                    </a>

                  </form>
                </div>
                <!-- <div class="col-lg-4">
                  <div class="order_box">
                    <h2>Your Order</h2>
                    <ul class="list">
                      <li>
                        <a href="#">Product
                          <span>Total</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Fresh Blackberry
                          <span class="middle">x 02</span>
                          <span class="last">$720.00</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Fresh Tomatoes
                          <span class="middle">x 02</span>
                          <span class="last">$720.00</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Fresh Brocoli
                          <span class="middle">x 02</span>
                          <span class="last">$720.00</span>
                        </a>
                      </li>
                    </ul>
                    <ul class="list list_2">
                      <li>
                        <a href="#">Subtotal
                          <span>$2160.00</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Shipping
                          <span>Flat rate: $50.00</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">Total
                          <span>$2210.00</span>
                        </a>
                      </li>
                    </ul>
                    <div class="payment_item">
                      <div class="radion_btn">
                        <input type="radio" id="f-option5" name="selector" />
                        <label for="f-option5">Check payments</label>
                        <div class="check"></div>
                      </div>
                      <p>
                        Please send a check to Store Name, Store Street, Store Town,
                        Store State / County, Store Postcode.
                      </p>
                    </div>
                    <div class="payment_item active">
                      <div class="radion_btn">
                        <input type="radio" id="f-option6" name="selector" />
                        <label for="f-option6">Paypal </label>
                        <img src="img/product/single-product/card.jpg" alt="" />
                        <div class="check"></div>
                      </div>
                      <p>
                        Please send a check to Store Name, Store Street, Store Town,
                        Store State / County, Store Postcode.
                      </p>
                    </div>
                    <div class="creat_account">
                      <input type="checkbox" id="f-option4" name="selector" />
                      <label for="f-option4">I’ve read and accept the </label>
                      <a href="#">terms & conditions*</a>
                    </div>
                    <a class="btn_3" href="#">Proceed to Paypal</a>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </section>
        <!--================End Checkout Area =================-->
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
  
</body>
</html>