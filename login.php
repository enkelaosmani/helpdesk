<?php
	include("config.php");
	session_start();
	
	$error="";
   
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$myusername = mysqli_real_escape_string($db,$_POST['username']);
		$mypassword = mysqli_real_escape_string($db,$_POST['password']);
	  
		$sql="SELECT id FROM users_table WHERE username='$myusername' and password='$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		$count=mysqli_num_rows($result);

      	if($count==1)
      	{
			$_SESSION['username']=$myusername;
			if($myusername=='Admin')
	  			header("Location: admin/admin.php");
			else
	  			header("Location: helpdesk.php");

			$query = "SELECT name, surname FROM users_table WHERE username = '$myusername'";
			$result = mysqli_query($db,$query);
			while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC) )
			{
				$name = $row['name'];
				$surname = $row['surname'];
			}

			$_SESSION['name'] = $name;
			$_SESSION['surname'] = $surname;
		}
      	else 
      	{
			$error="Wrong Password!";
      	}
   }
?>
<html>
<head>
<title>Help Desk</title>
<style type="text/css">
         body {
            font-family:Arial;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
		 form
		 {
		 	background-color:#538BD7;
			
		 }
		}
		.errori {
			font-family: Arial;
			color: #F00;
			font-size: 16px;
			text-align: center;
			width: 400px;
			margin-right: auto;
			margin-left: auto;
			height: 50px;
			padding-top: 5px;
		}
		#login{
		  width:400px;
		  margin:0 auto;
		  margin-top:8px;
		  margin-bottom:2%;
		  transition:opacity 1s;
		  -webkit-transition:opacity 1s;
		}

		#login h1{
		  background:#538BD7;
		  padding:20px 0;
		  font-size:140%;
		  font-weight:300;
		  text-align:center;
		  color:#fff;
		}

		input[type="username"],input[type="password"]{
		  width:120%;
		  background:#fff;
		  margin-bottom:4%;
		  margin-left:-10%;
		  border:1px solid #ccc;
		  padding:4%;
		  font-family:Arial;
		  font-size:95%;
		  color:#555;
		}
		.button {
			background-color:#538bd7;
			border: 2px solid #abc2e2;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 20px 5px;
			cursor: pointer;
			width:80%;
		}
      </style>
<style type="text/css">
<!--
.style11 {font-family: Arial;
	font-weight: bold;
	color: #2E358E;
	font-style: italic;
	font-size: 14px;
	text-align: left;
}
-->
   </style>
</head>
<body bgcolor="#FFFFFF">
<table width="100%" height="20%" align="center">
<tr><br><br><br></tr>
	<tr>
		<td width="532" align="center"><div align="center"> <br/>
				<span class="style11" style="font-size: 24px;">Help Desk</span></div></td>
	</tr>
	<tr>
		<td width="532" align="center"><div align="center"> <br/>
				<span class="style11" style="font-size: 24px;">Log in</span></div></td>
	</tr>
</table>
<br>
<div id="login">
	<form action="<?=$_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" style="margin:0 auto">
		<table style="margin:35 auto">
			<tr>
				<td><input name="username" type="username" id="username" placeholder="Username" /></td>
			</tr>
			<tr>
				<td><input name="password" type="password" id="password" placeholder="Password" /></td>
			</tr>
			<tr>
				<td><input name="submit" type="submit" class="button" value="Login" /></td>
			</tr>
		</table>
	</form>
	<?php echo "<div class='errori'>$error</div>" ?> </div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="posht">
</table>
</body>
</html>
