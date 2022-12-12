<?php
include('includes/header.php');
if (isset($_SESSION['user_data']['vid'])) {
    $voterid = $_SESSION['user_data']['vid'];
$server = "localhost";
$username = "root";
$pass = "";
$db = "miniproject";
$con = mysqli_connect($server, $username, $pass, $db);
if (!$con) {
    die("Connection to the database failed due to : " . mysqli_connect_error());
}
$r = mysqli_query($con, "SELECT * FROM state1 WHERE voterid = '" . $voterid . "'");
$row = mysqli_fetch_assoc($r);
?>
<link rel="stylesheet" href="css/my_profile.css">
<div class="container mt-4 shadow-lg p-3 mb-5 bg-white rounded">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <img src="assets/images/vp.jpg" style="width: 500px;">
        </div>
        <div class="col-md-5" style="border-left: 2px solid gray;">
            <div class="card ml-3" style="width: 25rem;">
                <?php $image = $row['image']; ?>
                <center><?php echo  '<img src="assets/images/voters/' . $image . '" class="card-img-top" alt="..." style="padding:6px; height:50%; width: 50%; border-radius: 20px;">'; ?></center>
                <div class="card-body">
                    <center>
                        <h4 class="card-title" style="font-family: verdana;"><b><?php echo $row['name'] ?></b></h4>
                    </center>
                    <p class="card-text" style="font-family: verdana;">Voter ID: <?php echo $row['voterid'] ?></p>
                    <p class="card-text" style="font-family: verdana;">Father's Name: <?php echo $row['fname'] ?></p>
                    <p class="card-text" style="font-family: verdana;">Phone Number: <?php echo $row['phone'] ?></p>
                    <p class="card-text" style="font-family: verdana;">Aadhar Number: <?php echo $row['aadhar'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
else {
    header("location: login.php");
} ?>
<?php include('includes/footer.php'); ?>