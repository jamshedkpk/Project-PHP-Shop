$(document).ready(function(){
searchproduct();
searchcategory();
searchbrand();

$("body").delegate("#btn_add_product","click",function(event)
{
event.preventDefault();
addproduct();
});

$("body").delegate("#btn_delete_product","click",function(event)
{
event.preventDefault();
var pid=$(this).attr('pid');
deleteproduct(pid);
});

$("body").delegate("#txt_add_category_id","change",function(event)
{
event.preventDefault();
var cid=$(this).val();
searchbrand(cid);
});

$("body").delegate("#btn_update","click",function(event){
event.preventDefault();
var pid=$(this).attr('pid');	
searchupdateproduct(pid);
});


$("body").delegate("#btn_update_product","click",function(event){
event.preventDefault();
updateproduct();
});


// Start of searchproduct function
function searchproduct()
{
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:{searchproduct:1},
success:function(feedback)
{
$("#message_search_product").html(feedback);
}
});
}
// End of searchproduct function

// Start of searchcategory function
function searchcategory()
{
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:{searchcategory:1},
success:function(feedback)
{
$(".message_search_category").html(feedback);
}
});
}
// End of searchcategory function

// Start of searchbrand function
function searchbrand(cid)
{
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:{searchbrand:1,cid:cid},
success:function(feedback)
{
$(".message_search_brand").html(feedback);
}
});
}
// End of searchbrand function

// Start of addproduct function
function addproduct()
{
var form_data=$(".form_product_add").serialize();
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:form_data + "&addproduct=1",
success:function(feedback)
{
var msg=$("#message_add_product").html(feedback);
$(".form_product_add").trigger('reset');
searchproduct();
}
});
}
// End of addproduct function

// Start of deleteproduct function
function deleteproduct(pid)
{
var ans=window.confirm("Do You Want To Delete The Product");
if(ans==true)
{
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:{deleteproduct:1,pid:pid},
success:function(feedback){
$("#message_delete_product").html(feedback);
searchproduct();
}
});
}
}
// End of deleteproduct function
// Start of searchupdateproduct
function searchupdateproduct(pid)
{
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:{searchupdateproduct:1,pid:pid},
success:function(feedback)
{
$("#message_search_update_product").html(feedback);
}		
});
}
// End of searchupdateproduct

// Start of updateproduct function
function updateproduct()
{
var form_data=$(".form_product").serialize();
$.ajax
({
type:'POST',
url:'Action_Product.php',
data:form_data + "&updateproduct=1",
success:function(feedback)
{
$("#message_update_product").html(feedback);	
searchproduct();
}	
});
}
// End of updateproduct function
});
// End of script
