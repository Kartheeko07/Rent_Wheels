$(document).ready(function() {
	$(document).ready(function() {
    var x_timer;    
    $("#user_email").keyup(function (e){
        clearTimeout(x_timer);
        var user_email = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_email);
        }, 1000);
    }); 

function check_username_ajax(username){
    $("#check-e").html(("<b>Hello world!</b>");
    $.post('db.php', {'username':username}, function(data) {
      $("#check-e").html("<b>Hello world here!</b>");
    });
}
});
$("#signUp").click(function() {
var name = $("#user_name").val();
var email = $("#user_email").val();
var password1 = $("#password").val();
var cpassword = $("#cpassword").val();
var licence = $("#licence").val();
var address = $("#address").val();
if (name == '' || email == '' || password1 == '' || cpassword == '' || licence == '' ||address == '' ) {
alert("Please fill all fields...!!!!!!");
} else if ((password1.length) < 8) {
alert("Password should atleast 8 character in length...!!!!!!");
} else if (!(password1).match(cpassword)) {
alert("Your passwords doesn't match. Try again?");
} else {
$.post("dbconfig.php", {
user_name: name,
user_email: email,
password1: password1,
licence: licence,
address: address
}, function(data) {
if (data == 'You have Successfully Registered.....') {
$("form")[0].reset();
}
alert(data);
});
}
});
});