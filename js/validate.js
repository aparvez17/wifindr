function formValidation()
{
var passid = document.registration.password;
var passcheck = document.registration.passwordCheck;
var uname = document.registration.username;
var uemail = document.registration.email;

{
if(passid_validation(passid,7,12,passcheck))
{
if(allLetter(uname))
{
if(ValidateEmail(uemail))
{
	return true;
} 
}
}
}
return false;

} 
function passid_validation(passid,mx,my,passcheck2)
{
	
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx || passid == passcheck2)
{
alert("Password should not be empty / length be between "+mx+" to "+my + "/ Passwords do not match");
passid.focus();
return false;
}
return true;
}
function allLetter(uname)
{ 
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('Username must have alphabet characters only');
uname.focus();
return false;
}
}
function ValidateEmail(uemail)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(uemail.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
return false;
}
} 