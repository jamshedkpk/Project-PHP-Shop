<?php
include_once("Database_Connection.php");
$obj=new category();
$obj->searchcategory($connect);
$obj=new category();
$obj->addcategory($connect);
$obj=new category();
$obj->deletecategory($connect);
$obj=new category();
$obj->searchupdatecategory($connect);
$obj=new category();
$obj->updatecategory($connect);

// End of class category
class category
{
// Start of searchcategory function	
public function searchcategory($connect)
{
if (isset($_POST['searchcategory']))
{
$query=("select * from category");
$statement=$connect->prepare($query);
$statement->execute();
while ($result=$statement->fetch(PDO::FETCH_ASSOC))
{
$cid=$result['Category_ID'];
$cname=$result['Category_Name'];
 ?>
<tr>
<td>
<?php echo($cid);?>
</td>
<td>
<?php echo($cname);?>
</td>
<td>
<a href='' data-toggle='modal' data-target='#modal_update_category'>
<span class='fa fa-edit' id='btn_update' Category_ID=<?php echo($result['Category_ID']);?>></span>
</a>
</td>
<td>
<a href="">
<span class='fa fa-trash' Category_ID=<?php echo($result['Category_ID']);?> id='btn_delete_category'></span>
</a>
</td>
</tr>
<?php }
}
}
// End of searchcategory function	

// Start of addcategory function
public function addcategory($connect)
{
if(isset($_POST['addcategory']))
{
$cname=trim($_POST['txt_add_category']);
$validcname='/^[a-z ]+$/i';
$resultcname=preg_match($validcname,$cname);
$query=("select * from category where Category_Name=:Name");
$statement=$connect->prepare($query);
$statement->bindparam(':Name',$cname);
$statement->execute();
$count=$statement->rowCount();
if($cname=='')
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:orange;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Category Name
</strong>
</div>");
return false;	
}
else if($resultcname==false)
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:orange;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Valid Name For Category
</strong>
</div>");	
}
else if($count>0)
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:orange;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Category Name Is Already Exist Try Another Name
</strong>
</div>");		
}
else
{
$query=("insert into category (Category_Name) values(:Name)");
$statement=$connect->prepare($query);
$statement->bindparam(':Name',$cname);
$ans=$statement->execute();
if($ans==true)
{
echo("
<div class='alert alert-warning' style='text-align:center; color:white; background:limegreen;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Record Is Successfully Added
</strong></div>");		
}
}
}
}
// End of addcategory function

// Start of deletecategory function
public function deletecategory($connect)
{
if(isset($_POST['deletecategory']))
{
$cid=$_POST['cid'];
$query=("delete from category where Category_ID=:cid");
$statement=$connect->prepare($query);
$statement->bindparam(':cid',$cid);
$ans=$statement->execute();
if($ans==true)
{
echo("<div class='alert alert-success' style='background:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>&times;</div>
<strong>
Category Is Successfully Deleted
</strong>
</div> ");
}
}
}
// End of deletecategory function

// Start of searchupdatecategory function
public function searchupdatecategory($connect)
{
if(isset($_POST['searchupdatecategory']))
{
$cid=$_POST['cid'];
$query=("select * from category where Category_ID=:cid");
$statement=$connect->prepare($query);
$statement->bindparam(':cid',$cid);
$statement->execute();
while($result=$statement->fetch(PDO::FETCH_ASSOC))
{ ?>
<div class="form-group">
<input type="hidden" id="txt_update_category_id" name="txt_update_category_id" value="<?php echo($result['Category_ID']); ?>" class="form-control">
</div>
<div class="form-group">
<label class="label-control">Name :</label>
<input type="text" id="txt_update_category_name" name="txt_update_category_name" value="<?php echo($result['Category_Name']); ?>" class="form-control">
</div>
<div class="form-group">
<button type="button" id="btn_update_category" name="btn_update_category" class="btn btn-info">
<span class="fa fa-edit"></span>
Update Category</button>
</div>


<?php }
}
}
// End of searchupdatecategory function
public function updatecategory($connect)
{
if(isset($_POST['updatecategory']))
{
$cid=$_POST['txt_update_category_id'];
$cname=trim($_POST['txt_update_category_name']);
$validcname='/^[a-z ]+$/i';
$resultcname=preg_match($validcname,$cname);
if($cname=='')
{
echo
("<div class='alert alert-warning' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Name For Category
</strong>
</div>");
}
else if($resultcname==false)
{
echo
("<div class='alert alert-warning' style='background:orange; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Please Enter A Valid Name For Category
</strong>
</div>");	
}
else
{
$query=("update category set Category_Name=:cname where Category_ID=:cid");	
$statement=$connect->prepare($query);
$statement->bindparam(":cid",$cid);
$statement->bindparam(":cname",$cname);
$statement->execute();
echo
("
<div class='alert alert-warning' style='background:limegreen; color:white; text-align:center;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Category Is Successfully Updated
</strong>
</div>
");	
}
}
}
}
// End of class category
?>