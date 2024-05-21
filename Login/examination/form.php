
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
   <title>Form</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <style>
       .details
      {
         padding: 8px 17.5px;
         border: 0;
         border-radius: 100px;
         background-color: #1192EF;
         color: #ffffff;
         font-weight: Bold;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
      }
 
      .details:hover 
      {
         background-color: #0080db;
         box-shadow: 0 0 20px #6fc5ff50;
         transform: scale(1.1);
      }
 
      .details:active 
      {
         background-color: #0080db;
         transition: all 0.25s;
         -webkit-transition: all 0.25s;
         box-shadow: none;
         transform: scale(0.98);
      }
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
         background-color: rgb(24, 169, 24);
         color: #ffffff;
         font-weight: Bold;
         transition: all 0.5s;
          -webkit-transition: all 0.5s;
      }
         
         .update:hover {
            background-color: green;
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
      .content-table {
   border-collapse: collapse;
   margin: 25px 0;
   font-size: 1.3em;
   min-width: 400px;
   border-radius: 5px 5px 0 0;
   overflow: hidden;
   box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
   background-color: #1192EF;
   color: #ffffff;
   text-align: left;
   font-weight: bold;
}

.content-table th,
.content-table td {
   padding: 12px 15px;
}

.content-table tbody tr {
   border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
   background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
   border-bottom: 2px solid #1192EF;
}

.content-table tbody tr.active-row {
   font-weight: bold;
   color: #009879;
}


.content-table1 {
   border-collapse: collapse;
   margin: 25px 0;
   font-size: 2.0em;
   min-width: 400px;
   border-radius: 5px 5px 0 0;
   overflow: hidden;
   box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table1 thead tr {
   background-color: #1192EF;
   color: #ffffff;
   text-align: center;
   font-weight: bold;
}

.content-table1 th,
.content-table1 td {
   padding: 12px 15px;
}

.content-table1 tbody tr {
   border-bottom: 1px solid #dddddd;
}

.content-table1 tbody tr:nth-of-type(even) {
   background-color: #f3f3f3;
}

.content-table1 tbody tr:last-of-type {
   border-bottom: 2px solid #1192EF;
}

.content-table1 tbody tr.active-row {
   font-weight: bold;
   color: #009879;
}
.updates 
      {
         padding: 8px 15px;
         border: 0;
         border-radius: 100px;
         margin-top: 5px;
         background-color: rgb(24, 169, 24);
         color: #ffffff;
         font-weight: Bold;
         transition: all 0.5s;
         -webkit-transition: all 0.5s;
      }
 
      .updates:hover 
      {
         background-color: green;
         box-shadow: 0 0 20px #6fc5ff50;
         transform: scale(1.1);
      }
 
      .updates:active 
      {
         background-color: green;
         transition: all 0.25s;
         -webkit-transition: all 0.25s;
         box-shadow: none;
         transform: scale(0.98);
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

      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "document_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);

      $sql = "SELECT `Id`, `Required_Document`, `Applicant_Name`, `PRN`, `Mobile`, `Email`, `Subject`, `Fees_Paid`, `Delivery_Method`, `Number_of_Copies` FROM `form` WHERE `Required_Document` = 'transcript'";
      $data= mysqli_query($conn, $sql);
      $total= mysqli_num_rows($data);
      

      if($total !=0)
      {
          ?>
          <table  class="content-table">
             <thead> 
              <tr>
                  <th>Sno</th>
                  <th>Required Document</th>
                  <th>Applicant Name</th>
                  <th>PRN</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Branch</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Operation</th>
              </tr>
            </thead>
          <?php
          while($result= mysqli_fetch_assoc($data))
          {
             echo " <tbody>
                    <tr>
                      <td>".$result['Id']."</td>
                      <td>".$result['Required_Document']."</td>
                      <td>".$result['Applicant_Name']."</td>
                      <td>".$result['PRN']."</td>
                      <td>".$result['Mobile']."</td>
                      <td>".$result['Email']."</td>
                      <td>".$result['Subject']."</td>
                      <td><a href='view_form.php?Id=$result[Id]'>
                      <input type ='submit' value ='View' class ='details'></input></a></td>
                      <td><a href='status_update.php?Id=$result[Id]'>
                      <input type ='submit' value ='Update' class ='updates'></input></a></td>
                      <td><a href='update_form.php?Id=$result[Id]'>
                      <input type ='submit' value ='Update' class ='update'></input></a>
                      <a href='delete_form.php?Id=$result[Id]'>
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

   
</body>
</html>