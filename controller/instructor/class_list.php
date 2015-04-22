<?php
  // Get the instructors courses out of their User object
  $classesTeaching = $_SESSION['user']->getClassesTeaching();
  //Print each one to the screen in an unorderedlist
  $list = "<ul>";
  foreach($classesTeaching as &$class)
  {
    $list .=  "<li id='instructors_course'>" . $class->getName() . "</li>";
  }
  $list .= "</ul>";
  echo $list;
?>
