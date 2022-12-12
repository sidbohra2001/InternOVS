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
    $r = mysqli_query($con, "SELECT * FROM candidates");
    if (mysqli_num_rows($r) > 0) { ?>
        <table style="margin-top: 5rem; margin-left: auto; margin-right: auto;">
            <tr>
                <th style="border: 2px solid black; padding-left: 20px; padding-right: 20px;">
                    <center>
                        <h3><b>Voter Image</b></h3>
                    </center>
                </th>
                <th style="border: 2px solid black; padding-left: 20px; padding-right: 20px;">
                    <center>
                        <h3><b>Details</b></h3>
                    </center>
                </th>
                <th style="border: 2px solid black; padding-left: 20px; padding-right: 20px;">
                    <center>
                        <h3><b>Party Logo</b></h3>
                    </center>
                </th>
                <th style="border: 2px solid black; padding-left: 20px; padding-right: 20px;">
                    <center>
                        <h3><b>Vote Count</b></h3>
                    </center>
                </th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($r)) { ?>
                <tr>
                    <?php $cimage = "<img src='assets/images/candidates/" . $row["cimage"] . "' style='height: 200px; width: 175px; border-radius: 20px;'>";
                    $pimage = "<img src='assets/images/party/" . $row["pimage"] . "' style='height: 200px; width: 200px; border-radius: 20px;'>"; ?>
                    <td style="padding-top: 10px;; border: 2px solid black">
                        <center><?php echo $cimage ?></center>
                    </td>
                    <td style="padding-top: 10px;; border: 2px solid black; padding-left: 20px;">
                        <b>Name : </b> <?php echo $row["name"]; ?><br>
                        <b>Party : </b> <?php echo $row["party"] ?><br>
                        <b>Age : </b> <?php echo $row["age"] ?><br>
                        <b>Goals : </b> <?php echo $row["goals"] ?><br>
                    </td>
                    <td style="padding-top: 10px; border: 2px solid black"> <?php echo $pimage ?> </td>
                    <td style="border: 2px solid black">
                        <h1 style="color: red;">
                            <center><?php echo $row["votes"] ?></center>
                        </h1>
                    </td>
                </tr>
            <?php } ?>
        </table>
    <?php }
    echo '<SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
    </SCRIPT>
    <BODY onload="noBack();" 
    onpageshow="if (event.persisted) noBack();" onunload="">';
    include('includes/footer.php'); ?>
<?php } else {
    header("location: admin_login.php");
} ?>