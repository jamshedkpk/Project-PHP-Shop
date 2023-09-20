<?php
session_start();
include_once("Database_Connection.php");
if(isset($_POST['login']))
{
$message='';
$Adminemail=trim($_POST['Admin_email']);
$Adminpassword=trim($_POST['Admin_password']);
$query=("select * from Admin_detail where Admin_Email=:email");
$statement=$connect->prepare($query);
$statement->execute(array(':email'=>$Adminemail));
$count=$statement->rowCount();
if($count>0)
{	
$result=$statement->fetchAll();
foreach($result as $row)
{
$password=$row['Admin_Password'];
if(password_verify($Adminpassword,$password))
{
$_SESSION['Admin_ID']=$row['Admin_ID'];
$_SESSION['Admin_Name']=$row['Admin_Name'];
$_SESSION['Admin_Type']=$row['Admin_Type'];
header("Location:Index.php");	
}
else
{
$message=
'<div class="alert alert-warning" style="background-color:orange;color:white;text-align:center">
<div  class="close" data-dismiss="alert">&times;</div> 
<strong>
Invalid Password Is Entered Please Enter Your Correct Password
</strong>
</div>';
}	
}
}
else
{
$message=
'<div class="alert alert-warning" style="background-color:orange;color:white;text-align:center">
<div  class="close" data-dismiss="alert">&times;</div> 
<strong>
You Are Not Registered Please Register Yourself From Admin
</strong>
</div>';
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="Bootstrap/Css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="Bootstrap/Fontawesome/css/Fontawesome-all.min.css">
<link type="text/css" rel="stylesheet" href="Style_Login.css">
<script type="text/javascript"  src="Bootstrap/js/jquery.js"></script>
<script type="text/javascript"  src="Bootstrap/js/bootstrap.js" ></script>
<title>Login Page</title>
<style>
</style>
</head>
<body>
<div class='container'>
<h3 class='text-center'>Welcome To Online Shopping Center</h3>
<div class='panel panel-primary'>
<div class='panel-heading'>
Please Login
</div>
<div class='panel-body'>
<?php
if(isset($message))
{
echo($message);
}
?>
<form method='post'>
<div class='form-group'>
<label class='label-control'>
Admin Email :
</label>
<input type='text' name='Admin_email' class='form-control' required='true'>
</div>
<div class='form-group'>
<label class='label-control'>
Admin Password :
</label>
<input type='password' name='Admin_password' class='form-control' required='true'>
</div>
<div class='form-group'>
<button type='submit' name='login' value='login' class='btn btn-info'>Login</button>
</div>
</form>
</div>
<div class='panel-footer'>
<center>&copy; All Rights Are Reserved</center>
</div>
</div>
</div>
</body>
</html>