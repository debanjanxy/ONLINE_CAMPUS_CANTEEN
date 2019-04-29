<?php


  // echo"HI";
  
   session_start();
   
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'pratikwagh1995';
   
 //  echo"HI";
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'online_canteen_booking');
   
   
 //  echo"HI";
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
    

  // receive all input values from the form
      $address =  $_POST['address'];
      $instructions = $_POST['instructions'];
      $orderid=$_SESSION['orderid'];

    

    $_SESSION["email"] = $email;
    
    $sql = "INSERT INTO confirm_booking (order_id, instructions, address) VALUES ('$orderid','$instructions','$address')";
    
  //  echo"HI";
    $result = mysqli_query($conn,$sql);
    
    header("Location: http://localhost/online_campus_canteen/login.php");

    echo mysql_error();
    
// remove all session variables
session_unset();

// destroy the session
session_destroy(); 
    

?>
