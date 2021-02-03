<?php
  //query connecting to db using servername, username, password, dbname
  $conn = new mysqli('localhost', 'root', 'eOqnJ0HTjmgQl1i7', 'ecommerce');
  

  //if connection fails
  if($conn->connect_error) {
    // Echo out if it failed to connect to the database
    echo $conn->connect_error;
  }
  
?>