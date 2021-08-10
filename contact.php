<?php
/*
if(isset($_POST['posalji']))
{

  $name = htmlspecialchars($_POST['ime']);
  $surname = htmlspecialchars($_POST['prezime']);
  $email = htmlspecialchars($_POST['mail']);
  $phone = htmlspecialchars($_POST['telefon']);
  $message = htmlspecialchars($_POST['pitanje']);
  $from = "office@smartwebart.rs";


  $toEmail = 'minikom.np@gmail.com';
  $subject = 'Kontakt poruka od '. $name . ' '. $surname;

$header = "From:". $from . "Reply-To: ".$name." <".$email.">\n";  //  s!
$headers .= "Organization: Minikom plus\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "X-Priority: 3\n";
$headers .= "X-Mailer: PHP". phpversion() ."\n";

  $body = '
    <html>
    <head>
    </head>
  		<body>
        <table width="60%" cellspacing="2" cellpadding="2">
  				<tr>
  					<td colspan="2" align="left" valign="middle"style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#fff; background-color:#0072c6;">Pitanja u vezi sa  sajtom</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Ime i Prezime</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $name . ' ' . $surname . '</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Telefon</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $phone . '</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Email adresa</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $email . '</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Pitanje, ideja..</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $message . '</td>
  				</tr>
        </table>
        </body>
       </html>';


  mail($toEmail, $subject, $body, $headers);

}*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['posalji'])){


  $name = htmlspecialchars($_POST['ime']);
  $surname = htmlspecialchars($_POST['prezime']);
  $email = htmlspecialchars($_POST['mail']);
  $phone = htmlspecialchars($_POST['telefon']);
  $message = htmlspecialchars($_POST['pitanje']);


  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer();                              // Passing `true` enables exceptions
// try {

    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.servisrobot.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'autoreply@servisrobot.com';                 // SMTP username
    $mail->Password = 'Q0VT!.%^sUj{';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('autoreply@servisrobot.com');
    $mail->addAddress('radovanbastic@gmail.com', 'Radovan Bastic');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('radovanbastic@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Poruka sa kontakt forme servisrobot.com';
    $mail->Body    = '<html>
    <head>
    </head>
  		<body>
        <table width="60%" cellspacing="2" cellpadding="2">
  				<tr>
  					<td colspan="2" align="left" valign="middle"style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#fff; background-color:#0072c6;">Poruka sa sajta SERVIS ROBOT</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Ime i Prezime</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $name . ' ' . $surname . '</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Telefon</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $phone . '</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Email adresa</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $email . '</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="25%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#e1e1e1;">Pitanje, ideja..</td>
  					<td align="left" valign="middle" width="75%" style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#333; background-color:#f0f0f0;">' . $message . '</td>
  				</tr>
        </table>
        </body>
       </html>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

       $mail->send();
  

}



 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SERVIS ROBOT | Kontakt</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" sizes="32x32" href="/icon.jpg">
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body>
  <!-- Loader START -->

  <!-- Loader END -->

 <!-- NavBar START -->
 <section class="fixmenu container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="header position-relative">
                    <div class="col-md-3 sm-none">
                        <div class="top-logo">
                            <a href="/">
                                <img src="img/logo.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="header-right">
                            <div class="header-right-inner" id="hidden-icon-wrapper">
                                <!-- Header Search Form -->
                                <!-- <div class="header-search-form d-md-none d-block">
                    <form action="#" class="search-form-top">
                        <input class="search-field" type="text" placeholder="Search…">
                        <button class="search-submit">
                            <i class="search-btn-icon fa fa-search"></i>
                        </button>
                    </form>
                </div> -->

                                <!-- Header Top Info -->
                                <div class="header-info">
                                    <!-- Swiper -->
                                    <div class="swiper-container">
                                        <ul class="swiper-wrapper">
                                            <li class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fa fa-clock"></span>
                                                    </div>
                                                    <div class="info-content">
                                                        <h6 class="info-title">8:00 - 18:00</h6>
                                                        <div class="info-sub-title">Ponedeljak - Petak</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fa fa-map-marker-alt"></span>
                                                    </div>

                                                    <div class="info-content">
                                                        <h6 class="info-title">Bulevar Mihaila Pupina 10Ž/VP43</h6>
                                                        <!-- <div class="info-sub-title">11 070 Novi Beograd</div> -->
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fa fa-phone"></span>
                                                    </div>

                                                    <div class="info-content">
                                                        <h6 class="info-title">+381 60 5576 268</h6>
                                                        <div class="info-sub-title">robotyubc@gmail.com</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="swiper-slide">
                                                    <div class="info-item">
                                                        <div class="info-icon">
                                                            <span class="fa fa-clock"></span>
                                                        </div>
                                                        <div class="info-content">
                                                            <h6 class="info-title">8:00 - 18:00</h6>
                                                            <div class="info-sub-title">Ponedeljak - Petak</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="swiper-slide">
                                                        <div class="info-item">
                                                            <div class="info-icon">
                                                                <span class="fa fa-map-marker-alt"></span>
                                                            </div>
        
                                                            <div class="info-content">
                                                                <h6 class="info-title">Bulevar Mihaila Pupina 10Ž/VP43</h6>
                                                                <!-- <div class="info-sub-title">11 070 Novi Beograd</div> -->
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide">
                                                            <div class="info-item">
                                                                <div class="info-icon">
                                                                    <span class="fa fa-phone"></span>
                                                                </div>
            
                                                                <div class="info-content">
                                                                    <h6 class="info-title">+381 60 5576 268</h6>
                                                                    <div class="info-sub-title">robotyubc@gmail.com</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                            <li class="swiper-slide">
                                                    <div class="info-item">
                                                        <div class="info-icon">
                                                            <span class="fa fa-clock"></span>
                                                        </div>
                                                        <div class="info-content">
                                                            <h6 class="info-title">8:00 - 18:00</h6>
                                                            <div class="info-sub-title">Ponedeljak - Petak</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="swiper-slide">
                                                        <div class="info-item">
                                                            <div class="info-icon">
                                                                <span class="fa fa-map-marker-alt"></span>
                                                            </div>
        
                                                            <div class="info-content">
                                                                <h6 class="info-title">Bulevar Mihaila Pupina 10Ž/VP43</h6>
                                                                <!-- <div class="info-sub-title">11 070 Novi Beograd</div> -->
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="swiper-slide">
                                                            <div class="info-item">
                                                                <div class="info-icon">
                                                                    <span class="fa fa-phone"></span>
                                                                </div>
            
                                                                <div class="info-content">
                                                                    <h6 class="info-title">+381 60 5576 268</h6>
                                                                    <div class="info-sub-title">robotyubc@gmail.com</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                        </ul>
                                        <!-- Add Pagination -->
                                        <!--         <div class="swiper-pagination"></div> -->
                                    </div>
                                </div>

                                <!-- Header Social Networks -->
                                <div class="header-social-networks style-icons">
                                    <div class="inner">
                                        <!-- <a class=" social-link hint--black hint--bottom-left" aria-label="Twitter" href="https://twitter.com" data-hover="Twitter"
                                            target="_blank">
                                            <i class="social-icon fab fa-twitter"></i>
                                        </a> -->
                                        <a class=" social-link hint--black hint--bottom-left" aria-label="Facebook" href="https://m.facebook.com/servisrobot011/" data-hover="Facebook"
                                            target="_blank">
                                            <i class="social-icon fab fa-facebook-f"></i>
                                        </a>
                                        <a class=" social-link hint--black hint--bottom-left" aria-label="Instagram" href="https://www.instagram.com/servisrobot/?hl=en" data-hover="Instagram"
                                            target="_blank">
                                            <i class="social-icon fab fa-instagram"></i>
                                        </a>
                                        <!-- <a class=" social-link hint--black hint--bottom-left" aria-label="Linkedin" href="https://linkedin.com" data-hover="Linkedin"
                                            target="_blank">
                                            <i class="social-icon fab fa-linkedin"></i>
                                        </a> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- NavBar END -->

    <!-- NavBar Bottom START -->
    <section class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Početna
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/onama.php">O nama</a>
                                </li>
                                <!-- <li class="nav-item">
                                  <a class="nav-link" href="products.php">Proizvodi</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="/usluge.php">Usluge</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cenovnik.php">Cenovnik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/galerija.php">Galerija</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact.php">Kontakt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://servisrobot.kpizlog.rs/" target="_blank">Prodajemo</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </section>
    <!-- NavBar Bottom END -->
   
  <!-- Google Map Start -->
  <section class="section-map">
    <iframe src="https://maps.google.com/maps?hl=en&amp;q=Bulevar Mihaila Pupina 10Z+()&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed"
      width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
  <!-- Google Map End -->

  <section class="kontakt-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
              <h3>Pošaljite pitanje, predlog, sugestiju</h3>
              <em>Polja označena zvezdicom su obavezna!</em>
              <form  name="ponudite" action="" method="post" class="formStyle">
                  <div class="row">
                  <div class="col-sm-6"><label>Vaše Ime: <span class="obavezno">*</span></label><input type="text" name="ime" class="form-control paddbut" required></div>
                    <div class="col-sm-6"><label>Vaše Prezime: <span class="obavezno">*</span></label><input type="text" name="prezime" class="form-control paddbut" required></div>
                    <div class="col-sm-6"><label>Vaša E-mail adresa: <span class="obavezno">*</span></label><input type="email" name="mail" class="form-control paddbut" required></div>
                    <div class="col-sm-6"><label>Kontakt telefon: <span class="obavezno">*</span></label><input type="text" name="telefon" class="form-control paddbut" required></div>
                    <div class="col-sm-12"><label>Pitanje: <span class="obavezno">*</span></label><textarea name="pitanje" rows="8" class="form-control control-pitanje paddbut" required></textarea></div>
                    <div class="col-sm-12"><input name="posalji" type="submit" value="Pošalji"  class="mojedugme btn"></div>
                  </div>
                  </form>
          </div>
          <div class="col-md-4 details">
              <p><span><i class="far fa-lightbulb fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; Servis Robot</span></p> <hr>
              <p><span><i class="fas fa-mobile-alt fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; + 381 60 5576 268</span></p><hr>
              <p><span><i class="fas fa-phone fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; + 381 11 3120201</span></p><hr>
              <p><span><i class="far fa-envelope-open fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; robotyubc@gmail.com</span></p> <hr>
              <p><span><i class="far fa-clock fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; Pon - Pet 08-18h, Sub 09-13h</span></p> <hr>
              <p><span><i class="fas fa-map-marker-alt fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; Bulevar Mihaila Pupina 10Ž/VP43,<br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 11070 Beograd</span></p> <hr>

              <!-- <p><span><i class="far fa-file fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; PIB 0000000</span></p> <hr>
              <p><span><i class="far fa-file fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp; MB 00000000</span></p> <hr> -->
            </div>
        </div>
      </div>
    </section>

<!-- footer START -->
<section id="footer">
        <div class="container">
            <div class="row text-center text-xs-center text-sm-left text-md-left">
                    <div class="col-xs-12 col-sm-4 col-md-4 map">
                            <h5>Mapa sajta</h5>
                            <ul class="list-unstyled quick-links">
                                <li>
                                    <a href="/">
                                        <i class="fa fa-angle-double-right"></i>Početna</a>
                                </li>
                                <li>
                                    <a href="/onama.php">
                                        <i class="fa fa-angle-double-right"></i>O nama</a>
                                </li>
                                <li>
                                    <a href="/usluge.php">
                                        <i class="fa fa-angle-double-right"></i>Usluge</a>
                                </li>
                                <li>
                                    <a href="/cenovnik.php">
                                        <i class="fa fa-angle-double-right"></i>Cenovnik</a>
                                </li>
                                <li>
                                    <a href="/galerija.php">
                                        <i class="fa fa-angle-double-right"></i>Galerija</a>
                                </li>
                                <li>
                                    <a href="/contact.php">
                                        <i class="fa fa-angle-double-right"></i>Kontakt</a>
                                </li>
                            </ul>
                        </div>
                <div class="col-xs-12 col-sm-4 col-md-4 time">
                    <h5>Radno vreme</h5>
                    <ul class="list-unstyled quick-links">
                        <li class="no-quick-links">
                            <span>Ponedeljak.........................................</span><span>08-18h</span>
                        </li>
                        <li class="no-quick-links">
                                <span>Utorak....................................................</span><span>08-18h</span>
                        </li>
                        <li class="no-quick-links">
                                <span>Sreda.......................................................</span><span>08-18h</span>
                        </li>
                        <li class="no-quick-links">
                                <span>Četvrtak.................................................</span><span>08-18h</span>
                            </li>
                        <li class="no-quick-links">
                                <span>Petak.......................................................</span><span>08-18h</span>
                        </li>
                        <li class="no-quick-links">
                                <span>Subota....................................................</span><span>09-13h</span>
                        </li>
                       
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 ukratko">
                   <img src="img/logofooter.jpg" alt="Logo footer" class="img-fluid">
                   <h5>NE BACAJTE - POPRAVITE GA</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <!-- <li class="list-inline-item">
                            <a href="javascript:void();">
                                <i class="social-icon fab fa-twitter fa-xs"></i>
                            </a>
                        </li> -->
                        <li class="list-inline-item">
                            <a href="https://m.facebook.com/servisrobot011/" target="_blank">
                                <i class="social-icon fab fa-facebook-f fa-xs"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/servisrobot/?hl=en" target="_blank">
                                <i class="social-icon fab fa-instagram fa-xs"></i>
                            </a>
                        </li>
                        <!-- <li class="list-inline-item">
                            <a href="javascript:void();">
                                <i class="social-icon fab fa-linkedin fa-xs"></i>
                            </a>
                        </li> -->
                        <li class="list-inline-item">
                            <a href="mailto:robotyubc@gmail.com" target="_blank">
                                <i class="social-icon fa fa-envelope fa-xs"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                </hr>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p class="h6">&copy; Sva prava zadržana.
                        <a class="text-green ml-2" href="https://smartwebart.rs/" target="_blank">Smart Web Art 2020</a>
                    </p>
                </div>
                </hr>
            </div>
        </div>
    </section>
    <!-- ./Footer -->
    <!-- footer END -->




  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/swiper.min.js"></script>

  <script>
    const swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 3,
            paginationClickable: true,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 2000
            },
            grabCursor: true,
            breakpoints: {
        300: {
          slidesPerView: 1,
          spaceBetween: 0
        },
        768: {
            slidesPerView: 3,
            paginationClickable: true,
            spaceBetween: 0
        }
            }
        });
  </script>
</body>

</html>


