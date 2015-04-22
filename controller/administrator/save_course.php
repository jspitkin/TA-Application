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
       INSERT INTO courses ( department, course_number, title, component, units, time, location, instructor ) 
       VALUES ( :department, :course_number, :title, :component, :units, :time, :location, :instructor )
   ";

  // Prepare and execute the query
  $query = $db->prepare( $sql );
  $query->execute( array( ':department'=>$department, ':course_number'=>$course_catalog_number, 
    ':title'=>$title, ':component'=>$component, ':units'=>$units, ':time'=>$time, 
    ':location'=>$location, ':instructor'=>$instructor ) );

}
catch (PDOException $ex)
{
  echo "<p>oops</p>";
  echo "$ex";
}

?>
