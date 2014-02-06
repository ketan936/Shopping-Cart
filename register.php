<?php
session_start();

require("config.php");

$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);
$randomstring=' ';
if(isset($_POST['submit'])) {
	if($_POST['password1'] == $_POST['password2']) {
		$checksql = "SELECT * FROM user WHERE username = '" . $_POST['username'] . "';";
		$checkresult = mysql_query($checksql);
		$checknumrows = mysql_num_rows($checkresult);
		
		if($checknumrows == 1) {
			header("Location: " . $config_basedir . "/register.php?error=taken");	
		}
		else {
			for($i = 0; $i < 16; $i++) {
				$randomstring .= chr(mt_rand(32,126));
			}

			
			$verifystring = urlencode($randomstring);
			$verifyemail = urlencode($_POST['email']);
			$validusername = $_POST['username'];

			$sql = "INSERT INTO user(username, password, email, verifystring, active) VALUES('"
				. $_POST['username']
				. "', '" . $_POST['password1']
				. "', '" . $_POST['email']
				. "', '" . addslashes($randomstring)
				. "', 0);";
			
			mysql_query($sql);
												
$mail_body=<<<_MAIL_

Hi $validusername,

Please click on the following link to verify you new account:

$verifyurl?email=$verifyemail&verify=$verifystring

_MAIL_;

	$mail->Body    = $mail_body;
	$mail->AddAddress($_POST['email'],$_POST['username']);	
	if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message has been sent";
}		

			require("header.php");
			echo "A link has been emailed to the address you entered below. Please follow the link in the email to validate your account."; 			
		}
	}
	else {
		header("Location: " . $config_basedir . "/register.php?error=pass");
	}
}
else {
	require("header.php");
	if (isset($_GET['error'])){
	switch($_GET['error']) {
		case "pass":
			echo "Passwords do not match!";
		break;

		case "taken":
			echo "Username taken, please use another.";
		break;

		case "no":
			echo "Incorrect login details!";
		break;

	}}
?>
<h2>Register</h2>
	To register on the forums, fill in the form below.
	<form action="<?php echo basename(__FILE__); ?>" method="POST">


	<table >
	<tr>
		<td>Username</td>
		<td><input type="text" name="username"></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input type="password" name="password1"></td>
	</tr>
	<tr>
		<td>Password (again)</td>
		<td><input type="password" name="password2"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Register!"></td>
	</tr>
	</table>
	</form>



    





<?php 
}
require("side_nav.php");
require("footer.php");
?>