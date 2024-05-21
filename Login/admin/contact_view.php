<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contact_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      $id= $_GET['id']; 
      $sql = "SELECT `id`, `name`, `email`, `mobile`, `issue`, `message` FROM `contact` WHERE id='$id'";
      $data= mysqli_query($conn, $sql);
      $total= mysqli_num_rows($data);
      $result= mysqli_fetch_assoc($data);


   ?>   
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Details</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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
         <h3 class="name"><?php echo $_SESSION['admin_name'] ?></h3>
         <p class="role">Admin</p>
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
      <h3 class="name"><?php echo $_SESSION['admin_name'] ?></h3>
      <p class="role">Admin</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-graduation-cap"></i><span>Home</span></a>
      <a href="admin_page.php"><i class="fas fa-home"></i><span>Login Form Details</span></a>
      <a href="form_details.php"><i class="fas fa-question"></i><span>Application Form Details</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>Contact Us</span></a>
   </nav>

</div>
<br>
<br>
<section class="contact">

   <div class="row">

      <div class="image">
      <img src="Image/contact1.svg">
      </div>

      <form action="" method="POST">
         <h3>get in touch</h3>
         <input type="text" value="<?php echo $result['name']; ?>" placeholder="Enter your Name" name="name" required maxlength="50" class="box">
         <input type="email" value="<?php echo $result['email']; ?>" placeholder="Enter your Email" name="email" required maxlength="50" class="box">
         <input type="number" value="<?php echo $result['mobile']; ?>" placeholder="Enter your Number" name="number" required maxlength="50" class="box">
         <select name="required" required id="gender" class="box" placeholder="">
                      <option value="" selected disabled>Issue Related to Document</option>
                      <option value="Bonafide" <?php if($result['issue'] == 'Bonafide') { echo 'selected'; } ?>>Bonafide</option>
                      <option value="Transcript" <?php if($result['issue'] == 'Transcript') { echo 'selected'; } ?>>Transcript</option>
                    </select>
         <textarea name="msg" class="box" placeholder="Enter your Message" required maxlength="1000" cols="30" rows="10"><?php echo $result['message']; ?></textarea>
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



<?php

      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "login_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
  if($_POST['update'])
  {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $user_type=$_POST['user_type'];

      $update = "UPDATE `user_form` SET `name`='$name', `email`='$email', `user_type`='$user_type' WHERE  id='$id'";
      $data= mysqli_query($conn, $update);

      if($data)
      {
        echo "<script>alert('Record Updated')</script>";
        ?>
        <meta http-equiv="refresh" content="0; URL=http://localhost/MiniProject/Login/admin/admin_page.php" />
        <?php

      }
      else
      {
          echo "Failed to Update";
      }
  }
?>