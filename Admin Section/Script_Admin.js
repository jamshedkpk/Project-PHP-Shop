$(document).ready(function()
{
// Call searchrecord function at the start of the page.	
searchrecord();

// when btn_add is clicked then display modal for add Admin record
$("#btn_add").click(function(event)
{
event.preventDefault();  // Prevent the page from reloading
$("#Adminmodal").show();
});

/* 
When button btn_add_Admin  is clicked in dialog box then addrecord will be Stored.
*/
$("body").delegate("#btn_add_Admin","click",function(event)	
{
event.preventDefault();
addrecord();
});

// When button btn_delete is clicked in Action_Admin.php then deleterecord function will be called.
$("body").delegate("#btn_delete","click",function(event)
{
event.preventDefault();
var id=$(this).attr('Admin_ID');
deleterecord(id);
});

// When button btn_update is clicked in dialog box then addrecord will be called.
$("body").delegate("#btn_update","click",function(event)	
{
event.preventDefault();
var id=$(this).attr("Admin_ID");
searchupdaterecord(id);
});

/* 
When btn_update_Admin is clicked in Action_Admin.php page then record should Be Updated.
*/
$("body").delegate("#btn_update_Admin","click",function(event)	
{
event.preventDefault();
updaterecord();
});

// Start of searchrecord function
function searchrecord()
{
$.ajax
({
type:'POST',
url:'Action_Admin.php',
data:{searchrecord:1},
success:function(feedback)
{
$("#message2").html(feedback);
}
});
}
// End of searchrecord function

// Start of addrecord function
function addrecord()
{
var form_data=$("#form_add_Admin").serialize();
$.ajax
({
type:'POST',
url:'Action_Admin.php',
data:form_data + "&addrecord=1",
success:function(feedback)
{
$("#message3").html(feedback);
searchrecord();
$("#form_add_Admin").trigger("reset");
}
});	
}
// End of addrecord function

// Start of deleterecord function
function deleterecord(id)
{
var ans=window.confirm("Do You Want To Delete The Admin");
if(ans==true)
{
$.ajax({
type:'POST',
url:'Action_Admin.php',
data:{deleterecord:1,Admin_ID:id},
success:function(feedback)
{
$("#message1").html(feedback);
searchrecord();
}	
});
}
}
// End of deleterecord function
// Start of searchupdaterecord function
function searchupdaterecord(id)
{
$.ajax
({
type:'POST',
url:'Action_Admin.php',
data:{searchupdateAdmin:1,Admin_ID:id},
success:function(feedback)
{
$("#form_update_Admin").html(feedback);	
}
});
}
// End of searchupdaterecord function

// Start of updaterecord function
function updaterecord()
{
var form_data=$('#form_update_Admin').serialize();
$.ajax
({
type:'POST',
url:'Action_Admin.php',
data:form_data + "&updaterecord=1",
success:function(feedback)
{
$("#message4").html(feedback);
searchrecord();
}	
});
}
// End of searchupdaterecord function
});
// End of script