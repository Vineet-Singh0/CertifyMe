<?php

@include 'config.php';
@include 'connection.php';

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
   <title>Application Form</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/dash.css">

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
      <a href="form.php"><i class="fas fa-graduation-cap"></i><span>Application Form</span></a>
      <a href="service.php"><i class="fas fa-chalkboard-user"></i><span>Our Service</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>Contact Us</span></a>
   </nav>

</div>

<section class="courses">

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 well">
        <form action="" class="form-horizontal row" method="POST" enctype="multipart/form-data">
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
                      <option value="Bonfide">Bonafide</option>
                      <option value="Transcript">Transcript</option>
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label for="applicant_name" class="control-label col-sm-3">Applicant's Name :</label>
                  <div class="col-sm-7">
                    <input type="text" required name="applicant_name" id="applicant_name" class="form-control">
                  </div>
                </div>
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">PRN :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input type="text" required name="prn" class="form-control" id="mobile" maxlength="20">
                    </div>
                  </div>
                </div>
    
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">Mobile :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <span class="input-group-addon">+91</span>
                      <input type="text" required name="mobile" class="form-control" id="mobile" maxlength="10">
                    </div>
                  </div>
                </div>
    
                <div class="form-group">
                  <label for="gender" class="control-label col-sm-3">Gender :</label>
                  <div class="col-sm-2">
                    <select name="gender" required id="gender" class="form-control">
                      <option value="" selected disabled>Select</option>
                      <option value="MALE">MALE</option>
                      <option value="FEMALE">FEMALE</option>
                    </select>
                  </div>
                </div>
    
                </div>
    
    
                <div class="form-group">
                  <label for="email" class="control-label col-sm-3">Email :</label>
                  <div class="col-sm-6">
                    <input type="email" required name="email" id="email" class="form-control">
                  </div>
                </div>
    
                <div class="form-group">
                  <label for="present_address" class="control-label col-sm-3">Address :</label>
                  <div class="col-sm-7">
                    <textarea name="address" required rows="3" id="present_address" class="form-control"></textarea>
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
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                              </select>
                            </div>
    
                            <label class="control-label col-sm-2" for="grad_result">Result :</label>
                            <div class="col-sm-4">
                              <div class="input-group">
                                <span class="input-group-addon">GPA</span>
                                <input type="text" required name="grad_result" class="form-control" id="grad_result" step="0.01" min="1" max="10">
                              </div>
                            </div>
                          </div>
    
                          <div class="form-group">
                            <label for="grad_subject" class="control-label col-sm-2">Subject :</label>
                            <div class="col-sm-4">
                              <select name="grad_subject" required id="grad_subject" class="form-control">
                                <option value="" selected="selected">Select One</option>
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
                            </div>
    
                            <label class="control-label col-sm-2" for="grad_pass_year">Passing Year :</label>
                            <div class="col-sm-4">
                              <select name="grad_pass_year" required id="grad_pass_year" class="form-control">
                                <option selected disabled value="">Select One</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                              </select>
                            </div>
                          </div>
                        </div>
    
                      </div>
                    </div>
                  </div>
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
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    </div>
                  </div>
                 
                </div>
              
                <div class="form-group">
                  <label for="Deleivery Method" class="control-label col-sm-3">Delivery Method :</label>
                  <div class="col-sm-2">
                    <select name="delivery" id="blood_group" class="form-control">
                      <option value="">Select</option>
                      <option value="Email">Email</option>
                      <option value="Address">Address</option>
                    </select>
                  </div>
                </div>
    
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mobile">Number of Copies :</label>
                  <div class="col-sm-4">
                    <div class="input-group">
                    <input type="text" required name="noc" class="form-control" id="grad_result" step="1" min="1" max="5">
                    </div>
                  </div>
                </div>
                
              </fieldset>
            </form>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-lg-12">
                  <div class="checkbox">
                    <label class="text-warning">
                      <input type="checkbox" required id="all_correct" name="all_correct" value="1"> I hereby declare that all the above information are correct and assure that I will abide by all the rules.
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2 col-lg-offset-5">
                  <input type="submit" class="btn1 btn-success btn-lg btn-block" value="Submit" name="submit">
                </div>
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

   </div>
</html>

<?php

     if(isset($_POST['submit'])){
        $name = $_POST['applicant_name'];
        $prn = $_POST['prn'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $year = $_POST['grad_year'];
        $result = $_POST['grad_result'];
        $subject = $_POST['grad_subject'];
        $passing_year = $_POST['grad_pass_year'];
        $fees = $_POST['fees'];
        $delivery = $_POST['delivery']; 
        $Number_copies = $_POST['noc']; 
      

     
        $insert = "INSERT INTO form VALUES('$name', '$prn', '$mobile', '$gender', '$email', '$address', '$year', '$result', '$subject', '$passing_year', '$fees', '$delivery')"; 
        mysqli_query($connect, $insert);

     $data = mysqli_query($conn,$query);

     if($data)
     {
       echo "Data Inserted into database";
     }
     else
     {
       echo "Failed";
     }
   }

?>