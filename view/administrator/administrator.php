<?php
include_once './../../model/main/user.php';
session_start();
?>

<!--By: Jake Pitkin on February 11, 2015
    Hello page after logging in as an admin-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="administrator.css">
  <title><?php echo $_SESSION['user']->getName(); ?></title>
</head>
<body>
  <div id="header">
    <p>University of Utah School of Computing</p>
  </div>
  <?php include '../../controller/main/header.php'; ?>
  <div id="content">
    <h3>Hello <?php echo $_SESSION['user']->getName(); ?>!</h3>
    <h4>Logged in as an <?php echo $_SESSION['user']->getRole(); ?>.</h4>
  </div> 
</body>
</html>