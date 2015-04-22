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


    print_r($_SESSION['user']);

?>