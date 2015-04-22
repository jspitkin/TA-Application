<br>
<h2>Interested Applicants:</h2>

<?php
include './../../controller/main/db_config.php';
include './../../model/main/user.php';

		// Connect to the data base and select it.
		$db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		// Get all the users who are applicants
  		$query =     "
       		SELECT * FROM users NATURAL JOIN roles WHERE role='applicant'";

 		$statement = $db->prepare( $query );
  		$statement->execute(  );

  		$users = $statement->fetchAll(PDO::FETCH_ASSOC);

  		//An array of all the courses taught by the user
  		$allUsers = array();

  		// Create a course object and add it to an array
  		foreach ($users as $user)
    	{
   			$new_user = new User($user['first_name'], $user['last_name'], $user['role'], $user['email'], $user['idusers']);
   			// Add the course to the array of courses
   			array_push($allUsers, $new_user);
    	}

    //Print each row of the table
    $list = "<table class='applicants'>";
    foreach($allUsers as &$user)
    {
      $list .= "<tr>";
      $list .=  "<td>" . $user->getName() . "</td>";
      $list .= "<td id='" . $_POST['classID'] . "'>" . "<select clas='assignment_select' id='" . $user->getID() . "'>
  							<option value='blank' disabled selected='selected'>---------</option>
  							<option value='assigned'>Assign</option>
  							<option value='probable'>Probable</option>
 							<option value='unassign'>Unassign</option>
						</select>";
	  $list .= "<td id='success_indication'> </td></tr>";
    }
    $list .= "</table>";
    echo $list;

?>

<script>
  // When a selection is changed on the assign TA table
  // Then change the database to reflect this change
  $('select').on('change', function() {
      var $clicked_thing = $(this);
  		var user_id = $(this).attr('id');
      var class_id = $(this).parent().attr('id');
  		var selected_option = $(this).val();
  		$.ajax({
        type: 'post',
        url: './../../controller/administrator/add_assignments.php',
        data: {
            userID: user_id,
            selection: selected_option,
            classID: class_id
        },
        // On success, load a form that allows for TA assignment
        success: function(html) {
            $clicked_thing.parent().next('td').html("<img src='./../../../../images/check.png' alt='Checkmark' >");
        }   
    }); 

  });
</script>