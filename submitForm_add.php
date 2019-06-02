<?php
session_start();
$user = $_SESSION['username'];
include 'config.php';

if( $_POST['request']==NULL ) { $request=''; } else { $request=$_POST['request']; }
if( $_POST['request_by']==NULL ) { $request_by=''; } else { $request_by=$_POST['request_by']; }
if( $_POST['priority']==NULL ) { $priority=''; } else { $priority=$_POST['priority']; }
$date_requested = date('Y-m-d G:i:s');

$query="INSERT INTO requests_table VALUES (NULL, '$request', '$request_by', '$priority', '$date_requested', '', '', NULL, 'Open')";

try
{
	if (!mysqli_query($db, $query)) 
	{
		echo("Error description: " . mysqli_error($db) . $query);
		exit();
	}
	else
	{
		include 'email_recieve.php';
		$values = array($request, $request_by, $priority, $date_requested);

		sendMail($values);

		$db->close();

		echo "<script>window.close();</script>";
	}
}
catch(Exception $e)
{
	echo 'Caught exception: ',  $e->getMessage();
}

?>