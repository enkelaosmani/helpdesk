<html>
<?php
	session_start();
	$user = $_SESSION['username'];
	
	require('config.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$passwordquery = "SELECT password FROM users_table WHERE username='$user'";
		$password = mysqli_query($db,$passwordquery);
		$row = mysqli_fetch_array($password,MYSQLI_ASSOC);
		$password = $row['password'];

		$newpassword = $_POST['newPassword'];
		$cpassword = $_POST['currentPassword'];

		if($cpassword!=$password)
		{
			header("location: password.php");
			exit;
		}
		else 
		{
			$updatepass="UPDATE users_table SET password = '".$newpassword."' WHERE username = '".$user."'";
			mysqli_query($db,$updatepass);
			header("location: helpdesk.php");
			exit;
		}
	}
	?>
</html>