<?php
ob_start();
session_start();
?>
<?php
if (isset($_POST['submit_login'])) {
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
    $pass_reg = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
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
    if(preg_match($pass_reg, $_POST["password"])){
        $reg_flag = $reg_flag & 1;
    }
    else{
        $reg_flag = $reg_flag & 0;
        echo '<div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong>Incorrect Password format.
            </div>';
    }
    $token = "SELECT * FROM token WHERE voterid = '" . $_POST["voterid"] . "'";
    $rtoken = mysqli_query($con, $token);
    if($reg_flag == 1){
        if(mysqli_num_rows($rtoken) == 0){
            $query = "SELECT * FROM login_details WHERE voterid = '" . $_POST["voterid"] . "'";
            $tquery = "INSERT INTO token VALUES('".$_POST['voterid']."')";
            mysqli_query($con, $tquery);
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($row["password"] == $_POST["password"]) {
                    $query1 = "SELECT * FROM state1 WHERE voterid = '" . $_POST["voterid"] . "'";
                    $r1 = mysqli_query($con, $query1);
                    if (mysqli_num_rows($r1) > 0) {
                        $row1 = mysqli_fetch_assoc($r1);
                        $d_image = $row1['image'];
                        $d_fname = $row1['fname'];
                        $s_image = "<img src='assets/images/voters/$d_image' class='profile_image' />";
                        $p_image = "<img src='assets/images/voters/$d_image' id='pp'/>";
                        $_SESSION['user_data'] = array(
                            'vid' => $row1['voterid'],
                            'fname' => $row1['fname'],
                            'name' => $row1['name'],
                            'image' => $s_image,
                            'pimage' => $p_image,
                            'phone' => $row1['phone'],
                            'aadhar' => $row1['aadhar'],
                            'vflag' => $row1['flag'],
                            'con' => $con
                        );
                        $_SESSION['user_is_logged_in']  =  true;
                        header('location: welcomepage.php');
                        echo '<div class="alert alert-danger text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sorry!</strong>Your password does not match. Pleae contact the administration department.
                        </div>';
                    }
                } else {
                    echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Wrong Password.
                </div>';
                }
            } else{
                echo '<div class="alert alert-danger text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sorry!</strong>Your account does not exist. Pleae contact the administration department.
                </div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong>You are logged in to another browser.
              </div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="assets/images/geulogo.png" />
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login to your account</title>
</head>

<body style="font-family: verdana;">
    <div class="container mt-4 shadow-lg p-3 mb-5 bg-white rounded" id="loginrow" style="background-image: url('assets/images/parliament.jpg'); background-position: center">
        <div class="col-md-7 mt-5">
        </div>
        <div class="col-md-4 m-4" id="form">
            <form class="m-3" action="" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Voter ID</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="voterid" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your Voter ID with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary" name="submit_login">Login</button>
                <p class="mt-2"><a href="forgotpassword.php">Forgot Password?</a></p>
                <p class="mt-2">Don't have an account? <a href="signup.php">Sign Up</a></p>
                <p>New to Online Voting System? <a href="">For more details click here</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>