$(document).ready(function(){
/*
When button btn_edit_profile in Edit_Profile.php is Cliked then it send ajax request to Action_Edit_Profile.php
*/
$("#btn_edit_profile").click(function(){
var name=$("#Admin_name").val();
var email=$("#Admin_email").val();
var password_new=$("#Admin_new_password").val();
var password_confirm=$("#Admin_re_enter_password").val();
var form_data=$('form').serialize();
$.ajax
({
type:'POST',
url:'Action_Edit_Profile.php',
data:form_data,
success:function(feedback)
{
$("#message").html(feedback);
}	
});
});
});