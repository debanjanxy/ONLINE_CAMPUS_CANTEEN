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
      $email =  $_POST['email'];
      $password = $_POST['password'];
  $key = 'canteen'; 
  $time = time(); 
  $orderid = hash_hmac('md5', $time, $key);  
  
  // Storing session data
  $_SESSION["orderid"] = $orderid;
    

    $_SESSION["email"] = $email;
    $_SESSION["items"] = 0;
    
    $sql = "SELECT email, password FROM customer_details WHERE email='$email' AND password='$password'";
    
  //  echo"HI";
    $result = mysqli_query($conn,$sql);
    
   // echo"HI";
    $row = mysqli_num_rows($result);
  // echo"HI";
    if($row==1)
     {
      header("Location: http://localhost/online_campus_canteen/homepage.php");
     }
    else
      {
  echo 'invalid username or password';

       header("Location: http://localhost/online_campus_canteen/login.php");
      
      }

    echo mysql_error();
    

    

?>
