<?php
echo '<SCRIPT type="text/javascript">
window.history.forward();
function noBack() { window.history.forward(); }
</SCRIPT>
<BODY onload="noBack();" 
onpageshow="if (event.persisted) noBack();" onunload="">';
include('includes/header.php');
$server = "localhost";
$username = "root";
$pass = "";
$db = "miniproject";
$con = mysqli_connect($server, $username, $pass, $db);
if (!$con) {
    die("Connection to the database failed due to : " . mysqli_connect_error());
}
$token = "DELETE FROM token WHERE voterid = '" . $_SESSION['user_data']['vid'] . "'";
$rtoken = mysqli_query($con, $token);
session_start();
unset($_SESSION['user_is_logged_in']);
session_destroy(); 
header("Location: welcomepage.php"); 
?> 