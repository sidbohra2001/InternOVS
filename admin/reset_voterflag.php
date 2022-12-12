<?php
include('includes/header.php');
if (isset($_SESSION['admin_data']['empid'])) {
    $empid = $_SESSION['admin_data']['empid'];
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "miniproject";
    $con = mysqli_connect($server, $username, $pass, $db);
    if (!$con) {
        die("Connection to the database failed due to : " . mysqli_connect_error());
    }
    $r = mysqli_query($con, "SELECT * FROM employee WHERE employee_id = '" . $empid . "'");
    $row = mysqli_fetch_assoc($r);
    $q1 = "UPDATE state1 SET flag='0'";
    if (mysqli_query($con, $q1)) {
        echo '<div class="alert alert-danger text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Flag Reset Successful!!</strong>
        </div>';
    }
?>
<?php } else {
    header("location: admin_login.php");
} ?>
<?php include('includes/footer.php'); ?>