$(document).ready(function() {

	//Hide or show class information when a class is clicked
	$('.course').click(function() {
		// If the informaiton is hidden, show it
		if($(this).next().hasClass("hide"))
		{
			$(this).next().removeClass();
			$(this).next().addClass("show");
			//$(this).next().show();
		}
		
		// If the information is shown, hide it
		else if($(this).next().hasClass("show"))
		{
			$(this).next().removeClass();
			$(this).next().addClass("hide");
			//$(this).next().hide();
		}
	});

});