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
<script type="text/javascript" src="Script_Category.js"></script>
<link type="text/css" rel="stylesheet" href="Style_Category.css">
<title>Category Page</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="message_delete_category"></div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 text-right">
<button type="button" id="btn_add" name="btn_add" class="btn btn-info" style="margin-bottom:10px;" data-toggle='modal' data-target='#dialog_add_category'>
Add New Category
</button>
</div>
</div>
</div>
<div class="container">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>
Category ID
</th>
<th>
Category Name
</th>
<th colspan='2'>
Action
</th>
</tr>
</thead>
<tbody id="message_search_category">
<!--Record will be displayed from Action_Category.php page-->
</tbody>
</table>
</div>
<!--Start of dialog for add category-->
<div class='modal fade' id='dialog_add_category'>
<div class='modal-dialog'>
<div class='modal-content'>
<div class='modal-header' style='text-align:center; font-size:20px;'>
<div class='close' data-dismiss='modal'>&times;</div>
Welcome To The Category Add Panel
</div>
<div class='modal-body'>
<form method='post' id='form_add_category'>
<div id='message_add_category'>
</div>
<div class='form_group'>
<label class='label-control'>Name:</label>
<input type='text' id='txt_add_category' name='txt_add_category' class='form-control' >
</div>
<div class='form_group'>
<button type='button' id='btn_add_category' name='btn_add_category' class='btn btn-info' style='margin-top:10px;'>
<span class='fa fa-plus'></span>
&nbsp;
Add Category</button>
</div>
</div>
<div class='modal-footer' style='text-align:center;'>
&copy; All Rights Are Reserved
</div>
</div>
</form>
</div>
</div>
<!--End of dialog for add category-->
<!--Start of dialog for update category-->
<div class="modal fade" id="modal_update_category">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" style="text-align:center;font-size:18px;">
<div class="close" data-dismiss="modal">&times;</div>
Welcome To The Update Panel
</div>
<div class="modal-body">
<div id="message_update_category"></div>
<form method='post' id="form_update_category">
<div id='dialog_update_category'>
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
<!--End of dialog for add category-->
<?php 
include_once("Footer.php");
?>
</body>
</html>