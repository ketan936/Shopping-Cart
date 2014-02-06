<?php

require("header.php");
require("config.php");
$verifystring = urldecode($_GET['verify']);
$verifyemail = urldecode($_GET['email']);
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

$sql = "SELECT id FROM user WHERE verifystring = '" . addslashes($verifystring) . "' AND email = '" . $verifyemail . "';";
$result = mysql_query($sql);
$numrows = mysql_num_rows($result);

if($numrows == 1) {
	$row = mysql_fetch_assoc($result);
	
	$sql = "UPDATE users SET active = 1 WHERE id = " . $row['id'];
	$result = mysql_query($sql);

	echo "Your account has now been verified. You can now <a href='login.php'>log in</a>";
}
else {
	echo "This account could not be verified.";
}


require("side_nav.php");
require("footer.php");

?>

