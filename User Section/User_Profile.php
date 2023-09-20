<?php
session_start();
include_once("Database_Connection.php");
if(!isset($_SESSION['User_ID']))
{
header("Location:index.php");
}
?>
<html>
<head>
<title>
User Profile Page
</title>
<?php include_once("Links.php");?>
<script type="text/javascript" src="Script_User_Profile.js">
</script>
<link type="text/css" rel="stylesheet" href="Style_User_Profile.css"/>
</head>
<body>
<form method="post">
<center>
<h3>
</br>
<?php
echo("Welcome To Mr : ".$_SESSION['User_Name']);
?>
</h3>
</center>
</br>
<div class="container">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<div id="update_user_message"></div>
</div>
<div class="col-md-2"></div>
</div>
<div id="search_user_message"></div>
</div>
</div>
</form>
</body>
</html>