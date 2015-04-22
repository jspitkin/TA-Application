<?php
session_start();
include 'add_user.php';
?>

<!--By: Jake Pitkin on February 11, 2015
    Allows users to sign-up and create a 
    new account.-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="new_user.css">
  <script src="./../main/jquery-1.11.2.min.js"></script>
  <script src="./newuser_validation.js"></script>
  <title>Teaching Assistant Application</title>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing.</p>
  </div>
  <?php include './../main/header.php'; ?>
  <div id="content">
    <div id="login">
      <h2>Let's make you an account:</h2>
      <form method='POST' action=''>
      <label>first Name: <input type="text" name="first_name" id="first_name" required></label><br>
      <label>last Name: <input type="text" name="last_name" id="last_name"required></label><br>
      <label id="email_label">e-mail: <input type="email" name="email" id="email_login"required></label><br>
      <label id="password_label">password: <input type="password" name="password" id="password_login"required></label><br>
      <label id="password_label">password: <input type="password" name="password_verify" id="password_verify"required></label><br>
      <h3 id="error"> <?php echo $error; ?> </h3>
      <input type="submit" id="submit_button" name="submit" value="Create Account">
      </form>
      <form action="./../../view/main/index.php">
        <input type="submit" value="Main Page">
      </form>
    </div>
  </div> 
  </div>
</body>
</html>