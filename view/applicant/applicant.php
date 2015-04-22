<?php
include_once './../../model/main/user.php';
session_start();
include './../../controller/main/db_config.php';
?>

<!--By: Jake Pitkin on February 11, 2015
    Hello page after logging in as an applicant-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="applicant.css">
  <title><?php echo $_SESSION['user']->getName(); ?></title>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing</p>
  </div>
  <?php include '../../controller/main/header.php'; ?>
  <div id="content">
    <h3>Hello <?php echo $_SESSION['user']->getName(); ?>!</h3>
    <h4>Logged in as an <?php echo $_SESSION['user']->getRole(); ?>.</h4>
  </div> 
  <div id="applications">
    <h3> The Status of Applied Positions: </h3>
<?php


    // Connect to the data base and select it.
    $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Get all the users who are applicants
      $query =     "
          SELECT * FROM courses NATURAL JOIN ta_assignments WHERE idusers='" . $_SESSION['user']->getID() . "'";

    $statement = $db->prepare( $query );
      $statement->execute(  );

      $course = $statement->fetch(PDO::FETCH_ASSOC);

        $status_output = "<h3 class='ta_info'>Course: " . $course['department'] . " " . $course['course_number'] . " " . $course['title'] . "</h3>";
        $status_output .= "<h3 class='ta_info'>Instructor: " . $course['instructor'] . "</h3>";
        $status_output .= "<h3 class='ta_info'>" . "Status: " . $course['status'] . "</h3>";

        echo $status_output;  
      


?>
  </div>
</body>
</html>