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
  <script src="./../../controller/main/jquery-1.11.2.min.js"></script>
  <script src="./../../controller/administrator/course_list_control.js"></script>
  <script src="./../../controller/administrator/assign_ta.js"></script>
  <title>Admin</title>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing</p>
  </div>
  <?php include './../../controller/main/header.php'; ?>

  <div id="courses">
    <h3>Select a semester to generate course information</h3>
  <form method='POST' action='./../../controller/administrator/update_table.php'>
    <select name="semester">
      <option value="sp_2015">Spring 2015</option>
      <option value="fa_2014">Fall 2014</option>
      <option value="su_2014">Summer 2014</option>
      <option value="sp_2014">Spring 2014</option>
      <option value="fa_2013">Fall 2013</option>
      <option value="su_2013">Summer 2013</option>
      <option value="sp_2013">Spring 2013</option>
      <option value="fa_2012">Fall 2012</option>
      <option value="su_2012">Summer 2012</option>
      <option value="sp_2012">Spring 2012</option>
      <option value="fa_2011">Fall 2011</option>
      <option value="su_2011">Summer 2011</option>
      <option value="sp_2011">Spring 2011</option>
      <option value="fa_2010">Fall 2010</option>
      <option value="su_2010">Summer 2010</option>
      <option value="sp_2010">Spring 2010</option>
      <option value="fa_2009">Fall 2009</option>
      <option value="su_2009">Summer 2009</option>
      <option value="sp_2009">Spring 2009</option>
      <option value="fa_2008">Fall 2008</option>
      <option value="su_2008">Summer 2008</option>
      <option value="sp_2008">Spring 2008</option>
      <option value="fa_2007">Fall 2007</option>
    </select>
    <input type="submit" name="add_courses" id="add_courses" value="Select Semester">
    <input type="submit" name="remove_courses" id="remove_courses" value="Clear Courses">
  </form>
    <?php include './../../controller/administrator/display_courses.php'; ?>

  </div>
</body>
</html>
