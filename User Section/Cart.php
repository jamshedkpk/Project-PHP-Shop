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
Home Page
</title>
<?php include_once("Links.php");?>
<script type="text/javascript" src="Script_Cart.js">
</script>
<link type="text/css" rel="stylesheet" href="Style_Cart.css"/>
</head>
<body>
<form method="post" action='https://www.sandbox.paypal.com/cgi-bin/webscr'>
<div class='container'>
<div class='row'>
<div class='col-md-1'></div>
<div class='col-md-10'>
<div class='card'>
<div class='card-header bg-info text-light d-block text-center'>
Welcome To Your Cart Panel
</div>
<div class='card-body'>
<div class='row'>
<div class='col-md-1'></div>
<div class='col-md-10' id='msg'></div>
<div class='col-md-1'></div>
</div>
<div class='row'>
<div class='col-md-2 text-center'>Product Image</div>
<div class='col-md-2 text-center'>Product Name</div>
<div class='col-md-2 text-center'>Product Quantity</div>
<div class='col-md-2 text-center'>Product Price</div>
<div class='col-md-2 text-center'>Total Price</div>
<div class='col-md-2 text-center'>Action</div>
</div>
<hr>
<div id='message_cart_product'>

</div>
</div>
<div class='card-footer  bg-info text-light d-block text-center'>
&copy; All Rights Are Reserved By Govt
</div>
</div>
</div>
<div class='col-md-1'></div>
</div>
</div>
</form>
</body>
</html>