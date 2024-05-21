<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "status_db";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

$Id = isset($_GET['Id']) ? $_GET['Id'] : null;

if ($Id === null) {
    // Handle the case where 'Id' is not set or is empty
    echo "Error: 'Id' is not set in the URL.";
    // You might want to redirect or show an error message here
    exit;
}

$sql = "SELECT * FROM `status` WHERE Id='$Id'";

$data = mysqli_query($conn, $sql);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Update Form</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- custom css file link -->

</head>

<body>

    <section class="courses">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 well">
                    <form action="status_update.php?Id=<?php echo $Id; ?>" class="form-horizontal row" method="POST"
                        enctype="multipart/form-data">

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Status Update Form</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="applicant_name" class="control-label col-sm-3">Applicant's Name
                                        :</label>
                                    <div class="col-sm-7">
                                        <input type="text" value="<?php echo $result['Applicant_Name']; ?>" readonly name="applicant_name" id="applicant_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label col-sm-3">Status :</label>
                                    <div class="col-sm-2">
                                        <select name="status" required id="status" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Pending"
                                                <?php if ($result['status'] == 'Pending') {
                                                    echo 'selected';
                                                } ?>>Pending</option>
                                            <option value="Approved"
                                                <?php if ($result['status'] == 'Approved') {
                                                    echo 'selected';
                                                } ?>>Approved</option>
                                            <option value="Rejected"
                                                <?php if ($result['status'] == 'Rejected') {
                                                    echo 'selected';
                                                } ?>>Rejected</option>
                                            <option value="Complete"
                                                <?php if ($result['status'] == 'Complete') {
                                                    echo 'selected';
                                                } ?>>Complete</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="review" class="control-label col-sm-3">Review :</label>
                                    <div class="col-sm-7">
                                        <textarea name="review" required rows="3" id="review"
                                            class="form-control"><?php echo $result['review']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-lg-offset-5">
                                        <input type="submit" class="btn1 btn-success btn-lg btn-block" value="Update"
                                            name="submit">
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>

    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="script.js"></script>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    $review = $_POST['review'];

    $update = "UPDATE `status` SET `status`='$status', `review`='$review' WHERE Id='$Id'";
    $data = mysqli_query($conn, $update);

    if ($data) {
        echo "<script>alert('Record Updated')</script>";
        ?>
        <meta http-equiv="refresh" content="0; URL=http://localhost/MiniProject/Login/Academic/form.php" />
        <?php
    } else {
        echo "Failed to Update";
    }
}
?>
