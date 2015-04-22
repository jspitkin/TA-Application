<?php
include_once './../../model/main/user.php';
include_once './../../model/instructor/course.php';
session_start();
?>

<!--By: Jake Pitkin on January 27, 2015
    Instructor initial view for teaching
    application web projects.-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="administrator.css">
  <title><?php echo $_SESSION['user']->getName(); ?></title>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing</p>
  </div>
  <?php include './../../controller/main/header.php'; ?>
  <div id="courses">
    <h3> All the applicants this semester: </h3>
    <?php include './../../controller/administrator/display_applicants.php'; ?>
  </div>
</body>
</html>
