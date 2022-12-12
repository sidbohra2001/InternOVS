<?php

include("includes/header.php");
$server = "localhost";
$username = "root";
$pass = "";
$db = "miniproject";
$con = mysqli_connect($server, $username, $pass, $db);
if (!$con) {
    die("Connection to the database failed due to : " . mysqli_connect_error());
}
if (isset($_SESSION['user_data']['vid'])) {
    $check = "SELECT flag FROM state1 WHERE voterid = '" . $_SESSION['user_data']['vid'] . "'";
    $checkf = mysqli_fetch_assoc(mysqli_query($con, $check));
    $flag = $checkf['flag'];
    if ($flag == 0) {
        $voterid = $_SESSION['user_data']['vid'];
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
                    <h3 style="color: red;"><br><br>
                        <center>Choose your representative carefully !!! Once you press <strong>VOTE</strong> button your vote will be made and it won't be undone and you will be logged out.</center>
                    </h3>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($r)) { ?>
                    <tr>
                        <?php $cimage = "<img src='assets/images/candidates/" . $row["cimage"] . "' style='height: 200px; width: 175px; border-radius: 20px;'>";
                        $pimage = "<img src='assets/images/party/" . $row["pimage"] . "' style='height: 200px; width: 200px; border-radius: 20px;'>"; ?>
                        <td style="padding-top: 10px; padding-left: 30px;">
                            <center><?php echo $cimage ?></center>
                        </td>
                        <td style="padding-top: 10px; padding-left: 30px;">
                            <b>Name : </b> <?php echo $row["name"]; ?><br>
                            <b>Party : </b> <?php echo $row["party"] ?><br>
                            <b>Age : </b> <?php echo $row["age"] ?><br>
                            <b>Goals : </b> <?php echo $row["goals"] ?><br>
                        </td>
                        <td style="padding-top: 10px; padding-left: 30px;"> <?php echo $pimage ?> </td>
                        <td style="padding-left: 50px;"><a class="btn btn-primary" href="thankyou.php?cname=<?php echo $row['name'] ?>"><strong>VOTE</strong></a></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <center>
                <h2>No voting going on currently</h2>
            </center>
        <?php } ?>
    <?php } else { ?>
         <center>
        <br><br><br><h2>You have already given vote</h2>
    </center>
    <?php } ?>
<?php } else { ?>
    <center>
        <br><br><br><h1>You do not have the permission to access this page !!!</h1>
    </center>
    <center>
        <h2>You haven't logged in</h2>
    </center>
    <center>
        <h2>If you think its a mistake, contact Administrator.</h2>
    </center>
<?php } ?>
<?php
echo '<SCRIPT type="text/javascript">
window.history.forward();
function noBack() { window.history.forward(); }
</SCRIPT>
<BODY onload="noBack();" 
onpageshow="if (event.persisted) noBack();" onunload="">';
include("includes/footer.php")
?>