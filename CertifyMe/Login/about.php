<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){ 
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/dash.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="user_page.php" class="logo">CertifyMe.</a>


      <div class="icons">
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="Image/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $_SESSION['user_name'] ?></h3>
         <p class="role">Student</p>
         <a href="profile.php" class="btn">View profile</a>
         <div class="flex-btn">
            <a href="logout.php" class="option-btn">Logout</a>
         </div>
      </div>

   </section>

</header>   

<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="Image/pic-1.jpg" class="image" alt="">
      <h3 class="name"><?php echo $_SESSION['user_name'] ?></h3>
      <p class="role">Student</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="user_page.php"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="about.php"><i class="fas fa-question"></i><span>About</span></a>
      <a href="application_form.php"><i class="fas fa-graduation-cap"></i><span>Application Form</span></a>
      <a href="status.php"><i class="fas fa-graduation-cap"></i><span>Status</span></a>
      <a href="service.php"><i class="fas fa-chalkboard-user"></i><span>Our Service</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>Contact Us</span></a>
   </nav>

</div>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="Image/about.svg" alt="">
      </div>

      <div class="content">
         <h3>Why CertifyMe?</h3>
         <br>
         <ul>
             <li><b>Efficiency:</b><br> We take the stress out of document procurement. With a few simple clicks, you can request your transcripts, diplomas, and other important records.</li>
             <li><b>Speed:</b><br> We prioritize swift processing to get your documents to you as soon as possible. We know time is of the essence.</li>
             <li><b>Security:</b><br> Your personal information and academic records are handled with the utmost care and security. We prioritize your privacy.</li>
             <li><b>Convenience:</b><br> Our online platform is available 24/7, making it easy to place requests at a time that suits you.</li>
             <li><b>Quality:</b><br>  We work with colleges and universities to provide authentic, certified documents that meet your needs.</li>
             
        </ul>
      </div>

   </div>

</section>













<footer class="footer">

   &copy; copyright @ 2023 by <span>CertifyMe</span> | All Rights Reserved!

</footer>

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>