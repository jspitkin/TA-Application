<?php
    include './../../controller/main/db_config.php';
    

		// Connect to the data base and select it.
		$db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

		// Get all the courses
  		$query =     "
       		SELECT * FROM courses JOIN course_enrollment ON courses.course_id = course_enrollment.course_id";

 		$statement = $db->prepare( $query );
  	$statement->execute(  );

  	$courses = $statement->fetchAll(PDO::FETCH_ASSOC);

    $list = "<h3>All the courses for the selected semester</h3>";
    $list .= "<h4>(click a course for more information)</h4>";
    //Print each course for the semester
    $list .= "<ul id='course_list'>";
    foreach($courses as $course)
    {
      // Calculate how many seats remain for the class
      $remaining_seats = (int)$course['enrollment_cap'] - (int)$course['currently_enrolled'];
      // Class name, department, course number and component
      $list .= "<li class='course'>" . $course['department'] . " " . $course['course_number'] 
      . " " . $course['title'] . " (" . $course['component'] . ")</li>";
      // Extra information that will remain hidden until the class name is clicked
      $list .= "<li id='extra_info' class='hide'> Units: " . $course['units'] . "<br>Time: "
            . $course['time'] . "<br>Location: " . $course['location'] . "<br>Instructor: " . $course['instructor']
            . "<br>" . "<br>Enrollment Cap: " . $course['enrollment_cap'] . "<br>Currently Enrolled: " . $course['currently_enrolled']
            . "<br>Remaining Seats: " . $remaining_seats . "<br><br>"
            . "<button type='button' class='assign_ta_button' id='" . $course['course_id'] . "'>Assign TAs</button><br></li>";
    }
    $list .= "</ul>";
    echo $list;
?>