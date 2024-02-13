<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){ 
   header('location:login_form.php');
}

?>
<?php
   if(isset($_POST['submit'])){
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $mobile = $_POST['number']; 
    $required = $_POST['required'];
    $message = $_POST['msg'];
    
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contact_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      
        $sql = "INSERT INTO `contact`(`name`, `email`, `mobile`, `issue`, `message`) VALUES ('$name','$email','$mobile','$required','$message')";
        mysqli_query($conn, $sql);

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

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
<br>
<br>
<section class="contact">

   <div class="row">

      <div class="image">
         <img src="Image/contact.svg" alt="">
      </div>

      <form action="" method="POST">
         <h3>get in touch</h3>
         <input type="text" placeholder="Enter your Name" name="name" required maxlength="50" class="box">
         <input type="email" placeholder="Enter your Email" name="email" required maxlength="50" class="box">
         <input type="number" placeholder="Enter your Number" name="number" required maxlength="50" class="box">
         <select name="required" required id="gender" class="box" placeholder="">
                      <option value="" selected disabled>Issue Related to Document</option>
                      <option value="Bonafide">Bonafide</option>
                      <option value="Transcript">Transcript</option>
                    </select>
         <textarea name="msg" class="box" placeholder="Enter your Message" required maxlength="1000" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" class="inline-btn" name="submit">
      </form>

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






