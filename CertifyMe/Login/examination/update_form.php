<?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "document_db";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      $Id = isset($_GET['Id']) ? $_GET['Id'] : null;


      $sql = "SELECT * FROM `form` WHERE Id='$Id'";

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
   <title>Application Form</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- custom css file link  -->
   

</head>
<body>

<section class="courses">

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 well">
        <form action="update_form.php?Id=<?php echo $Id; ?>" class="form-horizontal row" method="POST" enctype="multipart/form-data">


          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title text-center">Application form</h3>
            </div>
            <div class="panel-body">
                
            <div class="form-group">
                  <label for="applicant_name" class="control-label col-sm-3">Required Document :</label>
                  <div class="col-sm-7">
                  <select name="required" required id="gender" class="form-control">
                      <option value="" selected disabled>Select</option>
                      <option value="Bonafide" <?php if($result['Required_Document'] == 'Bonafide') { echo 'selected'; } ?>>Bonafide</option>
                      <option value="Transcript" <?php if($result['Required_Document'] == 'Transcript') { echo 'selected'; } ?>>Transcript</option>
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="applicant_name" class="control-label col-sm-3">Applicant's Name :</label>
                  <div class="col-sm-7">
                    <input type="text" value="<?php echo $result['Applicant_Name']; ?>" required name="applicant_name" id="applicant_name" class="form-control">
                  </div>
                </div>
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">PRN :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input type="text" value="<?php echo $result['PRN']; ?>" required name="prn" class="form-control" id="mobile" maxlength="20">
                    </div>
                  </div>
                </div>
    
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">Mobile :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <span class="input-group-addon">+91</span>
                      <input type="text" value="<?php echo $result['Mobile']; ?>" required name="mobile" class="form-control" id="mobile" maxlength="10">
                    </div>
                  </div>
                </div>
    
                <div class="form-group">
                  <label for="gender" class="control-label col-sm-3">Gender :</label>
                  <div class="col-sm-2">
                    <select name="gender" required id="gender" class="form-control">
                      <option value="" selected disabled>Select</option>
                      <option value="MALE" <?php if($result['Gender'] == 'MALE') { echo 'selected'; } ?>>MALE</option>
                      <option value="FEMALE" <?php if($result['Gender'] == 'FEMALE') { echo 'selected'; } ?>>FEMALE</option>
                    </select>
                  </div>
                </div>
    
                </div>
    
    
                <div class="form-group">
                  <label for="email" class="control-label col-sm-3">Email :</label>
                  <div class="col-sm-6">
                    <input type="email" value="<?php echo $result['Email']; ?>" required name="email" id="email" class="form-control">
                  </div>
                </div>
    
                <div class="form-group">
                  <label for="present_address" class="control-label col-sm-3">Address :</label>
                  <div class="col-sm-7">
                    <textarea name="address" required rows="3" id="present_address" class="form-control"><?php echo $result['Address']; ?>
                    
                    </textarea>
                  </div>
                </div>
                <hr>
                <fieldset>
                 
    
                  <!-- ************ Start of Graduation Level************** -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h5 class="panel-title text-center">Graduation Level*</h5>
                        </div>
                        <div class="panel-body">
                          <div class="form-group">
                          <label class="control-label col-sm-2" for="grad_duration">Current Year :</label>
                            <div class="col-sm-4">
                              <select name="grad_year" id="grad_duration" class="form-control">
                                <option selected disabled value="">Select One</option>
                                <option value="First Year" <?php if($result['Current_Year'] == 'First Year') { echo 'selected'; } ?>>First Year</option>
                                <option value="Second Year" <?php if($result['Current_Year'] == 'Second Year') { echo 'selected'; } ?>>Second Year</option>
                                <option value="Third Year" <?php if($result['Current_Year'] == 'Third Year') { echo 'selected'; } ?>>Third Year</option>
                                <option value="Fourth Year" <?php if($result['Current_Year'] == 'Fourth Year') { echo 'selected'; } ?>>Fourth Year</option>
                              </select>
                            </div>
    
                            <label class="control-label col-sm-2" for="grad_result">Result :</label>
                            <div class="col-sm-4">
                              <div class="input-group">
                                <span class="input-group-addon">GPA</span>
                                <input type="text" value="<?php echo $result['Result']; ?>" required name="grad_result" class="form-control" id="grad_result" step="0.01" min="1" max="10">
                              </div>
                            </div>
                          </div>
    
                          <div class="form-group">
                            <label for="grad_subject" class="control-label col-sm-2">Subject :</label>
                            <div class="col-sm-4">
                              <select name="grad_subject" required id="grad_subject" class="form-control">
                                <option value="" selected="selected">Select One</option>
                                <option value="COMPUTER SCIENCE (CS)" <?php if($result['Subject'] == 'COMPUTER SCIENCE (CS)') { echo 'selected'; } ?>>Computer Science (CS)</option>
                                <option value="COMPUTER ENGINEERING (CE)" <?php if($result['Subject'] == 'COMPUTER ENGINEERING (CE)') { echo 'selected'; } ?>>Computer Engineering (CE)</option>
                                <option value="COMPUTER SCIENCE AND ENGINEERING (CSE)" <?php if($result['Subject'] == 'COMPUTER SCIENCE AND ENGINEERING (CSE)') { echo 'selected'; } ?>>Computer Science and Engineering (CSE)</option>
                                <option value="ELECTRONICS AND COMPUTER SCIENCE (ECS)" <?php if($result['Subject'] == 'ELECTRONICS AND COMPUTER SCIENCE (ECS)') { echo 'selected'; } ?>>Electronics and Computer Science (ECS)</option>
                                <option value="COMPUTER AND INFORMATION TECHNOLOGY (CIT)" <?php if($result['Subject'] == 'COMPUTER AND INFORMATION TECHNOLOGY (CIT)') { echo 'selected'; } ?>>Computer and Information Technology (CIT)</option>
                                <option value="INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)" <?php if($result['Subject'] == 'INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)') { echo 'selected'; } ?>>Information and Communication Technology (ICT)</option>
                                <option value="INFORMATION TECHNOLOGY (IT)" <?php if($result['Subject'] == 'INFORMATION TECHNOLOGY (IT)') { echo 'selected'; } ?>>Information Technology (IT)</option>
                                <option value="SOFTWARE ENGINEERING (SE)" <?php if($result['Subject'] == 'SOFTWARE ENGINEERING (SE)') { echo 'selected'; } ?>>Software Engineering (SE)</option>
                                <option value="Textile Engineering" <?php if($result['Subject'] == 'Textile Engineering') { echo 'selected'; } ?>>Textile Engineering</option>
                                <option value="ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)" <?php if($result['Subject'] == 'ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)') { echo 'selected'; } ?>>Electrical and Electronics Engineering (EEE)</option>
                                <option value="ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)" <?php if($result['Subject'] == 'ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)') { echo 'selected'; } ?>>Electronics and Telecommunication Engineering (ETE)</option>
                                <option value="ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)" <?php if($result['Subject'] == 'ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)') { echo 'selected'; } ?>>Electronics and Communication Engineering (ECE)</option>
                                <option value="CIVIL ENGINEERING (CE)" <?php if($result['Subject'] == 'CIVIL ENGINEERING (CE)') { echo 'selected'; } ?>>Civil Engineering (CE)</option>
                                <option value="MECHANICAL ENGINEERING (ME)" <?php if($result['Subject'] == 'MECHANICAL ENGINEERING (ME)') { echo 'selected'; } ?>>Mechanical Engineering (ME)</option>
                                <option value="CHEMICAL ENGINEERING (CE)" <?php if($result['Subject'] == 'CHEMICAL ENGINEERING (CE)') { echo 'selected'; } ?>>Chemical Engineering (CE)</option>
                                <option value="PETROCHEMICAL ENGINEERING (CE)" <?php if($result['Subject'] == 'PETROCHEMICAL ENGINEERING (CE)') { echo 'selected'; } ?>>Petrochemical Engineering (CE)</option>
                                <option value="INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)" <?php if($result['Subject'] == 'INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)') { echo 'selected'; } ?>>Industrial and Production Engineering (IPE)</option>
                                <option value="ARCHITECTURE" <?php if($result['Subject'] == 'ARCHITECTURE') { echo 'selected'; } ?>>Architecture</option>
                                <option value="MATHEMATICS" <?php if($result['Subject'] == 'MATHEMATICS') { echo 'selected'; } ?>>Mathematics</option>
                                <option value="PHYSICS" <?php if($result['Subject'] == 'PHYSICS') { echo 'selected'; } ?>>Physics</option>
                                <option value="CHEMISTRY" <?php if($result['Subject'] == 'CHEMISTRY') { echo 'selected'; } ?>>Chemistry</option>
                                <option value="STATISTICS" <?php if($result['Subject'] == 'STATISTICS') { echo 'selected'; } ?>>Statistics</option>
                                <option value="GEOLOGICAL SCIENCES" <?php if($result['Subject'] == 'GEOLOGICAL SCIENCES') { echo 'selected'; } ?>>Geological Sciences</option>
                                <option value="ENVIRONMENTAL SCIENCES" <?php if($result['Subject'] == 'ENVIRONMENTAL SCIENCES') { echo 'selected'; } ?>>Environmental Sciences</option>
                                <option value="PGD IN COMPUTER SCIENCE (CS)" <?php if($result['Subject'] == 'PGD IN COMPUTER SCIENCE (CS)') { echo 'selected'; } ?>>PGD in Computer Science (CS)</option>
                                <option value="PGD IN COMPUTER ENGINEERING (CE)" <?php if($result['Subject'] == 'PGD IN COMPUTER ENGINEERING (CE)') { echo 'selected'; } ?>>PGD in Computer Engineering (CE)</option>
                                <option value="PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)" <?php if($result['Subject'] == 'PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)') { echo 'selected'; } ?>>PGD in Computer Science and Engineering (CSE)</option>
                                <option value="PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)" <?php if($result['Subject'] == 'PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)') { echo 'selected'; } ?>>PGD in Electronics and Computer Science (ECS)</option>
                                <option value="PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)" <?php if($result['Subject'] == 'PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)') { echo 'selected'; } ?>>PGD in Computer and Information Technology (CIT)</option>
                                <option value="PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)" <?php if($result['Subject'] == 'PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)') { echo 'selected'; } ?>>PGD in Information and Communication Technology (ICT)</option>
                                <option value="PGD IN INFORMATION TECHNOLOGY (IT)" <?php if($result['Subject'] == 'PGD IN INFORMATION TECHNOLOGY (IT') { echo 'selected'; } ?>>PGD in Information Technology (IT)</option>
                                <option value="PGD IN SOFTWARE ENGINEERING (SE)" <?php if($result['Subject'] == 'PGD IN SOFTWARE ENGINEERING (SE)') { echo 'selected'; } ?>>PGD in Software Engineering (SE)</option>
                              </select>
                            </div>
    
                            <label class="control-label col-sm-2" for="grad_pass_year">Passing Year :</label>
                            <div class="col-sm-4">
                              <select name="grad_pass_year" required id="grad_pass_year" class="form-control">
                                <option selected disabled value="">Select One</option>
                                <option value="1985" <?php if($result['Passing_Year'] == '1985') { echo 'selected'; } ?>>1985</option>
                                <option value="1986" <?php if($result['Passing_Year'] == '1986') { echo 'selected'; } ?>>1986</option>
                                <option value="1987" <?php if($result['Passing_Year'] == '1987') { echo 'selected'; } ?>>1987</option>
                                <option value="1988" <?php if($result['Passing_Year'] == '1988') { echo 'selected'; } ?>>1988</option>
                                <option value="1989" <?php if($result['Passing_Year'] == '1989') { echo 'selected'; } ?>>1989</option>
                                <option value="1990" <?php if($result['Passing_Year'] == '1990') { echo 'selected'; } ?>>1990</option>
                                <option value="1991" <?php if($result['Passing_Year'] == '1991') { echo 'selected'; } ?>>1991</option>
                                <option value="1992" <?php if($result['Passing_Year'] == '1992') { echo 'selected'; } ?>>1992</option>
                                <option value="1993" <?php if($result['Passing_Year'] == '1993') { echo 'selected'; } ?>>1993</option>
                                <option value="1994" <?php if($result['Passing_Year'] == '1994') { echo 'selected'; } ?>>1994</option>
                                <option value="1995" <?php if($result['Passing_Year'] == '1995') { echo 'selected'; } ?>>1995</option>
                                <option value="1996" <?php if($result['Passing_Year'] == '1996') { echo 'selected'; } ?>>1996</option>
                                <option value="1997" <?php if($result['Passing_Year'] == '1997') { echo 'selected'; } ?>>1997</option>
                                <option value="1998" <?php if($result['Passing_Year'] == '1998') { echo 'selected'; } ?>>1998</option>
                                <option value="1999" <?php if($result['Passing_Year'] == '1999') { echo 'selected'; } ?>>1999</option>
                                <option value="2000" <?php if($result['Passing_Year'] == '2000') { echo 'selected'; } ?>>2000</option>
                                <option value="2001" <?php if($result['Passing_Year'] == '2001') { echo 'selected'; } ?>>2001</option>
                                <option value="2002" <?php if($result['Passing_Year'] == '2002') { echo 'selected'; } ?>>2002</option>
                                <option value="2003" <?php if($result['Passing_Year'] == '2003') { echo 'selected'; } ?>>2003</option>
                                <option value="2004" <?php if($result['Passing_Year'] == '2004') { echo 'selected'; } ?>>2004</option>
                                <option value="2005" <?php if($result['Passing_Year'] == '2005') { echo 'selected'; } ?>>2005</option>
                                <option value="2006" <?php if($result['Passing_Year'] == '2006') { echo 'selected'; } ?>>2006</option>
                                <option value="2007" <?php if($result['Passing_Year'] == '2007') { echo 'selected'; } ?>>2007</option>
                                <option value="2008" <?php if($result['Passing_Year'] == '2008') { echo 'selected'; } ?>>2008</option>
                                <option value="2009" <?php if($result['Passing_Year'] == '2009') { echo 'selected'; } ?>>2009</option>
                                <option value="2010" <?php if($result['Passing_Year'] == '2010') { echo 'selected'; } ?>>2010</option>
                                <option value="2011" <?php if($result['Passing_Year'] == '2011') { echo 'selected'; } ?>>2011</option>
                                <option value="2012" <?php if($result['Passing_Year'] == '2012') { echo 'selected'; } ?>>2012</option>
                                <option value="2013" <?php if($result['Passing_Year'] == '2013') { echo 'selected'; } ?>>2013</option>
                                <option value="2014" <?php if($result['Passing_Year'] == '2014') { echo 'selected'; } ?>>2014</option>
                                <option value="2015" <?php if($result['Passing_Year'] == '2015') { echo 'selected'; } ?>>2015</option>
                                <option value="2016" <?php if($result['Passing_Year'] == '2016') { echo 'selected'; } ?>>2016</option>
                                <option value="2017" <?php if($result['Passing_Year'] == '2017') { echo 'selected'; } ?>>2017</option>
                                <option value="2018" <?php if($result['Passing_Year'] == '2018') { echo 'selected'; } ?>>2018</option>
                                <option value="2019" <?php if($result['Passing_Year'] == '2019') { echo 'selected'; } ?>>2019</option>
                                <option value="2020" <?php if($result['Passing_Year'] == '2020') { echo 'selected'; } ?>>2020</option>
                                <option value="2021" <?php if($result['Passing_Year'] == '2021') { echo 'selected'; } ?>>2021</option>
                                <option value="2022" <?php if($result['Passing_Year'] == '2022') { echo 'selected'; } ?>>2022</option>
                                <option value="2023" <?php if($result['Passing_Year'] == '2023') { echo 'selected'; } ?>>2023</option>
                                <option value="2024" <?php if($result['Passing_Year'] == '2024') { echo 'selected'; } ?>>2024</option>
                                <option value="2025" <?php if($result['Passing_Year'] == '2025') { echo 'selected'; } ?>>2025</option>
                                <option value="2026" <?php if($result['Passing_Year'] == '2026') { echo 'selected'; } ?>>2026</option>
                                <option value="2027" <?php if($result['Passing_Year'] == '2027') { echo 'selected'; } ?>>2027</option>
                                <option value="2028" <?php if($result['Passing_Year'] == '2028') { echo 'selected'; } ?>>2028</option>
                                <option value="2029" <?php if($result['Passing_Year'] == '2029') { echo 'selected'; } ?>>2029</option>
                                <option value="2030" <?php if($result['Passing_Year'] == '2030') { echo 'selected'; } ?>>2030</option>
                              </select>
                            </div>
                          </div>
                        </div>
    
                      </div>
                    </div>
                  </div>
                </fieldset>
                  <!-- ************ End of Graduation Level************** -->
    
                <fieldset>
                  <legend class="text-center">Documents</legend>
                  <div class="panel-body">
              
               
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">Fees Paid :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                    <select name="fees" required id="Fees" class="form-control">
                      <option value="" selected disabled>Select</option>
                      <option value="Yes" <?php if($result['Fees_Paid'] == 'Yes') { echo 'selected'; } ?>>Yes</option>
                      <option value="No" <?php if($result['Fees_Paid'] == 'No') { echo 'selected'; } ?>>No</option>
                    </select>
                    </div>
                  </div>
                 
                </div>
              
                <div class="form-group">
                  <label for="Deleivery Method" class="control-label col-sm-3">Delivery Method :</label>
                  <div class="col-sm-2">
                    <select name="delivery" id="blood_group" class="form-control">
                      <option value="">Select</option>
                      <option value="Email" <?php if($result['Delivery_Method'] == 'Email') { echo 'selected'; } ?>>Email</option>
                      <option value="Address" <?php if($result['Delivery_Method'] == 'Address') { echo 'selected'; } ?>>Address</option>
                    </select>
                  </div>
                </div>
    
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">Number of Copies :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                    <input type="text" value="<?php echo $result['Number_of_Copies']; ?>" required name="noc" class="form-control" id="grad_result" step="1" min="1" max="5">
                    </div>
                  </div>
                </div>
                
              
            
            </div>
            </fieldset>
            
          </div>
          <div class="panel-footer">
              <div class="row">
                <div class="col-lg-2 col-lg-offset-5">
                <input type="submit" class="btn1 btn-success btn-lg btn-block" value="Update Now" name="update">
                </div>
              </div>
            </div>
        </form>
          
        </div>
      </div>
    </div>
    </div>
    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="script.js"></script>

   </div>
</html>

<?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "document_db";
     
      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      
        if (isset($_POST['update'])) {

        $required =mysqli_real_escape_string($conn,$_POST['required']);
        $name = mysqli_real_escape_string($conn, $_POST['applicant_name']);
        $prn = mysqli_real_escape_string($conn, $_POST['prn']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $year = mysqli_real_escape_string($conn, $_POST['grad_year']);
        $result = mysqli_real_escape_string($conn, $_POST['grad_result']);
        $subject = mysqli_real_escape_string($conn, $_POST['grad_subject']);
        $passing_year = mysqli_real_escape_string($conn, $_POST['grad_pass_year']);
        $fees = mysqli_real_escape_string($conn, $_POST['fees']);
        $delivery = mysqli_real_escape_string($conn, $_POST['delivery']); 
        $Number_copies = mysqli_real_escape_string($conn, $_POST['noc']); 
        $Id = $_GET['Id'];
        echo "Id from GET: " . $Id;

      $update = "UPDATE `form` SET `Required_Document`='$required',`Applicant_Name`='$name',`PRN`='$prn',`Mobile`='$mobile',`Gender`='$gender',`Email`='$email',`Address`='$address',`Current_Year`='$year',`Result`='$result',`Subject`='$subject',`Passing_Year`='$passing_year',`Fees_Paid`='$fees',`Delivery_Method`='$delivery',`Number_of_Copies`='$Number_copies' WHERE Id='$Id'";
      echo "Update Query: " . $update;

      $data= mysqli_query($conn, $update);

      if($data)
      {
        echo "<script>alert('Record Updated')</script>";
        ?>
        <meta http-equiv="refresh" content="0; URL=http://localhost/MiniProject/Login/examination/form.php" />
        <?php

      }
      else
      {
          echo "Failed to Update";
      }
  }
?>