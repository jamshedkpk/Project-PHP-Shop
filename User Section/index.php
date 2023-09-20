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
<a class="navbar-brand" href="../Admin Section/Login.php">Khan Store</a>
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
<div class="dropdown">
<a id='cart_container' href="" data-toggle="dropdown" class="nav-link dropdown-toggle">
<span class="fa fa-shopping-cart"></span>
Cart
<span class="badge badge-info">
<div id='cart_amount'></div>
</span>
</a>
<div class="dropdown-menu">
<div class="card"  id='cart'>
<div class="card-header" style="background:#343A40;">
<div class="row text-center">
<div class="col-md-3">S.NO</div>
<div class="col-md-3">Image</div>
<div class="col-md-3">Name</div>
<div class="col-md-3">Price</div>
</div>
</div>
<hr style='background:white;'>
<div class='card_body'>
<div id='cart_product'>

</div>
</div>
</div>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="Cart.php">
<span class="fa fa-shopping-bag"></span>
My Product
</a>
</li>
<?php
if(isset($_SESSION["User_ID"]))
{
echo
("
<li class='nav-item'>
<a href='User_Profile.php' class='nav-link'>
<span class='fa fa-user-md'></span>
Profile
</a>
</li>
<li class='nav-item'>
<a href='User_Signout.php' class='nav-link' id='user_signout'>
<span class='fa fa-user'></span>
SignOut
</a>
</li>
");	
}
else
{
echo
("
<li class='nav-item'>
<a href='#' class='nav-link' data-toggle='modal' data-target='#modal_user_signin'>
<span class='fa fa-user-md'></span>
SignIn
</a>
</li>
<li class='nav-item'>
<a href='#' class='nav-link' data-toggle='modal' data-target='#modal_user_signup'>
<span class='fa fa-user'></span>
SignUp
</a>
</li>
");	
}
?>
</ul>
<ul class="navbar-nav navbar-right">
<li class="nav-item" style="width:300px; margin-top:10px; margin-left:10px;">
<input type="text" id='txt_search_product' name='txt_search_product' class="form-control form-control-sm"/>
</li> 
<li class="nav-item" style="margin-top:10px; margin-left:10px;">
<button type="button" id="btn_search_product" name="btn_search_product" class="btn btn-info btn-sm">Search Product</button>
</li> 
</ul>
</div> 
</nav>
<p>
<div class='container'>
<div class='row'>
<div class='col-md-12'>
<div id='message_cart_add'></div>
</div>
</div>
</div>
</p>
<div class="container-fluid">
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-2">
<ul class="nav nav-pills flex-column">
<li class='nav-item'>
<a  class='nav-link active'>
Categories
</a>
</li>
<div id="display_categories">
<!--Categories will be displayed from Action_Index.php page-->
</div>
</ul>
<ul class="nav nav-pills flex-column">
<li class="nav-item">
<a  class="nav-link active">Brands</a>
</li>
<div id='display_brands'>
</div>
</ul>
</div>
<div class="col-md-8">
<div class="card">
<div class="card-header">
Welcome To The Product Section
</div>
<div class='card-body'>
<div id='display_products'>

</div>
</div>
<div class='row'>
<div class='col-md-12'>
<ul class='pagination justify-content-center' id='page'>
</ul>
</div>
</div>
<div class="card-footer">
&copy; All Rights Are Reserved By Govt
</div>
</div>
</div>
<div class="col-md-1">
</div>
</div>
</div>
<div class="modal fade" id="modal_user_signin">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header d-block text-center">
Please Log In
<div class="close" data-dismiss="modal">&times;</div>
</div>
<div class="modal-body text-center">
<div id='user_signin_message'></div>
<div class="form-group">
<label for="user_email">
Email Address :
</label>
<input type="text" id="user_email" name="user_email" class="form-control form-control-sm"/>
</div>
<div class="form-group">
<label for="user_password">
Password :
</label>
<input type="password" id="user_password" name="user_password" class="form-control form-control-sm"/>
</div>
</br>
<button id="btn_user_signin" name="btn_user_signin" class="btn btn-primary btn-block">Sign In</button>
</div>
<div class="modal-footer d-block text-center">
&copy All Rights Are Reserved By Govt
</div>
</div>
</div>
</div>
<div class="modal fade" id="modal_user_signup">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header d-block text-center">
Welcome To The User Registration Form
<div class="close" data-dismiss="modal">&times;</div>
</div>
<div class="modal-body">
<div class="container">
<div class="row">
<div class="col-md-12">
<div id='user_signup_message' class="text-center">
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 text-center">
<div class="form-group">
<label for="txt_user_name">Name :</label>
<input type="text" id="txt_user_name" name="txt_user_name" class="form-control form-control-sm"/>
</div>
</div>
<div class="col-md-6 text-center">
<div class="form-group">
<label for="txt_user_email">Email :</label>
<input type="text" id="txt_user_email" name="txt_user_email" class="form-control form-control-sm"/>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 text-center">
<div class="form-group">
<label for="txt_user_password">Password:</label>
<input type="password" id="txt_user_password" name="txt_user_password" class="form-control form-control-sm"/>
</div>
</div>
<div class="col-md-6 text-center">
<div class="form-group">
<label for="txt_user_confirm_password">Confirm :</label>
<input type="password" id="txt_user_confirm_password" name="txt_user_confirm_password" class="form-control form-control-sm"/>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6 text-center">
<label for="txt_user_mobile">Mobile :</label>
<input type="text" id="txt_user_mobile" name="txt_user_mobile" class="form-control form-control-sm"/>
</div>
<div class="col-md-6 text-center">
<label for="txt_user_address">Address :</label>
<input type="text" id="txt_user_address" name="txt_user_address" class="form-control form-control-sm"/>
</div>
</div>
</br>
<div class="row">
<div class="col-md-6 text-center">
<button id="btn_user_signup" name="btn_user_signup" style="margin-bottom:10px;" class="btn btn-primary btn-block">Register</button>
</div>
<div class="col-md-6 text-center">
<button href="http://localhost/Khan%20Store/User%20Section/"  style="" class="btn btn-primary btn-block">Homepage</button>
</div>
</div>
</div>
</div>
<div class="modal-footer d-block text-center">
&copy; All Rights Are Reserved By Govt
</div>
</div>
</div>
</div>
<div id="msg"></div>
</form>
</body>
</html>