$(document).ready(function(){
searchupdateuser();
function searchupdateuser()
{
$.ajax
({
url:'Action_User_Profile.php',
type:'POST',
data:{searchuser:1},
success:function(feedback)
{
$("#search_user_message").html(feedback);	
}		
});
}
$("body").delegate("#btn_user_update","click",function(event){
event.preventDefault();
updateuserrecord();
});
function updateuserrecord()
{
$.ajax
({
url:'Action_User_Profile.php',
type:'POST',
data:$('form').serialize() + "&updateuser=1",
success:function(feedback)
{
$("#update_user_message").html(feedback);	
}
});	
}

});