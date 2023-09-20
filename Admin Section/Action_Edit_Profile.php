<?php
include_once("Database_Connection.php");
session_start();
// Storing data in variables from text fields
$ID=$_SESSION['Admin_ID'];
$name=$_POST['Admin_name'];
$email=$_POST['Admin_email'];
$password=$_POST['Admin_new_password'];
$password_confirm=$_POST['Admin_re_enter_password'];
// Reguler expression for name and email
$validname='/^[a-z ]+$/i';
$validemail='/^[a-z]+(_|-)?[a-z0-9]*(@)[a-z]+(\.)(com|org|uk|pk)$/i';
// Store result of Reguler expression in variables
$resultname=preg_match($validname,$name);
$resultemail=preg_match($validemail,$email);
// If Admin wants to change password then run this query
if(($password!=''))
{
$query=("update Admin_detail set Admin_Name='$name', Admin_Email='$email',Admin_Password='$password' where Admin_ID='$ID' ");
}
// If Admin don't want to change his password then run query.
else
{
$query=("update Admin_detail set Admin_Name='$name', Admin_Email='$email' where Admin_ID='$ID' ");
}
// Check of name
if(($name=='')||($resultname==false))
{
echo("<div class='alert alert-info' style='background-color:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
Please Enter A Valid Name 
</div>");	
}
// Check of email
else if(($email=='')||($resultemail==false))
{
echo("<div class='alert alert-info' style='background-color:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
Please Enter A Valid Email Address
</div>");	
}
// Check of email
else if(($password!=$password_confirm))
{
echo("<div class='alert alert-info' style='background-color:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
Password Don't Match
</div>");	
}
else
{
$statement=$connect->prepare($query);
$statement->execute();
echo("<div class='alert alert-success' style='background-color:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
Record Is Updated Successfully 
</div>");	
}
?>