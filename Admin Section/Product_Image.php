<?php
if (isset($_POST['btnsubmit']))
{
$imagename=$_FILES["image"]["name"];
$imagesize=$_FILES["image"]["size"];
$imageext=explode(".",$imagename);
$imageext=end($imageext);
$imagetmp=$_FILES["image"]["tmp_name"];
$imagestore="Images/".$imagename;
if($imagename=="")
{
echo("Please Select An Image File");
}
else if(($imageext!='jpeg')&&($imageext!='jpg')&&($imageext!='png')&&
($imageext!='gif')&&($imageext!='ico'))
echo("Please Select An Image File");
else if($imagesize>2000000)
{
echo("Please Select An Image Having Maximum Size Of 2 MB");
}
else if(isset($_GET['pid']))
{
$connect=mysqli_connect("localhost","root","","khanstore");
move_uploaded_file($imagetmp,$imagestore);
$pid=$_GET['pid'];
$query=("update product set Product_Image='$imagestore' where Product_ID='$pid' ");
$ans=mysqli_query($connect,$query);
if($ans)
{
$msg=("
<div class='alert alert-success' style='background:limegreen; color:white; width:600px;'>
<div class='close' data-dismiss='alert'>
&times;
</div>
<strong>
Product Image Is Successfully Updated
</strong>
</div>
");
}
}
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="Bootstrap/Css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="Bootstrap/Fontawesome/css/Fontawesome-all.min.css">
<link type="text/css" rel="stylesheet" href="Style_Header.css">
<script type="text/javascript"  src="Bootstrap/js/JQuery.js"></script>
<script type="text/javascript"  src="Bootstrap/js/bootstrap.js" ></script>
<title>Login Page</title>
<style>
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
</br>
</br>
</br>
<center>
<?php
if (isset($msg))
{
echo($msg);
}
?>
<label class="label-control">Please Select An Image File For Product:</label>
</br>
<input type="file" id="image" name="image"/>
</br>
<hr>
<button type="submit" name="btnsubmit" class="btn btn-primary">Upload</button>
</center>
</form>
</body>
</html>