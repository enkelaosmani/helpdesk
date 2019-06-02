<?php
include 'config.php';
session_start();
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
$nameArray = array($name, $surname);
$fullname = implode(" ", $nameArray);
?>
  
 <html>
    <head>
        <style>
        body 
		{
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;

		}
        textarea 
		{
			overflow-y: scroll;
			height: 100px;
			width: 90%;
			resize: none; 
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
    <div class="menuleft">     
        <h1 style="font-size: 40px;color:white;font-family: Arial ">Help Desk</h1>
        <br>
    </div>
    <div class="cont">
    <h1 style="font-size: 25px;color:#538bd7;font-family: Arial ">Add New Request</h1>

<form action='submitForm_add.php' method='post' >
<input type='hidden' name='rid' id='rid' value="<?php echo $rid; ?>"/>
<b>Request:</b> <br><textarea name="request" id="request"></textarea><br><br>
<b>Request by:</b> <input type="text" name="request_by" id="request_by" value="<?php echo $fullname;?>" readonly/><br><br>
<b>Priority:</b><select name="priority" id="priority">
					<option>High</option>
					<option>Medium</option>
					<option>Low</option>
				</select><br>
<input type="submit" class="button" name="submit" value="Submit">
</form>

    </div>
    </body>
</html>
