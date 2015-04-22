<?php
session_start();
//Information to connect to the database
include './../../controller/main/db_config.php';  

//Attempt to write the submitted form to the database
try
{

  // Connect to the data base and select it.
  $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  // Pull the data from the form into PHP variables
  $firstname = htmlspecialchars($_POST["firstname"]);
  $lastname = htmlspecialchars($_POST["lastname"]);
  $uid = htmlspecialchars($_POST["uID"]);
  $email = htmlspecialchars($_POST["email"]);
  $dayphone = htmlspecialchars($_POST["day_phone"]);
  $eveningphone = htmlspecialchars($_POST["evening_phone"]);
  $address = htmlspecialchars($_POST["address"]);
  $aptnum = htmlspecialchars($_POST["aptnum"]);
  $city = htmlspecialchars($_POST["city"]);
  $state = htmlspecialchars($_POST["state"]);
  $zipcode = htmlspecialchars($_POST["zip"]);

  if(htmlspecialchars($_POST["soc_student"])) {
    $socstudent = "Yes";
  } else {
    $socstudent = "No";
  }

  if($_POST["noncs_major"] == "") {
    $major = "n/a";
  } else {
    $major = htmlspecialchars($_POST["noncs_major"]);
  }

  $degree = htmlspecialchars($_POST["degree"]);
  $gpa = htmlspecialchars($_POST["gpa"]);
  $otherhours = htmlspecialchars($_POST["other_hours"]);
  $availablehours = htmlspecialchars($_POST["avail_hours"]);
  $extrainfo = htmlspecialchars($_POST["extra_info"]);

  if(htmlspecialchars($_POST["other_employ"])) {
    $otheremployment = "Yes";
  } else {
    $otheremployment = "No";
  }

  if(htmlspecialchars($_POST["out_of_town"])) {
    $outoftown = "Yes";
  } else {
    $outoftown = "No";
  }

  if(htmlspecialchars($_POST["check_soc"])) {
    $checksoc = "Yes";
  } else {
    $checksoc = "No";
  }



  //Query to insert form into applications table
  $sql =     "
       INSERT INTO applications (first_name, last_name, university_id, email, day_phone,
        evening_phone, address, apt_num, city, state, zip_code, pursuing_degree, major,
        degree, gpa, other_employment, other_hours, available_week_before, available_hours,
        soc_rights, more_details ) VALUES (:firstname, :lastname, :uid, :email, :dayphone, :eveningphone, 
        :address, :aptnum, :city, :state, :zipcode, :socstudent, :major, :degree, :gpa, :otheremployment,
        :otherhours, :availableweekbefore, :availablehours, :socrights, :extrainfo )
   ";

  // Prepare and execute the query
  $query = $db->prepare( $sql );
  $query->execute( array( ':firstname'=>$firstname, ':lastname'=>$lastname, 
    ':uid'=>$uid, ':email'=>$email, ':dayphone'=>$dayphone, ':eveningphone'=>$eveningphone,
    ':address'=>$address, ':aptnum'=>$aptnum, ':city'=>$city, ':state'=>$state,
    ':zipcode'=>$zipcode, ':socstudent'=>$socstudent, ':major'=>$major, ':degree'=>$degree,
    ':gpa'=>$gpa, ':otheremployment'=>$otheremployment, 'otherhours'=>$otherhours,
    ':availableweekbefore'=>$outoftown, ':availablehours'=>$availablehours, ':socrights'=>$checksoc, ':extrainfo'=>$extrainfo ) );

}
catch (PDOException $ex)
{
  echo "<p>oops</p>";
  echo "$ex";
}

?>
