<?php
  
  $server = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'matedb';
  $mysqli = new mysqli($server, $user, $password, $dbname) or die(mysqli_error());
?>