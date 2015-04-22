<?php 
// Handles users logging into the page
include('../../controller/main/login.php');  
?>

<!--By: Jake Pitkin on January 27, 2015
    Main page of teaching assistant application
    web app. Allows the user to login or create
    a new account.-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="main.css">
  <script src="./../../controller/main/jquery-1.11.2.min.js"></script>
  <script src="./../../controller/main/signin_validation.js"></script>
  <title>Teaching Assistant Application</title>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing</p>
  </div>
  <?php include './../../controller/main/header.php'; ?>
  <div id="content">
    <div id="login">
      <h2>Login</h2>
      <form method='POST' action=''>
      <label id="email_label">e-mail: <input type="email" name="email" id="email_login" required></label><br>
      <label>password: <input type="password" name="password" id="password_login" required></label><br>
      <h4 id="bad_login"> <?php echo $error; ?> </h4>
      <input type="submit" id="submit_button" name="submit" value="Login">
      </form>
      <form action="./../../controller/user_creation/new_user.php" id="new_user_button">
        <input type="submit" id="submit_button" value="Create a new account">
      </form>
    </div>
  </div>
</body>
</html>