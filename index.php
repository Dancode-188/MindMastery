<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './PHPMailer/src/Exception.php';
require_once './PHPMailer/src/PHPMailer.php';
require_once './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $contactmessage = htmlentities($_POST['contactmessage']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fadumozahra84@gmail.com';
    $mail->Password = 'vhoxuwwciylsnjfs';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('fadumozahra84@gmail.com');
    $mail->Subject = "$email ($subject)";
    $mail->Body = $contactmessage;
    $mail->send();

    header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Qosol Bile Dental Clinic</title> 
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

<link rel="stylesheet" href="main/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="main/contact.css">

<style>
#client-testimonial-carousel {
  background-color: #343a40;
  margin: 0; 
  padding: 0; 
}

.carousel-inner {
  padding: 0; 
}

.carousel-item.active {
  display: flex;
  justify-content: center;
}

blockquote {
  margin: 0 auto;
  max-width: 700px; 
}

blockquote p {
  color: #fff;
  font-size: 18px;
  font-style: italic;
}

blockquote footer {
  color: #fff;
  font-size: 16px;
}

.client-review-stars {
  color: #ffd700;
  font-size: 24px;
  margin-top: 10px;
}
#logo_img {
    width: 70px; 
    height: auto; 
}

</style>
<body>
<div class="unique-contact-info">
  <div>
    <img src="./admin/asset/images/QOSOL_BILE_LOGO_WHITE_BG.jpg" id="logo_img" alt="QosolBile Logo">
    <p><span>⏰</span> Sat-Wed 10:00-19:00</p>
    <p><span>📞</span> +252 61 2990011</p>
    <p><span>✉️</span> qosolbiledentalcare@gmail.com</p>
  </div>
  <div class="social-icons">
    <i class="fab fa-facebook-f"></i>
    <i class="fab fa-instagram"></i>
    <i class="fab fa-tiktok"></i>
    <i class="fab fa-twitter"></i>
    <i class="fab fa-whatsapp"></i>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-custom">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto unique-navbar">
        <li class="nav-item">
          <a class="nav-link" href="#home"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about-us.php"><i class="fas fa-info-circle"></i> About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Services"><i class="fas fa-briefcase-medical"></i> Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#Contact"><i class="fas fa-envelope"></i> Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin/sigin.php"><i class="fa fa-power-off"></i> Login</a>
        </li>
      </ul>
    </div>
  </nav>
<!-- Bootstrap JS and jQuery -->

<!-- home section -->

<section id="home">
<div class="background-image unique-background-image">
    <div class="overlay unique-overlay">
      <h1>Welcome to Our Dental Clinic</h1>
      <p>Your oral health is our priority, and we strive to exceed your expectations at every visit. Schedule an appointment with us today and experience the difference at Qosolbile Dental Clinic – where healthy smiles begin!</p>
      <div>
        <a href="Appointment.php" class="btn btn-primary btn-custom unique-btn btn-colr">Book Now</a>
        <a href="#Contact" class="btn btn-secondary btn-custom unique-btn btn-colr">Contact Us</a>
      </div>
    </div>
</div>
</section>
<!-- About Us Section -->
<section id="about" class="about-section unique-about-section">
    <h2 class="text-center">About Qosiol Bile Dental Clinic</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p>At Qosol Bile Dental Clinic, we are committed to providing top-notch dental care in a comfortable and welcoming environment. Our experienced team is dedicated to ensuring that every visit is a pleasant experience.</p>
          <p>With state-of-the-art technology and a passion for personalized care, we offer a wide range of dental services to meet the unique needs of each patient. From routine check-ups to advanced procedures, we strive to maintain the highest standards of dental health for you and your family.</p>
          <p>We believe in educating our patients about oral health and empowering them to make informed decisions about their dental care. Our goal is to not only treat dental issues but also to prevent them from occurring in the first place <a href="about-us.php">ReadMore</a></p>
        </div>
        <div class="col-md-6">
          <img src="images/dentist.jpg" alt="Dental Clinic" class="img-fluid">
        </div>
      </div>
    </div>
</section>

<!-- Services section -->
<section id="Services">
<div class="container unique-container">
    <h2 class=" unique-title">Some of the dental services we offer</h2>
    <div class="row">
        <div class="col">
            <img src="images/dentalcheckup.jpg" alt="Dental Checkup">
            <h4>Dental Checkup</h4>
        </div>
        <div class="col">
            <img src="images/TeethClean.jpg" alt="Teeth Cleaning">
            <h4>Teeth Cleaning</h4>
        </div>
        <div class="col">
            <img src="images/Braces3.jpg" alt="Braces">
            <h4>Braces</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <img src="images/x-ray.jpg" alt="X-Ray Teeth">
            <h4>X-Ray Teeth</h4>
        </div>
        <div class="col">
            <img src="images/FILLINGS.jpg" alt="Fillings and Restorations">
            <h4>Teeth Filling</h4>
        </div>
        <div class="col">
            <img src="images/ROOT CANAL.jpg" alt="Root Canal Treatment">
            <h4>Root Canal Treatment</h4>
        </div>
    </div>
</div>
</section>
<!-- Transition Section -->
<!-- <section id="Services">
<div class="container unique-container">
    <h2 class=" unique-title">Hear From Our Patients</h2>
   
   
</div>
</section> -->
<!-- Testimonial section -->
<?php
include_once 'testimonial.php';
?>
 <!-- Contact section  -->

 <section id="Contact">

<div class="container">
<h2 class=" unique-title">Connect with Us</h2>

  <div class="row">
    <div class="contact-info ">
      <h3 class="title">Let's get in touch</h3>
      <p class="text">
        We provide our best services for our clients and always strive to achieve their trust and satisfaction.
      </p>

      <div class="info">
        <div class="information">
          <i class="fas fa-map-marker-alt icon"></i>
          <p>Kismayo-JH, Somalia </p>
        </div>
        <div class="information">
          <i class="fas fa-envelope icon"></i>
          <p>Qosalbiledentalclinic@gmail.com</p>
        </div>
        <div class="information">
          <i class="fas fa-phone-alt icon"></i>
          <p> +123456789 0987</p>
        </div>
      </div>

<div class="social-media">
  <p>Connect with Us</p>
  <div class="contact-social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
  </div>
</div>

    </div>
      
    <div class="contact-form unique-contact-form">
      <div class="card">
        <div class="card-body">
          <form action="#" autocomplete="off" method="POST">
            <h3 class="card-title text-center">Contact Us</h3>
            <div class="form-group">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="message" name="contactmessage" rows="3" placeholder="Message"></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-primary btn-block">Send</button>
          </form>
        </div>
      </div>
    </div>

    <div class="map unique-map">
      <div class="card">
        <div class="card-body">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.737826756581!2d42.539999900000005!3d-0.36395059999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x181d2d3633cebff9%3A0x2491c21bd89f8686!2sSomali%20star!5e0!3m2!1sen!2sso!4v1710861334324!5m2!1sen!2sso" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<!-- End Contact Section -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.16/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
