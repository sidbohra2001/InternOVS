<?php
include('./includes/header.php');
if (isset($_SESSION['admin_data']['empid'])) {
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap1.css">
    <title>Sign up for Online Voting System</title>
    <?php
    if (isset($_POST["submit"]) && isset($_POST["robot"])) {
        $server = "localhost";
        $username = "root";
        $pass = "";
        $db = "miniproject";
        $con = mysqli_connect($server, $username, $pass, $db);
        if (!$con) {
            die("Connection to the database failed due to : " . mysqli_connect_error());
        }
        $reg_flag = 1;
        $vid_reg = "/^[A-Z]{3}[0-9]{6}$/";
        $name_reg = "/[0-9]+/";
        $mobile_reg = "/^[1-9]{1}[0-9]{9}$/";
        $aadhar_reg = "/^[0-9]{12}$/";
        if(preg_match($vid_reg, $_POST["voterid"])){
            $reg_flag = $reg_flag & 1;
        }
        else{
            $reg_flag = $reg_flag & 0;
            echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Incorrect Voter ID format.
                </div>';
        }
        if(preg_match($name_reg, $_POST["name"])){
            $reg_flag = $reg_flag & 0;
            echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Incorrect name format.
                </div>';
        }
        else{
            $reg_flag = $reg_flag & 1;
        }
        if(preg_match($name_reg, $_POST["fname"])){
            $reg_flag = $reg_flag & 0;
            echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Incorrect father\'s name format.
                </div>';
        }
        else{
            $reg_flag = $reg_flag & 1;
        }
        if(preg_match($mobile_reg, $_POST["mobile"])){
            $reg_flag = $reg_flag & 1;
        }
        else{
            $reg_flag = $reg_flag & 0;
            echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Incorrect Mobile Number format.
                </div>';
        }
        if(preg_match($aadhar_reg, $_POST["aadhar"])){
            $reg_flag = $reg_flag & 1;
        }
        else{
            $reg_flag = $reg_flag & 0;
            echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Incorrect Aadhar format.
                </div>';
        }
        if($reg_flag == 1){
            $q1 = "UPDATE state1 SET fname = '".$_POST["fname"]."', name = '".$_POST["name"]."', image = '".$_POST["image"]."', phone = '".$_POST["mobile"]."', aadhar = '".$_POST["aadhar"]."' WHERE voterid = '".$_POST["voterid"]."'";
            if (mysqli_query($con, $q1)) {
                header("location: adminpage.php");
            } else {
                echo "<script>alert('Error in Uploading Data')</script>";
            }
        }
    }
    ?>

</head>

<body style="font-family: verdana;">
    <div class="container mt-4 shadow-lg p-3 mb-5 rounded" style="background-image: url('assets/images/calc.png'); background-position: center" id="loginrow">
        <center>
            <h1 style="color: white;"><b>Update Voter</b></h1>
        </center>
        <div class="row justify-content-center mt-3" style="margin: 80px; max-width: 50%; background: white;">
            <div class="col-md-8">
                <form class="m-3" method="POST" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Voter ID</b></label>
                        <input type="text" class="form-control" id="voterid" name="voterid" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted"><b>We will never share your Voter ID with anyone.</b></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Voter's Name</b></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Father's Name</b></label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Mobile Number</b></label>
                        <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Aadhar Number</b></label>
                        <input type="text" class="form-control" id="aadhar" name="aadhar" maxlength="12" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><b>Image</b></label>
                        <input type="text" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="robot" required>
                        <label class="form-check-label" for="exampleCheck1">I am not a robot.</label>
                    </div>
                    <center><button name="submit" type="submit" class="btn btn-primary">Submit</button></center>
                </form>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

<?php
include('./includes/footer.php');
} else {
    header("location: admin_login.php");
}
?>