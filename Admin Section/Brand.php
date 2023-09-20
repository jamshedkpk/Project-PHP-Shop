<?php 
session_start();
if(!isset($_SESSION['Admin_Name']))
{
header("Location:Login.php");
}
if($_SESSION['Admin_Type'] !='Master')
{
header("Location:Index.php");
}
else
{
include_once("Header.php");
}
?>
<html>
<head>
<script type="text/javascript" src="Script_Brand.js"></script>
<link type="text/css" rel="stylesheet" href="Style_Brand.css">
<title>Brand Page</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="message_delete_brand"></div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 text-right">
<button type="button" id="btn_add" name="btn_add" class="btn btn-info" style="margin-bottom:10px;" data-toggle='modal' data-target='#dialog_add_brand'>
Add New brand
</button>
</div>
</div>
</div>
<div class="container">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>
Brand ID
</th>
<th>
Brand Name
</th>
<th>
Category Name
</th>
<th colspan='2'>
Action
</th>
</tr>
</thead>
<tbody id="message_search_brand">
<!--Record will be displayed from Action_brand.php page-->
</tbody>
</table>
</div>
<!--Start of dialog for add brand-->
<div class='modal fade' id='dialog_add_brand'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header' style='text-align:center; font-size:20px;'>
<div class='close' data-dismiss='modal'>&times;</div>
Welcome To The brand Add Panel
</div>
<div class='modal-body'>
<form method='post' id='form_add_brand'>
<div id='message_add_brand'></div>
<div class='form_group' id='category_brand'>
</div>
</br>
<div class='form_group'>
<label class='label-control'>Brand Name:</label>
<input type='text' id='txt_add_brand_name' name='txt_add_brand_name' class='form-control' >
</div>
<div class='form_group'>
<button type='button' id='btn_add_brand' name='btn_add_brand' class='btn btn-info' style='margin-top:10px;'>
<span class='fa fa-plus'></span>
&nbsp;
Add Brand</button>
</div>
</div>
<div class='modal-footer' style='text-align:center;'>
&copy; All Rights Are Reserved
</div>
</div>
</form>
</div>
</div>
<!--End of dialog for add brand-->
<!--Start of dialog for update brand-->
<div class="modal fade" id="modal_update_brand">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" style="text-align:center;font-size:18px;">
<div class="close" data-dismiss="modal">&times;</div>
Welcome To The Update Panel
</div>
<div class="modal-body">
<div id="message_update_brand"></div>
<form method='post' id="form_update_brand">
<div id='dialog_update_brand'>
<!-- Record will be displayed from Action_Brand.php page-->
</div>
</form>
<div class="modal-footer" style="text-align:center;">
&copy; All Rights Are Reserved By Govt
</div>
</div>
</div>
</div>
</div>
</div>
<!--End of dialog for add brand-->
<?php 
include_once("Footer.php");
?>
</body>
</html>