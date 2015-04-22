<?php		
	include_once './../../model/main/user.php';

	// If there is a user logged in, display a header for them
	if (isset($_SESSION['user']))
	{

		// Header for a user signed in as an applicant
		$applicant_header = '<div id="nav">' .
							'<ul id="nav_list">
								<li><a href="../../view/applicant/applicant.php">Home</a></li>
								<li> • </li>
								<li><a href="../../view/applicant/application.php">Apply for Positions</a></li>
								<li> • </li>
								<li><a href="../../controller/main/logout.php">Log Out</a></li>
							</ul> 
			 				</div>';
		// Header for a user signed in as an instructor
		$instructor_header = '<div id="nav">' .
							'<ul id="nav_list">
								<li><a href="../../view/instructor/instructor.php">Courses</a></li>
								<li> • </li>
								<li><a href="../../controller/main/logout.php">Log Out</a></li>
							</ul> 
			 				</div>';
		// Header for a user signed in as an admin
		$admin_header = '<div id="nav">'.
							'<ul id="nav_list">
								<li><a href="../../view/administrator/applicant_pool.php">Applicant Pool</a></li>
								<li> • </li>
								<li><a href="../../view/administrator/course_list.php">Course List</a></li>
								<li> • </li>
								<li><a href="../../controller/main/logout.php">Log Out</a></li>
							</ul> 
			 				</div>';
		// Choose navigation bar based on role
		if ($_SESSION['user']->getRole() == 'applicant') {
			echo $applicant_header;
		} 
		else if ($_SESSION['user']->getRole() == 'instructor') {
			echo $instructor_header;
		} 
		else if ($_SESSION['user']->getRole() == 'admin') {
			echo $admin_header;
		}
	}
?>