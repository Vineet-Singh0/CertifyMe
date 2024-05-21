<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "document_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      $Id= $_GET['Id']; 
      $sql = "DELETE FROM `form` WHERE Id='$Id'";
      $data = mysqli_query($conn, $sql);

      if($data)
      {
        echo "<script>alert('Record Deleted')</script>";
        ?>
        <meta http-equiv="refresh" content="0; URL=http://localhost/MiniProject/Login/Academic/form.php" />
        <?php

      }
      else
      {
          echo "Failed to Delete";
      }

?>