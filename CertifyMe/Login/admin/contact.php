<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
      .delete 
      {
         padding: 8px 17.5px;
         border: 0;
         border-radius: 100px;
         background-color: rgb(249, 72, 72);
         color: #ffffff;
         font-weight: Bold;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
      }
 
      .delete:hover 
      {
         background-color: red;
         box-shadow: 0 0 20px #6fc5ff50;
         transform: scale(1.1);
      }
 
      .delete:active 
      {
         background-color: red;
         transition: all 0.25s;
         -webkit-transition: all 0.25s;
         box-shadow: none;
         transform: scale(0.98);
      }
      .update {
         padding: 8px 15px;
         border: 0;
         border-radius: 100px;
         margin-bottom: 5px;
         background-color: #1192EF;
         color: #ffffff;
         font-weight: Bold;
         transition: all 0.5s;
          -webkit-transition: all 0.5s;
      }
         
         .update:hover {
            background-color: #0080db;
            box-shadow: 0 0 20px #6fc5ff50;
            transform: scale(1.1);
      }
         
         .update:active {
            background-color: green;
            transition: all 0.25s;
            -webkit-transition: all 0.25s;
            box-shadow: none;
            transform: scale(0.98);
      }

      .content-table1 thead tr {
         background-color: #1192EF;
         color: #ffffff;
         text-align: center;
         font-weight: bold;
         
      }
      .content-table1 table {
         background-color: #1192EF;
         color: #ffffff;
         text-align: center;
         font-weight: bold;
         margin: 125px;
      }
   </style>

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
<section class="about">

   <div class="row">
   <div class="image">
         <img src="Image/contact1.svg">
      </div>
   <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contact_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);

      $sql = "SELECT `id`, `name`, `email`, `mobile`, `issue`, `message` FROM `contact`";
      $data= mysqli_query($conn, $sql);
      $total= mysqli_num_rows($data);
      

      if($total !=0)
      {
          ?>
          <table  class="content-table1">
             <thead> 
              <tr>
                  <th>Sno</th>
                  <th>Name</th>
                  <th>Issue</th>
                  <th>Operation</th>
               </tr>   
            </thead>
          <?php
          while($result= mysqli_fetch_assoc($data))
          {
             echo " <tbody>
                    <tr>
                      <td>".$result['id']."</td>
                      <td>".$result['name']."</td>
                      <td>".$result['issue']."</td>
                      <td><a href='contact_view.php?id=$result[id]'>
                      <input type ='submit' value ='View' class ='update'></input></a>
                      <a href='delete_login.php?id=$result[id]'>
                      <input type ='submit' value ='Delete' class ='delete' onclick = 'return checkdelete()'></input></a>
                      </td>
                    </tr>
                    <tbody>";
          }
      }


    
?>
</table>
   </div>

  

</section>














<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="footer">

   &copy; copyright @ 2023 by <span>CertifyMe</span> | All Rights Reserved!

</footer>

<!-- custom js file link  -->
<script src="script.js"></script>
<script>
   function checkdelete()
{
   return confirm('Are You Sure you Want to Delete ?');
}
</script>

   
</body>
</html>