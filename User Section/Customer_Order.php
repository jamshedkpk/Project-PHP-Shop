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
<div class='card-header d-block text-center'>
<h4>Customer Order Detail</h4>
</div>
<div class='card-body'>
<div class='row'>
<div class='col-md-4'>
<img src='Images/alexandru-zdrobau-98438-unsplash.gif' height='150px' width='200px' class='img-thumbnail float-left'/>
</div>
<div class='col-md-8'>
<table class='table'>
<tr>
<td>
Product Name:
</td>
<td>
<b>Mix Cream</b>
</td>
</tr>
<tr>
<td>
Product Quantity:
</td>
<td>
<b>3</b>
</td>
</tr>
<tr>
<td>
Product Price:
</td>
<td>
<b>1200</b>
</td>
</tr>
<tr>
<td>
Payment
</td>
<td>
<b>Completed</b>
</td>
</tr>
<tr>
<td>
Transaction ID
</td>
<td>
<b>Bw3-33322-33454</b>
</td>
</tr>
</table>
</div>
</div>
</div>
<div class='card-footer'></div>
</div>
</div>
<div class='col-md-2'></div>
</div>
</form>
</body>
</html>