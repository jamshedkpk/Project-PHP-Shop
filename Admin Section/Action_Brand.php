<?php
include_once("Database_Connection.php");
$obj=new brand();
$obj->searchbrand($connect);
$obj=new brand();
$obj->addbrand($connect);
$obj=new brand();
$obj->deletebrand($connect);
$obj=new brand();
$obj->searchupdatebrand($connect);
$obj=new brand();
$obj->updatebrand($connect);
$obj=new brand();
$obj->searchcategory($connect);

// End of class brand
class brand
{
// Start of searchbrand function	
public function searchbrand($connect)
{
if (isset($_POST['searchbrand']))
{
$query=("select * from brand inner join category on brand.category_ID=category.Category_ID");
$statement=$connect->prepare($query);
$statement->execute();
while ($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$bid=$result['Brand_ID'];
$bname=trim($result['Brand_Name']);
$cname=$result['Category_Name'];
 ?>
<tr>
<td>
<?php echo($bid);?>
</td>
<td>
<?php echo($bname);?>
</td>
<td>
<?php echo($cname);?>
</td>
<td>
<a href='' data-toggle='modal' data-target='#modal_update_brand'>
<span class='fa fa-edit' id='btn_update' Brand_ID=<?php echo($result['Brand_ID']);?>></span>
</a>
</td>
<td>
<a href="">
<span class='fa fa-trash' Brand_ID=<?php echo($result['Brand_ID']);?> id='btn_delete_brand'></span>
</a>
</td>
</tr>
<?php }
}
}
// End of searchbrand function	

// Start of addbrand function
public function addbrand($connect)
{
if(isset($_POST['addbrand']))
{
$cid=$_POST['txt_add_category_id'];
$bname=trim($_POST['txt_add_brand_name']);
$validbname='/^[a-z ]+$/i';
$resultbname=preg_match($validbname,$bname);

$query=("select * from brand where Brand_Name=:Name");
$statement=$connect->prepare($query);
$statement->bindparam(':Name',$bname);
$statement->execute();
$count=$statement->rowCount();
if($bname=='')
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:orange;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Please Enter A Brand Name
</div>");	
}
else if($resultbname==false)
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:orange;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Please Enter A Valid Name For Brand
</div>");	
}
else if($count>0)
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:orange;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Brand Name Is Already Exist Try Another Name
</div>");		
}
else
{
$cid=$_POST['txt_add_category_id'];
$query=("insert into brand (Brand_Name,Category_ID) values('$bname','$cid')");
$statement=$connect->prepare($query);
$statement->execute();
echo("
<div class='alert alert-success' style='text-align:center; background:limegreen; color:white;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Brand Is Successfully Added
</div>");	
}
}
}
// End of addbrand function

// Start of deletebrand function
public function deletebrand($connect)
{
if(isset($_POST['deletebrand']))
{
$bid=$_POST['bid'];
$query=("delete from brand where Brand_ID=:bid");
$statement=$connect->prepare($query);
$statement->bindparam(':bid',$bid);
$ans=$statement->execute();
if($ans)
{
echo("<div class='alert alert-success' style='background:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
Brand Is Successfully Deleted
</div> ");
}
}
}
// End of deletebrand function

// Start of searchupdatebrand function
public function searchupdatebrand($connect)
{
if(isset($_POST['searchupdatebrand']))
{
$bid=$_POST['bid'];
// Display category
echo("<label class='label-control'>Select Category:</label>");
echo("<select class='form-control' name='txt_update_brand_category' id='txt_update_brand_category'>
");
$query1=("select * from category");
$statement=$connect->prepare($query1);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<div class="form-group">
<option value='<?php echo($result['Category_ID']);?>'>
<?php echo($result['Category_Name']);?>
</option>
</div>
<?php }
echo("</select>");
// Display brand
$query2=("select * from brand where Brand_ID=:bid");
$statement=$connect->prepare($query2);
$statement->bindparam(':bid',$bid);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<div class="form-group">
<input type="hidden" id="txt_update_Brand_ID" name="txt_update_Brand_ID" value="<?php echo($result['Brand_ID']); ?>" class="form-control">
</div>
<div class="form-group">
<label class="label-control">Brand Name :</label>
<input type="text" id="txt_update_Brand_Name" name="txt_update_Brand_Name" value="<?php echo($result['Brand_Name']); ?>" class="form-control">
</div>
<div class="form-group">
<button type="button" id="btn_update_brand" name="btn_update_brand" class="btn btn-info">
<span class="fa fa-edit"></span>
Update Brand</button>
</div>
<?php }
}
}
// End of searchupdatebrand function
public function updatebrand($connect)
{
if(isset($_POST['updatebrand']))
{
$bid=$_POST['txt_update_Brand_ID'];
$bname=trim($_POST['txt_update_Brand_Name']);
$cid=$_POST['txt_update_brand_category'];
$validbname='/^[a-z ]+$/i';
$resultbname=preg_match($validbname,$bname);
if($bname=='')
{
echo
("<div class='alert alert-warning' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Please Enter A Name For Brand
</div>");
}
else if($resultbname==false)
{
echo
("<div class='alert alert-warning' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Please Enter A Valid Name For Brand
</div>");	
}
else
{
$query=("update brand set Brand_Name=:bname, Category_ID='$cid' where Brand_ID=:bid");	
$statement=$connect->prepare($query);
$statement->bindparam(":bid",$bid);
$statement->bindparam(":bname",$bname);
$statement->execute();
echo
("<div class='alert alert-warning' style='background:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
Brand Is Successfully Updated
</div>");	
}
}
}
// End of searchupdatebrand function

// Start of searchcategory
public function searchcategory($connect)
{
if(isset($_POST['searchcategory']))
{
$query=("select * from category");
$statement=$connect->prepare($query);
$statement->execute();
echo("<label class='label-control'>Select A Category</label>");
echo("<select id='txt_add_category_id' name='txt_add_category_id' class='form-control'>");
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$cid=$result['Category_ID'];	
$cname=$result['Category_Name'];
?>
<option value='<?php echo($cid);?>'>
<?php echo($cname);?>
</option>
<?php }
echo("</select>");
}
}
// End of searchcategory
}
// End of class brand
?>
