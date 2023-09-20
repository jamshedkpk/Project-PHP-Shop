<?php
include_once("Database_Connection.php");
session_start();
if(!isset($_SESSION["Admin_ID"]))
{
header("Location:Login.php");	
}
else
{
$Adminid=$_SESSION['Admin_ID'];
$query=("select * from Admin_detail where Admin_ID='$Adminid' ");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$id=$result["Admin_ID"];
$name=$result["Admin_Name"];
$email=$result["Admin_Email"];
$type=$result["Admin_Type"];
$status=$result["Admin_Type"];
include_once("Header.php");
}
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript"  src="Bootstrap/js/JQuery.js"></script>
<script type="text/javascript"  src="Script_Edit_Profile.js"></script>
<script type="text/javascript"  src="Bootstrap/js/bootstrap.js" ></script>
<link type="text/css" rel="stylesheet" href="Bootstrap/Css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="Bootstrap/Fontawesome/css/Fontawesome-all.min.css">
<link type="text/css" rel="stylesheet" href="Style_Profile.css">
<title>Login Page</title>
</head>
<body>
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading">
Welcome Mr : <?php echo($_SESSION['Admin_Name']); ?>
</div>
<!--Start of panel body-->
<div class="panel-body">
<div id="message">
</div>
<form method="post" action="" id="edit_profile_form">
<div class="form-group">
<label class="label-control" for="Admin_name">
Name :
</label>
<input type="text" id="Admin_name" name="Admin_name" value="<?php echo($name);?>" class="form-control"></input>
<span id="error_name"></span>
</div>
<div class="form-group">
<label class="label-control" for="Admin_email">
Email :
</label>
<input type="text" id="Admin_email" name="Admin_email" value="<?php echo($email);?>" class="form-control"></input>
<span id="error_email"></span>
</div>
</hr>
<div class="form-group">
<label class="label-control" for="Admin_new_password">
New Password :
</label>
<input type="password" id="Admin_new_password" name="Admin_new_password" class="form-control"></input>
</div>
<div class="form-group">
<label class="label-control" for="Admin_re_enter_password">
Confirm Password :
</label>
<input type="password" id="Admin_re_enter_password" name="Admin_re_enter_password"  class="form-control"></input>
</div>
<span id="error_password"></span>
<div class="form-group">
<button type="button" class="btn btn-info" id="btn_edit_profile" name="btn_edit_profile">
<span class='fa fa-edit'></span>
Update Record
</button>
</div>
</form>
</div>
<!--End of panel body-->
<div class="panel-footer">&copy; All Rights Are Reserved</div>
</div>
</div>
</body>
</html>
