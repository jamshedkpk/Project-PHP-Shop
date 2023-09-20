<?php
session_start();
include_once("Database_Connection.php"); 
if(!isset($_SESSION['Admin_Type']))
{
header("Location:Login.php");
}
if($_SESSION['Admin_Type'] !='Master')
{
header("Location:Index.php");
}
include_once("Header.php");
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="Bootstrap/Css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="Bootstrap/Fontawesome/css/Fontawesome-all.min.css">
<script type="text/javascript"  src="Bootstrap/js/JQuery.js"></script>
<script type="text/javascript"  src="Bootstrap/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="Bootstrap/Datatable/js/dataTable.bootstrap.js"></script>
<script type="text/javascript" src="Bootstrap/Datatable/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="Script_Admin.js"></script>
<link rel="stylesheet" href="Bootstrap/Datatable/css/dataTables.bootstrap.min.cs">
<link rel="stylesheet" href="Bootstrap/Datatable/css/jquery.dataTables.css">
<link rel="stylesheet" href="Style_Admin.css">
<title>Admin Page</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<div id="message1">
<!--Message of delete will be displayed here-->
</div>
</div>
</div>
</div>
<div class="container">
<div class="row">
<div class="col-md-12 text-right">
<button type="button" id='btn_add' class="btn btn-info" data-toggle="modal" data-target="#dialog_add_Admin">
Add New Admin
</button>
</div>
</div>
</div>
</br>
<div class="container">
<div class="row">
<div class="col-md-12">
<table id="mytable" class="table table-striped table-bordered">
<thead>
<tr>
<th>
Admin-ID
</th>
<th>
Admin-Name
</th>
<th>
Admin-Email
</th>
<th>
Admin-Type
</th>
<th colspan="2">
Action
</th>
</tr>
</thead>
<tbody id='message2'>
<!--Data will be displayed from Action_Admin.php page through ajax-->
</tbody>
</table>
<script>
$(document).ready(function()
{
$("#mytable").dataTable
({
"searching":false,
"lengthChange":false,
"pageLength":3,
"bInfo":false,
"bSort":false,
});
});
</script>
</div>
</div>
</div>
<!--Start of modal dialog for add Admin-->
<div class="modal fade" id="dialog_add_Admin" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" style="text-align:center;">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4>Please Fill The Following Fields</h4>
</div>
<div class="modal-body">
<div id='message3'></div>
<form method="post" id='form_add_Admin'>
<div class="form-group">
<label class="label-control">Name:</label>
<input type="text" class="form-control" name="txtaddAdminname">
</div>
<div class="form-group">
<label class="label-control">Password:</label>
<input type="password" class="form-control" name="txtaddAdminpassword">
</div>
<div class="form-group">
<label class="label-control">Email:</label>
<input type="text" class="form-control" name="txtaddAdminemail">
</div>
<div class="form-group">
<button type="button" id="btn_add_Admin" name="btn_add_Admin" class="btn btn-success">
<span class="fa fa-plus"></span>
&nbsp;
Save Record
</button> 
</div>
</div>
</form>
<div class="modal-footer" style="text-align:center;">&copy; All Rights Are Reserved By Govt 
</div>
</div>
</div>
</div>
<!--End of modal dialog for add Admin-->
<?php 
include_once("Footer.php");
?>
<!--Start of modal dialog for update Admin-->
<div class="modal fade" id="dialog-update-Admin" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" style="text-align:center;">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4>Please Fill The Following Fields</h4>
</div>
<div class="modal-body">
<div id='message4'></div>
<form method="post" id='form_update_Admin'>
</form>
<div class="modal-footer" style="text-align:center;">&copy; All Rights Are Reserved By Govt 
</div>
</div>
</div>
</div>
<!--End of modal dialog for update Admin-->
</body>
</html>