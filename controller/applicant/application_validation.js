// Validation for the teaching assistant application
// Fields with valid regex with be green.
// Fields that have yet to be altered will be white.
// Fields that have invalid regex will be red.

// Start all input fields with the empty class
$(document).ready(function() {
   $('input').addClass('empty'); 

	// RegEx pattern for characters and spaces only
	// First character must be a character and is followed
	// by up to 24 characters and/or spaces
	var letterPattern = new RegExp("^[a-zA-Z]{1}[a-zA-Z\\s]{0,24}$");

	// RegEx pattern for numbers only
	var numbersOnlyPattern = new RegExp("^[0-9]+$");

	// Pattern matching only letters
	var lettersOnlyPattern = new RegExp("^[a-zA-Z]+$");

	// Simple e-mail regex, not extensive by any means
	var emailPattern = new RegExp("^.+[@]{1}.+[\.]{1}.+$");

	// Pattern matching a uID number
	var uidPattern = new RegExp("^[uU0]{1}[0-9]{7}$");

	// Pattern to match an address
	var addressPattern = new RegExp("^[\.a-zA-Z\\s0-9]+$");

	// Pattern to match an apartment number
	var apartmentPattern = new RegExp("^[a-zA-Z0-9\\s]+$");

	// Pattern to match a double
	var doublePattern = new RegExp("^[0-9]+[.]{0,1}[0-9]*$")

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

	// Checks if the last name is a valid name and changes the class of element
	$('#uID').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(uidPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the email is a valid email and changes the class of element
	$('#email').keyup(function () { 
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

	// Checks if the last name is valid and changes the class of element
	$('#day_phone').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		//Checks if 10 digits were entered
		else if($(this).val().match(/\d/g).length===10)
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the day phone is valid and changes the class of element
	$('#evening_phone').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		//Checks if 10 digits were entered
		else if($(this).val().match(/\d/g).length===10)
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the address is valid and changes the class of element
	$('#address').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(addressPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if apartment number is valid and changes the class of element
	$('#aptnum').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(apartmentPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the city is valid and changes the class of element
	$('#city').keyup(function () { 
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

	// Checks if the state is valid and changes the class of element
	$('#state').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(lettersOnlyPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the zip code is valid and changes the class of element
	$('#zip').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(numbersOnlyPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the noncs major is valid name and changes the class of element
	$('#noncs_major').keyup(function () { 
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

	// Checks if the degree is valid name and changes the class of element
	$('#degree').keyup(function () { 
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

	// Checks if the gpa is valid name and changes the class of element
	$('#gpa').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(doublePattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the other hours is valid name and changes the class of element
	$('#other_hours').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(numbersOnlyPattern.test($(this).val()))
	 	{
	 		$(this).removeClass().addClass('valid_input');
	 	}
	 	else
	 	{
	 		$(this).removeClass().addClass('invalid_input');
	 	}
	 	formValid();
	});

	// Checks if the available hours is valid name and changes the class of element
	$('#avail_hours').keyup(function () { 
		if($(this).val() === "")
		{
			$(this).removeClass().addClass('empty');
		}
		else if(numbersOnlyPattern.test($(this).val()))
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


