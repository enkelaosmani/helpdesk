<?php 
session_start();
$user = $_SESSION['username'];
include('config.php');
if(isset($user))
{
?>
<html>
<head>
<title>Help Desk</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <style>
.button {
    background-color:#538bd7;
    border: 2px solid #abc2e2;
    color: white;
    padding: 15px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 20px 5px;
    cursor: pointer;
    width: 150px;
}
</style>
<script>

	
</script>

<script>
$(window).load(function(e) {e.preventDefault();
        $("#display_div").load("showrequests_user.php");});
</script>
    
    <style>
        body 
		{
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
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
        .menuup
        {
			 position:absolute;
			 top:0;
			 right:0;
			 float: top;
			 width: 80%;
			 height: 20%;
			 background-color:  #538bd7;
         
        }
        .disp
        {
            position:absolute;
            bottom: 0;
            right: 0;
            width: 80%;
            height: 80% ;
            overflow-y: auto;
        }
    </style>
</head>
<body> 
    <div class="menuleft">
                
        <h1 style="font-size: 40px;color:white;font-family: Arial ">Help Desk</h1>
        <h1 style="font-size: 25px;color:white;font-family: Arial ">Requests</h1>
        <br>
        
        <a href="password.php" class="button">Change Password</a>
        <a href="logout.php" class="button">Logout</a>
        
    </div>
    <div class="menuup">
        
        <input type="button" class="button" name="newrequest" value="New Request" onClick=window.open("new_request.php","HelpDesk","width=800,height=400,left=150,top=200,toolbar=0,status=0,"); >
    </div>
    <div class="disp" id="display_div">
      
    </div>    
	</body>
</html>
<?php }

else 
header("location: index.php");
?>
