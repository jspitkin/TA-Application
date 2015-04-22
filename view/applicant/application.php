<?php
include_once './../../model/main/user.php';
session_start();
?>

<!--By: Jake Pitkin on January 27, 2015
    Form used by an applicant to apply to
    be a teaching assistant.-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="application.css">
  <title>Teaching Assistant Application</title>
  <script src="./../../controller/main/jquery-1.11.2.min.js"></script>
  <script src="./../../controller/applicant/application_validation.js"></script>
  <script src="./../../controller/applicant/add_class.js"></script>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing</p>
  </div>
  <?php include '../../controller/main/header.php'; ?>
  <div id="application">
    <h2>Tell us a little about yourself</h2>
    <form method='POST' action='finished_application.php'>
    <label>First Name: <input type="text" name="firstname" id="first_name" required></label>
    <label>Last Name: <input type="text" name="lastname" id="last_name" required></label><br>
    <label>University ID: <input type="text" placeholder="ex. 00891234"name="uID" id="uID" required></label>
    <label>E-mail: <input type="email" placeholder="example@gmail.com" name="email" id="email" required></label><br>
    <label>Day Phone: <input type="text" placeholder="801-555-1234" name="day_phone" id="day_phone" required></label>
    <label>Evening Phone: <input type="text" placeholder="801-555-1234" name="evening_phone" id="evening_phone" required></label>
    <label>Address: <input id="address" type="text" placeholder="" name="address" id="address" required></label>
    <label>Apt Num: <input type="text" name="aptnum" id="aptnum"></label> <br>
    <label>City: <input id="city" type="text" name="city" id="city" required></label>
    <label>State: <input id="state" type="text" name="state" id="state" required></label>
    <label>Zip Code: <input id="zip" type="text" name="zip" id="zip" required></label>

    <h2>Education and availability</h2>
    <label>Are you pursuing a degree from the School of Computing?
    <input type="radio" value="true" name="soc_student" required>Yes 
    <input type="radio" value="false" name="soc_student" requied>No </label> <br>
    <label>If not, what is your academic program or major:
    <input id="noncs_major" type="text" name="noncs_major" id="noncs_major"></label> <br>
    <label>Please indicate the degree program you're in:
    <input type="text" name="degree" id="degree" required></label> <br>
    <label>What is your GPA?
    <input type="text" name="gpa" id="gpa" required></label><br>
    <label>Will you be employed other than your TA position during the coming semester?
    <input type="radio" name="other_employ" value="true" required>Yes
    <input type="radio" name="other_employ" value="false" requied>No </label><br>
    <label>If so, how many hours will you work for them?
    <input type="text" value="0" name="other_hours" id="other_hours"></label><br>
    <label>Will you be available the week before school starts?
    <input type="radio" name="out_of_town" value="true" required>Yes
    <input type="radio" name="out_of_town" value="false" required>No </label><br>
    <label>How many hours will you be available to work as a TA?
    <input type="text" name="avail_hours" id="avail_hours"> </label><br>
    <label> I grant the SoC the right to review my course grades and transcripts for the purpose of making hiring decisions: <br>
    <input type="radio" name="check_soc" value="true" required>Yes
    <input type="radio" name="check_soc" value="false" requied>No </label><br>

    <h2>Indicate courses you've previously assisted:</h2>
    <div id="classes">
    <label>Department Code:
    <input type="text" name="department" value="CS" id="department_add_class" class="valid_input"></label>
    <label>Course Number:
    <input type="text" name="course_number" class="course_add_class"></label><br>
    </div>
    <input type="button" name="add_class" id="add_class" value="Add Course">


    <p>Finally, include any extra information about yourself you know like us to know:</p><br>
    <textarea name="extra_info" id="extra_info"></textarea> <br> <br>
    <input type="submit" id="submit_button" value="Submit Application">
    </form>


  </div>
</body>
</html>