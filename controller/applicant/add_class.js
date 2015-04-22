// A form element to be added when "Add Class" is clicked
var newClass = '<label>Department Code: ' +
      '<input type="text" name="department" value="CS" id="department_add_class" class="valid_input"></label>' +
      '<label>Course Number: ' +
      '<input type="text" name="course_number" class="course_add_class"></label><br>';

// RegEx pattern for 4 digits only
var numbersOnlyPattern = new RegExp("^[0-9]{4}$");

// Pattern matching only letters
var lettersOnlyPattern = new RegExp("^[a-zA-Z]+$");

$(document).ready(function() {
	// When "Add Class" button is clicked, the form is expanded to include another field
	// Additionally, adds event handlers for validation
	$('#add_class').click(function () {
  		$('#classes').append(newClass);

  		// Checks if the department is letters only
		$('#department_add_class').keyup(function () { 
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
	});

	// Checks if the course number is 4 digits
	$('.course_add_class').keyup(function () { 
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
	});

	});

	// Checks if the department is letters only
	$('#department_add_class').keyup(function () { 
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
	});

	// Checks if the course number is 4 digits
	$('.course_add_class').keyup(function () { 
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
	});
});