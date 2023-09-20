<?php
if(!isset($_SESSION['Admin_Name']))
{
header("Location:Login.php");
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="Bootstrap/Css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="Bootstrap/Fontawesome/css/Fontawesome-all.min.css">
<link type="text/css" rel="stylesheet" href="Style_Header.css">
<script type="text/javascript"  src="Bootstrap/js/JQuery.js"></script>
<script type="text/javascript"  src="Bootstrap/js/bootstrap.js" ></script>
<title>Login Page</title>
<style>
</style>
</head>
<body>
</br>
<div class='container'>
<h3 class='text-center' style='color:#5BC0DE; font-weight:700;'>Online Shopping Center</h3>
<nav class='navbar navbar-inverse'>
<div class='navbar-header'>
<button class='navbar-toggle' data-target='#menu' data-toggle='collapse'>
<span class='fa fa-bars'></span>
</button>
</div>
<div class='collapse navbar-collapse' id='menu'>
<ul class='nav navbar-nav'>
<li>
<a href='../User Section/index.php'>Home</a>
</li>
<?php
if(($_SESSION['Admin_Type'])=='Master')
{ ?>
<li>
<a href="Admin.php">Admin</a>
</li>
<li>
<a href="Category.php">Category</a>
</li>
<li>
<a href="Brand.php">Brands</a>
</li>
<li>
<a href="Product.php">Products</a>
</li>
<?php }
?>
<li>
<a href='Edit_Profile.php'>Profile</a>
</li>
<li>
<a href='Logout.php'>Log Out</a>
</li>
</ul>
</div>
</nav>
</div>
</body>
</html>