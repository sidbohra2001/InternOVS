<?php
ob_start();
session_start();
?>
<?php
if (isset($_POST["submit_login"])) {
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "miniproject";
    $con = mysqli_connect($server, $username, $pass, $db);
    if (!$con) {
        die("Connection to the database failed due to : " . mysqli_connect_error());
    }
    $reg_flag = 1;
    $emp_reg = "/^[0-9]{6}$/";
    $pass_reg = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    if (preg_match($emp_reg, $_POST["emp_id"])) {
        $reg_flag = $reg_flag & 1;
    } else {
        $reg_flag = $reg_flag & 0;
        echo '<div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong>Incorrect Employee ID format.
            </div>';
    }
    if (preg_match($pass_reg, $_POST["password"])) {
        $reg_flag = $reg_flag & 1;
    } else {
        $reg_flag = $reg_flag & 0;
        echo '<div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry!</strong>Incorrect Password format.
            </div>';
    }
    if ($reg_flag == 1) {
        $query = "SELECT * FROM employee WHERE employee_id = '" . $_POST["emp_id"] . "'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row["password"] == $_POST["password"]) {
                $d_image = $row['image'];
                $d_ename = $row['name'];
                $s_image = "<img src='assets/images/$d_image' class='profile_image' />";
                $p_image = "<img src='assets/images/$d_image' id='pp'/>";
                $_SESSION['admin_data'] = array(
                    'empid' => $row['employee_id'],
                    'name' => $row['name'],
                    'image' => $s_image,
                    'pimage' => $p_image
                );
                $_SESSION['admin_is_logged_in']  =  true;
                header("location: adminpage.php");
            } else {
                echo '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong>Wrong Password.
            </div>';
            }
        } else {
            echo '<div class="alert alert-danger text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry!</strong>Your account does not exist. Pleae contact the administration department.
          </div>';
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="assets/images/geulogo.png" />
    <link rel="stylesheet" href="css/bootstrap1.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Online Voting System - Admin Portal</title>
</head>

<body style="font-family: verdana; background-color: #bec8d7;">
    <div class="container mt-4 shadow-lg p-3 mb-5 bg-white rounded" id="loginrow" style="background-image: url('assets/images/admin.jpg'); background-position: center">
        <div class="col-md-7 mt-5">
        </div>
        <div class="col-md-4 m-4" id="form">
            <form class="m-3" action="admin_login.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Employee ID</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="emp_id" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your Employee ID with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary" name="submit_login">Login</button>
                <p class="mt-4">Don't have an account?<br> Contact authority</p>
                <p>New to Online Voting System? <a href="">For more details click here</a></p>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<?php include('includes/footer.php'); ?>