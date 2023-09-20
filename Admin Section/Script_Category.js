$(document).ready(function()
{
searchcategory();
$("body").delegate("#btn_add_category","click",function(event){
event.preventDefault();
addcategory();
});
$("body").delegate("#btn_delete_category","click",function(event){
event.preventDefault();
var cid=$(this).attr("Category_ID");
deletecategory(cid);	
});

$("body").delegate("#btn_update","click",function(event){
event.preventDefault();
var cid=$(this).attr('Category_ID');
searchupdatecategory(cid);	
});

$("body").delegate("#btn_update_category","click",function(event){
event.preventDefault();
updatecategory();	
});

// Start of searchcategory function
function searchcategory()
{
$.ajax
({
type:'POST',
url:'Action_Category.php',
data:{searchcategory:1},
success:function(feedback)
{
$("#message_search_category").html(feedback);	
}	
});
}
// End of searchcategory function

// Start of addcategory function
function addcategory()
{
var form_data=$('#form_add_category').serialize();
$.ajax
({
type:'POST',
url:'Action_Category.php',
data:form_data + "&addcategory=1",
success:function(feedback)
{
var ans=$("#message_add_category").html(feedback);
$("#form_add_category").trigger('reset');
searchcategory();
}	
});
}
// End of addcategory function

// Start of deletecategory function
function deletecategory(cid)
{
var ans=window.confirm("Do You Want To Delete The Category");
if (ans==true)
{
$.ajax
({
type:'POST',
url:'Action_Category.php',
data:{deletecategory:1,cid:cid},
success:function(feedback)
{
$("#message_delete_category").html(feedback)
searchcategory();
}
});	
}
}
// End of deletecategory function

// Start of Searchupdatecategory function
function searchupdatecategory(cid)
{
$.ajax
({
type:'POST',
url:'Action_Category.php',
data:{searchupdatecategory:1,cid:cid},
success:function(feedback)
{
$("#dialog_update_category").html(feedback);
}
});
}
// End of Searchupdatecategory function
// Start of updaterecord function
function updatecategory()
{
var form_data=$("#form_update_category").serialize();
$.ajax
({
type:'POST',
url:'Action_Category.php',
data:form_data + "&updatecategory=1",
success:function (feedback)
{
$("#message_update_category").html(feedback);
searchcategory();
}
});
}
// Start of updaterecord function
});
// End of script