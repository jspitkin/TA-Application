<?php 
//Saves the application to the database
include './../../controller/applicant/save_application.php'; 
?>

<!-- Reports back to the user their application -->
<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="application.css">
  <title>Application for <?php echo $firstname ?></title>
  <body>
    <div id="header">
      <p>University of Utah School of Computing</p>
    </div>
    <div id="report">
      <h2>Summary of your submitted application:</h2>
      <ul>
        <li>First Name: <?php echo $firstname ?></li>
        <li>Last Name: <?php echo $lastname ?></li>
        <li>University ID: <?php echo $uid ?></li>
        <li>E-mail: <?php echo $email ?></li>
        <li>Day Phone: <?php echo $dayphone ?></li>
        <li>Evening Phone: <?php echo $eveningphone ?></li>
        <li>Address: <?php echo $address ?></li>
        <li>Apt Num: <?php echo $aptnum ?></li>
        <li>City: <?php echo $city ?></li>
        <li>State: <?php echo $state ?></li>
        <li>Zip Code: <?php echo $zipcode ?></li>
        <li>Are you pursuing a degree from the School of Computing? <?php echo $socstudent ?></li>
        <li>If not, what is your major? <?php echo $major ?></li>
        <li>Degree program: <?php echo $degree ?></li>
        <li>GPA: <?php echo $gpa ?></li>
        <li>Will you be employed other than being a TA? <?php echo $otheremployment ?></li>
        <li>If so, how many hours will you work outside of being a TA? <?php echo $otherhours ?></li>
        <li>Will you be avilable the week before school starts? <?php echo $outoftown ?></li>
        <li>How many hours can you dedicate to being a TA? <?php echo $availablehours ?>
        <li>Do you grant the SoC the right to look at your grades? <?php echo $checksoc ?></li>
        <li>A little more about you: <?php echo $extrainfo ?></li>
      </ul>
      <h3 id="under_construction"> UNDER CONSTRUCTION: In the future this application will be linked to a user and the user can view all their applications. In addition, there will be the classes they have applied for with the status of their application for each class. This will rely on instructor and admin input.</h3>
    </div>
  </body>
</html>
