<?php
//Information to connect to the database
include './../../controller/main/db_config.php';  

//Attempt to write the submitted form to the database
try
{

  // Connect to the data base and select it.
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  //Query to insert the course into the courses table
  $sql =     "
       INSERT INTO course_enrollment ( course_number, enrollment_cap, currently_enrolled ) 
       VALUES ( :course_number, :enrollment_cap, :currently_enrolled )
   ";

  // Prepare and execute the query
  $query = $db->prepare( $sql );
  $query->execute( array( ':course_number'=>$course_catalog_number, 
    ':enrollment_cap'=>$enrollment_cap, ':currently_enrolled'=>$currently_enrolled ) );

  // Redirect back to the course list table
  header("location: ./../../view/administrator/course_list.php");

}
catch (PDOException $ex)
{
  echo "<p>oops</p>";
  echo "$ex";
}

?>