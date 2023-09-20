<?php
include_once("Database_Connection.php");
$obj=new category();
$obj->displaycategory($connect);
$obj=new brand();
$obj->displaybrand($connect);
$obj=new product();
$obj->displayproduct($connect);
$obj->displayproductbycategory($connect);
$obj->displayproductbybrand($connect);
$obj->displayproductbyname($connect);
$obj=new user();
$obj->usersignup($connect);
$obj=new user();
$obj->usersignin($connect);
$obj=new user();
$obj->usersignout($connect);
$obj=new page();
$obj->pagelink($connect);
$obj=new page();
$obj->displaypage($connect);
// Start of category class
class category
{
// Start of displaycategory function
function displaycategory($connect)
{
if(isset($_POST['category']))
{
$query=("select * from category");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$cid=$result['Category_ID'];
$cname=$result['Category_Name'];
echo
("
<li class='nav-item'>
<a  class='nav-link' href='#' id='cid' name='cid' cid='$cid'>
$cname
</a>
</li>
");
}
}	
}
// End of displaycategory function
}
// End of category class

// Start of brand class
class brand
{
// Start of displaybrand function
public function displaybrand($connect)
{
if(isset($_POST['brand']))
{
$query=("select * from brand");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$bid=$result['Brand_ID'];
$bname=$result['Brand_Name'];
echo
("
<li class='nav-item'>
<a  class='nav-link' href='#' id='bid' name='bid' bid='$bid'>
$bname
</a>
</li>
");
}	
}	
}
// End of displaybrand function
}
// End of brand class

// Start of product class
class product
{
// Start of displayproduct function
public function displayproduct($connect)
{
if(isset($_POST['product']))
{
$query=("select * from product limit 0,6");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$pid=$result['Product_ID'];	
$pname=$result['Product_Name'];	
$pprice=$result['Product_Price'];	
$pimage=$result['Product_Image'];	
echo
("
<div class='col-md-4 float-left'>
<div class='card bg-info' style='margin-bottom:10px;'>
<div class='card-header'>
$pname
</div>
<div class='card-body'>
<img src='$pimage' height='100px' width='150px'/>
</br>
<label class='text-light'>
Price : $pprice
</label>
</div>
<div class='card-footer'>
<button type='button' id='btn_add_product_cart' name='btn_add_product_cart' pid='$pid' class='btn btn-warning btn-sm' style='width:140px;'>
Add To Cart
</button>
</div>
</div>
</div>");
}
}	
}	
// End of displayproduct function

// Start of displayproductbycategory
public function displayproductbycategory($connect)
{
if(isset($_POST['productbycategory']))
{
$cid=$_POST['cid'];
$query=("select * from product where Category_ID='$cid' limit 0,6 ");
$statement=$connect->prepare($query);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$pid=$result['Product_ID'];	
$pname=$result['Product_Name'];	
$pprice=$result['Product_Price'];	
$pimage=$result['Product_Image'];	
echo
("
<div class='col-md-4 float-left'>
<div class='card bg-info' style='margin-bottom:10px;'>
<div class='card-header'>
$pname
</div>
<div class='card-body'>
<img src='$pimage' height='100px' width='150px'/>
</br>
<label class='text-light'>
Price : $pprice
</label>
</div>
<div class='card-footer'>
<button type='button' id='btn_add_product_cart' name='btn_add_product_cart' pid='$pid' class='btn btn-warning btn-sm' style='width:140px;'>
Add To Cart
</button>
</div>
</div>
</div>");
}
}
}
}
// End of displayproductbycategory

// Start of displayproductbybrand function
public function displayproductbybrand($connect)
{
if(isset($_POST['productbybrand']))
{
$bid=$_POST['bid'];
$query=("select * from product where Brand_ID='$bid' limit 0,6");
$statement=$connect->prepare($query);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$pid=$result['Product_ID'];	
$pname=$result['Product_Name'];	
$pprice=$result['Product_Price'];	
$pimage=$result['Product_Image'];	
echo
("
<div class='col-md-4 float-left'>
<div class='card bg-info' style='margin-bottom:10px;'>
<div class='card-header'>
$pname
</div>
<div class='card-body'>
<img src='$pimage' height='100px' width='150px'/>
</br>
<label class='text-light'>
Price : $pprice
</label>
</div>
<div class='card-footer'>
<button type='button' id='btn_add_product_cart' name='btn_add_product_cart' pid='$pid' class='btn btn-warning btn-sm' style='width:140px;'>
Add To Cart
</button>
</div>
</div>
</div>");	
}
}
}	
}
// End of displayproductbybrand function

// Start of displayproductbyname
public function displayproductbyname($connect)
{
if(isset($_POST['productbyname']))
{
$pname=trim($_POST['pname']);
$query=("select * from product where Product_Name like '%$pname%' ");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$pid=$result['Product_ID'];	
$pname=$result['Product_Name'];	
$pprice=$result['Product_Price'];	
$pimage=$result['Product_Image'];	
echo
("
<div class='col-md-4 float-left'>
<div class='card bg-info' style='margin-bottom:10px;'>
<div class='card-header'>
$pname
</div>
<div class='card-body'>
<img src='$pimage' height='100px' width='150px'/>
</br>
<label class='text-light'>
Price : $pprice
</label>
</div>
<div class='card-footer'>
<button type='button' id='btn_add_product_cart' name='btn_add_product_cart' pid='$pid' class='btn btn-warning btn-sm' style='width:140px;'>
Add To Cart
</button>
</div>
</div>
</div>");		
}
}	
}
// End of displayproductbyname
}
// End of product class

// Start of user class
class user
{
// Start of usersignup function
public function usersignup($connect)
{
if(isset($_POST['usersignup']))
{
$username=trim($_POST['txt_user_name']);
$useremail=trim($_POST['txt_user_email']);
$password=trim($_POST['txt_user_password']);
$userpassword=trim(password_hash($password,PASSWORD_DEFAULT));
$confirmpassword=trim($_POST['txt_user_confirm_password']);
$usermobile=trim($_POST['txt_user_mobile']);
$useraddress=trim($_POST['txt_user_address']);
$validname='/^[a-z ]+$/i';
$resultname=preg_match($validname,$username);
$validemail='/^[a-z]+(-|_)?[a-z0-9]*(\@)[a-z]+(\.)[a-z]+$/i';
$resultemail=preg_match($validemail,$useremail);
$validmobile='/^[0-9]{10,14}$/';
$mobileresult=preg_match($validmobile,$usermobile);
if
(($username=="")||($useremail=="")||($userpassword=="")
||($confirmpassword=="")||($usermobile=="")
||($useraddress==""))
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Please Fill All The Fields
</div>
");
}
else if($resultname==false)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Invalid Name Please Enter A Valid Name
</div>
");	
}
else if($resultemail==false)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Invalid Email Please Enter A Valid Email
</div>
");	
}
else if($password!=$confirmpassword)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Password Don't Match
</div>
");	
}
else if(strlen($password)<4)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Password Is Very Weak
</div>
");	
}
else if($mobileresult==false)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Invalid Mobile No
</div>
");		
}
else if(strlen($useraddress)<4)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Address Is Short Enter A Full Address
</div>
");	
}
else
{
$query=("select * from user_detail where User_Email='$useremail' ");
$statement=$connect->prepare($query);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Email Already Exist Please Login
</div>
");	
}
else
{$query=("insert into user_detail (User_Name,User_Email,User_Password,User_Mobile,User_Address)
values(:username,:useremail,:userpassword,:usermobile,:useraddress)");
$statement=$connect->prepare($query);
$statement->bindparam(':username',$username);
$statement->bindparam(':useremail',$useremail);
$statement->bindparam(':userpassword',$userpassword);
$statement->bindparam(':usermobile',$usermobile);
$statement->bindparam(':useraddress',$useraddress);
$result=$statement->execute();
if($result)
{
echo
("
<div class='alert alert-success' style='background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
You Have Successfully Regestered
</div>
");
}
}
}
}
	
}	
// End of usersignup function
// Start of usersignin function
public function usersignin($connect)
{
if(isset($_POST['signin']))
{
$email=trim(htmlentities($_POST['useremail']));
$password=trim(htmlentities($_POST['userpassword']));
if(($email=="")||($password==""))
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Please Fill The Fields
</div>
");
}
else
{
$query=("select * from user_detail where User_Email=:email");
$statement=$connect->prepare($query);
$statement->bindparam(':email',$email);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$userpassword=$_POST['userpassword'];  // MY PASSWORD
$password=$result['User_Password']; // DATABASE PASSWORD
if(password_verify($userpassword,$password))
{
session_start();
$_SESSION['User_ID']=$result['User_ID'];
$_SESSION['User_Name']=$result['User_Name'];
$_SESSION['User_Email']=$result['User_Email'];
$_SESSION['User_Mobile']=$result['User_Mobile'];
$_SESSION['User_Address']=$result['User_Address'];
}
else
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Invalid Password Please Try Again
</div>
");		
}
}
}
else
{
echo
("
<div class='alert alert-success' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
You Are Not Regestered
</div>
");	
}
}
}	
}
//End of usersignin function
// Start of usersignout function
public function usersignout($connect)
{
if(isset($_POST['usersignout']))
{
session_start();
session_destroy();
}
}
//End of usersignout function
}
// End of user class
// Start of page class
class page
{
// Start of pagelink function	
public function pagelink($connect)
{
if(isset($_POST['pagelink']))
{
$query=("select * from product");
$statement=$connect->prepare($query);
$statement->execute();
$totalrecords=$statement->rowCount();  // Total records
$displayperpage=6;  // Record which is displayed per page
$totalpages=ceil($totalrecords/$displayperpage);  // Total pages
for($i=1;$i<=$totalpages;$i++)
{
echo
("
<li class='page-item'>
<a href='' id='pagelink' pageno='$i' class='page-link'>
$i
</a>
</li>
");	
}
}	
}
// End of pagelink function
// Start of displaypage function
public function displaypage($connect)
{
if(isset($_POST['displaypage']))
{
$pageno=$_POST['pageno'];
$limit=6;
$start=($pageno*$limit-$limit);
$query=("select * from product limit $start,$limit ");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$pid=$result['Product_ID'];
$pname=$result['Product_Name'];
$pimage=$result['Product_Image'];
$pprice=$result['Product_Price'];
echo
("
<div class='col-md-4 float-left'>
<div class='card bg-info' style='margin-bottom:10px;'>
<div class='card-header'>
$pname
</div>
<div class='card-body'>
<img src='$pimage' height='100px' width='150px'/>
</br>
<label class='text-light'>
Price : $pprice
</label>
</div>
<div class='card-footer'>
<button type='button' id='btn_add_product_cart' name='btn_add_product_cart' pid='$pid' class='btn btn-warning btn-sm' style='width:140px;'>
Add To Cart
</button>
</div>
</div>
</div>");
}
}	
}
// End of displaypage function
	
}
// End of page class
?>