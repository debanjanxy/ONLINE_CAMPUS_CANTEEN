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
            

 
  $hostel = $_POST['hostel'];
  $food = $_POST['food'];
  $quantity = $_POST['quantity'];
  $orderid=$_SESSION["orderid"];
  
  $item= $_SESSION["items"];
  $item= $item+1;
  $_SESSION["items"]= $item;
  
  
  
  $sql = "SELECT * FROM customer_order_mapping (order_id, emailid) WHERE order_id='$orderid'"; 
  $result = mysqli_query($conn,$sql);
  
  // echo"HI";
    $row = mysqli_num_rows($result);
  
    if($row==0)
     {
        $sql = "INSERT INTO customer_order_mapping (order_id, emailid) VALUES ('$orderid','P@gmail.com')"; 
        $result = mysqli_query($conn,$sql);
     }

      

  
  $sql = "INSERT INTO customer_order (sno,order_id, hostelno, food, quantity) VALUES ('$item','$orderid','$hostel','$food','$quantity')";
  $result = mysqli_query($conn,$sql);
   
 // echo mysql_error(); 
   
  mysqli_close($con);
  
?>
