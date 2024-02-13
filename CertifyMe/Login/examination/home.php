<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['exam_name'])){ 
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

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
         <h3 class="name"><?php echo $_SESSION['exam_name'] ?></h3>
         <p class="role">Examination Section</p>
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
      <h3 class="name"><?php echo $_SESSION['exam_name'] ?></h3>
      <p class="role">Examination Section</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>Home</span></a>
      <a href="form.php"><i class="fas fa-question"></i><span>Form</span></a>
   </nav>

</div>
<br>
<br>
<section class="about">

   <div class="row">

      <div class="image">
         <img src="Image/home.svg" alt="">
      </div>

      <div class="content">
         <h3>Welcome to CertifyMe</h3>
         <p>CertifyMe is your trusted partner in obtaining official college documents quickly and conveniently. We understand that securing your academic records is a crucial part of your educational journey, and we're here to streamline the process for you. Our user-friendly platform offers a hassle-free way to request and receive your college documents, ensuring that your academic achievements are recognized wherever you go..</p>
      </div>

   </div>

  

</section>














<br>
<br>
<br>
<br>
<footer class="footer">

   &copy; copyright @ 2023 by <span>CertifyMe</span> | All Rights Reserved!

</footer>

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>






