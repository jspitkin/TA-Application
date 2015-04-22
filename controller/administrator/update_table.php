<?php


// If add was clicked update the course table to reflect the selected year.
// If remove was clicked remove all classes from the course table.
if (isset($_POST["add_courses"])){
  include './../../controller/administrator/get_courses.php';
  include './../../controller/administrator/get_course_enrollment.php';
} else if (isset($_POST["remove_courses"])){
  include './../../controller/administrator/clear_courses.php';
}

?>