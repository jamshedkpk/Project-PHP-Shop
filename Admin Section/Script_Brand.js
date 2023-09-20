$(document).ready(function()
{
searchbrand();
searchcategory();
$("body").delegate("#btn_add_brand","click",function(event){
event.preventDefault();
addbrand();
});
$("body").delegate("#btn_delete_brand","click",function(event){
event.preventDefault();
var cid=$(this).attr("brand_ID");
deletebrand(cid);	
});

$("body").delegate("#btn_update","click",function(event){
event.preventDefault();
var bid=$(this).attr('Brand_ID');
searchupdatebrand(bid);	
});

$("body").delegate("#btn_update_brand","click",function(event){
event.preventDefault();
updatebrand();	
});

// Start of searchbrand function
function searchbrand()
{
$.ajax
({
type:'POST',
url:'Action_Brand.php',
data:{searchbrand:1},
success:function(feedback)
{
$("#message_search_brand").html(feedback);	
}	
});
}
// End of searchbrand function

// Start of addbrand function
function addbrand()
{
var form_data=$('#form_add_brand').serialize();
$.ajax
({
type:'POST',
url:'Action_Brand.php',
data:form_data + "&addbrand=1",
success:function(feedback)
{
$("#message_add_brand").html(feedback);	
$("#form_add_brand").trigger('reset');
searchbrand();
}	
});
}
// End of addbrand function

// Start of deletebrand function
function deletebrand(bid)
{
var ans=window.confirm("Do You Want To Delete The brand");
if (ans==true)
{
$.ajax
({
type:'POST',
url:'Action_brand.php',
data:{deletebrand:1,bid:bid},
success:function(feedback)
{
$("#message_delete_brand").html(feedback)
searchbrand();
}
});	
}
}
// End of deletebrand function

// Start of Searchupdatebrand function
function searchupdatebrand(bid)
{
$.ajax
({
type:'POST',
url:'Action_brand.php',
data:{searchupdatebrand:1,bid:bid},
success:function(feedback)
{
$("#dialog_update_brand").html(feedback);
}
});
}
// End of Searchupdatebrand function
// Start of updaterecord function
function updatebrand()
{
var form_data=$("#form_update_brand").serialize();
$.ajax
({
type:'POST',
url:'Action_brand.php',
data:form_data + "&updatebrand=1",
success:function (feedback)
{
$("#message_update_brand").html(feedback);
searchbrand();
}
});
}
// End of updaterecord function

// Start of searchcategory function
function searchcategory()
{
$.ajax
({
type:'POST',
url:'Action_Brand.php',
data:{searchcategory:1},
success:function(feedback)
{
$("#category_brand").html(feedback);
}
});
}
// End of searchcategory function
});
// End of script