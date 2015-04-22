<?php
    include './../../controller/main/db_config.php';

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
   			$new_user = new User($user['first_name'], $user['last_name'], $user['role'], $user['email'], , $user['idusers']);
   			// Add the course to the array of courses
   			array_push($allUsers, $new_user);
    	}

    //Print each class
    $list = "<ul class='applicants'>";
    foreach($allUsers as &$user)
    {
      $list .=  "<li>" . $user->getName() . "</li>";
    }
    $list .= "</ul>";
    echo $list;
?>