<?php
session_start();
include_once("Database_Connection.php");
?>
<html>
<head>
<title>
Home Page
</title>
<?php include_once("Links.php");?>
<script type="text/javascript" src="Script_Index.js">
</script>
<script type="text/javascript" src="Script_Cart.js">
</script>
<link type="text/css" rel="stylesheet" href="Style_Index.css"/>
</head>
<body>
<form method="post">
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
<a class="navbar-brand" href="http://localhost/Khan%20Store/Admin%20Section/Login.php">Khan Store</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
<span class="fa fa-bars"></span>
</button>
<div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="index.php">
<span class="fa fa-home"></span>
Home
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="index.php">
<span class="fa fa-shopping-bag"></span>
Product
</a>
</li>
</ul>
</div>
</nav>
</br>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8'>
<div class='card'>
<div class='card-header'>
</div>
<div class='card-body'>
<h2>Thank You</h2>
<p style='text-align:justify;'>
Hello! <?php echo($_SESSION['User_Name']);?>
You Have Successfully Completed Your Payment And
Your Transaction ID Is = xxxx-xxxx-xxxx
You Can Continue Your Shopping
</p>
<button class='btn btn-success'>
Continue Shopping
</button>
</div>
<div class='card-footer'></div>
</div>
</div>
<div class='col-md-2'></div>
</div>
</form>
</body>
</html>