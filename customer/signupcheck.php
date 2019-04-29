<?php 

// Starting session
  session_start();
 


  $dbhost = 'localhost'; 
  $dbuser = 'root';
  $dbpass = 'pratikwagh1995';  
            
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass,'online_canteen_booking'); 
  
  if(! $conn ) 
  { 
     //die('Could not connect: ' . mysql_error()); 
     echo "Could not connect";
  } 
            
  $key = 'canteen'; 
  $time = time(); 
  $orderid = hash_hmac('md5', $time, $key);  
  
  // Storing session data
  $_SESSION["orderid"] = $orderid;
 
  $emailid = $_POST['emailid'];
  $contactno = $_POST['contactno'];
  $password = $_POST['password'];
  $name= $_POST['name'];
 
  

  
  $sql = "INSERT INTO customer_details (name,email,contactno, password) VALUES ('$name','$emailid','$contactno','$password')";
  $result = mysqli_query($conn,$sql);
   
 // echo mysql_error(); 
   
  mysqli_close($con);
  
    header("Location: http://localhost/online_campus_canteen/homepage.php");
?>
