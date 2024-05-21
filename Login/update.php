<?php
@include 'config.php';

session_start();

// Check if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit();
}




?>
<?php
   if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $prn = $_POST['prn'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];
    $year = $_POST['year'];
   
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "profile_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      
        $sql = "INSERT INTO `profile`(`name`, `email`, `prn`, `mobile`, `course`, `year`) VALUES ('$name','$email','$prn','$mobile','$course','$year')";
        mysqli_query($conn, $sql);

        if (mysqli_query($conn, $sql)) {
         // Registration successful, redirect to the profile page
         header("Location: profile.php");
         exit();
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }

    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/dash.css">

</head>
<body>

<header class="header">
   
   <section class="flex">

      <a href="home.html" class="logo">CertifyMe.</a>


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

<section class="form-container">

<form action="" method="post" enctype="multipart/form-data">
      <!-- ... other form elements ... -->
      <input type="name" name="name" placeholder="Enter Your Name" maxlength="50" class="box">
      <input type="email" name="email" placeholder="Enter Your Email" maxlength="50" class="box">
      <input type="text" name="prn" placeholder="Enter your Prn" maxlength="20" class="box">
      <input type="text" name="mobile" placeholder="Enter your Mobile Number" maxlength="20" class="box">
      <select name="course" required id="grad_subject" class="box">
                                <option value="" selected="selected">Enter Your Course</option>
                                <option value="COMPUTER SCIENCE (CS)">Computer Science (CS)</option>
                                <option value="COMPUTER ENGINEERING (CE)">Computer Engineering (CE)</option>
                                <option value="COMPUTER SCIENCE AND ENGINEERING (CSE)">Computer Science and Engineering (CSE)</option>
                                <option value="ELECTRONICS AND COMPUTER SCIENCE (ECS)">Electronics and Computer Science (ECS)</option>
                                <option value="COMPUTER AND INFORMATION TECHNOLOGY (CIT)">Computer and Information Technology (CIT)</option>
                                <option value="INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)">Information and Communication Technology (ICT)</option>
                                <option value="INFORMATION TECHNOLOGY (IT)">Information Technology (IT)</option>
                                <option value="SOFTWARE ENGINEERING (SE)">Software Engineering (SE)</option>
                                <option value="Textile Engineering">Textile Engineering</option>
                                <option value="ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)">Electrical and Electronics Engineering (EEE)</option>
                                <option value="ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)">Electronics and Telecommunication Engineering (ETE)</option>
                                <option value="ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)">Electronics and Communication Engineering (ECE)</option>
                                <option value="CIVIL ENGINEERING (CE)">Civil Engineering (CE)</option>
                                <option value="MECHANICAL ENGINEERING (ME)">Mechanical Engineering (ME)</option>
                                <option value="CHEMICAL ENGINEERING (CE)">Chemical Engineering (CE)</option>
                                <option value="PETROCHEMICAL ENGINEERING (CE)">Petrochemical Engineering (CE)</option>
                                <option value="INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)">Industrial and Production Engineering (IPE)</option>
                                <option value="ARCHITECTURE">Architecture</option>
                                <option value="MATHEMATICS">Mathematics</option>
                                <option value="PHYSICS">Physics</option>
                                <option value="CHEMISTRY">Chemistry</option>
                                <option value="STATISTICS">Statistics</option>
                                <option value="GEOLOGICAL SCIENCES">Geological Sciences</option>
                                <option value="ENVIRONMENTAL SCIENCES">Environmental Sciences</option>
                                <option value="PGD IN COMPUTER SCIENCE (CS)">PGD in Computer Science (CS)</option>
                                <option value="PGD IN COMPUTER ENGINEERING (CE)">PGD in Computer Engineering (CE)</option>
                                <option value="PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)">PGD in Computer Science and Engineering (CSE)</option>
                                <option value="PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)">PGD in Electronics and Computer Science (ECS)</option>
                                <option value="PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)">PGD in Computer and Information Technology (CIT)</option>
                                <option value="PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)">PGD in Information and Communication Technology (ICT)</option>
                                <option value="PGD IN INFORMATION TECHNOLOGY (IT)">PGD in Information Technology (IT)</option>
                                <option value="PGD IN SOFTWARE ENGINEERING (SE)">PGD in Software Engineering (SE)</option>
                              </select>
      <select name="year" id="grad_duration" class="box">
                                <option selected disabled value="">Enter Your Current Year</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
         </select>
      <input type="submit" value="Register profile" name="submit" class="btn">
   </form>

</section>















<footer class="footer">

   &copy; copyright @ 2023 by <span>CertifyMe</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>