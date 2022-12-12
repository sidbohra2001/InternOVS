<?php
session_start();
if(isset($_SESSION['user_data']['vid']) && isset($_GET['cname'])){
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "miniproject";
    $con = mysqli_connect($server, $username, $pass, $db);
    if (!$con) {
        die("Connection to the database failed due to : " . mysqli_connect_error());
    }
    $q1 = "UPDATE state1 SET flag='1' WHERE voterid = '".$_SESSION['user_data']['vid']."'";
    $r1 = mysqli_query($con, $q1);
    $q3 = "SELECT * FROM candidates WHERE name = '".$_GET['cname']."'";
    $r3 = mysqli_query($con, $q3);
    $row = mysqli_fetch_assoc($r3);
    $vote = $row["votes"];
    $vote = $vote + 1;
    $q2 = "UPDATE candidates SET votes='".$vote."' WHERE name = '".$_GET['cname']."'";
    $r2 = mysqli_query($con, $q2);
    $token = "DELETE FROM token WHERE voterid = '" . $_SESSION['user_data']['vid'] . "'";
    $rtoken = mysqli_query($con, $token);
    unset($_SESSION['user_is_logged_in']);
    session_destroy();
    include('includes/header.php');
    echo '<center><h1><br><br>Thank You For Casting Your Precious Vote !!!<br></h1></center>
    <table style="margin-top: 2rem; margin-left: auto; margin-right: auto; margin-bottom: 2rem;">
        <tr>
            <td bgcolor="#3c69b5"><img src="assets/images/thanks.jpg" style="width: 500px;"></td>
            <td style="padding-left:2rem;"><img src="assets/images/voted.jpg" style="width: 500px;"></td>
        </tr>
    </table>';
    echo "<center><h2>You are logged out of your current session !!!</h2></center>";
    echo "<center><h4><a href='login.php'>Click Here</a> to Login again.</h4></center>";
    echo "<center><h4><a href='welcomepage.php'>Click Here</a> to goto Online Voting System Homepage.</h4></center>";
    echo '<SCRIPT type="text/javascript">
    window.history.forward();
    function noBack() { window.history.forward(); }
    </SCRIPT>
    <BODY onload="noBack();" 
    onpageshow="if (event.persisted) noBack();" onunload="">';
    include('includes/footer.php');
}
else {
    header("location: login.php");
}
