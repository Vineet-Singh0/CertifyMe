

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
   <title>Status</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/dash.css">
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

.status-btn,
   .review-btn {
      padding: 8px 15px;
      border: 0;
      border-radius: 100px;
      margin-bottom: 10px;
      margin-top: 10px;
      cursor: pointer;
      transition: background-color 0.3s;
      text-align: center;
      display: inline-block; /* Ensures inline block display */
      text-decoration: none;
   }

   /* Define different background colors for different status values */
   .status-btn[data-status="Pending"] {
      background-color: #ffc107; /* Yellow for "Pending" */
      color: #000;
   }

   .status-btn[data-status="Approved"] {
      background-color: #28a745; /* Green for "Approved" */
      color: white;
   }

   .status-btn[data-status="Rejected"] {
      background-color: #dc3545; /* Red for "Rejected" */
      color: white;
   }

   .status-btn[data-status="Complete"] {
      background-color: #007bff; /* Blue for "Complete" */
      color: white;
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
      <?php
      $servername_doc = "localhost";
      $username_doc = "root";
      $password_doc = "";
      $database_doc = "document_db";
      
      // Create a connection to document_db
      $conn_doc = mysqli_connect($servername_doc, $username_doc, $password_doc, $database_doc);
      
      $servername_status = "localhost";
      $username_status = "root";
      $password_status = "";
      $database_status = "status_db";
      
      // Create a connection to status_db
      $conn_status = mysqli_connect($servername_status, $username_status, $password_status, $database_status);
      
      $sql_doc = "SELECT `Id`, `Required_Document`, `Applicant_Name`, `PRN`, `Mobile`, `Email`, `Subject`, `Fees_Paid`, `Delivery_Method`, `Number_of_Copies` FROM `form` WHERE `Applicant_Name` = '{$_SESSION['user_name']}'";
      $data_doc = mysqli_query($conn_doc, $sql_doc);
      $total_doc = mysqli_num_rows($data_doc);
      
      $new_status = "SELECT `Id`, `name`, `status`, `review` FROM `status` WHERE `name` = '{$_SESSION['user_name']}'";
      $data_status = mysqli_query($conn_status, $new_status);
      ?>

      
      <section class="about">
         <div class="row">
            <?php
            if ($total_doc != 0) {
            ?>
          <table  class="content-table">
             <thead> 
              <tr>
                  <th>Sno</th>
                  <th>Required Document</th>
                  <th>Applicant Name</th>
                  <th>PRN</th>
                  <th>Status</th>
                  <th>Review</th>
              </tr>
            </thead>
          <?php
          while (($result_doc = mysqli_fetch_assoc($data_doc)) && ($result_status = mysqli_fetch_assoc($data_status))) {
             echo "
             <tbody>
                <tr>
                   <td>" . $result_doc['Id'] . "</td>
                   <td>" . $result_doc['Required_Document'] . "</td>
                   <td>" . $result_doc['Applicant_Name'] . "</td>
                   <td>" . $result_doc['PRN'] . "</td>
                   <td class='status-btn' data-status='" . $result_status['status'] . "'>" . $result_status['status'] . "</td>
                   <td>" . $result_status['review'] . "</td>
                </tr>
             </tbody>";
          }
          ?>
</table>
<?php
} else {
   echo "<p>No data found for {$_SESSION['user_name']}.</p>";
}
?>
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