<?php

require_once('include.php');

$error = '';

$form = $_POST['submit'];

$email = $_POST['mail'];

$password = $_POST['password'];

if( isset($form) ) {

if( isset($email) && isset($password) && $email !== '' && $password !== '' ) {


$sql = mysql_query("SELECT * FROM `regis_user` WHERE mail='$email' and
password='$password';");

if( mysql_num_rows($sql) != 0 ) { //success

$_SESSION['logged-in'] = true;

header('Location: marks.php');

exit;

} else { $error = "Incorrect login info"; }

} else { $error = 'All information is not filled out correctly';}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Login</title>

</head>

<body>

<form action="" method="post" >

Email<br />

<input name="mail" type="text" value="<?php echo "$email";?>" /><br /><br />

Password<br />

<input name="password" type="password" /><br />

<input name="submit" type="submit" value="Log In" />

</form>

<?php

echo "<br /><span style=\"color:red\">$error</span>";

?>

</body>

</html> 