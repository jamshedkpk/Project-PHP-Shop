<?php 
include("Database_Connection.php");
$obj=new product();
$obj->searchproduct($connect);
$obj=new product();
$obj->addproduct($connect);
$obj=new product();
$obj->searchcategory($connect);
$obj=new product();
$obj->searchbrand($connect);
$obj=new product();
$obj->deleteproduct($connect);
$obj=new product();
$obj->searchupdateproduct($connect);
$obj=new product();
$obj->updateproduct($connect);

// Start of class product
class product
{
//  Start of searchproduct function
public function searchproduct($connect)
{
if(isset($_POST['searchproduct']))
{
// This query will fetch record from three tables.
$query=("select * from Product 
inner join category on Product.Category_ID=Category.Category_ID
inner join Brand on Product.Brand_ID=Brand.Brand_ID"
);
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<tr>
<td style='vertical-align:middle;'>
<?php echo($result['Product_ID']);?>
</td>
<td style='vertical-align:middle;'>
<?php echo($result['Product_Name']);?>
</td>
<td style='vertical-align:middle;'>
<?php echo($result['Product_Price']);?>
</td>
<td style='vertical-align:middle;'>
<?php echo($result['Product_Quantity']);?>
</td>
<td style='vertical-align:middle;'>
<?php echo($result['Category_Name']);?>
</td>
<td style='vertical-align:middle;'>
<?php echo($result['Brand_Name']);?>
</td>
<td style='vertical-align:middle;'>
<img  style='border:1px solid; border-radius:10px;' width='100' height='100' src='<?php echo($result['Product_Image']);?>'/>
</br>
<a href="Product_Image.php?pid=<?php echo($result['Product_ID'])?>">
<?php echo($result['Product_Image']);?>
</a>
</td>
<td style='vertical-align:middle;'>
<a href=''>
<span class='fa fa-edit' pid='<?php echo($result['Product_ID']);?>' id='btn_update' name='btn_update'data-toggle='modal' data-target='#modal-update-product'></span>
</a>
</td>
<td style='vertical-align:middle;'>
<a href=''>
<span class='fa fa-trash' pid='<?php echo($result['Product_ID']); ?>' id='btn_delete_product'></span>
</a>
</td>
</tr>
<?php }
}	
}	
// End of searchproduct function

// Start of addproduct function
public function addproduct($connect)
{
if(isset($_POST['addproduct']))
{
$productname=trim($_POST['txt_add_product_name']);
$productprice=trim($_POST['txt_add_product_price']);
$productquantity=trim($_POST['txt_add_product_quantity']);
$cid=$_POST['txt_add_category_id'];
$bid=$_POST['txt_add_brand_id'];
$pimage="Edit";
$validproductname='/^[a-z ]+[0-9]*(-|_)?[a-z0-9]*$/i';
$resultproductname=preg_match($validproductname,$productname);
$validproductprice='/^[0-9]+$/';
$resultproductprice=preg_match($validproductprice,$productprice);
$validproductquantity='/^[0-9]+$/';
$resultproductquantity=preg_match($validproductquantity,$productquantity);
$query=("select * from product where Product_Name='$productname' ");
$statement=$connect->prepare($query);
$statement->execute();
$count=$statement->rowCount();
if(($productname=='')||($productprice=='')||
($productquantity==''))
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Please Fill All The Fields
</strong>
</div>");
}
else if ($resultproductname==false)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Invalid Product Name Please Enter A Valid Name
</strong>
</div>");
}
else if ($resultproductprice==false)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Invalid Product Price Please Enter A Valid Price
</strong>
</div>");
}
else if ($resultproductquantity==false)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Invalid Product Quantity Please Enter A Valid Quantity
</strong>
</div>");
}
else if ($count>0)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Product Is Already Exist Try Another Name
</strong>
</div>");
}
else if($cid=='Select A Category')
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Please Select A Category
</strong>
</div>");
}
else if($bid=='Select A Brand')
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Please Select A Brand
</strong>
</div>");
}
else
{
$query=("insert into product(
Product_Name,Product_Price,Product_Quantity,Category_ID,
Brand_ID,Product_Image
)values(:pname,:pprice,:pquantity,:cid,:bid,:pimage)");
$statement=$connect->prepare($query);
$statement->bindparam(':pname',$productname);
$statement->bindparam(':pprice',$productprice);
$statement->bindparam(':pquantity',$productquantity);
$statement->bindparam(':cid',$cid);
$statement->bindparam(':bid',$bid);
$statement->bindparam(':pimage',$pimage);
$ans=$statement->execute();
if($ans)
{
echo
("<div class='alert alert-warning' style='background:limegreen;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Product Is Successfully Added
</strong>
</div>");
}
}
}	
}
// End of addproduct function

// Start of searchcategory function
public function searchcategory($connect)
{
if(isset($_POST['searchcategory']))
{
echo("<select id='txt_add_category_id' name='txt_add_category_id' class='form-control'>
");
echo("<option>Select A Category</option>");
$query=("select * from category");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<option value='<?php echo($result['Category_ID']);?>'>
<?php echo($result['Category_Name']);?>
</option>
<?php }
}
echo("</select>");
}
// End of searchcategory function

// Start of searchbrand function
public function searchbrand($connect)
{
if(isset($_POST['searchbrand']))
{
echo("<select id='txt_add_brand_id' name='txt_add_brand_id' class='form-control'>
");
echo("<option>Select A Brand</option>");
$cid=$_POST['cid'];
$query=("select * from brand where Category_ID='$cid' ");
$statement=$connect->prepare($query);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<option value='<?php echo($result['Brand_ID']);?>
'>
<?php echo($result['Brand_Name']);?>
</option>
<?php }
}echo("</select>");
}
// End of searchbrand function

// Start of deleteproduct function
public function deleteproduct($connect)
{
if(isset($_POST['deleteproduct']))
{
$pid=$_POST['pid'];
$query=("delete from product where Product_ID=:pid");	
$statement=$connect->prepare($query);
$statement->bindparam(":pid",$pid);
$statement->execute();
echo
("<div class='alert alert-warning' style='background:limegreen;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Product Is Successfully Deleted
</strong>
</div>");
}
}
// End of deleteproduct function

// Start of searchupdateproduct function
public function searchupdateproduct($connect)
{
if(isset($_POST['searchupdateproduct']))
{ 
$pid=$_POST['pid'];
$query=("select * from product  inner join category on Category.Category_ID=Product.Category_ID inner join Brand on Brand.Brand_ID=Product.Brand_ID where Product_ID=:pid");
$statement=$connect->prepare($query);
$statement->bindparam(":pid",$pid);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<div class='row'>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label class='label-control'>Name</label>
<input type='hidden' name='txt_update_product_id' id='txt_update_product_id' value="<?php echo($result['Product_ID']); ?>"/>
<input type='text' id='txt_update_product_name' name='txt_update_product_name' value='<?php echo($result['Product_Name']); ?>' class='form-control'/>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label class='label-control'>Price</label>
<input type='text' id='txt_update_product_price' name='txt_update_product_price' value='<?php echo($result['Product_Price']); ?>' class='form-control'/>
</div>
</div>
<div class='col-md-4 text-center'>
<div class='form-group'>
<label class='label-control'>Quantity</label>
<input type='text' id='txt_update_product_quantity' name='txt_update_product_quantity' value='<?php echo($result['Product_Quantity']); ?>' class='form-control'/>
</div>
</div>
</div>
<?php }
}
}
// Start of searchupdateproduct function

// Start of updateproduct function
public function updateproduct($connect)
{
if(isset($_POST['updateproduct']))
{
$pid=$_POST['txt_update_product_id'];
$pname=trim($_POST['txt_update_product_name']);
$pprice=trim($_POST['txt_update_product_price']);
$pquantity=trim($_POST['txt_update_product_quantity']);
$cid=$_POST['txt_add_category_id'];
$bid=$_POST['txt_add_brand_id'];
$invalidpname='/^[0-9]+$/';
$resultpname=preg_match($invalidpname,$pname);
$validpprice='/^[0-9]+$/';
$resultpprice=preg_match($validpprice,$pprice);
$validpquantity='/^[0-9]+$/';
$resultpquantity=preg_match($validpquantity,$pquantity);
if(($pname=='')||($pprice=='')||($pquantity==''))
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Please Fill All The Fields
</strong>
</div>");
}
else if($resultpname==true)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Invalid Product Name Please Enter A Valid Product Name
</strong>
</div>");
}
else if($resultpprice==false)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Invalid Product Price Please Enter A Valid Product Price
</strong>
</div>");
}
else if($resultpquantity==false)
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Invalid Product Quantity Please Enter A Valid Product Quantity
</strong>
</div>");
}
else if($cid=='Select A Category')
{
$query=("update product set Product_Name=:pname,Product_Price=:pprice, Product_Quantity=:pquantity where Product_ID=:pid");
$statement=$connect->prepare($query);
$statement->bindparam(":pname",$pname);
$statement->bindparam(":pprice",$pprice);
$statement->bindparam(":pquantity",$pquantity);
$statement->bindparam(":pid",$pid);
$ans=$statement->execute();
if($ans)
{
echo
("<div class='alert alert-warning' style='background:limegreen;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Record Is Successfully Updated
</strong>
</div>");
}
}
else if($cid!='Select A Category')
{
if($bid=='Select A Brand')
{
echo
("<div class='alert alert-warning' style='background:orange;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Please Select A Brand
</strong>
</div>");
}
else if(($cid!='Select A Category')&&($bid!='Select A Brand'))
{
$query=("update product set Product_Name=:pname,Product_Price=:pprice, Product_Quantity=:pquantity, Category_ID=:cid, Brand_ID=:bid where Product_ID=:pid");
$statement=$connect->prepare($query);
$statement->bindparam(":pid",$pid);
$statement->bindparam(":pname",$pname);
$statement->bindparam(":pprice",$pprice);
$statement->bindparam(":pquantity",$pquantity);
$statement->bindparam(":cid",$cid);
$statement->bindparam(":bid",$bid);
$ans=$statement->execute();
if($ans)
{
echo
("<div class='alert alert-warning' style='background:limegreen;color:white;text-align:center;'>
<div class='close' data-dismiss='alert'>&times;
</div>
<strong>
Record Is Successfully Updated
</strong>
</div>");
}
}
}
}
}
// End of updateproduct function
}
// End of class product
?>
