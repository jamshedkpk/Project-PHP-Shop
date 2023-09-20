<?php
session_start();
if(!isset($_SESSION['Admin_Name']))
{
header("Location:Login.php");
}
else
{
include_once("Header.php");
}
?>
<html>
<head>
</head>
<body>
<div class='container'>
<div class='row'>
<p style='font-size:25px; font-family:calibri; text-align:center; font-style:italic;'>Welcome To My Site</p>
</div>
<div class='col-md-6' style='font-size:20px; font-family:calibri; text-align:justify; font-style:italic; text-transform:capitalize;'>
This website is specially designed for inventary management system just for practice purpose. Here admin is allowed to search,add,
update and delete Admins, categories, brands, products and orders. 
Admins are allowed to place only orders of customers.
When ever customer wants to buy something then its record should be placed in orders.
</div>
<div class='col-md-6 text-right'>
<img src='Bootstrap\Images\Business.JPG' height='200px' width='400px' style='border-radius:10px; margin-bottom:20px;' class='img_responsive'/>
</div>
</div>
<?php
include_once("Footer.php");
?>
</body>
</html>