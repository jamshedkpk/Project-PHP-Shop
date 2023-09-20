$(document).ready(function()
{
// Start of addproductintocart function
$("body").delegate("#btn_add_product_cart","click",function(event){
event.preventDefault();
var pid=$(this).attr('pid');
addproductintocart(pid);	
cartamount();
});
function addproductintocart(pid)
{
$.ajax
({
url:'Action_Cart.php',
type:'POST',
data:{addproductintocart:1,pid:pid},
success:function(feedback)
{
$("#message_cart_add").html(feedback);	
displayproductincart();
}	
});
}
// End of addproductintocart function

// Start of displayproductincart function
$("body").delegate("#cart_container","click",function(event){
event.preventDefault();
displayproductincart();	
});
function displayproductincart()
{
$.ajax
({
url:'Action_Cart.php',
type:'POST',
data:{displaycartproduct:1},
success:function(feedback)
{
$("#cart_product").html(feedback);	
}	
})
}
// End of displayproductincart function
// Start of displayproduct function
displayproduct();
function displayproduct()
{
$.ajax
({
url:'Action_Cart.php',
type:'POST',
data:{displayproduct:1},
success:function(feedback)
{
$("#message_cart_product").html(feedback);	
}	
});
}
// End of displayproduct function

// Start of productquantity function
$("body").delegate(".qty","keyup",function(){
var pid=$(this).attr('pid');
var quantity=$("#qty-"+pid).val();
var price=$("#price-"+pid).val();
var total=(quantity*price);
$("#total-"+pid).val(total);
});
// End of productquantity function

// Start of deleteproduct function
$("body").delegate("#deletecartproduct","click",function(event){
event.preventDefault();
var pid=$(this).attr('delete_pid');
deleteproduct(pid);
});
function deleteproduct(pid)
{
$.ajax
({
url:'Action_Cart.php',
type:'POST',
data:{deleteproduct:1,pid:pid},
success:function(feedback)
{
$("#msg").html(feedback);	
displayproduct();
}	
});	
}
// End of deleteproduct function

// Start of updateproduct function
$("body").delegate(".update","click",function(event){
event.preventDefault();
var pid=$(this).attr('update_pid');
var quantity=$("#qty-"+pid).val();
var price=$("#price-"+pid).val();
var total=$("#total-"+pid).val();
updateproduct(pid,quantity,price,total);
});
function updateproduct(pid,quantity,price,total)
{	
$.ajax
({
url:'Action_Cart.php',
type:'POST',
data:{updateproduct:1,pid:pid,quantity:quantity,price:price,total:total},
success:function(feedback)
{
$("#msg").html(feedback);	
displayproduct();
}	
});	
}
// End of updateproduct function
// Start of cart_amount function
cartamount();
function cartamount()
{
$.ajax
({
url:'Action_Cart.php',
type:'POST',
data:{cartamount:1},
success:function(feedback)
{
$("#cart_amount").html(feedback);	
}	
});	
}
// End of cart_amount function
$("body").delegate("#btn","click",function(){
});
});