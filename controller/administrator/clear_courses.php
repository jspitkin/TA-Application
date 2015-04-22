<?php
    include './../../controller/main/db_config.php';
    

		// Connect to the data base and select it.
		$db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		// Clear the course_enrollment page
  	$query =     "
       		DELETE FROM course_enrollment";

 		$statement = $db->prepare( $query );
  	$statement->execute(  );

    // Clear the courses page
    $query =     "
          DELETE FROM courses";

    $statement = $db->prepare( $query );
    $statement->execute(  );

    // Redirect back to the course list table
    header("location: ./../../view/administrator/course_list.php");
?>