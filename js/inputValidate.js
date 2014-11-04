//regex values to compare

var email = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
var numbers = /^[0-9\b]+$/;
var alpha = /^[A-Za-z ]+$/;
var phone = /^[0-9\(\)\+\ ]*$/;

//for validating login
function loginValidate()
{
	if((document.loginform.username.value == ""))
	{
		alert( "Please type a username." );
		document.loginform.username.focus() ;
		return false;
	}
	if(document.loginform.password.value == "")
	{
		alert( "Please type a password." );
		document.loginform.password.focus() ;
		return false;		
	}
	return( true );
}

