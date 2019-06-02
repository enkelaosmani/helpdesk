<?php
include 'config.php';
session_start();
$user = $_SESSION['username'];
if(isset($user))
{
?>

<html>
<head>
<title>Help Desk</title>
    <style>
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
    width: 150px;
}
</style>
<script>
function validatePassword()
	 { 
		 var newPassword = document.getElementsByName("newPassword")[0];
		 var errorP = document.getElementsByName("errorParagraph")[0];
		 var txtcpass = document.getElementsByName("currentPassword")[0].value;
		 var txtnewpass = document.getElementsByName("newPassword")[0].value;
		 var txtnewcpass = document.getElementsByName("confirmPassword")[0].value;
	     
		 var status = 1;
		 if (txtcpass.length==0 || txtnewpass.length==0 || txtnewcpass.length==0)
		 {
		    errorP.innerHTML='One of the fields is empty!';
			return false;
		 }
		 if(txtnewpass!=txtnewcpass)
		 {
		 	 txtcpass='';
			 txtnewcpass='';
			 txtnewpass='';
			 newPassword.focus();
			 errorP.innerHTML='New Password must match Confirm Password';
			 
			 return false;
		 }
		 if (txtnewpass.length < 8) 
		 {
			 status = 0;
		 }
	
		 if ( !(( txtnewpass.match(/[a-z]/) ) && ( txtnewpass.match(/[A-Z]/) ) )) 
			 status = 0;
	
		 if (!txtnewpass.match(/\d+/)) 
			 status = 0;
	
		 if (!txtnewpass.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) 
			 status = 0;
		 
		if (status==0)
		{
			errorP.innerHTML='New Password must contain at least an uppercase, a lowercase, a special character and a number.';
			return false;
		}
		else 
		{
			return true;
		}
	 }
	
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
        <h1 style="font-size: 25px;color:white;font-family: Arial ">Change Password</h1>
        <br>
        <?php if($user=='Admin'){?>
        <input type="button" class="button" name="new_user" value="New User" onClick=window.open("admin/new_user.php","Helpdesk","width=800,height=600,left=150,top=200,toolbar=0,status=0,"); >
        <?php } ?>
        <a href="password.php" class="button">Change Password</a>
        <a href="logout.php" class="button">Logout</a>
        
    </div>
    <div class="menuup">
        <?php if($user!='Admin') { ?>
        <input type="button" class="button" name="newrequest" value="New Request" onClick=window.open("new_request.php","Ratting","width=800,height=600,left=150,top=200,toolbar=0,status=0,"); >
        
        <a href="helpdesk.php" class="button">Requests</a>
        
		<?php }?>
        
        <?php if($user=='Admin') { ?>
        <a href="admin/admin.php" class="button">Requests</a>
        <a href="admin/users.php" class="button">Users</a>
		<?php }?>
    </div>
    <div class="disp" id="display_div">
		<form name="frmChange" method="post" action="validatepassword.php" onSubmit="return validatePassword()" style="width:100%; margin-top:80px;">
			<div style="width:500px; margin:auto">
				<div class="message">
					<?php if(isset($message)) { echo $message; } ?>
				</div>
				<table style="text-align:right;" border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
					<tr class="tableheader" >
						<td colspan="2" style="text-align:center; font-size:24px; padding-bottom:50px;">Change Password</td>
					</tr>
					<tr>
						<td width="40%"><label>Current Password</label></td>
						<td width="40%"><input type="password" name="currentPassword" class="txtField"/>
							<span id="currentPassword"  class="required"></span></td>
					</tr>
					<tr>
						<td><label>New Password</label></td>
						<td><input type="password" name="newPassword" class="txtField"/>
							<span id="newPassword" class="required"></span></td>
					</tr>
					<td><label>Confirm Password</label></td>
						<td><input type="password" name="confirmPassword" class="txtField"/>
							<span id="confirmPassword" class="required"></span></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Submit" style="height:50px"></td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:center"><b style="color:red;" name="errorParagraph">
							</b></td>
					</tr>
				</table>
			</div>
		</form>
    </div>
</body>
</html>
<?php }
else 
header("location: index.php");
?>
