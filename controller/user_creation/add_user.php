<?php
session_start();
  // Library to hash and verify passwords
  require "./../main/password.php";

  $error=''; 

  // Check if the submission fields are all non-empty
  if (isset($_POST['submit'])) { 
    if (empty($_POST['email']) || empty($_POST['password']) 
        || empty($_POST['first_name']) || empty($_POST['last_name'])) {
      $error = "please complete all fields";
    }
    else 
    {
      //Attempt to write the submitted form to the database
      try
      {
        
        // Check if the email is already registered
        // If not, add the user
        if(alreadyUser()) {
          $error = "e-mail already in use";
        }
        else if($_POST['password'] != $_POST['password_verify']) {
          $error = "passwords do not match";
        }
        else {
          addUser();
        
        }
      } 
      catch (PDOException $ex)
      {
        echo "<p>Something went wrong. :(</p>";
        echo "$ex";
      }
    }
  }

  // Returns true if the submitted e-mail is already in use.
  // False otherwise.
  function alreadyUser() {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    include "$root/Projects/TA8/controller/main/db_config.php";

    $email = $_POST["email"];
    
    // Connect to the data base and select it.
    $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Query the database and see if the e-mail is already registered to a user
    $query =     "
    SELECT password FROM users WHERE email='" . $email . "'";

    // Prepare and execute the query
    $statement = $db->prepare( $query );
    $statement->execute(  );

    // Fetch expected password from database
    $email = $statement->fetchall(PDO::FETCH_ASSOC);

    if(empty($email)) {return false;}
        return true;
  }

  //Creates a new user and adds them to the database.
  function addUser() {
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    include "$root/Projects/TA8/controller/main/db_config.php";
    include "$root/Projects/TA8/model/main/user.php";

    // Pull the data from the form into PHP variables
    $firstname = htmlspecialchars($_POST["first_name"]);
    $lastname = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    // Salt and hash the password to put into the data base
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the data base and select it.
    $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8", $db_user_name, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //Query to insert form into users table making a new user
    $sql =     "
    INSERT INTO users ( first_name, last_name, email, password ) VALUES ( :firstname, :lastname, :email, :hashed_password )
    ";

    // Prepare and execute the query
    $query = $db->prepare( $sql );
    $query->execute( array( ':firstname'=>$firstname, ':lastname'=>$lastname, 
    ':email'=>$email, ':hashed_password'=>$hashed_password ) );

    $role = "applicant";

    //Query to insert form into users table making a new user
    $sql = " INSERT INTO roles ( email, role ) VALUES ( :email, :role ) ";

    // Prepare and execute the query
    $query = $db->prepare( $sql );
    $query->execute( array( ':email'=>$email, ':role'=>$role ) );

    // Create a User object and add it to session
    $_SESSION['user']= new User($firstname, $lastname, $role, $email);

    // Redirect to the user's home page
    header("location: ./../../view/applicant/applicant.php");
  }
?>
