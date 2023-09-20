<?php
include_once("Database_Connection.php");
session_start();
$obj=new cart();
$obj->addproductintocart($connect);
$obj=new cart();
$obj->displayproductincart($connect);
$obj=new cart();
$obj->displayproduct($connect);
$obj=new cart();
$obj->deleteproduct($connect);
$obj=new cart();
$obj->updateproduct($connect);
$obj=new cart();
$obj->cartamount($connect);

// Start of cart class
class cart
{
// Start of addproductintocart function
public function addproductintocart($connect)
{
if(isset($_POST['addproductintocart']))
{
if(!isset($_SESSION['User_ID']))
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Please SignIn Before Buying Any Product
</div>
");	
}
else
{
$pid=$_POST['pid'];
$userid=$_SESSION['User_ID'];
$query=("select * from cart where Product_ID='$pid' 
and User_ID='$userid' ");
$statement=$connect->prepare($query);
$statement->execute();
$count=$statement->rowCount();
if($count>0)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Product Is Already Added In Cart
</div>
");	
}
else
{
$userid=$_SESSION['User_ID'];
$pid=$_POST['pid'];
$query=("select * from product where Product_ID=:pid");
$statement=$connect->prepare($query);
$statement->bindparam(':pid',$pid);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$pname=$result["Product_Name"];	
$pprice=$result["Product_Price"];	
$pimage=$result["Product_Image"];	
}
$query=("insert into cart 
(Product_ID,IP_Address,User_ID,Product_Name,Product_Image,Product_Quantity,Product_Price,Total_Amount)
values('$pid',0,'$userid','$pname','$pimage',1,'$pprice','$pprice')");
$statement=$connect->prepare($query);
$ans=$statement->execute();
if($ans)
{
echo
("
<div class='alert alert-success text-center' style='background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Product Is Successfully Added
</div>
");	
}
}
}
}
}
// End of addproductintocart function

// Start of displayproductincart function
public function displayproductincart($connect)
{
if(isset($_POST['displaycartproduct']))
{
if(isset($_SESSION['User_ID']))
{
$userid=$_SESSION['User_ID'];
$query=("select * from cart where User_ID='$userid' ");	
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$cartid=$result['Cart_ID'];	
$pname=$result['Product_Name'];
$pimage=$result['Product_Image'];
$pprice=$result['Product_Price'];
echo
("
<div class='row text-center'>
<div class='col-md-3' style='font-size:16px;'>$cartid</div>
<div class='col-md-3'>
<img src='$pimage' height='50px' width='50px'/>
</div>
<div class='col-md-3' style='font-size:16px;'>$pname</div>
<li></li>
<div class='col-md-3' style='font-size:16px;'>$pprice</div>
</div>
<hr style='background:white;'>
");
}
}
}	
}
// End of displayproductincart function
// Start of displayproduct function
public function displayproduct($connect)
{
if(isset($_POST['displayproduct']))
{
if(isset($_SESSION['User_ID']))
{
$userid=$_SESSION['User_ID'];
$query=("select * from cart where User_ID='$userid' ");	
$statement=$connect->prepare($query);
$statement->execute();
$total_amount=0;
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$cartid=$result['Cart_ID'];
$pid=$result['Product_ID'];	
$pname=$result['Product_Name'];
$pimage=$result['Product_Image'];
$pprice=$result['Product_Price'];
$totalprice=$result['Total_Amount'];
$price_array=array($totalprice);
$total_sum=array_sum($price_array);
$total_amount=($total_amount+$total_sum);
echo
("
<div class='row'>
<div class='col-md-2 text-center'>
<div class='form-group'>
<img src='$pimage' height='80px' width='80px'/>
</div>
</div>
<div class='col-md-2 text-center'>
<div class='form-group'>
$pname
</div>
</div>
<div class='col-md-2'>
<input type='text' class='form-control form-control-sm qty' pid='$pid' id='qty-$pid' style='margin-bottom:5px;'/>
</div>
<div class='col-md-2 text-center'>
<input type='' class='form-control form-control-sm price' pid='$pid' id='price-$pid' disabled='true' value='$pprice' style='margin-bottom:5px;'/>
</div>
<div class='col-md-2 text-center'>
<input type='text' class='form-control form-control-sm total' pid='$pid' id='total-$pid' disabled='true' value='$totalprice' style='margin-bottom:5px;'/>
</div>
<div class='col-md-2 text-center'>
<div class='btn-group btn-block' >
<a href='#'  id='deletecartproduct' delete_pid='$pid' class='btn btn-danger'>
<span class='fa fa-trash'></span>
</a>
<a href='#' class='btn btn-info update' update_pid='$pid' id='updatecartproduct'>
<span class='fa fa-edit'></span>
</a>
</div>
</div>
</div>
<hr>
");
}
echo
("
<div class='row'>
<div class='col-md-2'></div>
<div class='col-md-8 text-center text-success'>
<b>
Total Amount = $total_amount
</b>
</div>
<div class='col-md-2'></div>
</div>
");
// Start of paypal
echo
('
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="Khanstore@gmail.com">
<input type="hidden" name="upload" value="1">
');
$x=0;
$userid=$_SESSION['User_ID'];
$query=("select * from cart where User_ID=$userid");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$x++;
$pname=$result['Product_Name'];
$pprice=$result['Product_Price'];
$pquantity=$result['Product_Quantity'];
echo
('
<input type="hidden" value="'.$x.'" name="item_number_'.$x.'">
<input type="hidden" value="'.$pname.'" name="item_name_'.$x.'">
<input type="hidden" value="'.$pprice.'" name="amount_'.$x.'">
<input type="hidden" value="'.$pquantity.'" name="quantity_'.$x.'">
');
}
echo
("
<input type='hidden' name='return' value='https://testlakki.000webhostapp.com/Payment_Success.php'/>
<input type='hidden' name='cancel_return' value='https://testlakki.000webhostapp.com/'/>
<input type='hidden' name='currency_code' value='USD'/>
<input type='hidden' name='custom' value='".$userid."'/>
<input type='image' style='' name='submit' alt='' value='https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalchecout-60px.png'/> 
");
echo('
<input type="image" id="btn" name="submit"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
</form>
');
// End of paypal
}
}	
}
// End of displayproduct function

// Start of deleteproduct function
public function deleteproduct($connect)
{
if(isset($_POST['deleteproduct']))
{
$userid=$_SESSION["User_ID"];
$pid=$_POST["pid"];
$query=("delete from cart where Product_ID=:pid and User_ID=:userid");
$statement=$connect->prepare($query);
$statement->bindparam(':pid',$pid);
$statement->bindparam(':userid',$userid);
$ans=$statement->execute();
if($ans)
{
echo
("
<div class='alert alert-success text-center' style='background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Product Is Successfully Deleted
</div>
");	
}
}
}
// End of deleteproduct function
// Start of updateproduct function
public function updateproduct($connect)
{
if(isset($_POST['updateproduct']))
{
$userid=$_SESSION['User_ID'];
$pid=$_POST['pid'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$total=$_POST['total'];
$validquantity='/^[1-9]{1,4}$/';
$resultquantity=preg_match($validquantity,$quantity);
if($resultquantity==false)
{
echo
("
<div class='alert alert-success text-center' style='background:orange; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Quantity Should Be Between 1 And 10000
</div>
");	
}
else
{
$query=("update cart set Product_Quantity=:quantity,
Product_Price=:price, Total_Amount=:total
where User_ID=:userid and Product_ID=:pid");
$statement=$connect->prepare($query);
$statement->bindparam(':quantity',$quantity);
$statement->bindparam(':price',$price);
$statement->bindparam(':total',$total);
$statement->bindparam(':userid',$userid);
$statement->bindparam(':pid',$pid);
$ans=$statement->execute();
if($ans)
{
echo
("
<div class='alert alert-success text-center' style='background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>&times;</div>
Your Cart Is Updated
</div>
");		
}
}
}	
}
// End of   updateproduct function
// Start of cartamount function
public function cartamount($connect)
{
if(isset($_POST['cartamount']))
{
if(isset($_SESSION['User_ID']))
{
$userid=$_SESSION['User_ID'];
$query=("select * from cart where User_ID=:userid");
$statement=$connect->prepare($query);
$statement->bindparam(':userid',$userid);
$statement->execute();
$count=$statement->rowCount();
echo($count);
}
else
{
echo(0);
}
}
}
// End of cartamount function
}
// End of cart class
?>