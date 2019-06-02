<html>
<head>
	<style>
		.requestTable
		{
			width:100%;
		}
		.requestTable tr:nth-child(odd)
		{
			background:#efecec;
		}
	</style>
</head>
<body>
<?php
session_start();
require 'config.php';

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];

$nameA = array($name, $surname);
$fullname = implode(' ',$nameA);

if(!$db)
    {
        die('Could not connect:'.mysqli_connect_error());
    }
    $sql = "SELECT * FROM requests_table WHERE request_by = '$fullname' ORDER BY date_recieved DESC";
    $result = mysqli_query($db, $sql);
    if(!$result)
    {
        die('Could not enter data:'.mysqli_connect_error());
    }
   
    echo '<table class="requestTable">
			<thead>
			<tr style="background-color:#bbb">
			<th>Request</th>
			<th>Request by</th>
			<th>Priority</th>
			<th>Date Recieved</th>
			<th>Status</th>
			</tr>
			</thead>
			<tbody>';
    while ($row=mysqli_fetch_assoc($result))
    {
     if (is_null($row["rid"]))
     {
         
         echo 'There are no requests';
     }
    
	 else 
	 {
		$rid=$row["rid"];
		echo "<tr ".'onClick=window.open("detail.php?rid='."$rid".'","Helpdesk","width=800,height=400,left=150,top=200,toolbar=0,status=0,");'."> <td ".'style="border-right:1px solid grey;"'.">" . $row['request'] . "</td><td ".'style="border-right:1px solid grey;"'.">" . $row['request_by'] . "</td><td ".'style="border-right:1px solid grey;"'.">" . $row['priority'] . "</td><td ".'style="border-right:1px solid grey;"'.">". $row['date_recieved'] . "</td><td>". $row['status'] . "</td> </tr>"; 
	 }

 
	}
 echo "</tbody></table>";
?>
	</body>
</html>
