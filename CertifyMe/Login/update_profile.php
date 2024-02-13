<?php
@include 'config.php';

session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_name'])) {
    header('location: login_form.php');
    exit();
}

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "profile_db";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if the connection was not successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted for updating profile
if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $prn = $_POST['prn'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    // Update the user's profile in the database
    $update_sql = "UPDATE `profile` SET 
                    `name`='$name', 
                    `email`='$email', 
                    `prn`='$prn', 
                    `mobile`='$mobile', 
                    `course`='$course', 
                    `year`='$year' 
                    WHERE `name`='{$_SESSION['user_name']}'";

if (mysqli_query($conn, $update_sql)) {
    // Update the session variable
    $_SESSION['user_name'] = $name;
    
    header('Location: profile.php');
    exit();
} else {
    echo "Error updating profile: " . mysqli_error($conn);
}
}

// Fetch the current user's profile data
$user_name = $_SESSION['user_name'];
$sql = "SELECT * FROM `profile` WHERE `name`='$user_name'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: Unable to fetch data from the database. " . mysqli_error($conn);
    exit;
}

// Fetch the data
$data = mysqli_fetch_assoc($result);

// Close the connection
mysqli_close($conn);
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
      <input type="name" name="name" value="<?php echo $data['name']; ?>" placeholder="Enter Your Name" maxlength="50" class="box">
      <input type="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Enter Your Email" maxlength="50" class="box">
      <input type="text" name="prn" value="<?php echo $data['prn']; ?>" placeholder="Enter your Prn" maxlength="20" class="box">
      <input type="text" name="mobile" value="<?php echo $data['mobile']; ?>" placeholder="Enter your Mobile Number" maxlength="20" class="box">
      <select name="course" required id="grad_subject" class="box">
                                <option value="" selected="selected">Enter Your Course</option>
                                <option value="COMPUTER SCIENCE (CS)"<?php if($data['course'] == 'COMPUTER SCIENCE (CS)') { echo 'selected'; } ?>>Computer Science (CS)</option>
                                <option value="COMPUTER ENGINEERING (CE)"<?php if($data['course'] == 'COMPUTER ENGINEERING (CE)') { echo 'selected'; } ?>>Computer Engineering (CE)</option>
                                <option value="COMPUTER SCIENCE AND ENGINEERING (CSE)"<?php if($data['course'] == 'COMPUTER SCIENCE AND ENGINEERING (CSE)') { echo 'selected'; } ?>>Computer Science and Engineering (CSE)</option>
                                <option value="ELECTRONICS AND COMPUTER SCIENCE (ECS)"<?php if($data['course'] == 'ELECTRONICS AND COMPUTER SCIENCE (ECS)') { echo 'selected'; } ?>>Electronics and Computer Science (ECS)</option>
                                <option value="COMPUTER AND INFORMATION TECHNOLOGY (CIT)"<?php if($data['course'] == 'COMPUTER AND INFORMATION TECHNOLOGY (CIT)') { echo 'selected'; } ?>>Computer and Information Technology (CIT)</option>
                                <option value="INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)"<?php if($data['course'] == 'INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)') { echo 'selected'; } ?>>Information and Communication Technology (ICT)</option>
                                <option value="INFORMATION TECHNOLOGY (IT)"<?php if($data['course'] == 'INFORMATION TECHNOLOGY (IT)') { echo 'selected'; } ?>>Information Technology (IT)</option>
                                <option value="SOFTWARE ENGINEERING (SE)"<?php if($data['course'] == 'SOFTWARE ENGINEERING (SE)') { echo 'selected'; } ?>>Software Engineering (SE)</option>
                                <option value="Textile Engineering"<?php if($data['course'] == 'Textile Engineering') { echo 'selected'; } ?>>Textile Engineering</option>
                                <option value="ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)"<?php if($data['course'] == 'ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)') { echo 'selected'; } ?>>Electrical and Electronics Engineering (EEE)</option>
                                <option value="ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)"<?php if($data['course'] == 'ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)') { echo 'selected'; } ?>>Electronics and Telecommunication Engineering (ETE)</option>
                                <option value="ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)"<?php if($data['course'] == 'ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)') { echo 'selected'; } ?>>Electronics and Communication Engineering (ECE)</option>
                                <option value="CIVIL ENGINEERING (CE)"<?php if($data['course'] == 'CIVIL ENGINEERING (CE)') { echo 'selected'; } ?>>Civil Engineering (CE)</option>
                                <option value="MECHANICAL ENGINEERING (ME)"<?php if($data['course'] == 'MECHANICAL ENGINEERING (ME)') { echo 'selected'; } ?>>Mechanical Engineering (ME)</option>
                                <option value="CHEMICAL ENGINEERING (CE)"<?php if($data['course'] == 'CHEMICAL ENGINEERING (CE)') { echo 'selected'; } ?>>Chemical Engineering (CE)</option>
                                <option value="PETROCHEMICAL ENGINEERING (CE)"<?php if($data['course'] == 'PETROCHEMICAL ENGINEERING (CE)') { echo 'selected'; } ?>>Petrochemical Engineering (CE)</option>
                                <option value="INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)"<?php if($data['course'] == 'INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)') { echo 'selected'; } ?>>Industrial and Production Engineering (IPE)</option>
                                <option value="ARCHITECTURE"<?php if($data['course'] == 'ARCHITECTURE') { echo 'selected'; } ?>>Architecture</option>
                                <option value="MATHEMATICS"<?php if($data['course'] == 'MATHEMATICS') { echo 'selected'; } ?>>Mathematics</option>
                                <option value="PHYSICS"<?php if($data['course'] == 'PHYSICS') { echo 'selected'; } ?>>Physics</option>
                                <option value="CHEMISTRY"<?php if($data['course'] == 'CHEMISTRY') { echo 'selected'; } ?>>Chemistry</option>
                                <option value="STATISTICS"<?php if($data['course'] == 'STATISTICS') { echo 'selected'; } ?>>Statistics</option>
                                <option value="GEOLOGICAL SCIENCES"<?php if($data['course'] == 'GEOLOGICAL SCIENCES') { echo 'selected'; } ?>>Geological Sciences</option>
                                <option value="ENVIRONMENTAL SCIENCES"<?php if($data['course'] == 'ENVIRONMENTAL SCIENCES') { echo 'selected'; } ?>>Environmental Sciences</option>
                                <option value="PGD IN COMPUTER SCIENCE (CS)"<?php if($data['course'] == 'PGD IN COMPUTER SCIENCE (CS)') { echo 'selected'; } ?>>PGD in Computer Science (CS)</option>
                                <option value="PGD IN COMPUTER ENGINEERING (CE)"<?php if($data['course'] == 'PGD IN COMPUTER ENGINEERING (CE)') { echo 'selected'; } ?>>PGD in Computer Engineering (CE)</option>
                                <option value="PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)"<?php if($data['course'] == 'PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)') { echo 'selected'; } ?>>PGD in Computer Science and Engineering (CSE)</option>
                                <option value="PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)"<?php if($data['course'] == 'PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)') { echo 'selected'; } ?>>PGD in Electronics and Computer Science (ECS)</option>
                                <option value="PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)"<?php if($data['course'] == 'PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)') { echo 'selected'; } ?>>PGD in Computer and Information Technology (CIT)</option>
                                <option value="PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)"<?php if($data['course'] == 'PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)') { echo 'selected'; } ?>>PGD in Information and Communication Technology (ICT)</option>
                                <option value="PGD IN INFORMATION TECHNOLOGY (IT)"<?php if($data['course'] == 'PGD IN INFORMATION TECHNOLOGY (IT)') { echo 'selected'; } ?>>PGD in Information Technology (IT)</option>
                                <option value="PGD IN SOFTWARE ENGINEERING (SE)"<?php if($data['course'] == 'PGD IN SOFTWARE ENGINEERING (SE)') { echo 'selected'; } ?>>PGD in Software Engineering (SE)</option>
                              </select>
      <select name="year" id="grad_duration" class="box">
                                <option selected disabled value="">Enter Your Current Year</option>
                                <option value="First Year"<?php if($data['year'] == 'First Year') { echo 'selected'; } ?>>First Year</option>
                                <option value="Second Year" <?php if($data['year'] == 'Second Year') { echo 'selected'; } ?>>Second Year</option>
                                <option value="Third Year" <?php if($data['year'] == 'Third Year') { echo 'selected'; } ?>>Third Year</option>
                                <option value="Fourth Year" <?php if($data['year'] == 'Fourth Year') { echo 'selected'; } ?>>Fourth Year</option>
         </select>
         <input type="submit" value="Update Profile" name="update_profile" class="btn">
   </form>

</section>















<footer class="footer">

   &copy; copyright @ 2023 by <span>CertifyMe</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>