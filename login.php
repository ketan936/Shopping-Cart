<?php

session_start();

require("config.php");

require("header.php");
$error=0;

if(isset($_POST['submit'])) {
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

$sql = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "' AND password = '" . $_POST['password'] . "';";
	
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);
		
	if($numrows == 1) {
	
	
		$row = mysql_fetch_assoc($result);
		
		
		$_SESSION['USERNAME'] = $row['username'];
		$_SESSION['USERID'] = $row['id'];
		
		header("Location: " . $config_basedir);
	}
	 else {
		$error=1;
	} 
}
	

	
	
	
		if($error==1){
		echo '<font color="#FF0000">Incorrect login, please try again!</font>';
		}
	
 $ss = basename(__FILE__);
?>


<form action="<?php   echo $ss?>" method="post">

<table>
<tr>
	<td>Username</td>
	<td><input type="text" name="username"></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="password"></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Login!"></td>
</tr>
</table>
</form>

<?php

require("side_nav.php");
require("footer.php");

?>