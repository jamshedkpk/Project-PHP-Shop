<?php
session_start();
if(!isset($_SESSION['Admin_Name']))
{
header("Location:Login.php");
}
if($_SESSION['Admin_Type']!='Master')
{
header("Location:Index.php");
}
include("Header.php");
include("Database_Connection.php")
?>
<html>
<head>
<style>
</style>
<script type="text/javascript" src="Script_Product.js"></script>
<link type="text/css" rel="stylesheet" href="Style_Product.css">
<title>Category Page</title>
</head>
<body>
<!--Start of container-->
<div class='container'>
<div id='message_delete_product'></div>
</div>
<!--End of container-->
<!--Start of container-->
<div class='container'>
<div class='row'>
<div class='col-md-12 text-right'>
<button type='button' id='btn_add' name='btn_add' class='btn btn-info' style='margin-bottom:10px;' data-toggle='modal' data-target='#modal-add-product'>
Add New Product
</button>
</div>
</div>
</div>
<!--End of container-->
<!--Start of container-->
<div class='container'>
<table class='table table-striped table-bordered'>
<thead>
<tr>
<th>
P-ID
</th>
<th>
Name
</th>
<th>
Price
</th>
<th>
Quantity
</th>
<th>
Category
</th>
<th>
Brand
</th>
<th>
Image
</th>
<th colspan='2'>
Action
</th>
</tr>
</thead>
<tbody id='message_search_product'>
</tbody>
</table>
</div>
<!--End of container-->
<!--Start of container-->
<div class='container'>
<div class='modal fade' id='modal-add-product'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header' style='text-align:center; font-size:18px;'>
<div class='close' data-dismiss='modal'>&times;</div>
Welcome To The Product Panel
</div>
<div class='modal-body'>
<form method='post' class='form_product_add'>
<div id="message_add_product"></div>
<div class='row'>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label class='label-control'>Product Name</label>
<input type='text' name='txt_add_product_name' id='txt_add_product_name' class='form-control'/>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label class='label-control'>Product Price</label>
<input type='text' name='txt_add_product_price' id='txt_add_product_price' class='form-control'>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label class='label-control'>Product Quantity</label>
<input type='text' name='txt_add_product_quantity' id='txt_add_product_quantity' class='form-control'>
</div>
</div>
</div>
<div class='row'>
<div class='col-md-6 text-center'>
<label class='label-control'>Category</label>
<div class='message_search_category'>
<!--Category for product will be displayed from Action_Product.php page-->
</div>
</div>
<div class='col-md-6 text-center'>
<label class='label-control'>Brand</label>
<div class='message_search_brand'>
<!--Brand for product will be displayed from Action_Product.php page-->
</div>
</div>
</div>
<div class='row'>
<div class='col-md-6 text-center'>
<button type='button' id='btn_add_product' name='btn_add_product' class='btn btn-primary' style='margin-top:20px; width:160px;'>
<span class='fa fa-plus'></span>
&nbsp;
Add Product
</button>
</div><div class='col-md-6 text-center'>
<button type='button' id='btn_homepage' name='btn_homepage' class='btn btn-primary' style='margin-top:20px; width:160px;'>
<span class='fa fa-home'></span>
&nbsp;
Homepage 
</button>
</div>
</div>
</form>
</div>
<div class='modal-footer' style='font-size:16px; text-align:center;'>&copy;All Rights Are Reserved By Govt...</div>
</div>
</div>
</div>
</div>
<!--End of container-->
</div>
<!--Start of container-->

<!--Start of container-->
<div class='modal fade' id='modal-update-product'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header' style='text-align:center;
font-size:18px;'>
<div class='close' data-dismiss='modal'>&times;</div>
Welcome To The Product Update Panel
</div>
<div class='modal-body'>
<form class='form_product' method='post'>
<div id='message_update_product'></div>
<div id='message_search_update_product'>
</div>
<div class='row'>
<div class='col-md-6'>
<div class='message_search_category'>

</div>
</div>
<div class='col-md-6'>
<div class='message_search_brand'>

</div>
</div>
</div>
<div class='row'>
<div class='col-md-6 text-center'>
</br>
<button type='button' id='btn_update_product' name='btn_update_product' class='btn btn-primary' style='width:160px;'>
<span class='fa fa-edit'></span>
&nbsp;
Update Product
</button>
</div>
<div class='col-md-6 text-center'>
</br>
<button type='submit' id='btn_homepage' name='btn_homepage' class='btn btn-primary' style='width:160px;'>
<span class='fa fa-home'></span>
&nbsp;
Homepage
</button>
</div>
</div>
</form>
</div>
<div class='modal-footer' style='text-align:center;'>
&copy; All Rights Are Reserved By Govt
</div>
</div>
</div>
</div>
<!--End of container-->
<?php 
include_once("Footer.php");
?>
<div class="modal fade" id="modal-upload-image">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">header</div>
<div class="modal-header">body</div>
<div class="modal-header">footer</div>
</div>
</div>
</div>
</body>
</html>