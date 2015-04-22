// Validation for the account creation page

// Start all input fields with the empty class
$(document).ready(function() {
   $('input').addClass('empty'); 

	// RegEx pattern for characters and spaces only
	// First character must be a character and is followed
	// by up to 24 characters and/or spaces
	var letterPattern = new RegExp("^[a-zA-Z]{1}[a-zA-Z\\s]{0,24}$");

	// Simple e-mail regex, not extensive by any means
	var emailPattern = new RegExp("^.+[@]{1}.+[\.]{1}.+$");

	// Checks if the first name is valid and changes the class of element
	$('#first_name').keyup(function () {
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(letterPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the last name is valid and changes the class of element
	$('#last_name').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(letterPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

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

	// Checks if the e-mail verify is 8 characters or more
	$('#password_verify').keyup(function () { 
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
