<?php
session_start();
include_once("Database_Connection.php");
$obj=new userprofile();
$obj->searchupdateuser($connect);
$obj->updateuser($connect);

// Start of userprofile class
class userprofile
{
// Start of searchupdateuser function
public function searchupdateuser($connect)
{
if(isset($_POST['searchuser']))
{
$userid=$_SESSION['User_ID'];
$query=("select * from user_detail where User_ID=:userid");
$statement=$connect->prepare($query);
$statement->bindparam(':userid',$userid);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$username=$result['User_Name'];	
$useremail=$result['User_Email'];	
$usermobile=$result['User_Mobile'];	
$useraddress=$result['User_Address'];	
}
echo
("
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label>Name :</label>
<input type='text' id='txt_update_user_name' name='txt_update_user_name' class='form-control'
value='$username'
/>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label>Email :</label>
<input type='text' id='txt_update_user_email' name='txt_update_user_email' class='form-control'
value='$useremail'/>
</div>
</div>
<div class='col-md-2'></div>
</div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label>Password :</label>
<input type='password' id='txt_update_user_password' name='txt_update_user_password' class='form-control'/>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label>Confirm Password :</label>
<input type='password' id='txt_update_user_confirm_password' name='txt_update_user_confirm_password' class='form-control'/>
</div>
</div>
<div class='col-md-2'></div>
</div>
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label>Mobile :</label>
<input type='text' id='txt_update_user_mobile' name='txt_update_user_mobile' class='form-control'
value='$usermobile'/>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label>Address :</label>
<input type='text' id='txt_update_user_address' name='txt_update_user_address' class='form-control'
value='$useraddress'/>
</div>
</div>
<div class='col-md-2'></div>
</div>

<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<button id='btn_user_update' name='btn_user_update' class='btn btn-info btn-block'>Update Record</button>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<a class='btn btn-info btn-block' href='index.php'>Homepage</a>
</div>
</div>
<div class='col-md-2'></div>
</div>

");
}	
}	
// End of searchupdateuser function
// Start of updateuser function
public function updateuser($connect)
{
if(isset($_POST['updateuser']))
{
$username=trim($_POST['txt_update_user_name']);
$useremail=trim($_POST['txt_update_user_email']);
$userpassword=trim($_POST['txt_update_user_password']);
$userconfirmpassword=trim($_POST['txt_update_user_confirm_password']);
$usermobile=trim($_POST['txt_update_user_mobile']);
$useraddress=trim($_POST['txt_update_user_address']);
$validname='/^[a-z ]+$/i';
$resultname=preg_match($validname,$username);
$validemail='/^[a-z]+(-|_)?[a-z0-9]*(\@)[a-z]+(\.)[a-z]+$/i';
$resultemail=preg_match($validemail,$useremail);
$validmobile='/^[0-9]{10,14}$/';
$mobileresult=preg_match($validmobile,$usermobile);
if
(($username=="")||($useremail=="")||($usermobile=="")
||($useraddress==""))
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Please Fill All The Fields
</strong>
</div>
");
}
else if($resultname==false)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Invalid Name Please Enter A Valid Name
</strong>
</div>
");	
}
else if($resultemail==false)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Invalid Email Please Enter A Valid Email
</strong>
</div>
");	
}
else if($userpassword!=$userconfirmpassword)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Password Don't Match
</strong>
</div>
");	
}
else if(($userpassword!='')&&($userconfirmpassword!='')
	&&(strlen($userpassword)<6))
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Password Is Very Weak
</strong>
</div>
");	
}
else if($mobileresult==false)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Invalid Mobile No
</strong>
</div>
");		
}
else if(strlen($useraddress)<4)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Address Is Short Enter A Full Address
</strong>
</div>
");	
}
else
{
$userid=$_SESSION["User_ID"];
$userpassword=password_hash($userpassword,PASSWORD_DEFAULT);
$query=("update user_detail set User_Name=:username, 
User_Email=:useremail,User_Password=:userpassword,
User_Mobile=:usermobile,User_Address=:useraddress
where User_ID=:userid");
$statement=$connect->prepare($query);
$statement->bindparam('userid',$userid);
$statement->bindparam('username',$username);
$statement->bindparam('useremail',$useremail);
$statement->bindparam('userpassword',$userpassword);
$statement->bindparam('usermobile',$usermobile);
$statement->bindparam('useraddress',$useraddress);
$result=$statement->execute();
if($result)
{
echo
("
<div class='alert alert-success text-center' style='background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Profile Is Successfully Updated
</strong>
</div>
");	
}
}
}	
}	
// End of updateuser function
}
// End of userprofile class
?>