<?php
  require("connect.php");
  session_unset(); 
  session_destroy();
  header('location: adminlogin.php');
?>