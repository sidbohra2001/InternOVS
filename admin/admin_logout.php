<?php
echo '<SCRIPT type="text/javascript">
window.history.forward();
function noBack() { window.history.forward(); }
</SCRIPT>
<BODY onload="noBack();" 
onpageshow="if (event.persisted) noBack();" onunload="">';
session_start();
unset($_SESSION['admin_is_logged_in']);
session_destroy(); 
header("Location: admin_login.php"); 
?> 