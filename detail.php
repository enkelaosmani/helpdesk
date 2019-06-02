<html>
    <head>
       <title>Request Details</title>
        <style>
        textarea 
		{
			overflow-y: scroll;
			height: 100px;
			width: 90%;
			resize: none; 
		}
        body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;

            }
        .menuleft
        {
            position:absolute;
            top: 0;
            left: 0;
         	width: 20% ;
         	float: left;
         	height: 100%;
         	z-index: 1;
         	background-color: #538bd7;
        }
       
        .cont
        {
            position:absolute;
            bottom: 0;
            right: 0;
            width: 80%;
            height: 100% ;
            overflow-y: auto;
            margin-right: -10px;
        }
			
        .button 
		{
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
			width: 150px;
		}
    </style>
    </head>
    <body>
        
<?php
require 'config.php';
session_start();

$user = $_SESSION["username"];
$rid = $_GET["rid"];

if(!$db)
    {
        die('Could not connect:'.mysqli_connect_error());
    }
    $sql = "SELECT request, request_by, priority, date_recieved, solved, date_solved, status FROM requests_table r WHERE rid = $rid";
    $result=  mysqli_query($db, $sql);
   
    if(!$result)
    {
        die('Could not verify user:'.mysqli_connect_error());
    }
     while ($row=mysqli_fetch_assoc($result))
     {
       $request = $row["request"];
       $request_by = $row["request_by"];
       $priority = $row["priority"];
       $date_recieved = $row["date_recieved"];
       $solved = $row["solved"];
       $date_solved = $row["date_solved"];
       $status = $row["status"];
     }

?>
   <div class="menuleft">
        <h1 style="font-size: 40px;color:white;font-family: Arial ">Help Desk</h1>
        <br>
    </div>
    <div class="cont">
    <h1 style="font-size: 25px;color:#538bd7;font-family: Arial ">Request</h1>

<form>
<input type='hidden' name='rid' id='rid' value="<?php echo $rid; ?>"/>
<b>Request by:</b> <?php echo $request_by;?><br><br>
<b>Date recieved:</b> <?php echo $date_recieved;?><br><br>
<b>Description:</b> <br><textarea name="description" readonly><?php echo $request; ?></textarea><br><br>
<b>Priority:</b> <?php echo $priority;?></textarea><br><br>
<b>Response:</b> <br><textarea name="solved" readonly><?php echo $solved; ?></textarea><br><br>
<b>Date solved:</b> <?php echo $date_solved; ?><br><br>
<b>Status:</b> <?php echo $status; ?><br><br>

<input type="button" class="button" name="Close" value="Close" onClick="return window.close();">
</form>

    </div>
    </body>
</html>
