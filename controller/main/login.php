<?php
session_start();
	//Information to connect to the database
	include './../../../TA5/controller/main/db_config.php';
	require 'password.php';
	include './../../model/main/user.php';

	$error='';
	// Check if the email or password field are empty
	if (isset($_POST['submit'])) { 
		if (empty($_POST['email']) || empty($_POST['password'])) {
			$error = "e-mail or password is empty";
		}
		//Password and email are not empty, check for validity
		else
		{
			$email=$_POST['email'];
			$password=$_POST['password'];
			$hashed_password = password_hash($password, PASSWORD_BCRYPT);

			try
			{

		  		// Connect to the data base and select it.
				$db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		  		// Query the database for the expected password based on the e-mail
				$query =     "
				SELECT password FROM users WHERE email='" . $email . "'";

		  		// Prepare and execute the query
				$statement = $db->prepare( $query );
				$statement->execute(  );

		  		// Fetch expected password from database
				$password_from_db = $statement->fetch(PDO::FETCH_ASSOC);


				if (!password_verify($password, $password_from_db['password']))
				{
					$error = "invalid username and/or password";
				} 
				else 
				{
					// Query the database for the user's information
					$query =     "
					SELECT * FROM users WHERE email='" . $email . "'";

		  			// Prepare and execute the query
					$statement = $db->prepare( $query );
					$statement->execute(  );

		  			// Fetch expected user info from database
					$user_info = $statement->fetch(PDO::FETCH_ASSOC);

					// Query the database for the user's information
					$query =     "
					SELECT * FROM roles WHERE email='" . $email . "'";

		  			// Prepare and execute the query
					$statement = $db->prepare( $query );
					$statement->execute(  );

					// Fetch expected roles from database
					$roles = $statement->fetch(PDO::FETCH_ASSOC);

					$userID = $user_info['idusers'];
					$userName = $user_info['first_name'] . " " . $user_info['last_name'];

		    		// Add the user object as a session variable
    				$_SESSION['user']= new User($user_info['first_name'], $user_info['last_name'], 
		    			$roles['role'], $user_info['email'], $user_info['idusers']);

    				// If the user is an instructor, populate their class list
    				if($roles['role'] == 'instructor')
    				{	
    					$classesTeaching = array();
    					$classesTeaching = populateClassesTeaching($userID, $userName);
    					$_SESSION['user']->setClassTeaching($classesTeaching);
    				}

    				// Redirect the user to the proper page
    				redirect($roles['role']);
				}
			}

			catch (PDOException $ex)
			{
				echo "<p>Something went wrong. :(</p>";
				echo "$ex";
			}
		}
	}

	// Populates the new User object with all the Courses they are teaching.
	function populateClassesTeaching($userID, $userName)
	{
		include './../../model/instructor/course.php';
		include './../../../TA5/controller/main/db_config.php';

		// Connect to the data base and select it.
		$db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		// Get all the courses the user is teaching
  		$query =     "
       		SELECT * FROM offered_courses NATURAL JOIN courses 
       		WHERE instructor='" . $userID . "'";

 		$statement = $db->prepare( $query );
  		$statement->execute(  );

  		$courses = $statement->fetchAll(PDO::FETCH_ASSOC);

  		//An array of all the courses taught by the user
  		$allCourses = array();

  		// Create a course object and add it to an array
  		foreach ($courses as $course)
    	{
   			$new_course = new Course($userName, $course['year'], $course['semester'],
   				$course['department'], $course['course_number'], $course['course_title']);
   			// Add the course to the array of courses
   			array_push($allCourses, $new_course);
    	}

    	return $allCourses;
	}

	// Redirects the user to a home page based on their role
	function redirect($role) 
	{
		if($role == 'applicant') 
		{
			// Redirect to an applicant welcome page
			header("location: ./../../view/applicant/applicant.php");
		}
		else if($role == 'instructor')
		{
			// Redirect to an instructor welcome page
			header("location: ./../../view/instructor/instructor.php");
		}
		else if($role == 'admin')
		{
			// Redirect to an admin welcome page
			header("location: ./../../view/administrator/administrator.php");
		}
	}
?>

