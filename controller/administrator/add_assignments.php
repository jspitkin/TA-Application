<?php
//Information to connect to the database
include './../../controller/main/db_config.php';  

if (empty($_POST['classID']) || empty($_POST['userID']) || empty($_POST['selection']))
{
	//Ensure all three needed variables are not empty
}
else
{
//Attempt to write the submitted form to the database
try
{
  // Connect to the data base and select it.
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  // Determine if we must add or delete an assignment
  if($_POST['selection'] == 'unassign')
  {
  	//Delete the proper row
  	$sql = "
  		DELETE FROM ta_assignments WHERE ta_assignments.idusers='" .
  		$_POST['userID'] . "'
  	";
  }
  else 
  {
  	// Prepare a query to add the new assignment to the database
  	$sql =     "
       INSERT INTO ta_assignments ( idusers, status, course_id)
       VALUES ( :idusers, :status, :course_id)
   	";
  }

  // Prepare and execute the query
  $query = $db->prepare( $sql );
  $query->execute( array( ':idusers'=>$_POST['userID'], ':status'=>$_POST['selection'], 
    ':course_id'=>$_POST['classID'] ) );

}
catch (PDOException $ex)
{
  echo "<p>oops</p>";
  echo "$ex";
}
}

?>