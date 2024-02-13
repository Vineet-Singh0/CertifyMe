<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "login_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      $id= $_GET['id']; 
      $sql = "DELETE FROM `user_form` WHERE id='$id'";
      $data = mysqli_query($conn, $sql);

      if($data)
      {
        echo "<script>alert('Record Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; URL=http://localhost/MiniProject/Login/admin/admin_page.php" />
        <?php

      }
      else
      {
          echo "Failed to Delete";
      }

?>   