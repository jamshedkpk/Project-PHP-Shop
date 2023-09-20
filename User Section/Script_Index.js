$(document).ready(function(){
displaycategory();
// Start of displaycategory function
function displaycategory()
{
$.ajax({
url:'Action_Index.php',
type:'POST',
data:{category:1},
success:function(feedback)
{
$("#display_categories").html(feedback);	
}
});	
}
// End of displaycategory function
// Start of displaybrand function
displaybrand();
function displaybrand()
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{brand:1},
success:function(feedback)
{
$("#display_brands").html(feedback);	
}
});
}
// End of displaybrand function

// Start of displayproduct function
displayproduct();
function displayproduct()
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{product:1},
success:function(feedback)
{
$("#display_products").html(feedback);	
}	
});
}
// End of displayproduct function

// Start of displayproductbycategory function
$("body").delegate("#cid","click",function(event){
event.preventDefault();
var cid=$(this).attr('cid');
displayproductbycategory(cid);	
});
function displayproductbycategory(cid)
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{productbycategory:1,cid:cid},
success:function(feedback)
{
$("#display_products").html(feedback);	
}	
});
}
// End of displayproductbycategory function

// Start of displayproductbybrand function
$("body").delegate("#bid","click",function(event){
event.preventDefault();
var bid=$(this).attr('bid');
displayproductbybrand(bid);	
});
function displayproductbybrand(bid)
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{productbybrand:1,bid:bid},
success:function(feedback)
{
$("#display_products").html(feedback);	
}	
});
}
// End of displayproductbybrand function
// Start of displayproductbyname function
$("body").delegate("#btn_search_product","click",function(event){
event.preventDefault();
var pname=$("#txt_search_product").val();
displayproductbyname(pname);	
});
function displayproductbyname(pname)
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{productbyname:1,pname:pname},
success:function(feedback)
{
$("#display_products").html(feedback);	
}	
});
}
// End of displayproductbyname function
// Start of usersignup function
$("body").delegate("#btn_user_signup","click",function(event)
{
event.preventDefault();
usersignup();
});
function usersignup()
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:$("form").serialize() + '&usersignup=1',
success:function(feedback)
{
$("#user_signup_message").html(feedback);	
}
});
}
// End of usersignup function

// start of usersignin function
$('body').delegate("#btn_user_signin","click",function(event){
event.preventDefault();
var useremail=$("#user_email").val();
var userpassword=$("#user_password").val();
usersignin(useremail,userpassword);
});
function usersignin(useremail,userpassword)
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{signin:1,useremail:useremail,userpassword:userpassword},
success:function(feedback)
{
$("#user_signin_message").html(feedback);
if(feedback=="")
{
window.location.assign("index.php");
}
}
});
}
// End of usersignin function
// Start of usersignout function
$("body").delegate("#user_signout","click",function(){
usersignout();
});
function usersignout()
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{usersignout:1},
success:function(feedback)
{
if(feedback=="OK")
{
window.location.assign("index.php");
}
}		
})
}
// End of usersignout function

// Start of function displaypagelink for pagination
displaypagelink();
function displaypagelink()
{
$.ajax
({
url:'Action_Index.php',
type:'POST',	
data:{pagelink:1},
success:function(feedback)
{
$("#page").html(feedback);
}
});
}
// End of function displaypagelink for pagination

// Start of displaypage function
$("body").delegate("#pagelink","click",function(event){
event.preventDefault();
var pageno=$(this).attr('pageno');
displaypage(pageno);
});
function displaypage(pageno)
{
$.ajax
({
url:'Action_Index.php',
type:'POST',
data:{displaypage:1,pageno:pageno},
success:function(feedback)
{
$("#display_products").html(feedback)	
}	
});
}
// End of displaypage function
});