// Validation for the login page

// Start all input fields with the empty class
$(document).ready(function() {
   $('input').addClass('empty'); 

	// Simple e-mail regex, not extensive by any means
	var emailPattern = new RegExp("^.+[@]{1}.+[\.]{1}.+$");

	// Checks if the e-mail is valid and changes the class of element
	$('#email_login').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(emailPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the e-mail is 8 characters or more
	$('#password_login').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if($(this).val().length >= 8)
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});
});
