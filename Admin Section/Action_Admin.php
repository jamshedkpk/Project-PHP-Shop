<?php
session_start();
// Include database connection file.....
include_once("Database_Connection.php");
// If session is not started the redirect the Login.php page.
if(!isset($_SESSION['Admin_ID']))
{
header("Location:Index.php");
}
/*
Create an obj of Admin class and call its searchrecord function to display
Record.Pass $connect which is a connection object in Database_Connection.php
*/
$obj=new Admin();
$obj->searchrecord($connect);
/* 
Create an obj of Admin class and call its addrecord function to add
Record.Pass $connect which is a connection object in Database_Connection.php
*/
$obj=new Admin();
$obj->addrecord($connect);
/* 
Create an obj of Admin class and call its deleterecord function to delete
Record.Pass $connect which is a connection object in Database_Connection.php
*/
$obj=new Admin();
$obj->deleterecord($connect);
/* 
Create an obj of Admin class and call its searchupdaterecord function to search Updated record.Pass $connect which is a connection object in Database_Connection.php
*/
$obj=new Admin();
$obj->searchupdaterecord($connect);
/* 
Create an obj of Admin class and call its updaterecord function to update
Record.Pass $connect which is a connection object in Database_Connection.php
*/
$obj=new Admin();
$obj->updaterecord($connect);
// Start of Admin class
class Admin
{
// Start of search function
public function searchrecord($connect)
{
if(isset($_POST['searchrecord']))
{
$query=("select * from Admin_detail");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<tr>
<td>
<?php echo($result['Admin_ID']);?>
</td>
<td>
<?php echo($result['Admin_Name']);?>
</td>
<td>
<?php echo($result['Admin_Email']);?>
</td>
<td>
<?php echo($result['Admin_Type']);?>
</td>
<td>
<a href="" name='update' data-toggle="modal" data-target="#dialog-update-Admin">
<span class="fa fa-edit" id="btn_update"   Admin_ID='<?php echo $result['Admin_ID']; ?>'>
</span>
</a>
</td>
<td>
<a href="">
<span class="fa fa-trash" id="btn_delete" Admin_ID='<?php echo $result['Admin_ID']; ?>'>
</span>
</a>
</td>
</tr>
<?php }
}
}
// End of search

// Start of add Admin record function
public function addrecord($connect)
{
if (isset($_POST['addrecord']))
{
// Store data from textfields in variables
$Adminname=trim($_POST['txtaddAdminname']);
$Adminpassword=trim($_POST['txtaddAdminpassword']);
$password=trim(password_hash($Adminpassword,PASSWORD_DEFAULT));
$Adminemail=trim($_POST['txtaddAdminemail']);
$Admintype="Master";
 
// Reguler expression pattern for data
$validname='/^[a-z ]+$/i';
$validemail='/^[a-z]+(-|_)?[0-9a-z]*(\@)[a-z]+(\.)[a-z]+$/i';

// Result is stored in result variables.
$resultname=preg_match($validname,$Adminname);
$resultemail=preg_match($validemail,$Adminemail);

if($resultname==false)
{
echo("<div class='alert alert-danger' style='text-align:center; background:orange; color:white;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Valid Name
</strong>
</div>
");
}
else if($Adminpassword=='')
{
echo("<div class='alert alert-danger' style='text-align:center; background:orange; color:white;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Password
</strong>
</div>
");
}
else if($resultemail==false)
{
echo("<div class='alert alert-danger' style='text-align:center; background:orange; color:white;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Valid Email Address
</strong>
</div>
");
}
else
{
$query=("insert into Admin_detail (Admin_Name,Admin_Password,Admin_Email,Admin_Type) values (:Adminname,:Adminpassword,:Adminemail,:Admintype)");
$statement=$connect->prepare($query);
$statement->bindparam(':Adminname',$Adminname);
$statement->bindparam(':Adminpassword',$password);
$statement->bindparam(':Adminemail',$Adminemail);
$statement->bindparam(':Admintype',$Admintype);
$statement->execute();
echo("<div class='alert alert-success' style='text-align:center; background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Record Is Successfully Stored
</div>
");
}
}
}
// End of addrecord function

// Start of delete record
public function deleterecord($connect)
{
if(isset($_POST['deleterecord']))
{
$Adminid=$_POST['Admin_ID'];
$query=("select * from Admin_Detail where Admin_Id='$Adminid' ");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$name=$result['Admin_Name'];
if($name=='ADMIN')
{
echo("<div class='alert alert-success' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Default Admin Can Not Be Deleted
</strong>
</div>
");	
}
else
{
$query=("delete from Admin_detail where Admin_ID=:Adminid");
$statement=$connect->prepare($query);
$statement->bindparam(':Adminid',$Adminid);
$statement->execute();
echo("<div class='alert alert-success' style='background:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Record Is Successfully Deleted
</strong>
</div>
");
}
}
}
}
// End of delete record function
// Start of updaterecord function
public function searchupdaterecord($connect)
{
if(isset($_POST['searchupdateAdmin']))
{
$id=$_POST['Admin_ID'];
$query=("select * from Admin_detail where Admin_ID='$id' ");
$statement=$connect->prepare($query);
$statement->bindparam(":Adminid",$id);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<div class='form-group'>
<input type='hidden' class='form-control' id='txtupdateAdminid' name='txtupdateAdminid' value='<?php echo($result['Admin_ID']);?>'>
</div>
<div class='form-group'>
<label class='label-control'>
Name:
</label>
<input type='text' class='form-control' id='txtupdateAdminname' name='txtupdateAdminname' value='<?php echo($result['Admin_Name']);?>'>
</div>
<div class='form-group'>
<label class='label-control'>
Password:
</label>
<input type='password' class='form-control' id='txtupdateAdminpassword' name='txtupdateAdminpassword' value='<?php echo($result['Admin_Password']);?>'>
</div>
<div class='form-group'>
<label class='label-control'>
Email:
</label>
<input type='text' class='form-control' id='txtupdateAdminemail' name='txtupdateAdminemail' value='<?php echo($result['Admin_Email']);?>'>
</div>
<button type='button' class='btn btn-success' id='btn_update_Admin' name='btn_update_Admin'>
<span class='fa fa-edit'></span>
&nbsp;
Update
</button>
<?php }
}
}
// Start of update function
public function updaterecord($connect)
{
if(isset($_POST['updaterecord']))
{
// Store variables from form_update_Admin in variables.
$id=trim($_POST['txtupdateAdminid']);
$name=trim($_POST['txtupdateAdminname']);
$password=trim($_POST['txtupdateAdminpassword']);
$password=trim(password_hash($password,PASSWORD_DEFAULT));
$email=trim($_POST['txtupdateAdminemail']);

// Reguler expression pattern for data
$validname='/^[a-z ]+$/i';
$validemail='/^[a-z]+(-|_)?[0-9a-z]*(\@)[a-z]+(\.)[a-z]+$/i';

// Result is stored in result variables.
$resultname=preg_match($validname,$name);
$resultemail=preg_match($validemail,$email);

// If Admin give invalid name
if($resultname==false)
{
echo
("
<div class='alert alert alert-success' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Valid Name
</strong>
</div>
");
}

// If Admin give no password
else if($password=='')
{
echo
("
<div class='alert alert alert-success' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Password
</strong>
</div>
");
}
// If Admin give invalid email address
else if($resultemail==false)
{
echo
("
<div class='alert alert alert-success' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Valid Email Address
</strong>
</div>
");
}
// If above data is valid then update record.
else
{
$query=("update Admin_detail set Admin_Name=:name, Admin_Password=:password,
Admin_Email=:email where Admin_ID=:id");
$statement=$connect->prepare($query);
$statement->bindparam(':id',$id);
$statement->bindparam(':name',$name);
$statement->bindparam(':password',$password);
$statement->bindparam(':email',$email);
$result=$statement->execute();
if($result)
{
echo
("
<div class='alert alert alert-success' style='background:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Record Is Successfully Updated
</strong>
</div>
");
}
}
}
}
// End of update function
}// End of class
?>
