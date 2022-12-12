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
?>
    <div class="container mt-4 shadow-lg p-3 mb-5 rounded" style="background-color: #f5f4f2;">
        <center>
            <h1><b>Control Panel</b></h1>
        </center>
        <div class="row justify-content-center mt-3">
            <div class="col-md-5">
                <div class="card ml-3" style="width: 25rem;">
                    <?php $image = $row['image']; ?>
                    <center><?php echo  '<img src="assets/images/' . $image . '" class="card-img-top" alt="..." style="padding:6px; height:50%; width: 50%; border-radius: 20px;">'; ?></center>
                    <div class="card-body">
                        <center>
                            <h4 class="card-title" style="font-family: verdana;"><b><?php echo $row['name'] ?></b></h4>
                        </center>
                        <p class="card-text" style="font-family: verdana;">Employee ID: <?php echo $row['employee_id'] ?></p>
                        <p class="card-text" style="font-family: verdana;">Age: <?php echo $row['employee_age'] ?></p>
                        <p class="card-text" style="font-family: verdana;">Experience: <?php echo $row['experience'] ?></p>
                        <p class="card-text" style="font-family: verdana;">Valid Upto: <?php echo $row['validity'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="border-left: 2px solid gray;">
                <a href="viewvotes.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="view_votes">View All Candidates And Their Vote Counts</a><br>
                <a href="add_candidate.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="addc">Add A New Candidate</a><br>
                <a href="update_candidate.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="uc">Update Information Of A Candidate</a><br>
                <a href="update_voter.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="uv">Update Information Of A Voter</a><br>
                <a href="reset_votecount.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="rvc">Reset All Vote Counts</a><br>
                <a href="reset_voterflag.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="rvf">Reset All Voter Flags</a><br>
                <a href="set_voterflag.php" class="btn btn-primary container mt-2 shadow-lg p-2 mb-2 rounded" name="svf">Set All Voter Flags</a><br>
            </div>

        </div>
    </div>
<?php } else {
    header("location: admin_login.php");
} ?>
<?php include('includes/footer.php'); ?>