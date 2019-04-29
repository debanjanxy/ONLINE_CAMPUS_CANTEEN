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
    

    $item= $_POST['id'];
    $orderid=$_SESSION["orderid"];



    $sql = "DELETE FROM customer_order WHERE order_id='$orderid' AND sno='$item'";
    
  //  echo"HI";
    $result = mysqli_query($conn,$sql);
    
   // echo"HI";
   
    $sql = "SELECT * FROM customer_order WHERE order_id='$orderid'";
    
  //  echo"HI";
    $result = mysqli_query($conn,$sql);
    
   // echo"HI";
    $row = mysqli_num_rows($result);
    
    if($row==0)
    {
       $sql = "DELETE FROM customer_order_mapping WHERE order_id='$orderid'";
    
  //  echo"HI";
      $result = mysqli_query($conn,$sql);
    }


    header("Location: http://localhost/online_campus_canteen/viewcart.php");
   

    echo mysql_error();
    

    

?>
