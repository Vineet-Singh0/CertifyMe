<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location: login_form.php');
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "profile_db";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : null;

if ($user_name === null) {
    echo "Error: User name not set in the session.";
    exit;
}

$sql = "SELECT * FROM `profile` WHERE name='$user_name'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: Unable to fetch data from the database. " . mysqli_error($conn);
    exit;
}

$data = mysqli_fetch_assoc($result);

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
<style>
  
.contact .row{
   display: flex;
   align-items: right;
   gap: 1.5rem;
}

.contact .row .image{
   flex: 1 1 50rem;
}

.contact .row .image img{
   width: 100%;
}

.contact .row form{
   flex: 1 1 30rem;
   background-color: var(--white);
   padding: 2rem;
   text-align: center;
}

.contact .row form h3{
   margin-bottom: 1rem;
   text-transform: capitalize;
   color:var(--black);
   font-size: 2.5rem;
}

.contact .row form .box{
   width: 100%;
   border-radius: .5rem;
   background-color: var(--light-bg);
   margin: 1rem 0;
   padding: 1.4rem;
   font-size: 1.8rem;
   color: var(--black);
}

.contact .row form textarea{
   height: 20rem;
   resize: none;
}

.contact .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
   gap:1.5rem;
   justify-content: right;
   align-items: flex-start;
   margin-top: 3rem;
}

.contact .box-container .box{
   text-align: right;
   background-color: var(--white);
   border-radius: .5rem;
   padding: 3rem;
}

.contact .box-container .box i{
   font-size: 3rem;
   color: var(--main-color);
   margin-bottom: 1rem;
}

.contact .box-container .box h3{
   font-size: 2rem;
   color:var(--black);
   margin: 1rem 0;
}

.contact .box-container .box a{
   display: block;
   padding-top: .5rem;
   font-size: 1.8rem;
   color: var(--light-color);
}

.contact .box-container .box a:hover{
   text-decoration: underline;
   color:var(--black);
}

h3 {
    font-size: 30px;
    font-weight: 500;
    color: #33363b;
    text-align: center;
}

p{
    font-size: 18px;
    color: #868d9b;
    text-align: center;
}

.card {
    width: 360px;
    height: auto;
    background-color: #ffffff;
    margin: 0 auto;
    margin-top: 30px;
    margin-left: 350px;
    margin-right: 400px;
    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.15);
    border-radius: 20px;
}

.card_profile_img {
    width: 120px;
    height: 120px;
    background-color: #868d9b;
    background: url("Image/pic-1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    border: 1px solid #ffffff;
    border-radius: 120px;
    margin: 0 auto;
    margin-top: -60px;
    border-radius: 100%;
}

.card_background_img {
    width: 100%;
    height: 180px;
    background-color: #e1e7ed;
    background: url("Image/card.jpeg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.user_details p {
    margin-bottom: 20px;
    margin-top: -5px;
}

.user_details h3 {
    margin-top: 10px;
}

.card_count {
    padding: 30px;
    border-top: 1px solid #dde1e7;
}

.count {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
}

.count p {
    margin-top: -10px;
}
.form-field {
  
  margin: 0 0 5rem 0;
}
label, input {
  width: 70%;
  padding: 0.5rem;
  box-sizing:content-box;
   font-size: 26px;
}
label {
  text-align: left;
  width: 30%;
}
input {
  border: 2px solid #aaa;
  border-radius: 5px;
  text-align: left;
  font-size: 18px;
}

</style>
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
         <h3 class="name"><?php echo $_SESSION['amdmin_name'] ?></h3>
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
      <h3 style="font-weight: bold;" class="name"><?php echo $_SESSION['admin_name'] ?></h3>
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

<section class="user-profile">
    <div class="contact">
        <h1 class="heading">Your Profile</h1>
        <div class="row">
            <div class="info">
                <div class="card">
                    <div class="card_background_img"></div>
                    <div class="card_profile_img"></div>
                    <div class="user_details">
                        <h3 style="font-weight: bold;"><?php echo $_SESSION['admin_name'] ?></h3>
                        <p>Admin</p>
                    </div>
                    <a href="update_profile.php" class="btn">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</section>
















<footer class="footer">

   &copy; copyright @ 2023 by <span>CertifyMe</span> | all rights reserved!

</footer>

<!-- custom js file link  -->
<script src="script.js"></script>

   
</body>
</html>

