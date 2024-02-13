<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "login_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      $id= $_GET['id']; 
      $sql = "SELECT `id`, `name`, `email`, `user_type` FROM `user_form` WHERE id='$id'";
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
   <title>Update form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/update.css">

</head>
<body>
<img class="background1" src="Image/background2.png" >  
<div class="form-container1">

   <form action="" method="post">
      <h3>Update now</h3>
      <input type="text" value="<?php echo $result['name']; ?>" name="name" required placeholder="Enter your Name">
      <input type="email" value="<?php echo $result['email']; ?>" name="email" required placeholder="Enter your Email">
      <select name="user_type">
        <option value="user" <?php if($result['user_type'] == 'user') { echo 'selected'; } ?>>Student</option>
        <option value="admin" <?php if($result['user_type'] == 'admin') { echo 'selected'; } ?>>Admin</option>
      </select>

      <input type="submit" name="update" value="Update Now" class="form-btn">
   </form>

</div>

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